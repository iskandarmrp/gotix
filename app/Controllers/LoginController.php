<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController extends BaseController
{
    public function login()
    {
        return view('login');
    }
    public function login_action()
    {
        $model = model(Login::class);
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $cek = $model->getDataUsers($email, $password);
        if ($cek == 1) {
            session()->set('email', $email);
            return redirect()->to('/');
        } else {
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
