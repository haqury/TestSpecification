<?php
namespace Service\Test;

class TestForCooks extends TestSpecificationAbstract
{
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