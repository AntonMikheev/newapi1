<?php
class HeadingController extends BaseController
{
    public function heading() {
        $heading = Heading::all();
        return View::make('Heading');
    }
    
}

