<?php

/**
 * @file
 * Contains \Drupal\unitsapi\UnitsInterface.
 */

namespace Drupal\unitsapi;


/**
 * Provides an interface defining a units class.
 */
interface UnitsInterface {

  /**
   * Converts a value between units.
   *
   * @param mixed $value
   *   A numerical value to convert.
   * @param string $quantity
   *   Quantity type both $to and $from belong to.
   * @param string $from
   *   Unit to convert from.
   * @param string $to
   *   Unit to convert to.
   *
   * @return mixed
   *   The converted value.
   */
  public static function convert($value, $quantity, $from, $to);

  /**
   * List available quantities.
   *
   * @return array
   *   Array of descriptions keyed on machine name.
   */
  public static function getQuantities();

  /**
   * List available units.
   *
   * @param string $quantity
   *   Limit units by a physical quantity.
   *
   * @return array
   *   Array of descriptions keyed on machine name, where each description is an
   *   array of (singular, plural) forms.
   */
  public static function getUnits($quantity);

  /**
   * Available units as #options array.
   *
   * @param string $quantity
   *   Limit units by a physical quantity.
   */
  public static function getUnitOptions($quantity);

}
