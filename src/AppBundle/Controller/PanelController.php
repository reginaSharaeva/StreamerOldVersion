<?php

namespace App\Http\Controllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelController extends Controller
{

    public function profilePage()
    {
        return view("profile");
    }


}