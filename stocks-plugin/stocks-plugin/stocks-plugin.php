<?php

include_once('includes/source.inc.php');
include_once('Classes/stock.class.php');
include_once('Classes/tablerow.class.php');

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

    $function = $functions[1];
    $interval = $intevals[3];
    $symbol = 'IBM';
    //print_r(getStockInfo($symbol));

    // $row = new TableRow ($symbol);

    $filePath = './Stocks/' . $symbol . '.js';
    $stockFile = fopen($filePath, "r");
    $json = fread($stockFile, filesize($filePath));
    $overview = json_decode($json, true);
    echo $overview["Description"];



    // echo $row->getRegStartPrice() . "<br>";
    // echo $row->getRegLastPrice() . "<br>";
    // echo $row->getReturn() . "<br>";
