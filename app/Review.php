<?php

namespace App;

use App\Evaluation;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['language', 'attitude', 'workflow', 'learning', 'meteo', 'evaluation_id','filled'];

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }
}
