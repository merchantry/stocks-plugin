<?php
include_once('stock.class.php');
define('REG_DATE', '2020-09-11');

  class TableRow extends Stock{
    public $name;
    public $code;
    public $regDate;
    public $regStartPrice;
    public $regLastPrice;
    public $return;
    public $imageUrl;

    public function __construct ($code) {

      parent::__construct($code);
      $this->regDate = REG_DATE;

      // Get Last recorded date
      $metaData = $this->getMetaData();
      $lastRegDate = $metaData["3. Last Refreshed"];

      // Get start price
      $monthlyFunction = $this->getFunction('TIME_SERIES_DAILY');
      $regDatePrices = $monthlyFunction[$this->regDate];
      $this->regStartPrice = round($regDatePrices["1. open"], 2);

      // Get Last recorded price
      $this->regLastPrice = round($monthlyFunction[$lastRegDate]["1. open"], 2);

      // Get return
      // $start = (float)$this->regStartPrice;
      // $end = (float)$this->regLastPrice;
      // $this->return = ($start - $end) / $start;

    }

    public function getRegDate () {
      return $this->regDate;
    }

    public function getRegStartPrice () {
      return $this->regStartPrice;
    }

    public function getRegLastPrice () {
      return $this->regLastPrice;
    }

    public function getReturn () {
      return $this->return;
    }

  }
