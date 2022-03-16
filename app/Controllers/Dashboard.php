<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['actView'] = "Dashboard/index";
        return view('template', $data);
    }
}
