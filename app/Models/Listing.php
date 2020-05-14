<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class Listing extends Model
{

    Use Geographical;
    protected static $kilometers = true;


    protected $fillable = [
        'list_name', 'address', 'latitude', 'longitude', 'submitter_id'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'submitter_id');
    }
}