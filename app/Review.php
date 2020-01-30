<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['language', 'attitude', 'workflow', 'learning', 'meteo', 'evaluation_id','filled'];

    public function createReview($evaluation)
    {
        Review::create([
            'evaluation_id' => $evaluation['id'],
            'language' => 0,
            'attitude' => 0,
            'workflow' => 0,
            'learning' => 0,
            'meteo' => 0,
            'filled' => false
        ]);
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }
}
