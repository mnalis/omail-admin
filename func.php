<?

/*
        -----
        Omail  -  A PHP/Perl based Vmailmgrd Web interface
        -----

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: func.php,v 1.6 2000/08/02 13:48:18 swix Exp $
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


	// 3. check if domain exists (in rcpthosts/virtualdomains)


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

		$test = vchattr($domain, base64_decode($passwd), $username, "MAILBOX_ENABLED", "1");

		if ($test[0] == 0) {
	
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



function get_accounts_sort_by_name($a, $b) {

	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp)=$a;
	list($username2, $password2, $mbox2, $alias2, $PersonalInfo2, $HardQuota2, $SoftQuota2, $SizeLimit2, $CountLimit2, $CreationTime2, $ExpiryTime2, $resp)=$b;
	return ($username < $username2) ? -1 : 1; 
}		



function get_accounts($arg_action, $arg_username = "") {

	global $type, $domain, $passwd;
	$new_list = array ();

	if ($arg_action) {

		$list = listdomain($domain, base64_decode($passwd));
		$j = 0;

	        for ($i = 0; $i <  sizeof($list); $i++) {

	                list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime)=$list[$i];
	

			// findout autoresp status
			
			$tmp_autoresp = load_resp_file($username);
			if ($tmp_autoresp[0] == 2) {
				$resp = 0;
			} else {	
				$resp = 1;
			}			

	                $list[$i] = array($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp);
			
			if ($mbox && ($arg_action == 1)) { $new_list[$j++] = $list[$i];  }	
			if (!$mbox && ($arg_action == 2)) { $new_list[$j++] = $list[$i]; }	
			if (($username == $arg_username) && ($action == 0)) { $new_list[$j++] = $list[$i]; }	

		}

		// try to sort on username

		usort($new_list, get_accounts_sort_by_name);
	

	} else {  // user

		$lookup_data = lookup($domain, $arg_username);
		$alias = array();
		$i = -1;

		$tmp_arr =  explode(chr(0), $lookup_data[1]);

		while (list($key,$val) = each($tmp_arr)) {

			if ($i == -1) {
				$mbox = $val; 
				$i++;
			} else { 	
				$alias[$i++] = $val;
			}			
		}

		$tmp_autoresp = load_resp_file($arg_username);
		if ($tmp_autoresp[0] == 2) {
			$resp = 0;
		} else {	
			$resp = 1;
		}			

		$tmp_array = array($arg_username, "", $mbox, $alias, "User", "", "", "", "", "", "", $resp);
		$new_list[0] = $tmp_array;
	}

	return $new_list;

}

	

function update_passwd($arg_username, $arg_passwd) {

        global $type, $domain, $passwd;

	$result = vchpass($domain, base64_decode($passwd), $arg_username, $arg_passwd);

	// update session password if necessary
	if ($type == "user") { $passwd = base64_encode($arg_passwd); }  

        if (!$result[0]) { return "PASSW ok : " . $result[1] ; }
                else { return "PASSW error : " . $result[1] ; }

}

function update_account($arg_username, $arg_fwd) {

        global $type, $domain, $passwd;

	// check forwarders

	$nb_fwd = count($arg_fwd);
        $new_fwd = array ();
        $j = 0;
        if ($nb_fwd) {
		for($i = 0; $i<$nb_fwd; $i++) {   
			if ($arg_fwd[$i]) {
				$new_fwd[$j++] = $arg_fwd[$i];
			}
		}
	}   

	$result = vchforward($domain, base64_decode($passwd), $arg_username, $new_fwd);

        if (!$result[0]) { return "UPDATE ok : " . $result[1] ; }
                else { return "UPDATE error : " . $result[1] ; }

}

function create_account($arg_username, $arg_passwd, $arg_fwd) {

        global $type, $domain, $passwd;

	$result = vadduser($domain, base64_decode($passwd), $arg_username, $arg_passwd, $arg_fwd);

        if (!$result[0]) { return "NEWUSER ok : " . $result[1] ; }
                else { return "NEWUSER error : " . $result[1] ; }
}

function create_alias($arg_username, $arg_passwd, $arg_fwd) {

        global $type, $domain, $passwd;

	$result = vaddalias($domain, base64_decode($passwd), $arg_username, $arg_passwd, $arg_fwd);

        if (!$result[0]) { return "NEWALIAS ok : " . $result[1] ; }
                else { return "NEWALIAS error : " . $result[1] ; }
}

function delete_account($arg_username) {

        global $type, $domain, $passwd;

	$result = vdeluser($domain, base64_decode($passwd), $arg_username);

        if (!$result[0]) { return "DELETE ok :  " . $result[1] ; }
                else { return "DELETE error : " . $result[1] ; }
}


function load_resp_file($arg_username, $arg_status = -1) {

        global $type, $domain, $passwd;

	// if $arg_status = -1, don't do anything, just return status.
	//
	// problem : we get the current text only if the responder is enabled.
	// so in this function, we will always enable the resp, and turn back
	// to last status after having the data.

	if ($arg_status != -1) {
		venableautoresponse($domain, base64_decode($passwd), $arg_username);
	}

	// get the data 

	$return_data = vreadautoresponse($domain, base64_decode($passwd), $arg_username);

	// turn back to current status 
	
	if (!$arg_status && $arg_status != -1) {
		vdisableautoresponse($domain, base64_decode($passwd), $arg_username);
	}
	
	return $return_data;

}

function parse_resp_file($arg_text) {

	$text = explode("\n", $arg_text);
	$from = "";
	$subject = "";
	$body = "";	

	for ($i = 0; $i < count($text); $i++) {

		if (preg_match("/^From: (.*)$/i", $text[$i], $parts)) {
			$from = $parts[1];
		} elseif (preg_match("/^Subject: (.*)$/i", $text[$i], $parts)) {
			$subject = $parts[1];
		} else {
			$body .= $text[$i] . "\n";
		}
	}

        return array($from,$subject,$body);

}


function save_resp_file($arg_username, $arg_resptext, $arg_status) {

        global $type, $domain, $passwd;
	
	$result = vwriteautoresponse($domain, base64_decode($passwd), $arg_username, $arg_resptext);

        if (!$result[0]) { $return_msg = "AUTORESP_TXT ok :  " . $result[1] . "<br>"; }
                else { $return_msg = "AUTORESP_TXT error : " . $result[1] . "<br>"; }

	if ($arg_status) { 
		$stat = "ON";
		$result2 = venableautoresponse($domain, base64_decode($passwd), $arg_username);
	} else {
		$stat = "OFF";
		$result2 = vdisableautoresponse($domain, base64_decode($passwd), $arg_username);
	}			

	if (!$result2[0]) { $return_msg .= "AUTORESP $stat ok :  " . $result2[1] ; }
        else { $return_msg .= "AUTORESP $stat error : " . $result2[1] ; }

	return $return_msg;

}


?>
