<?php

namespace AppBundle\Controllers;

use App\Camera;
use App\Service\CameraService;
use Auth;
use Symfony\Component\Process\Process;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CameraController extends Controller
{
    private $cameraService;

    /**
     * CameraController constructor.
     * @param $cameraService
     */
    public function __construct(CameraService $cameraService)
    {
        $this->cameraService = $cameraService;
    }

    public function addNewCamera()
    {
        return $this->cameraService->addNewCamera(Request::all());
    }


    public function testRunCam($id)
    {
        $process = new Process('php artisan run:record ' . $id);
        $process->setWorkingDirectory(base_path());

        $process->run(function ($type, $buffer) use (&$camera) {

            if ('err' === $type) {

                throw new \Exception("Что то пошло не так");

            } else {

                exit($buffer);

            }
        });
        return "success";
    }

    public function getCameras()
    {
        $user = Auth::user();
        $cameras = Camera::with("files")->where("user_id", "=", $user->id)->get()->toArray();
        return response($cameras, 200);
    }

    public function updateCamera()
    {
        return $this->cameraService->updateCamera(Request::all());
    }

    public function deleteCamera(int $Id)
    {
        return $this->cameraService->deleteCamera($Id);

    }

    public function getCameraPage(string $key)
    {
        return view("rtmp", [
            "key" => $key
        ]);
    }

}
