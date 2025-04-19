<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('pages/home'); // Llama a app/Views/index.php
    }
}
