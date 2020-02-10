<?php

namespace App\Http\Controllers;

use App\Review;
use App\Evaluation;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   
    public function index()
    {
        $review = Review::all();
        //$evaluation = Evaluation::GetEvaluationsNotFilled();
        return view('/Review.review', ['reviews' => $review]);
    }
    
    public function create ($evaluation)
    {
        Review::create([
            'evaluation_id' => $evaluation['evaluation_id'],
            'language' => 0,
            'attitude' => 0,
            'workflow' => 0,
            'learning' => 0,
            'meteo' => 0,
            'filled' => false
        ]);
    }
   
    public function store(Request $request)
    {
        //
    }
   
    public function show(Review $review)
    {
        //
    }
    
    public function edit(Review $review)
    {
        return view('/Review.update', ['review' => $review]);
    }
    
    public function update(Request $request, Review $review)
    {
        $data = $request->all();
        $review = Review::find($review->id);
        $review->fill($data);
        $review->save();
        return redirect('/review');
    }

   
    public function destroy(Review $review)
    {
        //
    }
}