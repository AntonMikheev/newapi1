<?php
class TagsController extends BaseController
{
    public function tags() {
        $tags = Tags::all();
        return View::make('Tags');
        
    }
    
}

