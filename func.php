<?

/*
        -----
        Omail  -  A PHP4 based Vmailmgrd Web interface
        -----

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: func.php,v 1.11 2000/08/13 19:57:19 swix Exp $
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

		if (is_array($test[0]) || ($test[0] != 2)) {

			SetCookie("cookie_omail_last_domain",$domain, Time()+993600);
			SetCookie("cookie_omail_lang",$lang, Time()+993600);
			$expire = time() + $expire_after*60;	
			$ip = $arg_ip;

			load_quota_info($domain);

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

			load_quota_info($domain);

			return 1;

		} else {

			return 0;

		}
	
	} else {

		return 0;
	
	}

}


function load_quota_info($domain) {

	global $vmailmgrquota_file, $quota_on, $quota_data;
	$quota_on = 0; 

	if (file_exists($vmailmgrquota_file)) {

		$fp = fopen($vmailmgrquota_file, "r");	
		while (!feof($fp)) {
			$buffer = trim(fgets($fp, 4096));
			if (substr($buffer, 1) != "#" && substr($buffer, 1) != "\n" && substr($buffer, 1) != "")
			{
				$entry = explode("|",$buffer);

				// catch current domain (also if quota_on is set : could happen if default domain definied at start)

				if ($entry[0] == $domain) {
					$quota_on = 1;
					$quota_data["nb_users"] = 0;			// current number of users
					$quota_data["nb_alias"] = 0;			// and aliases (will be set later)
					$quota_data["max_users"] = $entry[1];
					$quota_data["max_alias"] = $entry[2];
					$quota_data["users_support"] = $entry[3];
					$quota_data["alias_support"] = $entry[4];
					$quota_data["user_login_allowed"] = $entry[5];
					$quota_data["autoresp_support"] = $entry[6];
					$quota_data["user_quota_support"] = $entry[7];

				
					// dirty hack, but should be ok for the moment :]  (index.php will be updated soon)
					if (!$quota_data["max_users"]) { $quota_data["max_users"] = 99999999; } 
					if (!$quota_data["max_alias"]) { $quota_data["max_alias"] = 99999999; } 
				}					

				// catch default domain, but only if quota_on not yet set.

				if (!$quota_on && ($entry[0] == "*" || $entry[0] == "+" || $entry[0] == "default")) {

					$quota_on = 1;
					$quota_data["nb_users"] = 0;			// current number of users
					$quota_data["nb_alias"] = 0;			// and aliases (will be set later)
					$quota_data["max_users"] = $entry[1];
					$quota_data["max_alias"] = $entry[2];
					$quota_data["users_support"] = $entry[3];
					$quota_data["alias_support"] = $entry[4];
					$quota_data["user_login_allowed"] = $entry[5];
					$quota_data["autoresp_support"] = $entry[6];
					$quota_data["user_quota_support"] = $entry[7];

				
					// dirty hack, but should be ok for the moment :]  (index.php will be updated later)
					if (!$quota_data["max_users"]) { $quota_data["max_users"] = 99999999; } 
					if (!$quota_data["max_alias"]) { $quota_data["max_alias"] = 99999999; } 
				}					
			}
		}
		fclose ($fp);
	}
}


function get_accounts_sort_by_name($a, $b) {

	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp)=$a;
	list($username2, $password2, $mbox2, $alias2, $PersonalInfo2, $HardQuota2, $SoftQuota2, $SizeLimit2, $CountLimit2, $CreationTime2, $ExpiryTime2, $resp)=$b;
	return ($username < $username2) ? -1 : 1; 
}		



function get_accounts($arg_action, $arg_username = "") {

	global $quota_on, $quota_data, $type, $domain, $passwd;
	$new_list = array ();

	if ($arg_action) {

		$list = listdomain($domain, base64_decode($passwd));
		$j = 0;

		if ($quota_on) { 
			if ($arg_action == 1) { $quota_data["nb_users"] = 0; } 
			if ($arg_action == 2) { $quota_data["nb_alias"] = 0; } 
		}


	        for ($i = 0; $i <  sizeof($list); $i++) {

	                list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime)=$list[$i];

			// findout autoresp status

			if ($mbox) { $resp = load_resp_status($username); }  else { $resp = 0; }   // only lookup for mailboxes

	                $list[$i] = array($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp);
			
			if ($mbox && ($arg_action == 1)) { 
				$new_list[$j++] = $list[$i];  
				if ($quota_on) { $quota_data["nb_users"]++; }
			}	

			if (!$mbox && ($arg_action == 2)) { 
				$new_list[$j++] = $list[$i]; 
				if ($quota_on) { $quota_data["nb_alias"]++; }
			}
	
			if (($username == $arg_username) && ($action == 0)) { $new_list[$j++] = $list[$i]; }	

		}

		// try to sort on username

		usort($new_list, get_accounts_sort_by_name);
	

	} else {  // user

		$lookup_data = lookup($domain, $arg_username, base64_decode($passwd));
		$alias = array();
		$i = -1;


		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime)=$lookup_data;

		if ($mbox) { $resp = load_resp_status($username); }  else { $resp = 0; } // only lookup for mailboxes

                $new_list[0] = array($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp);
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

function update_userdetail($arg_username, $arg_detail) {

        global $type, $domain, $passwd;

	$result = vchattr($domain, base64_decode($passwd), $arg_username, "PERSONAL", $arg_detail);

        if (!$result[0]) { return "USERINFO ok : " . $result[1] ; }
                else { return "USERINFO error : " . $result[1] ; }
}


function update_userquota($arg_username, $arg_softquota, $arg_hardquota, $arg_expiry, $arg_msgcount, $arg_msgsize, $arg_enabled) {

        global $type, $domain, $passwd;

	$result1 = vchattr($domain, base64_decode($passwd), $arg_username, "HARDQUOTA", $arg_hardquota);
	$result2 = vchattr($domain, base64_decode($passwd), $arg_username, "SOFTQUOTA", $arg_softquota);
	$result3 = vchattr($domain, base64_decode($passwd), $arg_username, "MSGSIZE", $arg_msgsize);
	$result4 = vchattr($domain, base64_decode($passwd), $arg_username, "MSGCOUNT", $arg_msgcount);
	$result5 = vchattr($domain, base64_decode($passwd), $arg_username, "EXPIRY", $arg_expiry);
	$result6 = vchattr($domain, base64_decode($passwd), $arg_username, "MAILBOX_ENABLED", $arg_enabled);

        if (!$result1[0] && !$result2[0] && !$result3[0] && !$result4[0] && !$result5[0] && !$result6[0]) { return "QUOTA ok : " . $result[1] ; }
                else { return "QUOTA error : " . $result[1] ; }
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


function load_resp_file($arg_username) {

        global $type, $domain, $passwd;

	$return_data = vreadautoresponse($domain, base64_decode($passwd), $arg_username);
	
	return $return_data;

}

function load_resp_status($arg_username) {

        global $type, $domain, $passwd;

	$data = vautoresponsestatus($domain, base64_decode($passwd), $arg_username);
	$status = $data[1];

	if ($status == "enabled") { return 1; } else { return 0; }
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

	// activate autoresponder (needed to be able to write to the file...)

	venableautoresponse($domain, base64_decode($passwd), $arg_username);

	// write text	

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
