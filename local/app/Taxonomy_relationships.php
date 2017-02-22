<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomy_relationships extends Model
{
    protected $table = 'taxonomy_relationships';

    protected $fillable = [
        'term_id',
        'post_id',
       	
    ];
     public $timestamps = false;
}
