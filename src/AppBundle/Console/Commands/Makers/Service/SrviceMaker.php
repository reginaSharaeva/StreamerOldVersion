<?php

namespace App\Console\Commands\Makers\Service;

use App\Console\Commands\Makers\Util\PatternMaker;
use Illuminate\Console\Command;

class SrviceMaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {modelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create service pattern for model';

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
     * @return mixed
     */

    public function handle()
    {
        $modelName = $this->argument('modelName');
        $patternMakert = new PatternMaker("/var/www/html/videoCam/app/");
        $result = $patternMakert->MakePatternByName("Service", $modelName);
        if ($result["type"] == "error") {
            $this->error($result["message"]);
        } else {
            $this->info($result["message"]);
        }

    }


}
