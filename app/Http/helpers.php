<?php
namespace App\Helpers;

use App\Models\Product;

class MbCalculate
{
    public static function discount($discount,$originalPrice){
        $total ="" ;
        $discountPercentage = $discount  / 100;
        $discountPrice = $discountPercentage * $originalPrice;
        $total = $originalPrice - $discountPrice;
        return number_format($total,1,'.') ;
    }

    public static function review($productId){
        $product = Product::where('id',$productId)->with('reviews')->first();
        $productReviews = $product->reviews;
        $ReviewsCount =[];

        foreach($productReviews as $key=>$pro){
            $ReviewsCount[$key] = $pro->reviewStar;
        }

       $total = array_reduce($ReviewsCount,function($pre,$next){
        return $pre += $next;
       });
       $fullRate = count($ReviewsCount) * 5;

       $rate = ($total / $fullRate) * 100;
       $ratePerStar = 20;

       $avgRate = $rate/$ratePerStar;
        return $avgRate;

    }
}


?>
