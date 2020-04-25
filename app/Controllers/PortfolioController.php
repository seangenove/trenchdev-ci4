<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class PortfolioController extends Controller
{
    public function index($username)
    {

        switch ($username) {
            case "seangenove":
                $name = "Sean";
                break;
            default:
                $name = ucfirst($username);
                break;
        }

        $data['name'] = $name; // Capitalize the first letter

        return $this->view($data);
    }

    public function view($data){
        echo view('templates/portfolio/header', $data);
        echo view('templates/portfolio/navbar', $data);
        echo view('pages/portfolios/index', $data);
        echo view('templates/portfolio/footer', $data);
    }
}