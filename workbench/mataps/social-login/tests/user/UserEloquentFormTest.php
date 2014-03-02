<?php

use Mataps\SocialLogin\User\Forms\EloquentUserForm;
use Mataps\SocialLogin\User\Models\User;
use Mockery as m;

class UserEloquentFormTest extends PHPUnit_Framework_TestCase
{

	public function tearDown()
	{
		m::close();
	}

	public function testCreateUserSuccess()
	{
		$credentials = array(
			'username' => 'foo',
			'password' => 'bar123'
		);

		$user = m::mock('Mataps\SocialLogin\User\Models\User');
		$user->shouldReceive('create')->with($credentials)->andReturn('foo');

		$validator = m::mock('Mataps\SocialLogin\Core\Validators\BaseValidatorInterface');
		$validator->shouldReceive('canCreate')->andReturn(true);

		$form = new EloquentUserForm($user, $validator);

		$this->assertEquals('foo', $form->create($credentials));
	}
}