<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Type_Product;
use App\Image_Product;
class PageControllerProduct extends Controller
{
    public function GetProductAll()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(4);
        $type = Type_Product::get();

    	return view('PageProduct.GetProductAll', compact('product', 'type'));
    }

    public function GetProductType($id)
    {
        $type = Type_Product::get();
        $product = Product::where('id_typeproduct', $id)->paginate(4);
    	return view('PageProduct.GetProductType', compact('type', 'product'));
    }

    public function GetProductFilter()
    {
    	return view('PageProduct.GetProductFilter');
    }

    public function GetProductDetail($id)
    {
        $product_detail = Product::where('id', $id)->first();
        $image_detail = Image_Product::where('id_product', $id)->get();
        // echo "<pre>";
        // print_r($image_detail->toArray());
        // echo "</pre>";

    	return view('PageProduct.GetProductDetail', compact('product_detail', 'image_detail'));
    }
    
}
