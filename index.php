<?

/*
        -----
        Omail  -  A PHP/Perl based Vmailmgrd Web interface
        -----

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: index.php,v 1.2 2000/08/01 22:15:39 swix Exp $
        $Source: /cvsroot/omail/admin2/index.php,v $

        index.php
        ---------

        16.jan.2k   om   First version
        01.aug.2k   om   Rewrite for PHP4

*/


/*****************************************************************************/ 
require("./vmail.inc");
include("config.php");
include("func.php");
include("strings.php");
include("htmlstuff.php");
/*****************************************************************************/ 

session_start();
session_register("username","domain","passwd","type","ip","expire","lang","active");

if (!$lang) { $lang = $default_lang; }

if (!$active) {

	if ($A == "" || $A == "login") {

		if ($setlang) { $lang = $setlang; }	
	
		html_head("oMail Administration - Login");
		html_titlebar($txt_login[$lang], $txt_please_login[$lang], "");
		html_login();
		html_end();
		exit();

	} elseif ($A == "checkin") {

		if (authenticate($form_login, $form_passwd, $REMOTE_ADDR)) {

			$active = 1;
			print "ok!";
	
		} else {
				
			$active = 0;
			print "ooooooooooops...";
		}
	}

} else { // active=1


	if (!check_session($REMOTE_ADDR)) {

		// session expired or bad ip -> exit

		$active = 0;
		session_destroy();
	
		print "bye...";
		exit();
	
	}



	html_head("oMail Administration");	

	if (!$A) { $A = "menu"; }  // default action

	
	//
	// DOMAIN MENU
	// 

	if ($A == "menu") {
	
	// 1. title

	html_titlebar($txt_menu[$lang] . " - $domain", $txt_menu_descr[$lang] . $txt_menu_add, 0);


	// 2. show mailboxes

	print "<h1>Mailboxes</h1>";

	if ($show_delete_cb) {
		print "<form action=\"" . $script . "\" method=\"post\">";
	}
	
	print "<table border=0><TR>" .
		"<TH>N°</TH>";
	if ($show_delete_cb) {
		print "<TH>&nbsp;</TH>";
	}
	print "<TH>" . $txt_email[$lang] . "</TH>" .
		"<TH>" . $txt_fwd[$lang] . "1</TH>" .
		"<TH>" . $txt_fwd[$lang] . "2</TH>" .
		"<TH>" . $txt_more_fwd[$lang] . "?</TH>" .
		"<TH>" . $txt_responder[$lang] . "?</TH>" .
		"<TH>" . $txt_mailbox_size[$lang] . "</TH>" .
		"<TH>" . $txt_unread_mails[$lang] . "</TH>" .
		"<TH>" . $txt_read_mails[$lang] . "</TH>" .
		"<TH COLSPAN=4>" . $txt_action[$lang] . "</TH></TR>";



					
	$yes = "<font color=\"green\">Yes</font>";
	$no = "<font color=\"red\">No</font>";
	$total_size = 0;
	$color_tmp = 0;

	$mboxlist = listdomain($domain, base64_decode($passwd));

	for ($i = 0; $i <  sizeof($mboxlist); $i++) {

		$i--;
		do {
		$i++;
		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime)=$mboxlist[$i];
		} while (!$mbox && $i < sizeof($mboxlist));

		if ($i/2 == floor($i/2)) { 

			if ($color_tmp) {
				print "<tr bgcolor=\"#DDDDDD\">"; 
			} else {
				print "<tr bgcolor=\"#CCCCCC\">"; 
			}			

		} else { 
		
			if (!$color_tmp) {
				print "<tr bgcolor=\"#DDDDDD\">"; 
			} else {
				print "<tr bgcolor=\"#CCCCCC\">"; 
			}			

		}			

		$mbox_info[0] = $username;
		$mbox_info[3] = $username;
		$mbox_info[5] = $alias[0]; 	
		$mbox_info[6] =	$alias[1];	
		$mbox_info[7] =	$alias[2];	
		$mbox_info[-1] = "";		
		$mbox_info[1] =	0;
		$mbox_info[2] =	0;	


		print "<TD>" . $i  . "&nbsp;</TD>"; // num
		if ($show_delete_cb) {
			print "<TD><INPUT TYPE=\"checkbox\" NAME=\"del[]\" VALUE=\" . $mbox_info[0] . \"></TD>";
		}
		print "<TD><B>" . $mbox_info[3]  . "</B>&nbsp;</TD>"; // namae
		print "<TD>" . $mbox_info[5]  . "&nbsp;</TD>"; // fwd1
		print "<TD>" . $mbox_info[6] . "&nbsp;</TD>"; // fwd2

		print "<TD>";
		if ($mbox_info[7]) { print $yes; } else { print $no; } 
		print "&nbsp;</TD>"; // alias?

		print "<TD>";
		if ($mbox_info[-1]) { print $yes; } else { print $no; } 
		print "&nbsp;</TD>"; // responder?

		if (($mbox_info[1] + $mbox_info[1]) == 0) { $mbox_info[0] = 0; }
		$total_size += $mbox_info[0];
		print "<TD>" . $mbox_info[0] . " kB&nbsp;</TD>"; // size
		
		if ($mbox_info[1] == 0) { $mbox_info[1] = "-"; }
		if ($mbox_info[2] == 0) { $mbox_info[2] = "-"; }
		print "<TD>" . $mbox_info[1]  . "&nbsp;</TD>"; // msg unread
		print "<TD>" . $mbox_info[2]  . "&nbsp;</TD>"; // old msg

		// convert the username to an html escaped string (because of user "+") 

		$mbox_info[3] = urlencode($mbox_info[3]);

		print "<TD><A HREF=\"$script?A=read&U=" . $mbox_info[3] . "\" onClick=\"oW(this,'pop')\">"  . 
			$txt_read[$lang]  . "</a>&nbsp;</TD>"; // action
		print "<TD><A HREF=\"$script?A=edit&U=" . $mbox_info[3] . "\" onClick=\"oW(this,'pop')\">"  . 
			$txt_edit[$lang]  . "</a>&nbsp;</TD>"; // action
		print "<TD><A HREF=\"$script?A=resp&U=" . $mbox_info[3] . "\" onClick=\"oW2(this,'pop')\">"  . 
			$txt_responder[$lang] . "</a>&nbsp;</TD>"; // action
		print "<TD><A HREF=\"$script?A=delete&U=" . $mbox_info[3] . "\" onClick=\"oW(this,'pop')\">"  . 
			$txt_delete[$lang]  . "</a>&nbsp;</TD>"; // action
		print "</TR>";

	}
			
	if ($show_delete_cb) {   
		print "<tr><th COLSPAN=7 ALIGN=right>Total:&nbsp;&nbsp;</th>";
	} else {
		print "<tr><th COLSPAN=6 ALIGN=right>Total:&nbsp;&nbsp;</th>";
	}

	print "<TH>" . $total_size . " kB</TH><TH COLSPAN=2>&nbsp;</TH><TH COLSPAN=4 ALIGN=center>" .
		"<A HREF=\"$script?A=newuser\" onClick=\"oW(this,'pop')\">"  . $txt_newuser[$lang]  . "</a>&nbsp;</TH></TR>";

	print "</table><br>"; 

	if ($show_delete_cb) {
		print "</form>";
	}	



	// 3. show aliases

	print "<h1>Aliases</h1>";



	if ($show_delete_cb) {
		print "<form action=\"" . $script . "\" method=\"post\">";
	}

	print "<table border=0><TR>" .
		"<TH>N°</TH>";
		if ($show_delete_cb) {
			print "<TH>&nbsp;</TH>";
		}
	print "<TH>" . $txt_email[$lang] . "</TH>" .
		"<TH>" . $txt_fwd[$lang] . "1</TH>" .
		"<TH>" . $txt_fwd[$lang] . "2</TH>" .
		"<TH>" . $txt_fwd[$lang] . "3</TH>" .
		"<TH>" . $txt_more_fwd[$lang] . "?</TH>" .
		"<TH>" . $txt_responder[$lang] . "?</TH>" .
		"<TH COLSPAN=3>" . $txt_action[$lang] . "</TH></TR>";



	for ($i = 0; $i < sizeof($mboxlist); $i++) {

		$i--;
		do {
		$i++;
		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime)=$mboxlist[$i];
		} while (!$alias && $i < sizeof($mboxlist));

		if ($i/2 == floor($i/2)) { 

			if ($color_tmp) {
				print "<tr bgcolor=\"#DDDDDD\">"; 
			} else {
				print "<tr bgcolor=\"#CCCCCC\">"; 
			}			

		} else { 
		
			if (!$color_tmp) {
				print "<tr bgcolor=\"#DDDDDD\">"; 
			} else {
				print "<tr bgcolor=\"#CCCCCC\">"; 
			}			

		}			

		$mbox_info[0] = $username;
		$mbox_info[2] = $alias[0]; 	
		$mbox_info[3] =	$alias[1];	
		$mbox_info[4] =	$alias[2];	
		$mbox_info[5] =	$alias[3];	
		$mbox_info[-1] = "";		
		$mbox_info[1] =	0;
		$mbox_info[2] =	0;	


		print "<TD>" . $i  . "&nbsp;</TD>"; // num
		if ($show_delete_cb) {
			print "<TD ><INPUT TYPE=\"checkbox\" NAME=\"del[]\" VALUE=\" . $mbox_info[0] . \"></TD>";
		}
		print "<TD><B>" . $mbox_info[0]  . "</B>&nbsp;</TD>"; // name
		print "<TD>" . $mbox_info[2]  . "&nbsp;</TD>"; // fwd1
		print "<TD>" . $mbox_info[3] . "&nbsp;</TD>"; // fwd2
		print "<TD>" . $mbox_info[4] . "&nbsp;</TD>"; // fwd3

		print "<TD>";
		if ($mbox_info[5]) { print $yes; } else { print $no; } 
		print "&nbsp;</TD>"; // more fwd?

		print "<TD>";
		if ($mbox_info[-1]) { print $yes; } else { print $no; } 
		print "&nbsp;</TD>"; // responder ?

		// convert the username to an html escaped string (because of user "+") 

		$mbox_info[0] = urlencode($mbox_info[0]);

		print "<TD><A HREF=\"$script?A=edit&U=" . $mbox_info[0] . "\" onClick=\"oW(this,'pop')\">"  . 
			$txt_edit[$lang]  . "</a>&nbsp;</TD>"; // action
		print "<TD><A HREF=\"$script?A=resp&U=" . $mbox_info[0] . "\" onClick=\"oW2(this,'pop')\">"  . 
			$txt_responder[$lang] . "</a>&nbsp;</TD>"; // action
		print "<TD><A HREF=\"$script?A=delete&U=" . $mbox_info[0] . "\" onClick=\"oW(this,'pop')\">"  . 
			$txt_delete[$lang]  . "</a>&nbsp;</TD>"; // action

		print "</TR>";
	}

		
	if ($show_delete_cb) {   
		print "<TR><TH COLSPAN=8 ALIGN=right>&nbsp;</TH><TH COLSPAN=2 ALIGN=center>";
	} else {
		print "<TR><TH COLSPAN=7 ALIGN=right>&nbsp;</TH><TH COLSPAN=3 ALIGN=center>"; 
	}
	
	print "<A HREF=\"$script?A=newalias\" onClick=\"oW(this,'pop')\">"  . $txt_newalias[$lang]  . "</a>&nbsp;</TH></TR>";
	
	print "</table><br>";

	if ($show_delete_cb) {
		print "</form>";
	}	


	html_end();
	exit();

} // menu

		

	//
	// LOGOUT 
	//

	if ($A == "logout") {

		$active = 0;
		session_destroy();

	        $msg = $txt_logout[$lang] . " ok";
	        $msg .= "<ul><li><a href=\"$script_url?A=login\">" . $txt_login_again[$lang]  .  "</a>\n";
	        $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">Mail Sysadmin</a>\n</ul>";

	        html_titlebar($txt_logout[$lang], $msg ,0);
	        html_end();
	        exit();
	}	




} // end active=1


?>
