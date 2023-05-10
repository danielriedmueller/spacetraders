<?php
/**
 * MarketTradeGood
 */
namespace App\Models;

/**
 * MarketTradeGood
 */
class MarketTradeGood {

    /** @var string $symbol The symbol of the trade good.*/
    public $symbol = "";

    /** @var int $tradeVolume The typical volume flowing through the market for this type of good. The larger the trade volume, the more stable prices will be.*/
    public $tradeVolume = 0;

    /** @var string $supply A rough estimate of the total supply of this good in the marketplace.*/
    public $supply = "";

    /** @var int $purchasePrice The price at which this good can be purchased from the market.*/
    public $purchasePrice = 0;

    /** @var int $sellPrice The price at which this good can be sold to the market.*/
    public $sellPrice = 0;

}
