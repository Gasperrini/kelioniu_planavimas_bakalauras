<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Route extends Model
{
    protected $table = 'route';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'route_code', 'name', 'slug', 'start_point', 'end_point', 'start_time', 'end_time'
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
