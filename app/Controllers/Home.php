<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('Home/home');
	}

	//--------------------------------------------------------------------

    public function about()
    {
        return view('Home/about');
    }
}
