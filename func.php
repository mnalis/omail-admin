<?

/*
        -----
        Omail  -  A PHP/Perl based Vmailmgrd Web interface
        -----

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: func.php,v 1.2 2000/08/01 22:15:39 swix Exp $
        $Source: /cvsroot/omail/admin2/func.php,v $

        func.php
        --------

        16.jan.2k   om   First version
        01.aug.2k   om   Rewrite for PHP4

*/

function check_session($arg_ip) {

	global $type, $domain, $username, $passwd, $lang, $expire, $active, $expire_after, $ip;
		
	// 1. expired ?  auto session expiration after N minutes
	
	if ($expire > time()) {

		$expire = time() + $expire_after*60;

	} else {

		// exit

		return 0;	

	}

	// 2. ip ?   check if the host is the same (in case of url spoofing...)

	if ($arg_ip != $ip) {

		// ip doesn't match -> exit
		
		return 0;

	}

	// if we are here, everything is alright : we can continue
	
	return 1;

}


function authenticate($arg_login, $arg_passwd, $arg_ip) {

	global $type, $domain, $username, $passwd, $lang, $expire, $ip, $expire_after;

	// 1. admin or user login ?

	if (preg_match("/(.*)\@(.*)/", $arg_login, $parts)) {
	
		$username = $parts[1];
		$domain = $parts[2];
		$passwd = base64_encode($arg_passwd);
		$type = "user";

	} else {

		$username = "";
		$domain = $arg_login;
		$passwd = base64_encode($arg_passwd);
		$type = "domain";

	}

	// 2. check format of arguments (lenght, regexp)


	// 3. check if domain exists


	// 4. authenticate

	if ($type == "domain") {

		$test = listdomain($domain, base64_decode($passwd));
	
		if (is_array($test[0])) {

			SetCookie("cookie_omail_last_domain",$domain, Time()+993600);
			SetCookie("cookie_omail_lang",$lang, Time()+993600);
			$expire = time() + $expire_after*60;	
			$ip = $arg_ip;

			return 1;

		} else {

			return 0;
	
		}

	} elseif ($type == "user") {

		$test = lookup($domain, $user);  // uh... need to test the pw...

		if (0) {
	
			SetCookie("cookie_omail_last_domain",$arg_login, Time()+993600);
			SetCookie("cookie_omail_lang",$lang, Time()+993600);
			$expire = time() + $expire_after*60;	
			$ip = $arg_ip;

			return 1;

		} else {

			return 0;

		}
	
	} else {

		return 0;
	
	}

}


?>
