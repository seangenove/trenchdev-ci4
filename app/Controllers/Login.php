<?php

namespace App\Controllers;

use App\Helpers\Auth;
use Config\Database;

class Login extends BaseController
{
    public function index()
    {
        if (Auth::user()) {
            // Not authenticated
            return redirect()->to('/portfolio');
        }

        $data = [];
        $validation = $this->session->getFlashdata('validation');

        if ($validation) {
            $data = [
                'validation' => $validation
            ];
        }

        echo view('auth/login', $data);
    }

    public function authenticate()
    {

        if (!$this->validate('loginUser')) {
            $this->session->setFlashdata('validation', $this->validator);

            return redirect()->back()->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $db = Database::connect();
        $queryStatement = "SELECT * FROM users u WHERE u.email = '{$email}'";
        $user = $db->query($queryStatement)->getRow();

        if (!$user || !password_verify($password, $user->password)) {
            $this->session->setFlashdata('errorMessage', "Invalid email or password");

            return redirect()->to('/login');
        }

        Auth::login($user);

        // redirect
        return redirect()->to("/portfolio");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}