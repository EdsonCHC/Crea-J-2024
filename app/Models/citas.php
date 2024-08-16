<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'date',
        'hour',
        'description',
        'modo',
        'enlace',
        'patient_id',
        'category_id',
        'category_id',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Usuario', 'patient_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Categoría', 'category_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }
}
