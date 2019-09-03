<?php
namespace Service\Test;

use Service\Specification;

/**
 * Class TestSpecificationAbstract
 * @package Service\Test
 */
abstract class TestSpecificationAbstract implements Specification
{
	protected $item;

	protected $result;

	/**
	 * @param $item
	 * @param $result
	 * @return $this
	 */
	public function setParams($item, $result)
	{
		$this->item = $item;
		$this->result = $result;
		return $this;
	}

	/**
	 * счетчик балов за ответ
	 * @return mixed
	 */
	abstract function count();
}