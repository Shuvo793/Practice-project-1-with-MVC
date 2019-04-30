<?php


namespace App\Controllers\FrontEnd;


use App\Models\FrontEnd\Product;

class HomeController
{
    public function getIndex(){
        $products=Product::all();
        frontendView('home',['products'=>$products]);
    }

}