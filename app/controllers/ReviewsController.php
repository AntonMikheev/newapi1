<?php

class ReviewsController extends BaseController {


    public function apiReviews() {
        $data = Reviews::all();
        return Response::json($data);
    }

    public function apiSingleReview($id) {

        $review = Reviews::find($id);
        if (!empty($review)) {
            return Response::json($review);
        } else {
            return Config::get('testconst.error_request');
        }
    }

    public function apiReturnData() {
        $heading = Heading::all();
        $heading_mass_select = array();
        foreach ($heading as $item) {
            $heading_mass_select[$item->id] = $item->name;
        }
        $tags = Tags::all();
        $tags_mass_select = array();
        foreach ($tags as $item) {
            $tags_mass_select[$item->id] = $item->name;
        }
        $news = News::all();
        $news_mass_select = array();
        foreach ($news as $item) {
            $news_mass_select[$item->id] = $item->name;
        }
        $mass = array('heading_mass' => $heading_mass_select,
            'tags_mass' => $tags_mass_select,
            'news_mass' => $news_mass_select,
        );
        return Response::json($mass);
    }

    public function apiReturnDataId($id) {

        $reviews = Reviews::find($id);
        $tags_old = Reviews::find($id)->tags()->get();
        $news_old = Reviews::find($id)->news()->get();
        $heading = Heading::all();
        $heading_mass_select = array();
        foreach ($heading as $item) {
            $heading_mass_select[$item->id] = $item->name;
        }
        $tags = Tags::all();
        $tags_mass_select = array();
        foreach ($tags as $item) {
            $tags_mass_select[$item->id] = $item->name;
        }
        $news = News::all();
        $news_mass_select = array();
        foreach ($news as $item) {
            $news_mass_select[$item->id] = $item->name;
        }
        $mass = array('name' => $reviews->name,
            'heading_id' => $reviews->heading_id,
            'text' => $reviews->text,
            'id' => $reviews->id,
            'author' => $reviews->author,
            'tags' => $tags_old[0]->id,
            'news' => $news_old[0]->id,
            'heading_mass' => $heading_mass_select,
            'tags_mass' => $tags_mass_select,
            'news_mass' => $news_mass_select,
        );
        return Response::json($mass);
    }

    public function apiDelReviews($id) {
        $reviewsfind = Reviews::find($id);
        if (!empty($reviewsfind)) {
            $reviewsfind->delete();
            $error = json_decode(Config::get('testconst.success_del'), true);
            return $msg = array(
                'id' => $id,
                'msg' => $error,
            );
        } else {
            $error = json_decode(Config::get('testconst.error_request'), true);
            return $msg = array(
                'msg' => $error,
            );
        }
    }

    public function apiAddReviews() {

        $name = Input::json('name');
        $heading_id = Input::json('heading_id');
        $text = Input::json('text');
        $author = Input::json('author');
        $tags[] = Input::json('tags');
        $news[] = Input::json('news');

        if (isset($name) && isset($heading_id) && isset($text) && isset($author) && isset($tags) && isset($news)) {
            $review = new Reviews;
            $review->name = $name;
            $review->heading_id = $heading_id;
            $review->text = $text;
            $review->author = $author;
            $review->save();
            foreach ($tags[0] as $tag) {
                Tags::find($tag)->reviews()->save($review);
            }
            foreach ($news[0] as $new) {
                News::find($new)->reviews()->save($review);
            }
            $error = json_decode(Config::get('testconst.success_add'), true);
            return $msg = array(
                'id' => $review->id,
                'msg' => $error,
            );
        }
        else {
            $error = json_decode(Config::get('testconst.error_request'), true);
            return $msg = array(
                'msg' => $error,
            );
        }
    }

    public function apiEditReviews() {

        $id = Input::json('id');
        $name = Input::json('name');
        $heading = Input::json('heading_id');
        $text = Input::json('text');
        $author = Input::json('author');
        $tags = Input::json('tags');
        $news = Input::json('news');
        $review = Reviews::find($id);
        if (isset($review)) {
            if (isset($name)) {
                $review->name = $name;
            }
            if (isset($heading)) {
                $review->heading_id = $heading;
            }
            if (isset($text)) {
                $review->text = $text;
            }
            if (isset($author)) {
                $review->author = $author;
            }
            $review->save();
            if (!empty($tags)) {
                foreach ($tags as $tag) {
                    Tags::find($tag)->reviews()->save($review);
                }
            }

            if (!empty($news)) {
                foreach ($news as $new) {
                    News::find($new)->reviews()->save($review);
                }
            }
            $error = json_decode(Config::get('testconst.success_edit'), true);
//            return $error;
            return $msg = array(
                'id' => $id,
                'msg' => $error,
                'text' => $text,
            );
        } else {
            $error = json_decode(Config::get('testconst.error_request'), true);
//            return $error;
            return $msg = array(
                'id' => $id,
                'msg' => $error,
            );
        }
    }

    public function findByText() {
        $review = Reviews::where('name', 'like', '%' . Input::json('data') . '%')->get(array('id'));
        if(!$review->IsEmpty()) {
            foreach ($review as $id) {
                $rev_mass = Reviews::find($id->id);
                $a[] = ['id' => $rev_mass->id,
                    'name' => $rev_mass->name,
                    'heading_id' => $rev_mass->heading_id,
                    'text' => $rev_mass->text,
                    'author' => $rev_mass->author,
                    'news' => $rev_mass->news,
                    'tags' => $rev_mass->tags,
                ];
            }
            return Response::json($a);
        }
        else {
            return Config::get('testconst.error_request');
        }
    }

