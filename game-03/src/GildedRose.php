<?php

namespace App;

class GildedRose
{
	//The Name of the item
    public $name;
    //The quality
    public $quality;
    //The number of days to sell the item
    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
	    $this->quality = GildedRoseCalculator::CalculateQuality($this);
    	$this->sellIn = GildedRoseCalculator::CalculateSellIn($this);
    }
}
