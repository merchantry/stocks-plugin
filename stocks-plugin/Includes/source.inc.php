<?php

define('INIT_URL', 'https://www.alphavantage.co/query?');
define('API_KEY', '7WXW1VEACXC3XYUE');

function getStockFunction ($function, $symbol, $interval = '5min') {
  //$function = 'TIME_SERIES_MONTHLY';
  //$symbol = 'IBM';
  $url = INIT_URL . 'function=' . $function . '&symbol=' . $symbol . '&apikey=' . API_KEY;

  if ($function == 'TIME_SERIES_INTRADAY') {
    $url .= '&interval=' . $interval;
  }

  //Use file_get_contents to GET the URL in question.
  $contents = file_get_contents($url);
  $contents_php = json_decode($contents, true);
  return $contents_php;
}

function getStockInfo ($symbol) {
  $function = 'OVERVIEW';
  $url = INIT_URL . 'function=' . $function . '&symbol=' . $symbol . '&apikey=' . API_KEY;
  $contents = file_get_contents($url);
  $contents_php = json_decode($contents, true);
  return $contents_php;
}
