<?php

namespace App\Console\Commands;

use App\Http\Controllers\Weather as WeatherController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class Weather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get {town} {isoCountry}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get weather by location. Example: London GB';

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
     */
    public function handle(WeatherController $weather, Request $request)
    {
        $town = $this->argument('town');
        $country = $this->argument('isoCountry');

        $request['location'] = $town . ',' . $country;

        print_r($weather->index($request));

        return 0;
    }
}
