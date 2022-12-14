<?php
namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Arr;

class MbCalculate
{
    public static function discount($discount,$originalPrice){
        $total ="" ;
        $discountPercentage = $discount  / 100;
        $discountPrice = $discountPercentage * $originalPrice;
        (int)$total = $originalPrice - $discountPrice;
        return round($total) ;
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

       if($total===0){
        return "";
        }
        elseif($fullRate===0){
            return "";
        }else{
            $rate = ($total / $fullRate) * 100;
            $ratePerStar = 20;

            $avgRate = $rate/$ratePerStar;
             return number_format($avgRate,1,'.');
        }



    }

    public static function ratePerStar($productId,$i=null ){
        $product = Product::where('id',$productId)->with('reviews')->first();
        $productReviews = $product->reviews;
        $ReviewsCount =[];
        foreach($productReviews as $key=>$pro){
            $ReviewsCount[$key] = $pro->reviewStar;
        }

        $single = Arr::where($ReviewsCount,function($value,$key) use($i){
            return $value === $i;
        });
       $totalReview = count($ReviewsCount);
       $totalSingleReview = count($single);

       $ratePerstar = ($totalSingleReview / $totalReview) * 100;
       return  number_format($ratePerstar,0,'.');
    }

    public static function status($status){
        $bg = '';
        if($status === "Delivered"){
            $bg = "bg-greu";
        }
        elseif($status==="Pending"){
            $bg = "bg-yellow-400";
        }
        else{
            $bg = "bg-red-600";
        }
        return $bg;
    }
}


?>
