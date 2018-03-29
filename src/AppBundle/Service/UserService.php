<?php
namespace App\Service;
use App\User;

interface UserService
{
    public function updateUser($data):User;
}

?>