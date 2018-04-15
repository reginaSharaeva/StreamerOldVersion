<?php

namespace AppBundle\Service\Impl;

use AppBundle\Entity\Camera;
use AppBundle\Service\CameraService;
use Artisan;
use Auth;
use PhpParser\Node\Stmt\Throw_;
use Symfony\Component\Process\Process;

class CameraServiceImpl implements CameraService
{

    function run_in_background($Command, $Priority = 0)
    {
        $PID = system("$Command > /var/www/html/videoCam/rtmp.log6.txt 2>&1 & echo $!");
        return $PID;
    }

    public function addNewCamera($data):Camera
    {
        $user = Auth::user();

        $camera = new Camera();
        $camera->link = $data["link"];
        $camera->name = $data["name"];
        $camera->user_id = $user->id;
        $camera->proxy_link = str_random(10);

        $command = "/usr/bin/ffmpeg -y -f mjpeg -i '" . $camera->link . "' -threads 2 -vf 'setpts=5*PTS' -f flv -r 25 -s 800x600 -an rtmp://localhost:1935/live/" . $camera->proxy_link;

        $id = $this->run_in_background($command);

        $camera->process_id = $id;

        $camera->save();


        $this->run_in_background('/usr/bin/php '.base_path().'/artisan run:record ' . $camera->id);

        return $camera;
    }

    public function updateCamera($data):Camera
    {
        $user = Auth::user();
        $camera = $user->cameras()->where("id", "=", $data["id"])->get()->first();

        $camera->link = $data["link"];
        $camera->name = $data["name"];

        $this->run_in_background('kill ' . $camera->process_id);

        $command = "/usr/bin/ffmpeg -y -f mjpeg -i '" . $camera->link . "' -threads 2 -vf 'setpts=5*PTS' -f flv -r 25 -s 800x600 -an rtmp://localhost:1935/live/" . $camera->proxy_link;

        $id = $this->run_in_background($command);

        $camera->process_id = $id;

        $camera->update();

        return $camera;
    }

    public function deleteCamera(int $Id)
    {
        $user = Auth::user();
        $camera = $user->cameras()->where("id", "=", $Id)->get()->first();

        $this->run_in_background('kill ' . $camera->process_id);

        $camera->delete();
    }
}

?>