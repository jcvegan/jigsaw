<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 6/12/2018
 * Time: 07:01
 */

namespace App\Rules;

use App\GildedRose;
use App\IQualityRule;

class ConjuredRule implements IQualityRule {

	function IsMatch( GildedRose $item ) {
		if($item->name == 'Conjured Mana Cake')
			return true;
		else
			return false;
	}

	function CalculateQuality( GildedRose $item ) {
		//Twice as faset as a normal item
		if($item->sellIn > 0){
			if($item->quality > 0){
				return $item->quality - 2;
			}
			return $item->quality;
		}
		else{
			if($item->quality > 0){
				if($item->quality > 1)
					return $item->quality - 4;
				else
					return $item->quality - 2;
			}
			return $item->quality;
		}
	}

	function CalculateSellIn( GildedRose $item ) {
		return $item->sellIn - 1;
	}
}