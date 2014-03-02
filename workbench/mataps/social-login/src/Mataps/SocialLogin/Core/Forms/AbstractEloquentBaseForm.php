<?php namespace Mataps\SocialLogin\Core\Forms;

use Illuminate\Database\Eloquent\Model;
use Mataps\SocialLogin\Core\Validators\BaseValidatorInterface;

abstract class AbstractEloquentBaseForm implements BaseFormInterface
{
	protected $model;

	protected $validator;

	protected $data;

	protected $defaults = array();

	protected $errors = array();

	public function __construct(Model $model, BaseValidatorInterface $validator)
	{
		$this->model = $model;
		$this->validator = $validator;
	}

	public function create(array $data)
	{
		$data = $this->mergeDefaults($data);
		$this->data = $data;

		if ( ! $this->validator->canCreate($data))
		{
			$this->errors = $this->validator->errors();
			return false;
		}

		return $this->model->create($data);
	}

	public function update(array $criteria, array $data)
	{
		if ( ! $this->validator->canUpdate($data))
		{
			$this->errors = $this->validator->errors();
			return false;
		}

		return $this->model->where($criteria)->update($data);
	}

	public function delete(array $criteria)
	{
		if ( ! $this->validator->canDelete())
		{
			$this->errors = $this->validator->errors();
			return false;
		}

		return $this->model->where($criteria)->update($data);
	}

	protected function mergeDefaults($data)
	{
		return array_replace_recursive($this->defaults, $data);
	}

	public function errors()
	{
		return $this->errors;
	}

	public function __get($property)
	{
		if (isset($this->data[$property]))
		{
			return $this->data[$property];
		}
	}

	public function __set($property, $value)
	{
		return $this->data[$property] = $value;
	}
}