<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'developer_id', 'description', 'price', 'year'];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}