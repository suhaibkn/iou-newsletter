<?php namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
        log_message('info', 'Admin logged in.');

		return redirect()->to(base_url().'/admin/newsletters');
	}

    public function newsletters()
    {
        return view('Admin/newsletters');
	}

    public function subscribers()
    {
        return view('Admin/subscribers');
    }

}
