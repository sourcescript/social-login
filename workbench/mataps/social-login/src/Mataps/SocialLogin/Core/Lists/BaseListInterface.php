<?php namespace Mataps\SocialLogin\Core\Lists;


interface BaseListInterface
{
	function byId($id);

	function byPage($limit, $offset);
}