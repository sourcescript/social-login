<?php

use Mataps\SocialLogin\Core\Forms\AbstractEloquentBaseForm;
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
			'username' => 'test',
			'password' => 'test123'
		);

		$user = m::mock('Illuminate\Database\Eloquent\Model');
		$user->shouldReceive('create')->with($credentials)->andReturn('foo');

		$validator = m::mock('Mataps\SocialLogin\Core\Validators\BaseValidatorInterface');
		$validator->shouldReceive('canCreate')->andReturn(true);

		$form = new TestClass($user, $validator);

		$this->assertEquals('foo', $form->create($credentials));
	}

	public function testCreateUserFails()
	{
		$credentials = array(
			'username' => 'foo',
			'password' => 'bar123'
		);

		$user = m::mock('Illuminate\Database\Eloquent\Model');

		$validator = m::mock('Mataps\SocialLogin\Core\Validators\BaseValidatorInterface');
		$validator->shouldReceive('canCreate')->andReturn(false);
		$validator->shouldReceive('errors')->andReturn('bar');

		$form = new TestClass($user, $validator);

		$this->assertEquals(false, $form->create($credentials));
		$this->assertEquals('bar', $form->errors());
	}

	public function testUpdateSuccess()
	{
		$credentials = array(
			'username' => 'foo',
			'password' => 'bar123'
		);

		$criteria = array(
			'username' => 'foo'
		);

		$user = m::mock('Illuminate\Database\Eloquent\Model');
		$user->shouldReceive('where')->andReturn($user);
		$user->shouldReceive('update')->andReturn('foo');

		$validator = m::mock('Mataps\SocialLogin\Core\Validators\BaseValidatorInterface');
		$validator->shouldReceive('canUpdate')->andReturn(true);

		$form = new TestClass($user, $validator);

		$this->assertEquals('foo', $form->update($criteria, $credentials));
	}

	public function testUpdateFails()
	{
		$credentials = array(
			'username' => 'foo',
			'password' => 'bar123'
		);

		$criteria = array(
			'username' => 'foo'
		);

		$user = m::mock('Illuminate\Database\Eloquent\Model');

		$validator = m::mock('Mataps\SocialLogin\Core\Validators\BaseValidatorInterface');
		$validator->shouldReceive('canUpdate')->andReturn(false);
		$validator->shouldReceive('errors')->andReturn('bar');

		$form = new TestClass($user, $validator);

		$this->assertEquals(false, $form->update($criteria, $credentials));
		$this->assertEquals('bar', $form->errors());
	}
}

class TestClass extends AbstractEloquentBaseForm {

	protected $defaults = array(
		'foo' => 'bar',
		'test' => true
	);
}