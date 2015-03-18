<?php

/**
 * @file
 * Contains \Drupal\unitsapi\UnitsBase.
 */

namespace Drupal\unitsapi;

/**
 * Defines a Units class.
 */
abstract class UnitsBase implements UnitsInterface {

  /**
   * SI prefixes as array (short, long) keyed on factor.
   */
  public static $siPrefixes = array(
    -24 => array('y', 'yocto'),
    -21 => array('z', 'zepto'),
    -18 => array('a', 'atto'),
    -15 => array('f', 'femto'),
    -12 => array('p', 'pico'),
    -9  => array('n', 'nano'),
    -6  => array('µ', 'micro'),
    -3  => array('m', 'milli'),
    -2  => array('c', 'centi'),
    -1  => array('d', 'deci'),
    0   => array('', ''),
    1   => array('da', 'deca'),
    2   => array('h', 'hecto'),
    3   => array('k', 'kilo'),
    6   => array('M', 'mega'),
    9   => array('G', 'giga'),
    12  => array('T', 'tera'),
    15  => array('P', 'peta'),
    18  => array('E', 'exa'),
    21  => array('Z', 'zetta'),
    24  => array('Y', 'yotta'),
  );

}
