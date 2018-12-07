<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 7/12/2018
 * Time: 00:27
 */

namespace App\Rules;


use App\GildedRose;
use App\IQualityRule;

class BackstageRule implements IQualityRule {

	function IsMatch( GildedRose $item ) {
		if($item->name == 'Backstage passes to a TAFKAL80ETC concert')
			return true;
		else
			return false;
	}

	function CalculateQuality( GildedRose $item ) {
		if($item->quality < 50){
			if($item->sellIn > 10){
				return $item->quality + 1;
			}
			else if($item->sellIn <= 10 && $item->sellIn > 5){
				return $item->quality + 2;
			}
			else if($item->sellIn <= 5 && $item->sellIn > 0){
				return $item->quality + 3;
			}
			else {
				return 0;
			}
		}
		else
			return 50;
	}

	function CalculateSellIn( GildedRose $item ) {
		return $item->sellIn - 1;
	}
}