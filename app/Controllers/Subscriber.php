<?php namespace App\Controllers;

class Subscriber extends BaseController
{
	public function index()
	{
        if ($this->request->getMethod() === 'get') {
            return view('Subscriber/home');
        } else {

            if (!$this->validate([
                'email' => 'required|valid_email',
            ])) {
                return redirect()->back()->withInput();
            } else {
                return $this->request->getPost('email');
            }
        }

	}
}
