<?php

class UserController extends BaseController {

    public function registrationNewUser(){

        $username = Input::json('name');
        $email = Input::json('email');
        $password = Input::json('password');
        $hashpass = Hash::make($password);
        $newuser = new User;
        $newuser->name = $username;
        $newuser->email = $email;
        $newuser->password = $hashpass;
        $newuser->save();
        return Config::get('testconst.success_add');

    }

    public function userLoginForm() {
        return View::make('UserLoginForm');
    }

    public function userLogin() {

        $email = Input::json('email');
        $password = Input::json('password');
        $logintime = Input::json('logintime');
        $user = User::whereEmail($email)->first();
        if(Hash::check($password, $user->password))
        {
            $time = time();
            $islogin = Hash::make($time.$email);
            $user->islogin = $islogin;
            $user->save();
            if(!isset($logintime)){
                $user->logintime = time();
                $user->save();
                $time = $user->logintime;
            }
            else{
                $user->logintime = NULL;
                $user->save();
                $time = $user->logintime;
            }
            $msg = Config::get('testconst.success_add');
            $resp =  array('name' => $user->name,'islogin' =>$user->islogin, 'time' => $time);
            return Response::json($resp);
        }
        else{
            return Config::get('testconst.error_request');
        }
    }

    public function userLogout(){
        $islogin = Input::json('islogin');
        $user = User::whereIslogin($islogin)->first();
        $user->islogin = NULL;
        $user->logintime = NULL;
        $user->save();
        return Config::get('testconst.success_logout');
    }

    public function isLogin(){
        $islogin = Input::json('islogin');
        if(isset($islogin)&&!empty($islogin)) {
            $user = User::whereIslogin($islogin)->first();
            if(!empty($user->logintime)) {
                $time = time();
                $dif = $time - $user->logintime;
                $session = 7;
                if($dif > $session) {
                    return Config::get('testconst.user_logout');
                }
                else{
                    return Config::get('testconst.user_login');
                }
            }
            else{
                return Config::get('testconst.user_login');
            }
        }
        else{
            return Config::get('testconst.user_logout');
        }
    }
}