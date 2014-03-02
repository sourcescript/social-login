<?php

class AdminControllerTest extends TestCase
{
	public function testRedirectIfNotAdmin()
	{
		Route::enableFilters();
		$this->call('GET', 'admin');
		$this->assertRedirectedTo('admin/login');
	}
}