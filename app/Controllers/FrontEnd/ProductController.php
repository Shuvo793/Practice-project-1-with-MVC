<?php


namespace App\Controllers\FrontEnd;
use App\Models\FrontEnd\Product;


class ProductController
{
    public function getProduct($slug=''){
       if(!empty($slug)){
           $products=Product::where('slug',$slug)->first();
           frontendView('product',['products'=> $products]);
       } else{
           header('Location: /');
       }



    }

}