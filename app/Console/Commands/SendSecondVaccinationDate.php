<?php

namespace App\Console\Commands;

use App\Mail\SecondVaccineReservation;
use App\Models\CitizenRecord;
use App\Models\ReadyForVaccination;
use App\Models\VaccinatedRecord;
use App\Models\VaccineType;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSecondVaccinationDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendSecondVaccinationDate';

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
        $vaccine_records = VaccinatedRecord::where('dose_count', 1)->with('getBatch')->get();

        foreach ($vaccine_records as $vaccine_record) {
            $vaccine = VaccineType::where('name', $vaccine_record->getBatch->vaccine_type)->first();
            $person = CitizenRecord::find($vaccine_record->nic)->first();

            $data = new ReadyForVaccination();
            $data->nic = $person->nic;
            $data->dose_receiving_date = now()->addWeeks($vaccine->next_dose_duration_in_weeks)->nextWeekday()->toDateString();
            $data->dose_receiving_time = "08:00:00";
            $data->vaccine_center_id = $vaccine_record->vaccination_center_id;
            $data->save();

            $body = [
                'name' => $person->name,
                'date' => now()->addWeeks($vaccine->next_dose_duration_in_weeks)->nextWeekday()->toDateString(),
            ];

            Mail::to($person->email)->send(new SecondVaccineReservation($body));
        }

        return 0;
    }
}
