<?php

namespace App\Controllers;
use App\Models\Admin;

class Home extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function adminLogin($id)
{
    $admin = new Admin();
    $reg_no = this->request->getVar('reg_no');
    $password = $this->request->getVar('password');

    $data = $admin->where('reg_no', $email)->first();

    if($data){
        $pass = $data['password'];
        $pwd_verify = \password_verify($password,$pass);

        if($pwd_verify){
            $session_data = [
                'id' => $data['id'],
                'name' =>$data['f_name'],
                'email' =>$data['email'],
                'isSignedIn'=>TRUE
            ];

            $session->set($session_data);
            return redirect()->to('');
        }
        else{
            $session->setFlashdata('msg', 'wrong password.');
            return redirect()->to('/login');
        };
    }else{
        $session->setFlashdata('msg', 'wrong email.');
        return redirect()->to('/login');
    }
}

}