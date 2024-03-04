<?php

namespace Themencode\InftncDiviModules\AnthonyMartin\GeoLocation\Interfaces;
use Themencode\InftncDiviModules\AnthonyMartin\GeoLocation\Polygon;
use Themencode\InftncDiviModules\AnthonyMartin\GeoLocation\GeoPoint;

interface GeoPointInterface {
  public function inPolygon(Polygon $polygon);
  public function distanceTo(GeoPoint $geopoint, $unitofmeasure);
}

