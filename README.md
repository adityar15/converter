# converter
This package allows you to convert majority of metrics in the most easy and efficient way.

To install use command
```
composer require adityar15/converter
```

The package is supported for Laravel version 6.*, 7.*, 8.*

After installation you can import the package in your controller or whereever you are using it as 

```
use adityar15\converter\Converter;
```

# Length/Distance conversion

The primary feautre of this package is that you can convert in the most efficient way. 
1. centimeter to feet and vice versa
```
//Converter::CmtoFeet(float $value, bool $precise=true)
//the precise parameter is true by default. If set to false then value is rounded to nearest ceil value.

return Converter::CmtoFeet(178)
//this will return 5' 10.1''


//Converter::FeettoCm(string $value, int $digits=2);
//This will convert the feet value in string to centimeter in float. The value in feets is given in format 5-10 for 5feet 10inch or 5-0 or 5feet 0inch. The '-' format is //mandatory. The digits is number of digits after decimal. By default it is set to 2.

return Converter::FeettoCm('5-8.5', 2);
//this will return 173.99
```
2. inch to feet  and vice versa
```
//Converter::InchtoFeet(float $value, bool $precise=true)
//the precise parameter is true by default. If set to false then value is rounded to nearest ceil value.

return Converter::InchtoFeet(70)
//this will return 5' 10''

//The inverse is also possible and very similar to FeettoCm function

return Converter::FeettoInch('5-10', int $digits=2);
//this will return 70.00 
```

3. meter to feet  and vice versa

```
//Converter::MetertoFeet(float $value, bool $precise=true)
//the precise parameter is true by default. If set to false then value is rounded to nearest ceil value.

return Converter::MetertoFeet(1.78)
//this will return 5' 10.1''

//The inverse is also possible and very similar to FeettoCm function

return Converter::FeettoMeter('5-10', int $digits=2);
//this will return 1.78 
```

Along with this you can convert to
1. Meter to Centimeter and vice versa
```
return Converter::MetertoCm(1, 2) //(float $value, int $digits) by default digits is 2
//this will return 100.00

//to convert centimeter to meter

return Converter::CmtoMeter(100, 2) //(float $value, int $digits) by default digits is 2
//this will return 1.00
```

2. Meter to Inch and vice versa
```
return Converter::MetertoInch(1, 2) //(float $value, int $digits) by default digits is 2
//this will return 39.37

//to convert inch to meter

return Converter::InchtoMeter(39.37, 2) //(float $value, int $digits) by default digits is 2
//this will return 1.00
```

3. Centimeter to Inch and vice versa
```
return Converter::CmtoInch(2.54, 2) //(float $value, int $digits) by default digits is 2
//this will return 1.00

//to convert inch to centimeter

return Converter::InchtoMeter(1, 2) //(float $value, int $digits) by default digits is 2
//this will return 2.54
```
# Weight Conversion

You can also convert weights. Following conversions are supported
1. Gram to Kilogram and vice versa
```
//to convert from gram to kilogram

return Converter::GtoKg(2000, 2);  //(float $value, int $digits) by default digits is 2

//This will return 2.00

//To convert Kilogram to Gram

return Converter::GtoKg(2, 2);  //(float $value, int $digits) by default digits is 2
//This will return 2000.00
```
2. Gram to Pound

```
Converter::GtoPound(float $value, int $digits) // by default digits is 2

```

3. Gram to Ounce
```
Converter::GtoOunce(float $value, int $digits) // by default digits is 2

```

4. Gram to Milligram
```
Converter::GtoMg(float $value, int $digits) // by default digits is 2

```

For now you cannot convert directly from Kg to Pounds. In that case you need to convert to Kg to grams and then grams to pounds. 



