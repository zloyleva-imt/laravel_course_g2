<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public $products = [];

    public function __construct()
    {
        $this->products = [
            ['name' => 'Product #1', 'price' => 300],
            ['name' => 'Product #2', 'price' => 125],
            ['name' => 'Product #3', 'price' => 230],
            ['name' => 'Product #4', 'price' => 50],
        ];
    }

    public function index(){
        dump($this->products);
//        return "ProductsController: Products ";
    }

    public function show($product_id){
        dump($this->products[$product_id]);
//        return "ProductsController: Product $product_id. Color $color";
    }

    public function create(){

    }

    public function store($id){

    }

    public function edit(){

    }

    public function update($id){

    }

    public function destroy($id){

    }
}
