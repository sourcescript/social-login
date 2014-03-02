<?php namespace Mataps\SocialLogin\Core\Validators;


interface BaseValidatorInterface
{
	function valid($data);

	function errors();
}