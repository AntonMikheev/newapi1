<?php

class News extends Eloquent {

    protected $table = 'news';
    public $timestamps = false;

    public function tags() {
        return $this->belongsToMany('Tags', 'news_tags');
    }

    public function reviews() {
        return $this->belongsToMany('Reviews', 'news_reviews_con');
    }

}
