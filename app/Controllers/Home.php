<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'DaySince',
        ];

        return view('Pages/home', $data);
    }
}
