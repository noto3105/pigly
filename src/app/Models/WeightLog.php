<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'weight',
        'calories',
        'exercise_time',
        'exercise_content'
    ];

    public static $rules = array(
        'date' => 'required|date',
        'weight' => 'required|numeric',
        'calories' => 'required|numeric',
        'exercise_time' => 'required',
        'exercise_content' => 'text'
    );

    public function scopeDateRange($query, $startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return $query->whereBetween('date', [$startDate, $endDate]);
        } elseif ($startDate) {
            return $query->where('date', '>=', $startDate);
        } elseif ($endDate) {
            return $query->where('date', '<=', $endDate);
        }

        return $query;
    }
}
