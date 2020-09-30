<?php

include_once('includes/source.inc.php');
include_once('stock.class.php');

$functions = array(
  'TIME_SERIES_INTRADAY',
  'TIME_SERIES_DAILY',
  'TIME_SERIES_WEEKLY',
  'TIME_SERIES_MONTHLY'
);

$intevals = array(
  '1min',
  '5min',
  '15min',
  '30min',
  '60min'
);

    $function = $functions[0];
    $interval = $intevals[3];
    $symbol = 'IBM';
    print_r(getStockFunction($function, $symbol, $interval));
    //print_r(getStockInfo($symbol));
    $stock = new Stock ($symbol);
    echo $stock->getOpen($function);
