<?php namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
        log_message('info', 'Admin logged in.');

		return view('Admin/home');
	}

}
