<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 6/12/2018
 * Time: 06:09
 */

namespace App\Rules;


use App\GildedRose;
use App\IQualityRule;

class LegendaryRule implements IQualityRule {

	function IsMatch( GildedRose $item ) {
		if($item->name == 'Sulfuras, Hand of Ragnaros')
			return true;
		else
			return false;
	}

	function CalculateQuality( GildedRose $item ) {
		return $item->quality;
	}

	function CalculateSellIn( GildedRose $item ) {
		return $item->sellIn;
	}
}