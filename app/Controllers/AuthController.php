<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === 'admin123') {
            $session->set('logged_in', true);
            return redirect()->to('/caisse/choix');
        } else {
            $session->setFlashdata('error', 'Identifiants incorrects');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}