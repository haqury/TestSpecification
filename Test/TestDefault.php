<?php
namespace Service\Test;

class TestDefault extends TestSpecificationAbstract
{
	/**
	 * @inheritdoc
	 * @return mixed
	 */
	public function isSatisfiedBy()
	{
		return true;
	}

	/**
	 * @inheritdoc
	 * @return mixed
	 */
	public function count()
	{
		$this->result['default']['points'] = isset($this->result['default']['points'])
			? $this->result['default']['points'] + 1
			: 1;
		return $this->result;
	}
}