<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\User;

class Login extends BaseController
{
    public function index()
    {
        if (Auth::user()) {
            // Not authenticated
            return redirect()->to('/');
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

        $data = $this->request->getPost();

        $user = User::findByEmail($data['email']);

        if (!$user || !password_verify($data['password'], $user->password)) {
            $this->session->setFlashdata('errorMessage', "Invalid email or password");

            return redirect()->to('/login');
        }

        Auth::login($user);

        return redirect()->to("/");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}