<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Landmark extends Model
{
    protected $table = 'landmark';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'slug', 'address', 'lat', 'lng', 'url'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    
     /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /*public function images()
    {
        return $this->hasMany(ProductImage::class);
    }*/
}
