<?php namespace Mataps\SocialLogin\User;

use Mataps\SocialLogin\User\Forms\UserFormInterface;
use Mataps\SocialLogin\User\Lists\UserListInterface;
use Illuminate\Hashing\HasherInterface;

class EloquentUserProvider implements UserInterface
{

	protected $userForm;

	protected $userList;

	protected $hasher;


	public function __construct(
		UserFormInterface $userForm,
		UserListInterface $userList,
		HasherInterface $hasher
	)
	{
		$this->userForm = $userForm;
		$this->userList = $userList;
		$this->hasher = $hasher;
	}

	public function create($credentials)
	{
		$user = $this->userForm->create($credentials);

		return true;
	}
}