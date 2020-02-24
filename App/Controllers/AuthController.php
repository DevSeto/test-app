<?php
namespace App\Controllers;

use App\Library\Response;
use App\Library\Request;
use App\Library\Validator;
use App\Library\Redirect;
use App\Model\User;


class AuthController extends Controller
{
	public function index()
	{
		return Redirect::to( '/auth/login/' );
	}

	public function login()
	{
		if( $this->session->isLoggedIn() )
			return Redirect::to( '/' );

		return Response::view( 'auth.login' );
	}

	public function postLogin( Request $request )
	{
        $validator = Validator::make( $request->all(), [
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if( $validator->fails() )
            return Redirect::to( '/auth/login/' );
		// return $request;
		$user = User::findWhere( [ 'username' => $request->input('username') ] );

		if( $user && $this->hashVerify( $request->input('password'), $user->password ) )
		{
			$this->session->login( $user );
			$this->makeSuccessNotification( 'Welcome Back <strong>' . $user->username . '</strong>.' );
			return  Redirect::to( '/' );
		}
		else
		{
			$this->makeErrorNotification( 'Login Username Or Password Doesnot Match Any User Credential.' );
			return Redirect::to( '/auth/login' );
		}
	}

	public function logout()
	{
		if( !$this->session->isLoggedIn() )
			return Redirect::to( '/' );
		
		$this->session->logout();
		return Redirect::to( '/' );
	}
}