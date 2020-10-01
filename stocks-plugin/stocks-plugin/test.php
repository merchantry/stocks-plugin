<?php

  $cookieName = $code . '_overview_stock_plugin';

  if (!isset($_COOKIE[$cookieName])) {

    $overview = getStockInfo($code);
    setcookie($cookieName, $overview);

  } else {

    $overview = $_COOKIE[$cookieName];

  }
