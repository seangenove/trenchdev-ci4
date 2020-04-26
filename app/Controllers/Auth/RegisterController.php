<?php

namespace App\Controllers\Auth;

use App\Helpers\Auth;
use App\Models\User;
use CodeIgniter\Controller;


class RegisterController extends Controller
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

        echo view('auth/register', $data);
    }

    public function create()
    {

        if (! $this->validate('registerUser')) {
            $this->session = session();

            $this->session->setFlashdata('validation', $this->validator);

            // problematic in Valet, discuss w/ Chris (being redirected back to localhost:8080)
            return redirect()->back()->withInput();
        }

        $user = new User();
        $user->save([
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/');
    }

    protected function checkIfAuthenticated(){
        if (Auth::user()) {
            return redirect()->to('/portfolio');
        }
    }
}