<?

/*
        -----------
        oMail-admin  -  A PHP4 based Vmailmgrd Web interface
        -----------

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>
	* Copyright (C) 2000  Martin Bachmann (bachi@insign.ch) & Ueli Leutwyler (ueli@insign.ch)

        $Id: func.php,v 1.22 2000/10/21 23:21:18 swix Exp $
        $Source: /cvsroot/omail/admin2/func.php,v $

        func.php
        --------

        16.jan.2k   om   First version
        01.aug.2k   om   Rewrite for PHP4


        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
  
        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

function check_session($arg_ip) {

	global $type, $domain, $username, $passwd, $lang, $expire, $active, $expire_after, $ip;
		
	// 1. expired ?  auto session expiration after N minutes
	
	if ($expire > time()) {

		// ok, we update actual expire time
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

	global $type, $domain, $username, $passwd, $lang, $expire, $ip, $expire_after, $catchall_active;

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

			SetCookie("cookie_omail_last_login","", Time()+993600);
			SetCookie("cookie_omail_last_domain",$domain, Time()+993600);
			SetCookie("cookie_omail_lang",$lang, Time()+993600);
			$expire = time() + $expire_after*60;	
			$ip = $arg_ip;

			load_quota_info($domain);
			get_catchall_account();

			return 1;

		} else {

			return 0;	
		}

	} elseif ($type == "user") {

		$test = vchattr($domain, base64_decode($passwd), $username, "PASS", base64_decode($passwd));

		if ($test[0] == 0) {
	
			SetCookie("cookie_omail_last_login",$username, Time()+993600);
			SetCookie("cookie_omail_last_domain",$domain, Time()+993600);

			SetCookie("cookie_omail_lang",$lang, Time()+993600);
			$expire = time() + $expire_after*60;	
			$ip = $arg_ip;

			load_quota_info($domain);
			get_catchall_account();

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
					$quota_data["catchall_use_allowed"] = $entry[8];

				
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
					$quota_data["catchall_use_allowed"] = $entry[8];
					
				
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

	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible)=$a;
	list($username2, $password2, $mbox2, $alias2, $PersonalInfo2, $HardQuota2, $SoftQuota2, $SizeLimit2, $CountLimit2, $CreationTime2, $ExpiryTime2, $resp2, $Enabled2, $Visible2)=$b;
	return (strtolower($username) < strtolower($username2)) ? -1 : 1; 
}		


function get_accounts_sort_by_info($a, $b) {

	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible)=$a;
	list($username2, $password2, $mbox2, $alias2, $PersonalInfo2, $HardQuota2, $SoftQuota2, $SizeLimit2, $CountLimit2, $CreationTime2, $ExpiryTime2, $resp2, $Enabled2, $Visible2)=$b;
	return (strtolower($PersonalInfo) < strtolower($PersonalInfo2)) ? -1 : 1; 
}		


function get_accounts($arg_action, $arg_username = "") {

	global $quota_on, $quota_data, $type, $domain, $passwd, $catchall_active, $readonly_accounts_list, $system_accounts_list, $sort_order;
	$new_list = array ();

	// action = 0 : only one mailbox (user mode)
	// action = 1 : all mailboxes, with resp (admin mode) but not "+" if created by omail-admin
	// action = 2 : all aliases, no resp yet (admin mode) but not "+" if created by omail-admin
	// action = 3 : all accounts, without anything else (admin mode)  [for catchall detection]

	if ($arg_action) {

		$list = listdomain($domain, base64_decode($passwd));
		$j = 0;

		if ($quota_on) { 
			if ($arg_action == 1) { $quota_data["nb_users"] = 0; } 
			if ($arg_action == 2) { $quota_data["nb_alias"] = 0; } 
		}
		
	        for ($i = 0; $i <  sizeof($list); $i++) {

	                list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $data11)=$list[$i];			

			// set if visible or not (for catchall or "admin" accounts like postmaster, etc...)
			if ($username == "+") { $Visible = 0; } else { $Visible = 1; }

			// get enabled/disabled status
			if (ord($data11[8]) == 49) { $Enabled = 1; } else { $Enabled = 0; }

			// findout autoresp status (only lookup for mailboxes)
			if ($mbox && $action != 3) { $resp = load_resp_status($username); }  else { $resp = 0; }

	                $list[$i] = array($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible);
			
			if ($mbox && ($arg_action == 1 || $arg_action == 3)) { 
				$new_list[$j++] = $list[$i];  
				if (!(in_array($username, $readonly_accounts_list) || in_array($username, $system_accounts_list))) { 
					$quota_data["nb_users"]++; 
				}
			}	

			if (!$mbox && ($arg_action == 2) || $arg_action == 3) { 
				$new_list[$j++] = $list[$i]; 
				if (!(in_array($username, $readonly_accounts_list) || in_array($username, $system_accounts_list))) { 
					$quota_data["nb_alias"]++; 
				}
			}
	
			if (($username == $arg_username) && ($action == 0)) { $new_list[$j++] = $list[$i]; }	

		}

		// try to sort on username

		if ($sort_order == "info") {
			usort($new_list, get_accounts_sort_by_info);
		} else {
			usort($new_list, get_accounts_sort_by_name);
		}


	} else {  // user

		$lookup_data = lookup($domain, $arg_username, base64_decode($passwd));
		$alias = array();
		$i = -1;

		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $data11)=$lookup_data;

		// get enabled/disabled status
		if (ord($data11[8]) == 49) { $Enabled = 1; } else { $Enabled = 0; }
	
		if ($mbox) { $resp = load_resp_status($username); }  else { $resp = 0; } // only lookup for mailboxes

                $new_list[0] = array($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, 1);
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

        if (!$result1[0] && !$result2[0] && !$result3[0] && !$result4[0] && !$result5[0] && !$result6[0]) { return "QUOTA ok : " . $result6[1] ; }
                else { return "QUOTA error : " . $result6[1] ; }
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

function get_catchall_account() {

	global $catchall_active;

	$catchall_active = "";   // reset

	// will return the name of the actual catchall account, but only if it is an "official"
	// one (created by omail-admin, only one forwarder pointing to an existing account)
	// if it exists and is "official", the "+" account won't be shown as a normal account, but
	// the target account will be highlighted
	
	$tmpinfo = get_accounts(3);
	$tmpsize = count($tmpinfo);
	
	for ($i=0; $i<=$tmpsize; $i++) {

	    $catchallinfo = $tmpinfo[$i];
		
	    if ($catchallinfo[0] == "+") { 

    	        if (!($catchallinfo[2])) { 
		    $aliases = $catchallinfo[3];
		    $nb_fwd = count($aliases);

		    if ($nb_fwd == 1 && $aliases[0] && (!(preg_match("/@/i", $aliases[0]))))  {
			$catchall_active = $aliases[0];
			break;
		    }
		}
	    }
	}
}


// ---------------------------------------------------------------------------------
// Dynamic Token Access
// (c) insign gmbh - www.insign.ch
// Programmiert:	Martin Bachmann (bachi@insign.ch) & Ueli Leutwyler (ueli@insign.ch)
// ---------------------------------------------------------------------------------

function parseTemplate($parseArray, $template, $outputFile = "", $encoding="", $separator="%")
{
	return complexParsing($parseArray, $template, $outputFile, $encoding, $separator);
}


function parseContent($parseArray,$content,$encoding="",$separator="%")
{
    $ar = array();
    while (list($key, $val) = each($parseArray))
    {
        if(is_array($val))
        {
            $tagStringArray = getContentStrings($content,$key);
            for($j=0;$j<count($tagStringArray);$j++)
            {
               $ar[$tagStringArray[$j]] = complexHelper($tagStringArray[$j],$val,$encoding);
            }
        }
        else
        {
            $ar[$key]=doEncoding($val,$encoding);
        }
    }
    return parseC ($ar,$content, $encoding, $separator);
}



function parseC ($parseArray,$content, $encoding, $separator="%")
{
    global $SCRIPT_FILENAME;
    while (list($key, $val) = @each($parseArray))
    {
        if (substr($key,0,1)!="<" || substr($key,-1,1)!=">")
        {
                $key = $separator.$key.$separator;
        }
        $content = str_replace($key, $val, $content);
    }
    return $content;
}


function parseT ($parseArray, $template, $outputFile = "",$encoding="", $separator="%")
{
	global $SCRIPT_FILENAME, $template_name;       

        if (file_exists("$template.$template_name")) {    // [om] 25sep2k
    	    $template = "$template.$template_name";
        }


        if($fp=fopen("$template","r"))
    {
        $content=fread( $fp, filesize($template) );
        fclose($fp);
        $content = parseC($parseArray,$content,$encoding, $separator);
        if ($outputFile!="")
        {
                if($fp1=fopen("$outputFile","w"))
                {
                    if (!fwrite($fp1,$content))
                    {
                    echo("Konnte File ".$name." nicht beschreiben!<br> Tipp: &Uuml;ber�r&uuml;fen Sie die Schreibrechte des entsprechenden Verzeichnisses.");
                    }
                }
                else
                {
                echo("Konnte File ".$name." nicht �ffnen!<br>Tipp: &Uuml;ber�r&uuml;fen Sie die Schreibrechte des entsprechenden Verzeichnisses.");
                }
                fclose($fp1);
        }
    return "\n<!----- Template: $template ------>\n".$content;
    }
    else
    {
    echo("Konnte File ".$HTMLTemplate." nicht �ffnen!");
        return false;
    }
}



function getTemplateStrings($template, $tag)
{


    global $template_name;       

    if (file_exists("$template.$template_name")) {    // [om] 25sep2k
	$template = "$template.$template_name";
    }
    
    if ($fp=fopen("$template","r")) 
    {
        $content=fread($fp, filesize($template));
        fclose($fp);
        return getContentStrings($content,$tag);
    }
    else
    {
        echo "Couldn't open template $template";
        return false;
    }
}

function getContentStrings($content, $tag)
{
        $startTag="<$tag>";
            $endTag="</$tag>";
        $pos=0;
            $i=0;
        $templateStrings = array();

        while (is_int(strpos($content,$startTag, $pos)) && is_int(strpos($content,$endTag, $pos)))
        {
            $startPos = strpos($content,$startTag, $pos);
            $endPos = strpos($content,$endTag, $pos);
            $pos = $endPos + 1;
            $templateStrings[$i] = substr($content, $startPos, ($endPos + strlen($endTag) - $startPos));
            $i++;
        }
       return $templateStrings;
}


function complexHelper($tagContent,$parseSet,$encoding)
{
    $parseString="";
    for($i=0;$i<count($parseSet);$i++)
    {
	    $ar = array();
    	    $parseArray=$parseSet[$i];
    	    if (is_array($parseArray))
    	    {
		    while (list($key, $val) = each($parseArray))
		    {
		        if(is_array($val))
		        {
		            $tagStringArray = getContentStrings($tagContent,$key);
		            for($j=0;$j<count($tagStringArray);$j++)
		            {
	 	            	$ar[$tagStringArray[$j]]= complexHelper($tagStringArray[$j],$val,$encoding);
	 	            }
		        }
		        else
		        {
				    $ar[$key]=doEncoding($val,$encoding);
		        }
		    }
	    }
	    else
	    {
	            $ar[$tagContent]=$parseArray;
	    }
	    $parseString .= parseC($ar,$tagContent,$encoding);
    }
    return $parseString;
}


function complexParsing($parseArray, $template, $outputFile = "",$encoding="", $separator="%")
{
    $ar = array();
    while (list($key, $val) = each($parseArray))
    {
        if(is_array($val))
        {
            $tagStringArray = getTemplateStrings($template,$key);
	        for($j=0;$j<count($tagStringArray);$j++)
	        {
	           $ar[$tagStringArray[$j]] = complexHelper($tagStringArray[$j],$val,$encoding);
	        }
        }
        else
        {
            $ar[$key]= doEncoding($val,$encoding);
        }
    }
    return parseT ($ar,$template,$outputFile,$encoding,$separator);

}

function complexContent($parseArray,$content, $encoding="", $separator="%")
{
    $ar = array();
    while (list($key, $val) = each($parseArray))
    {
        if(is_array($val))
        {
            $tagStringArray = getContentStrings($content,$key);
            for($j=0;$j<count($tagStringArray);$j++)
            {
               $ar[$tagStringArray[$j]] = complexHelper($tagStringArray[$j],$val);
            }
        }
        else
        {
            $ar[$key]=$val;
        }
    }
    return parseC ($ar,$content,$encoding,$separator);
}

function doEncoding ($val,$encoding="")
{
       switch($encoding)
       {
           case "html":
               $val=htmlentities($val);
               $val=ereg_replace('&lt;',"<",$val);
               $val=ereg_replace('&gt;',">",$val);
               $val=nl2br($val);
           break;
           case "html_strictly":
               $val=htmlentities($val);
               $val=nl2br($val);
           break;
           default:
       }
       return $val;
}


?>
