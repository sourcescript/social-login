<?php

use Mataps\SocialLogin\Social;

use Mockery as m;

class SocialTest extends PHPUnit_Framework_TestCase {

	protected $social;

	protected $userRepo;

	protected $hasher;

	public function setUp()
	{
		$this->social = new Social(
			$this->userRepo = m::mock('Mataps\SocialLogin\Repo\UserRepositoryInterface'),
			$this->hasher = m::mock('Illuminate\Hashing\HasherInterface')
		);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testUserCreate()
	{
		$credentials = array(
			'username' => 'test',
			'password' => 'test123'
		);

		$this->social->create($credentials);
	}

}