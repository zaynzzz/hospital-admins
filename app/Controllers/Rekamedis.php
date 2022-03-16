<?php

namespace App\Controllers;

class Rekamedis extends BaseController
{
    public function index()
    {
        $mrekam = $this->mrekam;
        $data['actView'] = "Rekamedis/index";
        return view('template', $data);
    }
}
