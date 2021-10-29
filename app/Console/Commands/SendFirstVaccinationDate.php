<?php

namespace App\Console\Commands;

use App\Mail\FirstVaccineReservation;
use App\Models\CitizenRecord;
use App\Models\ReadyForVaccination;
use App\Models\VaccineAllocation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendFirstVaccinationDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendFirstVaccinationDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $vaccine_allocations = VaccineAllocation::where('remaining_quantity', '>', 0)->with('getVaccinationCenter')->get(['vaccination_center_id', 'remaining_quantity']);

        $peoples = CitizenRecord::where('dose_received', 0)->get();

        foreach ($peoples as $people) {
            foreach ($vaccine_allocations as $vaccine_allocation) {
                if ($people->grama_niladhari_division_id == $vaccine_allocation->getVaccinationCenter->grama_niladhari_division_id) {
                    $data = new ReadyForVaccination();
                    $data->nic = $people->nic;
                    $data->dose_receiving_date = now()->nextWeekday()->toDateString();
                    $data->dose_receiving_time = "08:00:00";
                    $data->vaccine_center_id = $vaccine_allocation->vaccination_center_id;
                    $data->save();

                    $body = [
                        'name' => $people->name,
                        'venue' => $vaccine_allocation->getVaccinationCenter->center_name,
                        'date' => now()->nextWeekday()->toDateString(),
                    ];
                    Mail::to($people->email)->send(new FirstVaccineReservation($body));

                    break;
                }
            }
        }

        return 0;
    }
}
