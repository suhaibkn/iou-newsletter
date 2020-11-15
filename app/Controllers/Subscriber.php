<?php namespace App\Controllers;

class Subscriber extends BaseController
{
	public function index()
	{
        if($this->request->getMethod() === 'get') {
		    return view('Subscriber/home');
        } elseif ($this->request->getMethod() === 'post') {
            dd('You\'ve POSTed');
        }
	}
}
