<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class readmeToViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'readme:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a view of the README.md file and save it in views folder.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // dd(File::exists('README.md'));
        if(File::copy('README.md', "resources/views/README.md")) {
            echo "README.md was copied.";
        } else {
            echo 'upsss, something went wrong.';
        }

        echo "\n";
    }
}
