<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Type_Product;
use App\Image_Product;
use App\Comment_Product;
use App\Rep_Comment_Product;
use File;

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
        $comment = Comment_Product::where('id_product', $id)->paginate(4);
        // echo "<pre>";
        // print_r($comment->toArray());
        // echo "</pre>";

    	return view('PageProduct.GetProductDetail', compact('product_detail', 'image_detail', 'comment'));
    }

    public function CommentProduct($id_product, Request $req)
    {
        $comment = new Comment_Product;
        $comment->id_customer = $req->id_customer; 
        $comment->id_product = $id_product; 
        $comment->star = $req->star;
        $comment->content = $req->content;
        $comment->save();
        return redirect()->back()->with('thongbao', 'thêm bình luận thành công');
        // echo "<pre>";
        // print_r($comment->toArray());
        // echo "</pre>";
    }

    public function RepCommentProduct($id_comment, Request $req)
    {
        $rep = new Rep_Comment_Product;
        $rep->id_comment = $id_comment;
        $rep->id_customer = $req->id_customer;
        $rep->content = $req->content;
        $rep->save();
        return redirect()->back()->with('thongbao', 'thêm bình luận thành công');
        // echo "<pre>";
        // print_r($rep->toArray());
        // echo "</pre>";
    }

    // sales channel
    public function DetailProduct($id)
    {
        $product = Product::where('id', $id)->first();
        return view('PageSaleChannel.PageProductChannel.PageDetailProduct', compact('product'));
    }

    public function GetProductUpdate($id)
    {
        $product = Product::where('id', $id)->first();
        return view('PageSaleChannel.PageProductChannel.PageUpdateProduct', compact('product'));
    }

    public function DeleteImage($id)
    {
        $img = Image_Product::find($id);
        File::delete('resources/UploadImage/ImageProduct/ProductDetail/'.$img['image']);
        $img->delete();
        return redirect()->back();
    }
    public function PostProductUpdate($id, Request $req)
    {
        $product = Product::find($id);
        
        if($req->image)
        {
            File::delete('resources/UploadImage/ImageProduct/ProductAvatar/'.$product->image);
            $image = $req->image;
            $product->name = $req->name;
            $product->price = $req->price;
            $product->sale = $req->sale;
            $product->quantity = $req->quantity;
            $product->production = $req->production;
            $product->status = $req->status;
            $product->description = $req->description;
            $product->id_typeproduct = $req->id_typeproduct;
            $product->id_customer = $req->id_customer;
            $product->image = time().'.'.$req->image->getClientOriginalName();
            $product->save();
            $image->move(public_path('resources/UploadImage/ImageProduct/ProductAvatar'), time().'.'.$image->getClientOriginalName());
            if($req->hasFile('picture'))
            {
                foreach ($req->file('picture') as $file) {
                    $image_detail = new Image_Product();
                    if(isset($file))
                    {
                        $image_detail->image = time().'.'.$file->getClientOriginalName();
                        $image_detail->id_product = $product->id;
                        $file->move('resources/UploadImage/ImageProduct/ProductDetail/', time().'.'.$file->getClientOriginalName());
                        $image_detail->save();
                    }
                }
            }
        }
        else
        {
            $image = $req->image;
            $product->name = $req->name;
            $product->price = $req->price;
            $product->sale = $req->sale;
            $product->quantity = $req->quantity;
            $product->production = $req->production;
            $product->status = $req->status;
            $product->description = $req->description;
            $product->id_typeproduct = $req->id_typeproduct;
            $product->id_customer = $req->id_customer;
            $product->save();
            if($req->hasFile('picture'))
            {
                foreach ($req->file('picture') as $file) {
                    $image_detail = new Image_Product();
                    if(isset($file))
                    {
                        $image_detail->image = time().'.'.$file->getClientOriginalName();
                        $image_detail->id_product = $product->id;
                        $file->move('resources/UploadImage/ImageProduct/ProductDetail/', time().'.'.$file->getClientOriginalName());
                        $image_detail->save();
                    }
                }
            }
        }
        // echo "<pre>";
        // print_r($product->toArray());
        // echo "</pre>";
        return redirect()->back()->with('thongbao', 'cập nhật sản phẩm thành công');
    }
    
}
