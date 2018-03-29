<?php

namespace App\Service\Impl;

use App\User;
use App\Service\UserService;
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