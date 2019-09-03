<?php
namespace Service\Test;
use Model\Profile;

/**
 * Created by PhpStorm.
 * User: haqury
 * Date: 03.09.19
 * Time: 5:13
 */
class TestForGourmet extends TestSpecificationAbstract
{
	/**
	 * @inheritdoc
	 * @return mixed
	 */
	public function isSatisfiedBy()
	{
		return $this->item->profile == 0;
	}

	/**
	 * @inheritdoc
	 * @return mixed
	 */
	public function count()
	{
		$this->result[$this->item->profile]['points'] = isset($this->result[$this->item->profile]['points'])
			? $this->result[$this->item->profile]['points'] + (1 * $this->item->weight)
			: 1;
		return $this->result;
	}
}