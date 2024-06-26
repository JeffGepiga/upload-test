<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
class ClearFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear-files';

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
        $done = \File::cleanDirectory(Storage::disk('file_uploads')->path('/'));
        if ($done) {
            $this->info("Succesfully Deleted");
        }else{
            $this->info("Failed to delete or no files");
        }
    }
}
