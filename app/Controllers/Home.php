<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() === 'get') {
            return view('Home/home');
        } else {

            if (!$this->validate([
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email',
            ])) {
                return redirect()->back()->withInput();
            } else {
                return $this->request->getPost('email');
            }
        }
    }
}
