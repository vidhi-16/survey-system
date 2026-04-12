<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $model = new AdminModel();

        $user = $model->where('username',$this->request->getPost('username'))
                      ->where('password',$this->request->getPost('password'))
                      ->first();

        if($user){
            session()->set('admin', true);
            return redirect()->to('/admin/dashboard');
        }

        return "Invalid Login";
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}