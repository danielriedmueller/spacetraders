<?php
/**
 * Market
 */
namespace App\Models;

/**
 * Market
 * @description
 */
class Market {

    /** @var string $symbol The symbol of the market. The symbol is the same as the waypoint where the market is located.*/
    public $symbol = "";

    /** @var \App\Models\TradeGood[] $exports The list of goods that are exported from this market.*/
    public $exports = [];

    /** @var \App\Models\TradeGood[] $imports The list of goods that are sought as imports in this market.*/
    public $imports = [];

    /** @var \App\Models\TradeGood[] $exchange The list of goods that are bought and sold between agents at this market.*/
    public $exchange = [];

    /** @var \App\Models\MarketTransaction[] $transactions The list of recent transactions at this market. Visible only when a ship is present at the market.*/
    public $transactions = [];

    /** @var \App\Models\MarketTradeGood[] $tradeGoods The list of goods that are traded at this market. Visible only when a ship is present at the market.*/
    public $tradeGoods = [];

}
