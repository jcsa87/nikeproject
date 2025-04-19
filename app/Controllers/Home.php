<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('pages/home'); // Llama a app/Views/index.php
    }
    public function about()
    {
        return view('pages/about');
    }
    public function comercialization()
    {
        return view('pages/comercialization'); // Llama a app/Views/index.php
    }
    public function terms_uses()
    {
        return view('pages/terms_uses'); // Llama a app/Views/index.php
    }
    public function contact()
    {
        return view('pages/contact'); // Llama a app/Views/index.php
    }
}
