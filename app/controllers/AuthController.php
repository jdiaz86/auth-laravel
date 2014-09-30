<?php
/**
 * Created by IntelliJ IDEA.
 * User: jdiaz
 * Date: 24/08/14
 * Time: 06:34 PM
 */

class AuthController extends BaseController{


    public function login()
    {
        $data = Input::only('email', 'password','remember');

        $credentials = ['email' => $data['email'], 'password' => $data['password']];

        if (Auth::attempt($credentials, $data['remember']))
        {
            return Redirect::back();
        }

        // subo a sesison la var login_error
        return Redirect::back()->with('login_error',1);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

}