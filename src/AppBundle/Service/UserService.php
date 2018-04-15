<?php
namespace AppBundle\Service;
use AppBundle\Entity\User;

interface UserService
{
    public function updateUser($data):User;
}

?>