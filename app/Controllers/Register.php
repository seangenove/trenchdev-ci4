<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\User;
use CodeIgniter\Controller;


class Register extends Controller
{
    public function index()
    {

        if (Auth::user()) {
            return redirect()->to('/portfolio');
        }

        $data = [];
        $validation = session()->getFlashdata('validation');

        if ($validation) {
            $data = [
                'validation' => $validation
            ];
        }

        echo view('auth/register', $data);
    }

    public function create()
    {

        if (! $this->validate('registerUser')) {
            session()->setFlashdata('validation', $this->validator);

            return redirect()->back()->withInput();
        }

        $user = new User();
        $user->save([
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/');
    }
}