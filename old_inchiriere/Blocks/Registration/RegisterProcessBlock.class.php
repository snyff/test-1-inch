<?php
@session_start();
require_once 'include/data/registration/registration.lib.php';
class RegisterProcessBlock extends Block{
	function buildContent() {
		$captcha 	= getStringFromRequest('captcha');
		$name 		= getStringFromRequest('name');
		$lastname 	= getStringFromRequest('lastname');
		$email 		= getStringFromRequest('email');
		$pass 		= getStringFromRequest('pass');
		$repass 	= getStringFromRequest('repass');
		
//		setSessionVar('reg_name', $name);
//		setSessionVar('reg_lastname', $lastname);
//		setSessionVar('reg_email', $email);

		$_SESSION['reg_name'] 		= $name;
		$_SESSION['reg_lastname'] 	= $lastname;
		$_SESSION['reg_email'] 		= $email;
		if($captcha != $_SESSION['security_code']) {
			$_SESSION['error'] = 'captha';
			httpRedirect(getUrl(array('pagePath' => 'Registration', 'lang' => LANG)));
			die;
		}
		
		if($name=='' || $lastname=='' || $email=='' || $pass=='' || $repass=='') {
			$_SESSION['error'] = 'fields_required';
			httpRedirect(getUrl(array('pagePath' => 'Registration', 'lang' => LANG)));
		}
		if($pass != $repass) {
			$_SESSION['error'] = 'pass';
			httpRedirect(getUrl(array('pagePath' => 'Registration', 'lang' => LANG)));
			die;
		}
		if(strlen(trim($pass))<6) {
			$_SESSION['error'] = 'len';
			httpRedirect(getUrl(array('pagePath' => 'Registration', 'lang' => LANG)));
			die;
		}
		
		$success = registerUser($name, $lastname, $email, $pass);
		if(!is_array($success) && $success=='user_exists') {
			$_SESSION['error'] = 'exists';
			httpRedirect(getUrl(array('pagePath' => 'Registration', 'lang' => LANG)));
			die;
		}
		if($success) {
			require_once 'include/data/emailing/emailing.lib.php';
//			setSessionVar('user_loggedin', true);
//			setSessionVar('userid', $success['id']);
			sendRegistrationConfirmation($email, LANG, $success['confCode']);
			httpRedirect(getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'reste'=>'email-conf')));
			die;
		}
	}
}
?>