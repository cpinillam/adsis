<?php

namespace App\Http\Controllers;

use App\Review;
use App\Evaluation;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   
    public function index()
    {
        //
    }

    
    public function create ($evaluation)
    {
        $review = new Review();
        $review::create([
            'evaluation_id' => $evaluation['id'],
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
        //
    }

    
    public function update(Request $request, Review $review)
    {
        //
    }

   
    public function destroy(Review $review)
    {
        //
    }
}