    public function findByTag() {
        $review = Tags::where('name', 'like', '%' . Input::json('data') . '%')->get(array('id'));
        if($review->isEmpty()){
            return Config::get('testconst.error_request');
        }
        else{
            $rev = Tags::find($review[0]->id)->reviews()->get();
            $new = Tags::find($review[0]->id)->news()->get();
            $response = array();
            if(!empty($new)&&!empty($rev)) {
                foreach ($new as $item) {
                    $response['News'][] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'heading_id' => $item->heading_id,
                        'text' => $item->text,
                        'author' => $item->author,
                        'reviews' => $item->reviews_id,
                        'tags' => $item->tags_id,
                    ];
                }
                foreach ($rev as $item) {
                    $response['Reviews'][] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'heading_id' => $item->heading_id,
                        'text' => $item->text,
                        'author' => $item->author,
                        'news' => $item->news_id,
                        'tags' => $item->tags_id,
                    ];
                }
                return Response::json($response);
            }
            elseif(!empty($new)&&empty($rev)){
                foreach ($new as $item) {
                    $response['News'][] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'heading_id' => $item->heading_id,
                        'text' => $item->text,
                        'author' => $item->author,
                        'reviews' => $item->reviews_id,
                        'tags' => $item->tags_id,
                    ];
                }
                return Response::json($response);
            }
            elseif(empty($new)&&!empty($rev)){
                foreach ($new as $item) {
                    $response['Reviews'][] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'heading_id' => $item->heading_id,
                        'text' => $item->text,
                        'author' => $item->author,
                        'reviews' => $item->reviews_id,
                        'tags' => $item->tags_id,
                    ];
                }
                return Response::json($response);
            }
        }
    }

    public function reviews() {
        View::share('reviews', Reviews::all());
        return View::make('Reviews');
    }

    public function viewFormEditReviews($reviews) {
        $heading = Heading::all();
        $heading_mass_select = array();
        foreach ($heading as $item) {
            $heading_mass_select[$item->id] = $item->name;
        }
        $tags = Tags::all();
        $tags_mass_select = array();
        foreach ($tags as $item) {
            $tags_mass_select[$item->id] = $item->name;
        }
        $news = News::all();
        $news_mass_select = array();
        foreach ($news as $item) {
            $news_mass_select[$item->id] = $item->name;
        }
        $type = array('name' => $reviews->name,
            'heading_id' => $reviews->heading_id,
            'text' => $reviews->text,
            'id' => $reviews->id,
            'author' => $reviews->author,
            'tags2' => $reviews->tags,
            'news2' => $reviews->news,
            'heading_mass' => $heading_mass_select,
            'tags_mass' => $tags_mass_select,
            'news_mass' => $news_mass_select,
        );
        return View::make('formEditReviews', $type);
    }

    public function editReviews($reviews) {
        $name = Input::get('name');
        $heading = Input::get('heading');
        $text = Input::get('text');
        $author = Input::get('author');
        $tags = Input::get('tags');
        $news = Input::get('news');

//        $input = Input::all();
//        $rules = array(
//            'name' => 'required|alpha_num',
//            'heading_id' => 'num',
//            'text' => 'required|alpha_num',
//            'author' => 'required|alpha_num',
//            'tags' => 'num',
//            'news' => 'num',
//        );
//        $validation = Validator::make($input, $rules);
//        if ($validation->fails()) {
//            return Redirect::back();
//        } else {
        $model = Reviews::find($reviews->id);
        $model->name = $name;
        $model->heading_id = $heading;
        $model->text = $text;
        $model->author = $author;
        $model->save();
        if(isset($tags)){
            foreach ($tags as $tag) {
                Tags::find($tag)->reviews()->save($model);
            }
        }
        if(isset($news)){
            foreach ($news as $new) {
                News::find($new)->reviews()->save($model);
            }
        }
        return Redirect::route('viewreviews');
//        }
    }

    public function delete($reviews) {
        $reviews->delete();
        return Redirect::to('reviews');
    }

    public function viewFormAddReviews() {
        $heading = Heading::all();
        $heading_mass_select = array();
        foreach ($heading as $item) {
            $heading_mass_select[$item->id] = $item->name;
        }
        $tags = Tags::all();
        $tags_mass_select = array();
        foreach ($tags as $item) {
            $tags_mass_select[$item->id] = $item->name;
        }
        $news = News::all();
        $news_mass_select = array();
        foreach ($news as $item) {
            $news_mass_select[$item->id] = $item->name;
        }
        $mass = array('heading_mass' => $heading_mass_select,
            'tags_mass' => $tags_mass_select,
            'news_mass' => $news_mass_select,
        );
        return View::make('formAddReviews', $mass);
    }

    public function addReviews() {
        $name = Input::get('name');
        $heading = Input::get('heading');
        $text = Input::get('text');
        $author = Input::get('author');
        $tags = Input::get('tags');
        $news = Input::get('news');

        $model = new Reviews;
        $model->name = $name;
        $model->heading_id = $heading;
        $model->text = $text;
        $model->author = $author;
        DB::transaction(function () use ($model, $tags, $news) {
            $model->save();
            if (!empty($tags)) {
                foreach ($tags as $tag) {
                    Tags::find($tag)->reviews()->save($model);
                }
            }

            if (!empty($news)) {
                foreach ($news as $new) {
                    News::find($new)->reviews()->save($model);
                }
            }
        });
        return Redirect::route('viewreviews');
    }

}
