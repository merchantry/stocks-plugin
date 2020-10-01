<?php

include_once('includes/source.inc.php');


class Stock {

  protected $fullName;
  protected $description;
  protected $code;

  function __construct($code) {
    $this->code = $code;

    // Draw info from a file if possible
    $cookieName = $this->code . 'overviewStockPlugin';
    $filePath = './Stocks/Overview/' . $this->code . '.js';


    if (!isset($_COOKIE[$cookieName])) {

      $overview = getStockInfo($this->code);
      // Save request response to file
      $json = json_encode($overview);
      $stockFile = fopen($filePath, "w");
      fwrite($stockFile, $json, true);
      setcookie($cookieName, 'IBM_' . time(), time()+3600);

      // Log
      echo "Cookie Set <br>";
    } else {
      // File was edited in the last hour, so it should updated
      $stockFile = fopen($filePath, "r");
      $json = fread($stockFile, filesize($filePath));
      $overview = json_decode($json, true);
      echo "Cookie Read <br>";

    }
    $this->fullName = $overview["Name"];
    $this->description = $overview["Description"];
  }

  public function getName () {
    return $this->fullName;
  }

  public function getFunction ($function) {
    $response = getStockFunction($function, $this->code);

    $keys = array_keys($response);
    $key = $keys[1];
    $timeSeries = $response[$key];

    return $timeSeries;
  }

  public function getMetaData () {
    $function = 'TIME_SERIES_DAILY';
    $response = getStockFunction($function, $this->code);
    $timeSeries = $response["Meta Data"];

    return $timeSeries;
  }

}
