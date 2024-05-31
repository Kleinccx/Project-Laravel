<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Define the table associated with the model
    protected $table = 'categories';

    // Define fillable attributes
    protected $fillable = [
        'category_id',
        'name',
    ];

    // Define any relationships if necessary
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
