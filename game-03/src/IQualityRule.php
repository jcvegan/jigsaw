<?php
/**
 * Created by PhpStorm.
 * User: jcveg
 * Date: 6/12/2018
 * Time: 06:00
 */

namespace App;

interface IQualityRule {
	function IsMatch(GildedRose $item);
	function CalculateQuality(GildedRose $item);
	function CalculateSellIn(GildedRose $item);
}