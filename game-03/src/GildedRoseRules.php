<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 6/12/2018
 * Time: 06:42
 */

namespace App;


use Traversable;

class GildedRoseRules implements \IteratorAggregate {

	private $rules;

	public function __construct(IQualityRule ...$rules) {
		$this->rules = $rules;
	}

	/**
	 * Retrieve an external iterator
	 * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
	 * @return Traversable An instance of an object implementing <b>Iterator</b> or
	 * <b>Traversable</b>
	 * @since 5.0.0
	 */
	public function getIterator() {
		return new \ArrayIterator($this->rules);
	}
}