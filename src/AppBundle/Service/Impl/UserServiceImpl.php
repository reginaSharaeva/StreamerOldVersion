<?php

namespace AppBundle\Service\Impl;

use AppBundle\Entity\User;
use AppBundle\Service\UserService;
use Auth;
class UserServiceImpl implements UserService
{

    public function updateUser($data):User
    {
        $user = Auth::user();
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->save();
        return $user;
    }
}

?>