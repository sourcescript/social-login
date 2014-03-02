<?php namespace Mataps\SocialLogin;

use Mataps\SocialLogin\User\UserInterface;

class Social
{

	protected $user;


	public function __construct(UserInterface $user)
	{
		$this->user = $user;
	}

	public function create(array $credentials, $activate = false)
	{
		$user = $this->user->create($credentials);

		if ($activate)
		{
			$user->activate($user->getVerificationCode());
		}

		return $user;
	}

	// public function login(array $credentials, $remember = false)
	// {
	// 	$user = $this->user->find($credentials);

	// 	if ( ! $user)
	// 	{
	// 		return false;
	// 	}

		
	// }

	
}