<?php

namespace App\Controllers;
use App\Helpers\Auth;
use CodeIgniter\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        $this->session = session();

        if(!Auth::user()) {
            return redirect()->to('/login');
        }

        echo view('portfolio/index');
    }
}