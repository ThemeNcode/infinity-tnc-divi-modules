<?php

namespace Themencode\InftncDiviModules\AnthonyMartin\GeoLocation\Interfaces;

interface Polygon {
  public $coordinates = array();
  __construct(array $array) {}
  surroundsGeoPoint(GeoPoint) {}
}
