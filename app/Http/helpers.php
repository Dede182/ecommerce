<?php
namespace App\Helpers;

class MbCalculate
{
    public static function discount($discount,$originalPrice){
        $total ="" ;
        $discountPercentage = $discount  / 100;
        $discountPrice = $discountPercentage * $originalPrice;
        $total = $originalPrice - $discountPrice;
        return number_format($total,1,'.') ;
    }
}


?>
