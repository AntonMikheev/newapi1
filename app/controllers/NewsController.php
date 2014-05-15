<?php

class NewsController extends BaseController {

    public function news() {
        View::share('news', News::all());
        return View::make('News');
    }

    public function viewFormEditNews($news) {
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
        $reviews = Reviews::all();
        $reviews_mass_select = array();
        foreach ($reviews as $item) {
            $reviews_mass_select[$item->id] = $item->name;
        }
        $type = array('name' => $news->name,
            'heading_id' => $news->heading_id,
            'text' => $news->text,
            'id' => $news->id,
            'author' => $news->author,
            'tags2' => $news->tags,
            'revs2' => $news->rev,
            'heading_mass' => $heading_mass_select,
            'tags_mass' => $tags_mass_select,
            'rev_mass' => $reviews_mass_select,
        );
        return View::make('formEditNews', $type);
    }

    public function editNews($news) {
        $name = Input::get('name');
        $heading = Input::get('heading');
        $text = Input::get('text');
        $author = Input::get('author');
        $tags = Input::get('tags');
        $reviews = Input::get('reviews');

        $model = News::find($news->id);
        $model->name = $name;
        $model->heading_id = $heading;
        $model->text = $text;
        $model->author = $author;

        foreach ($tags as $tag) {
            Tags::find($tag)->news()->save($model);
        }
        foreach ($reviews as $rev) {
            Reviews::find($rev)->news()->save($model);
        }
        $model->save();
        return Redirect::route('viewnews');
    }

    public function delete($news) {
        $news->delete();
        return Redirect::to('news');
    }

    public function viewFormAddNews() {
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
        $reviews = Reviews::all();
        $reviews_mass_select = array();
        foreach ($reviews as $item) {
            $reviews_mass_select[$item->id] = $item->name;
        }
        $mass = array('heading_mass' => $heading_mass_select,
            'tags_mass' => $tags_mass_select,
            'rev_mass' => $reviews_mass_select,
        );
        return View::make('formAddNews', $mass);
    }

    public function addNews() {
        $name = Input::get('name');
        $heading = Input::get('heading');
        $text = Input::get('text');
        $author = Input::get('author');
        $tags = Input::get('tags');
        $reviews = Input::get('reviews');

        $model = new News;
        $model->name = $name;
        $model->heading_id = $heading;
        $model->text = $text;
        $model->author = $author;
        DB::transaction(function () use ($model, $tags, $reviews) {
            $model->save();
            foreach ($tags as $tag) {
                Tags::find($tag)->news()->save($model);
            }
            foreach ($reviews as $rev) {
                Reviews::find($rev)->news()->save($model);
            }
        });
        return Redirect::route('viewnews');
    }

}
