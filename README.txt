
DESCRIPTION
-----------

The central API call, unitsapi_convert($value, $from, $to, $details = FALSE), uses the International System of Units (SI) 
conversion factors to convert measurement units.  For more, see: http://physics.nist.gov/Pubs/SP811/contents.html

This module is only an API and does not have an user interface.

The submodule "unitsapi_formatters.module" contains display formatters for CCK and MVF fields.  These formatters
will convert the field's value upon output only.  If using a CCK number field, be sure to set the "from" unit in the 
field's settings.

EXAMPLES
------

// Convert kilometer to feet
$result = unitsapi_convert(1.5, 'kilometer', 'foot');
// $result == 4921.259843

// Convert Fahrenheit to Kelvin
$result = unitsapi_convert(55, 'fahrenheit', 'kelvin');
// $result == 285.927778 

// Convert US liquid ounces to Imperial pints with a detailed array of the conversion
$result = unitsapi_convert(50, 'us ounce', 'imperial pint', TRUE);
// $result == Array ([result] => 2.602107, [from] => US ounces, [to] => Imperial pints)

SUPPORTED UNITS
------
All units are stored in units.xml.

Length:
millimeter (mm)
centimeter (cm)
decimeter (dm)
meter (m)
kilometer (km)
foot (ft)
inch (in)
mile (mi)
yard (yd)

Volume:
cubic foot (ft3)
cubic inch (in3)
cubic mile (mi3)
cubic yard (yd3)
cup (cup)
Imperial gallon (gal)
US gallon (gal)
liter (L)
Imperial fluid ounce (fl oz)
US fluid ounce (fl oz)
Imperial pint (pt)
US pint (liquid) (pt)
US pint (dry) (pt)
Imperial quart (qt)
US quart (liquid) (qt)
US quart (dry) (qt)
tablespoon (tbsp)
teaspoon (tspn)

Weight:
milligram (mg)
gram (g)
kilogram (kg)
carat (CD)
grain (gr)
ounce (oz)
pennyweight (dwt)
pound (lb)
stone (st)
slug (slug)
metric ton (t)
long ton (t)
short ton (t)

Area:
acre (acre)
are (a)
hectare (ha)
square foot (ft2)
square meter (m2)
square kilometer (km2)
square inch (in2)
square yard (yd2)
square mile (mi2)
aankadam (aankadam)
perch (perch)
cent (cent)
chatak (chatak)
kottah (B) (kottah (B))
guntha (guntha)
ground (ground)
marla (marla)
rood (rood)
bigha I (bigha I)
bigha II (bigha II)
kanal (kanal)
biswa I (biswa I)
biswa II (biswa II)

Pressure:
pascal (Pa)
torr (Torr)
bar (bar)
millibar (mb)
psi (lbf/in2)

Time:
day (d)
hour (h)
minute (min)
year (yr)

Temperature:
celsius (°C)
fahrenheit (°F)
kelvin (K)

ISSUES
------
Any issues are welcome to the Units API issue queue: http://drupal.org/project/issues/unitsapi).
Patches should be tested with the provided automated tests. 

If testing conversions, use the assertion:
$this->assertUnitConversion($value, $from, $to, $expected, $group)

SPONSORED BY
------
This module is sponsored by Raspberry Man LLC (http://www.raspberryman.com)
