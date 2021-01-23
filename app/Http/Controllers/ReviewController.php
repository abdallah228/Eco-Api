<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\Reviews\ReviewsResource;
use App\Http\Requests\Api\ReviewRequest;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($products)
    {
        //
        $product = Product::find($products);
        return ReviewsResource::collection($product->reviews);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, $id)
    {
        //
    
        //return response(['data'=>Product::find($id)->reviews]);
        $review = new Review($request->all());
        $product = Product::find($id);
        $product->reviews()->save($review);
        return response()->json(['data'=>new ReviewsResource($review),'message'=>'review succesful added'],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request ,  $id, Review $review)
    {
        //
        
       $review->update($request->all());
       
       return response()->json(['data'=>new ReviewsResource($review),'message'=>'review succesful updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Review $review)
    {
        //
         $review->delete();
         return response()->json(null,204);
    }
}
