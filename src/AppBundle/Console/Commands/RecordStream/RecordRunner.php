<?php

namespace App\Console\Commands\RecordStream;

use App\Camera;
use Artisan;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RecordRunner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:record {camId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run record stream to cam';

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


    function ping($url = NULL)
    {
        if ($url == NULL) return false;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpcode >= 200 && $httpcode < 300) {
            return true;
        } else {
            return false;
        }
    }

    function run_in_background($Command, $Priority = 0)
    {
        $PID = system("$Command > /var/www/html/videoCam/rtmp.log10.txt 2>&1 & echo $!");
        return $PID;
    }

    public function handle()
    {
        $cameraId = $this->argument('camId');
        $camera = Camera::where("id", "=", $cameraId)->get()->first();
        $user = $camera->user()->get()->first();

        $pathToCopyVideo = public_path('videos/' . $user->id) . "/";
        $date = new \DateTime();
        $nameFileDate = $date->getTimestamp();
        $fileExpansion = ".mp4";

        $fileWitPathWithName = $pathToCopyVideo . $nameFileDate . $fileExpansion;

        if ($this->ping($camera->link) == true) {

            $this->info("запись началась");
            shell_exec("/usr/bin/ffmpeg -i '" . $camera->link . "' -t 00:00:05 " . $fileWitPathWithName . "  > /var/www/html/videoCam/rtmp.log10.txt 2>&1");
            $this->info("запись кочилась");

            $this->info("загрузка началась");
            $command = "/usr/bin/php " . base_path() . "/artisan dropbox:upload " . $fileWitPathWithName . " --camera " . $cameraId . " --user " . $user->id;
            $this->run_in_background($command);
            $this->info("загрузка закончилась");

            $this->run_in_background('/usr/bin/php ' . base_path() . '/artisan run:record ' . $camera->id);


        } else {
            $this->error("что то пошло не так и запись не удалась");
        }
    }
}

