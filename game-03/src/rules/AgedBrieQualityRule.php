<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 6/12/2018
 * Time: 06:18
 */

namespace App\Rules;


use App\GildedRose;
use App\IQualityRule;

class AgedBrieQualityRule implements IQualityRule {

	function IsMatch( GildedRose $item ) {
		if($item->name == 'Aged Brie'){
			return true;
		}
		else{
			return false;
		}
	}

	function CalculateQuality( GildedRose $item ) {
		if($item->sellIn > 0){
			$item->quality = $item->quality + 1;
		}
		else {
			$item->quality = $item->quality + 2;
		}
		if($item->quality < 0){
			$item->quality = 0;
		}
		else if ($item->quality > 50){
			$item->quality = 50;
		}
		return $item->quality;
	}

	function CalculateSellIn( GildedRose $item ) {
		return $item->sellIn - 1;
	}
}