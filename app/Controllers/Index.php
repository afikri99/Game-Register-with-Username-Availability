<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return redirect()->to('/');
    }
}
