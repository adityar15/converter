<?php

namespace adityar15\converter;

use Illuminate\Support\Facades\Validator;

class Converter{

    /**
     * Distance
     */

    public static function CmToMeter(float $value){
        return $value / 100;
    }

    public static function CmtoInch(float $value, int $digits=2){
        return number_format($value / 2.54, $digits);
    }

    public static function CmtoFeet(float $value, bool $precise=true){
       return  (new self)->InchtoFeet($value/2.54, $precise);
    }

    public static function MeterToCm(float $value){
        return $value * 100;
    }

    public static function MetertoInch(float $value, int $digits=2){
        
        return (new self)->CmtoInch($value*100, $digits);

    }

    public static function MetertoFeet(float $value, bool $precise=true)
    {
        return (new self)->CmtoFeet($value*100,$precise);
    }

    public static function InchtoCm(float $value, int $digits=2){
        return number_format($value*2.54, $digits);
    }

    public static function InchtoMeter(float $value, int $digits=2){
        return number_format(($value/39.37), $digits);
    }

    public static function InchtoFeet(float $value, bool $precise=true){
        
        $inchvalue      = number_format($value,2);
        $feets          = intval($inchvalue/12);
        $extrainch      = round($inchvalue - $feets*12, $precise ? 1 : 0);

        return $feets.'\''.' '.$extrainch.'\'\'';
    }


    public static function FeettoCm(string $value, int $digits=2)
    {
        //feet-inch hypen is compulsory

        $validator = Validator::make(['value'=>$value],
        ['value' => ['regex:/^[1-9]+[\-][0-9\.]{1,4}$/']]);

        if($validator->fails()){
            \Log::error('Incorrect input format. The correct format is feet-inch. If its just 5ft then use format 5-0.
            If it is 5ft 11inch then use format 5-11. If it is 5ft 8.5inch use format 5-8.5');
            return false;
        }

        $value = explode('-', str_replace(' ','',$value));
        $feet  = intval($value[0]);
        $inch  = floatval($value[1]);

        $feettocm = number_format($feet * 12 * 2.54, $digits);
        
        if($inch == 0){
            return $feettocm;
        }

        else if($inch>12){
            \Log::error('Inches cannot be more than 12.');
            return false;
        }

        else if($inch<12){
            $inchtocm = number_format($inch * 2.54 , $digits);
            return $feettocm + $inchtocm;
        }
    }

    public static function FeettoMeter(string $value, int $digits=2){
        $cmvalue  =  (new self)->FeettoCm($value, $digits);
        if($cmvalue){
            return number_format($cmvalue/100, $digits);
        }
        else {
            return false;
        }
    }

    public static function FeettoInch(string $value, int $digits=2){
        $cmvalue  =  (new self)->FeettoCm($value, $digits);
        if($cmvalue){
            return number_format($cmvalue/2.54, $digits);
        }
        else {
            return false;
        }
    }



    /**
     * Weight 
     * 
    */

    public static function GtoKg(float $value, int $digits=2){
        return number_format($value/1000, $digits);
    }

    public static function GtoMg(float $value, int $digits=2){
        return number_format($value*1000, $digits);
    }

    public static function GtoOunce(float $value, int $digits=2){
        return number_format($value/28.35, $digits);
    }

    public static function GtoPound(float $value, int $digits=2){
        return number_format($value/454, $digits);
    }

    public static function KgtoG(float $value, int $digits=2){
        return number_format($value*1000, $digits);
    }

    public static function MgtoG(float $value, int $digits=2){
        return number_format($value/1000, $digits);
    }

    public static function OuncetoG(float $value, int $digits=2){
        return number_format($value*28.35, $digits);
    }

    public static function PoundtoG(float $value, int $digits=2){
        return number_format($value*454, $digits);
    }



}