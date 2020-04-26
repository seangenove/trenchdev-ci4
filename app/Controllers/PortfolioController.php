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

        $data['pageTitle'] = $name; // Capitalize the first letter
        $data['name'] = $name; // Capitalize the first letter

        echo view('pages/portfolios/index', $data);
    }
}