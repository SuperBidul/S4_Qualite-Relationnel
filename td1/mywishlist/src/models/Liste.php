<?php
declare(strict_types=1);

namespace mywishlist\models;

class Liste extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'liste';
    protected $primaryKey = 'no';
    public $timestamps = false;

    public function items(){
        return $this->hasMany('mywishlist\models\Item', 'liste_id');
    }
}