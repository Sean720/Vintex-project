<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function login()
{
    // return view('login/login');
}

}