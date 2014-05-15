<?php

class ApiReviewsController extends BaseController {

    protected function unit( $url, $method,$json=NULL) {
        $path= Config::get('curl.path_to_api');
        $ch = curl_init("$path" .$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        return json_decode($response);
    }

    public function curlApiReviews() {
        $url = "reviews";
        $method ="GET";
        $data = array(
            'data' => ApiReviewsController::unit($url, $method)
        );
        return View::make('ApiReviews',$data);
    }

    public function curlApiSingleReview($id) {
        $url = "singlereview/$id";
        $method = "GET";
        $data = array(
            'data' => ApiReviewsController::unit($url, $method)
        );
        return View::make('ApiSingleReview',$data);
    }

    public function curlApiFormAddReviews() {
        $url = "returndata";
        $method = "GET";
        $data = array(
            'data' => ApiReviewsController::unit($url, $method)
        );
        return View::make('ApiFormAddReviews', $data);
    }

    public function curlApiAddReviews() {

        $name = Input::get('name');
        $heading_id = Input::get('heading_id');
        $text = Input::get('text');
        $author = Input::get('author');
        $tags = Input::get('tags');
        $news = Input::get('news');
        $request_data = array();
        if (isset($name)) {
            $request_data['name'] = $name;
        }
        if (isset($heading_id)) {
            $request_data['heading_id'] = $heading_id;
        }
        if (isset($text)) {
            $request_data['text'] = $text;
        }
        if (isset($author)) {
            $request_data['author'] = $author;
        }
        if (isset($tags)) {
            $request_data['tags'] = $tags;
        }
        if (isset($news)) {
            $request_data['news'] = $news;
        }
        $json = json_encode($request_data);
        $url = 'addreviews';
        $method = "POST";
        $response = array ('response' =>ApiReviewsController::unit($url, $method, $json));
        return View::make('ApiSuccessAddReview', $response);
    }

    public function curlApiDelReviews($id) {

        $url = "reviewsdel/$id";
        $method ="DELETE";
        $response = ApiReviewsController::unit($url, $method);
        return Redirect::to('api.laraveltest/curlreviews')->with('message', $response);
    }

    public function curlApiFormEditReviews($id) {
        $url = "returndataid/$id";
        $method = "GET";
        $data = array('data' => ApiReviewsController::unit($url, $method));
        return View::make('ApiFormEditReviews', $data);
    }

    public function curlApiEditReviews($id) {

        $name = Input::get('name');
        $heading_id = Input::get('heading_id');
        $text = Input::get('text');
        $author = Input::get('author');
        $tags = Input::get('tags');
        $news = Input::get('news');

        $request_data = array();
        $request_data['id'] =$id;
        if (isset($name)) {
            $request_data['name'] = $name;
        }
        if (isset($heading_id)) {
            $request_data['heading_id'] = $heading_id;
        }
        if (isset($text)) {
            $request_data['text'] = $text;
        }
        if (isset($author)) {
            $request_data['author'] = $author;
        }
        if (isset($tags)) {
            $request_data['tags'] = $tags;
        }
        if (isset($news)) {
            $request_data['news'] = $news;
        }
        $url = "editreviews";
        $method = "POST";
        $json = json_encode($request_data);
//        return $json;die;
        $response = array ('response' =>ApiReviewsController::unit($url, $method, $json));
//        var_dump($response);die;
        return View::make('ApiSuccessEditReview', $response);
    }

    public function curlFormFindByTag() {
        echo View::make('ApiFindByTag');
    }

    public function curlFindByTag() {
        $url = "findbytag";
        $method ="POST";
        $request_data = array("data" => Input::get('tag'));
        $json = json_encode($request_data);
        $data = ApiReviewsController::unit($url, $method, $json);
//        var_dump($data);die;
        if(!empty($data->News)&&!empty($data->Reviews)){
            $resultMass = array(
                'news' => $data->News,
                'reviews' => $data->Reviews,
            );
            return View::make('ApiFindByTagReviews',$resultMass);
        }
        elseif(!empty($data->News)&&empty($data->Reviews)){
            $resultMass = array(
                'news' => $data->News,
            );
            return View::make('ApiFindByTagReviews',$resultMass);
        }
        elseif(empty($data->News)&&!empty($data->Reviews)){
            $resultMass = array(
                'reviews' => $data->Reviews,
            );
            return View::make('ApiFindByTagReviews',$resultMass);
        }
        else{
//            var_dump($data);die;
            $error = array('error' => $data);
//            var_dump($error);die;
            return View::make('ApiFindByTagReviews',$error);
        }
    }

    public function curlFormFindByText() {
        echo View::make('ApiFindByText');
    }

    public function curlFindByText() {
        $url = "findbytext";
        $method ="POST";
        $request_data = array("data" => Input::get('name'));
        $json = json_encode($request_data);
        $data = array ('data' => ApiReviewsController::unit($url, $method, $json));
        return View::make('ApiFindByTextReviews', $data);
    }
}
