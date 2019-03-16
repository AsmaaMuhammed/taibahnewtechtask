<?php

namespace App\Models;

use App\Provider;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table ='products';

    /**
     * @var array
     */
    protected $fillable = [
        'provider_id','name', 'price', 'unit', 'photo'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

}
