<?php namespace App\Controllers;

use App\Models\SubscriberModel;

class Home extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() === 'get') {
            return view('Home/home');
        } else {

            if (!$this->validate([
                'name'  => 'required|min_length[3]',
                'email' => 'required|valid_email',
            ])) {
                return redirect()->back()->withInput();
            } else {
                $name  = $this->request->getVar('name');
                $email = $this->request->getVar('email');

                $sm        = new SubscriberModel();
                $duplicate = $sm->isRegistered($email);

                if ($duplicate) {
                    return redirect()->back()->withInput()->with('duplicate', '1');
                }
                $id = $sm->new(['name' => $name, 'email' => $email]);

                return view('Home/success', [
                    'name' => $this->request->getVar('name'),
                    'id'   => $id,
                ]);
            }
        }
    }

    public function success()
    {
        return view('Home/success');
    }
}
