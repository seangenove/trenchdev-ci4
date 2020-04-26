<?php

namespace App\Controllers\Auth;

use App\Helpers\Auth;
use CodeIgniter\Controller;
use Config\Database;

class LoginController extends Controller
{
    public function index()
    {
        $data = [];
        $this->session = session();

        $this->checkIfAuthenticated();

        $validation = $this->session->getFlashdata('validation');

        if ($validation) {
            $data = [
                'validation' => $validation
            ];
        }

        echo view('auth/login', $data);
    }

    public function login()
    {

        $this->session = session();

        // data validation
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

    protected function checkIfAuthenticated(){
        if (Auth::user()) {
            return redirect()->to('/portfolio');
        }
    }
}