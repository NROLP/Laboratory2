<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MusicController extends BaseController
{
    public function index()
    {
        //
    }

    public function display()
    {
        return view('/MusicTemp/player');
    }
}
