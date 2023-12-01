<?php

namespace App\Services;
use App\Models\Setting;

class CartService {

    public function calculateTotalPrice($cartData)
    {
        try{
            $shipping_cost = Setting::where('key' , 'shipping_cost')->value('value');
            $vat = Setting::where('key' , 'vat')->value('value');
            $productWithVat = [];
            $productWithoutVat = [];

            foreach($cartData as $product){
                if($product->product->has_vat == 1){
                    array_push($productWithVat,$product->product->price , $vat , $shipping_cost);
                }

                if($product->product->has_vat == 0){
                    array_push($productWithoutVat,$product->product->price , $shipping_cost);
                }
            }

            $subtotalWithVat = array_values($productWithVat);
            $subtotalWithoutVat = array_values($productWithoutVat);

            $allProductPrices = array_map(function () {
                return array_sum(func_get_args());
            }, $subtotalWithVat, $subtotalWithoutVat);

            $totalPrice = array_sum($allProductPrices);

            return $totalPrice;
        }catch(\Exception $e){
            return $e;
        }
    }

}
