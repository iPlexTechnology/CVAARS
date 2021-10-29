<?php

namespace App\Console\Commands;

use App\Mail\SendVaccineRemind;
use App\Models\CitizenRecord;
use App\Models\ReadyForVaccination;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class VaccineDateRemind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:VaccineDateRemind';

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
        $tomorrow_vaccinations = ReadyForVaccination::where('dose_receiving_date', now()->addDay()->toDateString())->get();

        foreach ($tomorrow_vaccinations as $tomorrow_vaccination) {
            $person = CitizenRecord::find($tomorrow_vaccination->nic)->first();
            $body = [
                'name' => $person->name,
            ];
            Mail::to($person->email)->send(new SendVaccineRemind($body));
        }

        return 0;
    }
}
