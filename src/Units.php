<?php

/**
 * @file
 * Contains \Drupal\unitsapi\Units.
 */

namespace Drupal\unitsapi;

use PhpUnitsOfMeasure\PhysicalQuantity;

/**
 * Defines a Units class.
 */
class Units extends UnitsBase {

  /**
   * {@inheritdoc}
   */
  public static function convert($value, $quantity, $from, $to) {
    switch ($quantity) {

      case 'Acceleration':
        $val = new PhysicalQuantity\Acceleration($value, $from);
        break;

      case 'Angle':
        $val = new PhysicalQuantity\Angle($value, $from);
        break;

      case 'Area':
        $val = new PhysicalQuantity\Area($value, $from);
        break;

      case 'ElectricCurrent':
        $val = new PhysicalQuantity\ElectricCurrent($value, $from);
        break;

      case 'Length':
        $val = new PhysicalQuantity\Length($value, $from);
        break;

      case 'LuminousIntensity':
        $val = new PhysicalQuantity\LuminousIntensity($value, $from);
        break;

      case 'Mass':
        $val = new PhysicalQuantity\Mass($value, $from);
        break;

      case 'Pressure':
        $val = new PhysicalQuantity\Pressure($value, $from);
        break;

      case 'Temperature':
        $val = new PhysicalQuantity\Temperature($value, $from);
        break;

      case 'Time':
        $val = new PhysicalQuantity\Time($value, $from);
        break;

      case 'Velocity':
        $val = new PhysicalQuantity\Velocity($value, $from);
        break;

      case 'Volume':
        $val = new PhysicalQuantity\Volume($value, $from);
        break;

    }

    return $val->toUnit($to);
  }

  /**
   * {@inheritdoc}
   */
  public static function getQuantities() {
    return array(
      'Acceleration'      => 'Acceleration',
      'Angle'             => 'Angle',
      'Area'              => 'Area',
      'ElectricCurrent'   => 'Electric Current',
      'Length'            => 'Length',
      'LuminousIntensity' => 'Luminous Intensity',
      'Mass'              => 'Mass',
      'Pressure'          => 'Pressure',
      'Temperature'       => 'Temperature',
      'Time'              => 'Time',
      'Velocity'          => 'Velocity',
      'Volume'            => 'Volume',
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function getUnitOptions($quantity) {
    $options = Units::getUnits($quantity);
    array_walk($options, function(&$val) {
      $val = $val[2];
    });
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public static function getUnits($quantity) {

    // Generates return values for all SI unit prefixes.
    $prefix = function($key, $abbr, $pattern, $singular, $plural) {
      $units = array();
      foreach (Units::$siPrefixes as $prefix) {
        list($short, $long) = $prefix;
        $units[$short . $key] = array(
          $short . $abbr,
          format_string($pattern, array("!u" => $long . $singular)),
          format_string($pattern, array("!u" => $long . $plural)),
        );
      }
      return $units;
    };

    switch ($quantity) {

      case 'Acceleration':
        $units = array(
          'm/s^2' => array('m/s²', 'meter per second squared',
            'meters per second squared'),
        );
        break;

      case 'Angle':
        $units = array(
          'rad'    => array('rad', 'radian', 'radians'),
          'deg'    => array('°', 'degree', 'degrees'),
          'arcmin' => array('amin', 'arcminute', 'arcminutes'),
          'arcsec' => array('asec', 'arcsecond', 'arcseconds'),
        );
        break;

      case 'Area':
        $units = $prefix('m^2', 'm²', 'square !u', 'meter', 'meters') +
          array(
            'ft^2' => array('ft²', 'square foot', 'square feet'),
            'in^2' => array('in²', 'square inch', 'square inches'),
            'mi^2' => array('mi²', 'square mile', 'square miles'),
            'yd^2' => array('yd²', 'square yard', 'square yards'),
            'ha'   => array('ha', 'hectare', 'hectares'),
            'ac'   => array('ac', 'acre', 'acres'),
          );
        break;

      case 'ElectricCurrent':
        $units = $prefix('A', 'A', '!u', 'ampere', 'amperes');
        break;

      case 'Length':
        $units = $prefix('m', 'm', '!u', 'meter', 'meters') +
          array(
            'ft' => array('ft', 'foot', 'feet'),
            'in' => array('in', 'inch', 'inches'),
            'mi' => array('mi', 'mile', 'miles'),
            'yd' => array('yd', 'yard', 'yards'),
          );
        break;

      case 'LuminousIntensity':
        $units = $prefix('cd', 'cd', '!u', 'candela', 'candelas');
        break;

      case 'Mass':
        $units = $prefix('g', 'g', '!u', 'gram', 'grams') +
          array(
            't'  => array('t' , 'ton', 'tons'),
            'lb' => array('lb', 'pound', 'pounds'),
            'oz' => array('oz', 'ounce', 'ounces'),
          );
        break;

      case 'Pressure':
        $units = $prefix('Pa', 'Pa', '!u', 'pascal', 'pascals') +
          array(
            'atm'  => array('atm', 'atmosphere', 'atmospheres'),
            'bar'  => array('bar', 'bar', 'bar'),
            'inHg' => array('inHg', 'inch of mercury', 'inches of mercury'),
            'mmHg' => array('mmHg', 'millimeter of mercury',
              'millimeters of mercury'),
            'psi'  => array('psi', 'pound per square inch',
              'pounds per square inch'),
          );
        break;

      case 'Temperature':
        $units = array(
          'K'  => array('°K', 'degree kelvin', 'degrees kelvin'),
          'C'  => array('°C', 'degree celsius', 'degrees celsius'),
          'F'  => array('°F', 'degree fahrenheit', 'degrees fahrenheit'),
          'R'  => array('°R', 'degree rankine', 'degrees rankine'),
          'De' => array('°De', 'degree delisle', 'degrees delisle'),
          'N'  => array('°N', 'degree newton', 'degrees newton'),
          'Re' => array('°Ré', 'degree réaumur', 'degrees réaumur'),
          'Ro' => array('°Rø', 'degree rømer', 'degrees rømer'),
        );
        break;

      case 'Time':
        $units = $prefix('s', 's', '!u', 'second', 'seconds') +
          array(
            'm' => array('m', 'minute', 'minutes'),
            'h' => array('h', 'hour', 'hours'),
            'd' => array('d', 'day', 'days'),
            'w' => array('w', 'week', 'weeks'),
          );
        break;

      case 'Velocity':
        $units = array(
          'm/s' => array('m/s', 'meter per second', 'meters per second'),
        );
        break;

      case 'Volume':
        $units = $prefix('m^3', 'm³', 'cubic !u', 'meter', 'meters') +
          $prefix('l^3', 'l³', 'cubic !u', 'liter', 'liters') +
          array(
            'ft^3' => array('ft³', 'cubic foot', 'cubic feet'),
            'in^3' => array('in³', 'cubic inch', 'cubic inches'),
            'yd^3' => array('yd³', 'cubic yard', 'cubic yards'),
            'cup'  => array('cup', 'cup', 'cups'),
          );
        break;

    }

    return $units;
  }

}
