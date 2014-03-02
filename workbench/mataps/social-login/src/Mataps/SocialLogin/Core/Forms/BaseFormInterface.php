<?php namespace Mataps\SocialLogin\Core\Forms;

interface BaseFormInterface
{
	function create(array $data);

	function update(array $criteria, array $data);

	function delete(array $criteria);

	function errors();
}