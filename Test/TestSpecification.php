<?php
namespace Service\Test;

use Model\Ansver;
use Model\Profile;

/**
 * класс для расчета в тесте
 * Class TestSpecification
 * @package Service\Test
 */
class TestSpecification
{
	private $specifications;

	public function __construct()
	{
		$this->specifications = [
			new TestForGourmet(),
			new TestForCooks(),
			new TestDefault(),
		];
		$this->profile = Profile::getCollection();
	}

	/**
	 * получает результат теста
	 * @param $input
	 * @param $profile
	 * @return array
	 */
	public function getResult($input, $profile)
	{
		$result = array_combine(array_column($profile, 'id'), $profile);
		foreach ($input as $key => $item) {
			$ansver = Ansver::byId(preg_match('|\d|', $key, $ansver));
			$result = $this->getResultFromSpecification($ansver, $result);
		}
		return $result;
	}

	/**
	 * апдейтит резултаты рл спецификации
	 * @param $item
	 * @param $result
	 * @return mixed
	 */
	private function getResultFromSpecification($item, $result)
	{
		foreach ($this->specifications as $specification) {
			/** @var TestSpecificationAbstract $specification */
			if ($specification->setParams($item, $result)->isSatisfiedBy()) {
				return $specification->count();
			}
		}
	}
}