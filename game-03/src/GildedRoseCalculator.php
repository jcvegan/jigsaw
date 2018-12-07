<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 6/12/2018
 * Time: 06:32
 */
namespace App;

use App\Rules\AgedBrieQualityRule;
use App\Rules\BackstageRule;
use App\Rules\ConjuredRule;
use App\Rules\GeneralRule;
use App\Rules\LegendaryRule;

class GildedRoseCalculator {

	private $rules;
	private static $instance = null;

	private function __construct() {
		$this->rules = new GildedRoseRules(
			new GeneralRule(),
			new AgedBrieQualityRule(),
			new LegendaryRule(),
			new ConjuredRule(),
			new BackstageRule()
		);
	}

	private static function getInstance(){
		if(self::$instance == null)
			self::$instance = new GildedRoseCalculator();
		return self::$instance;
	}

	static function CalculateQuality( GildedRose $item ) {
		foreach (self::getInstance()->rules as $rule){
			if($rule->IsMatch($item)){
				$item->quality = $rule->CalculateQuality($item);
				break;
			}
		}
		return $item->quality;
	}

	static function CalculateSellIn( GildedRose $item ) {
		foreach (self::getInstance()->rules as $rule){
			if($rule->IsMatch($item)){
				$item->sellIn = $rule->CalculateSellIn($item);
				break;
			}
		}
		return $item->sellIn;
	}
}