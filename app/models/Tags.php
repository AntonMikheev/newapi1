<?php

class Tags extends Eloquent {

    protected $table = 'tags';
    public $timestamps = false;

    public function news() {
        return $this->belongsToMany('News', 'news_tags');
    }

    public function reviews() {
        return $this->belongsToMany('Reviews', 'rev_tags');
    }

}
