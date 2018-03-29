<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Request;
use Auth;

class UserController extends Controller
{
    private $userService;

    /**
     * UserController constructor.
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getInfoAboutGuardUser()
    {
        return Auth::user();
    }

    public function updateGuardUser()
    {
        return $this->userService->updateUser(Request::all());
    }
}
