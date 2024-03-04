<?php

namespace Themencode\InftncDiviModules\AnthonyMartin\GeoLocation\Interfaces;

use Themencode\InftncDiviModules\AnthonyMartin\GeoLocation\GeoPoint;
use Themencode\InftncDiviModules\AnthonyMartin\GeoLocation;

interface BoundingBoxInterface {
  public function __construct($geopoint, $distance, $unit_of_measurement);
  public function setGeoPoint(GeoPoint $geopoint);
  public function setUnit($unit);
  public function setDistance($distance);
  public function calculate();

}

