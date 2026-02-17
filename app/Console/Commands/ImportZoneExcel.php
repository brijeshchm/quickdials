<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
 
use App\Services\ZoneExcelImport;
class ImportZoneExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-zone-excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

  
    /**
     * Execute the console command.
     */
    public function handle()
    {
 
        //  $filePath = $this->argument('upload_file');
         $filePath = 'storage/app/zone_city.xlsx';
 
        if (!file_exists($filePath)) {
            $this->error('File not found!');
            return Command::FAILURE;
        }
  $this->info('✅ Excel import start');
        set_time_limit(0);
 
        Excel::import(new ZoneExcelImport, $filePath);

        $this->info('✅ Excel imported successfully!');
        return Command::SUCCESS;
    }
}
