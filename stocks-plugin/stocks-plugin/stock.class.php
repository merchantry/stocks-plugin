<?php

include_once('includes/source.inc.php');


class Stock {

  protected $fullName;
  protected $description;
  protected $code;
  protected $regDate;
  protected $regDatePrice;
  protected $currentPrice;

  function __construct($code) {
    $this->code = $code;
    $overview = getStockInfo($code);
    $this->fullName = $overview->Name;
    $this->description = $overview->Description;
  }

  public function getName () {
    return $this->fullName;
  }

  public function getOpen ($function) {
    $response = getStockFunction($function, $this->code);
    $timeSeries = $response["Time Series (30min)"];
    return $timeSeries;
  }

}
