<?php

class AdminController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('admin', array(
			'except' => array(
				'getLogin',
				'postLogin'
			)
		));
	}

	public function getIndex()
	{
		return 'Admin Login';
	}

	public function getLogin()
	{
		return View::make('admin.login');
	}

	public function postLogin()
	{
		dd(Input::all());
	}
}