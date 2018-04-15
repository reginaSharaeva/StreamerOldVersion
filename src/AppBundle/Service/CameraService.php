<?php
namespace AppBundle\Service;

use AppBundle\Entity\Camera;

interface CameraService
{
    public function addNewCamera($data):Camera;
    public function updateCamera($data):Camera;
    public function deleteCamera(int $Id);
}

?>