<?php

class UserController extends BaseController {

    public function viewFormRegistration(){
        return View::make('RegistrForm');
    }

    public function registrationNewUser(){

        $username = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        $hashpass = Hash::make($password);
        $acceptpassword = Input::get('acceptpassword');

        if($password === $acceptpassword){
            $newuser = new User;
            $newuser->name = $username;
            $newuser->email = $email;
            $newuser->password = $hashpass;
            $newuser->save();

            return Redirect::route('viewreviews');
        }

        else {
            return View::make('RegistrForm');
        }
    }

    public function userLoginForm() {
        return View::make('UserLoginForm');
    }

    public function userLogin() {

        $email =Input::get('email');
        $password =Input::get('password');
        $remember = Input::get('rememberme');
        $rem = "false";
        if($remember == 1){
            $rem = "true";
        }
//    return $rem;
        $credentials = array('email' => $email, 'password' => $password);
        if (Auth::attempt($credentials))
        {
            return Redirect::route('viewreviews');
        }
        else {
            return View::make('UserLoginForm');
        }
    }
    public function userLogout(){
        Auth::logout();
        return Redirect::route('viewreviews');
    }

}