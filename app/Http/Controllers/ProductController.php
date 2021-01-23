<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Requests\Api\ProductRequest;


class ProductController extends Controller
{
    //middleware
    
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
 
    public function index()
    {
        //
        $product = Product::paginate(5);
        return ProductCollection::collection($product);

    }

    public function store(ProductRequest $request)
    {
        //
       $product = new Product;
       $product->name = $request->name;
       $product->details = $request->details;
       $product->stock = $request->stock;
       $product->price = $request->price;
       $product->discount = $request->discount;
       $product->save();
        return response()->json(['data'=>new ProductResource($product),'message'=>'product added succesfuly','status_code'=>201],201);
    }

    public function show(Product $product)
    {
        //
        
        return new ProductResource($product);
    }

    public function update(Request $request ,$id)
    {
        //
        
             
        $product = Product::find($id);
        if(auth()->user()->id !== $product->user_id)
        return response()->json(['error'=>'sorry this product not belongs to you','status'=>false , 'status_code'=>404],404);

        $request->validate(['name'=>'unique:products,name,'.$product->id]);
      
            $product->update(
                $request->all()
            );
        return response()->json(['data'=>new ProductResource($product),'message'=>'product updated succesfuly','status_code'=>201],201);
        
    }


    public function destroy(Product $product)
    {
        //
        if(auth()->user()->id !== $product->user_id)
        return response()->json(['error'=>'sorry this product not belongs to you','status'=>false , 'status_code'=>404],404);
        
        $product->delete();
        return response()->json(null,204);
    }

    
}
