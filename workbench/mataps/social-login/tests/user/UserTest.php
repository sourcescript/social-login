<?php

use Mataps\SocialLogin\User\User;

use Mockery as m;

class UserTest extends PHPUnit_Framework_TestCase
{

	protected $userForm;

	protected $userList;

	protected $hasher;


	public function setUp()
	{
		$this->user = new User(
			$this->userForm = m::mock('Mataps\SocialLogin\User\Forms\UserFormInterface'),
			$this->userList = m::mock('Mataps\SocialLogin\User\Lists\UserListInterface'),
			$this->hasher = m::mock('Illuminate\Hashing\HasherInterface')
		);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testCreateUser()
	{
		$credentials = array(
			'username' => 'admin',
			'password' => 'test'
		);
		$this->userForm->shouldReceive('create')->once()->andReturn('bar');

		$this->assertEquals('bar', $this->user->create($credentials));
	}
}