<?php

namespace App\Console\Commands;

use App\Code\Imports\ZipImportContext;
use Illuminate\Console\Command;
use App\Code\Imports\ImportZipCodeByDocument;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:import {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para Importar desde archivos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImportZipCodeByDocument $import)
    {
        $this->info('Start import....');

        try {
            $type = ZipImportContext::type($this->argument('file'));
            $import->save($type);
            $this->info('The import was successful!');
        }catch (\Exception $e) {
            logger($e->getMessage());
            $this->error('Wooups! Algo asío mal, revice su larave.log');
        }
    }
}
