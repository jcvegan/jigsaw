<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 6/12/2018
 * Time: 06:24
 */

namespace App\Rules;


use App\GildedRose;
use App\IQualityRule;

class GeneralRule implements IQualityRule {

	function IsMatch( GildedRose $item ) {
		if($item->name=='normal')
			return true;
		else
			return false;
	}

	function CalculateQuality( GildedRose $item ) {
		//If the sale by date is not passed
		if($item->sellIn > 0){
			if($item->quality > 0){
				return $item->quality - 1;
			}
			return $item->quality;
		}
		else{
			if($item->quality > 0){
				if($item->quality > 1)
					return $item->quality - 2;
				else
					return $item->quality - 1;
			}
			return $item->quality;
		}
	}

	function CalculateSellIn( GildedRose $item ) {
		return $item->sellIn - 1;
	}
}