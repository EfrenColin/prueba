<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
    	'name',
    	'status',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::upper($value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true)->get();
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class,'category_tickets');
    }
}
