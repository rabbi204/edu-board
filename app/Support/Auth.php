<?php 

namespace Edu\Board\Support;

use Edu\Board\Support\Database;
use PDO;

/**
 * Auth management
 */

class Auth extends Database
{
	/**
	 * Login management system
	 */
	public function userLoginSystem($email_uname, $pass)
	{
		$data = $this -> emailUsernameCheck($email_uname);
		 $num = $data['num'];
		 $login_user_data = $data['data'] -> fetch(PDO:: FETCH_ASSOC);

		 if ($num == 1) {
		 	
		 	if (password_verify($pass, $login_user_data['pass'])) {

		 		$_SESSION['id'] = $login_user_data['id'];
		 		$_SESSION['pass'] = $login_user_data['pass'];
		 		$_SESSION['role'] = $login_user_data['role'];
		 		$_SESSION['name'] = $login_user_data['name'];
		 		$_SESSION['uname'] = $login_user_data['uname'];
		 		$_SESSION['email'] = $login_user_data['email'];
		 		$_SESSION['photo'] = $login_user_data['photo'];
		 		$_SESSION['photo'] = $login_user_data['photo'];

		 		header('location:dashboard.php');

		 	}
		 	else{
		 		return "<p class=\"alert alert-warning\">Wrong Password! <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
		 	}

		 }else{
		 	return "<p class=\"alert alert-warning\">Email or Username is Incorrect! <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
		 }



	}

	/**
	 * Username check
	 */
	public function emailUsernameCheck($email_uname)
	{
		return $this -> dataCheck('users',$email_uname);


	}

	/**
	 * Logout System
	 */
	public function userLogout()
	{
		session_destroy();
		// header("location:index.php");
	}



}