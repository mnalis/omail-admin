<?

/* 	-----
	Omail  -  A PHP4 based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: htmlstuff.php,v 1.26 2000/09/23 14:42:13 swix Exp $
        $Source: /cvsroot/omail/admin2/htmlstuff.php,v $

	htmlstuff.php
	-------------
	some usefull html things...

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


function html_login() {

	global $script_url, $A, $lang, $version, $cookie_omail_last_login, $cookie_omail_last_domain, $domains_list;
	include("strings.php");

  ?>

<FORM METHOD="post" ACTION="<?php echo($script_url); ?>?<?=SID?>">
<CENTER>
<TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0 BGCOLOR="#EEEEEE">
<TR VALIGN="TOP">
<TD COLSPAN=3>
<TABLE WIDTH="100%" CELLPADDING=10 CELLSPACING=0 BORDER=0>
<TR ALIGN="LEFT">
<TD VALIGN="MIDDLE" BGCOLOR="#CCCCCC">
<b><?php echo($txt_dom_ident[$lang]); ?></b>
</TD>
<TD VALIGN="MIDDLE" ALIGN="RIGHT" BGCOLOR="#CCCCCC">

<?php
        reset($txt_langname);
        while(list ($id,$tmplang) = each ($txt_langname) ) {
                if ($id != $lang) {
                        ?>
<nobr>[ <a href="<?php echo($script_url); ?>?setlang=<?php echo($id); ?>&<?=SID?>">
<?php echo($tmplang); ?></a> ]</nobr>
                        <?php
                } else {
                                ?>
<nobr>[ <font color="red"><?php echo($tmplang); ?></font> ]</nobr>
                                <?php
                        }
        }
?>
</TD></TR></TABLE></TD>

<TD ROWSPAN="4" width=8 bgcolor="#ffffff">
<IMG SRC="images/srs.gif" width=16 height=250 alt=""></TD></TR>  
<TR><TD ALIGN="RIGHT"><?php echo($txt_domain_or_email[$lang]); ?>:&nbsp;</TD>
<TD><input name="form_login" VALUE="<?php
if (!count($domains_list) && $cookie_omail_last_domain && !$cookie_omail_last_login) { print htmlentities($cookie_omail_last_domain); }
elseif (!count($domains_list) && $cookie_omail_last_login && $cookie_omail_last_domain) { 
	print htmlentities($cookie_omail_last_login) . "@" . htmlentities($cookie_omail_last_domain); 
} elseif (count($domains_list) && $cookie_omail_last_login) { print htmlentities($cookie_omail_last_login); }

?>" size="20">

<?php
	if (count($domains_list)) {
		echo "@ <select name=\"login_domain\">";
	        reset($domains_list);
	        while(list ($id,$tmp) = each ($domains_list) ) {

			if ($cookie_omail_last_domain == $tmp) {
				echo "<option selected>$tmp</option>";
			} else {
				echo "<option>$tmp</option>";
			}

	        }
		echo "</select>";
	}
?>

</TD>
<TD>&nbsp;</TD></TR><TR>
<TD ALIGN="RIGHT"><?php echo($txt_password_str[$lang]); ?>:&nbsp;</TD>
<TD><input name="form_passwd" type="password" size="20"></TD>
<TD>&nbsp;</TD>
</TR><TR>
<TD ALIGN="CENTER" COLSPAN="4">
<INPUT TYPE="hidden" name="A" value="checkin">
<INPUT TYPE="hidden" name="setlang" value="<?php echo($lang); ?>">
<INPUT TYPE="SUBMIT" VALUE="<?php echo($txt_login[$lang]); ?>">
</TD></TR>
<TR VALIGN="TOP">
<TD COLSPAN=3><img src="images/sbs.gif" width=620 height=16 alt=""></TD>
<TD ALIGN="LEFT" BGCOLOR="#ffffff"><img src="images/sbc.gif" width=12 alt="" height=16></TD>
</TR>
</TABLE>
</CENTER>
</FORM>
        <?php


}


function html_head($title) {

	global $quota_on, $quota_data, $A, $domain, $cvs_version, $version, $lang, $setlang;
	include("strings.php");

	// needed for 'ru' (at least with no-russian browsers)	
	if ($txt_charset[$lang]) { 
		Header("Content-Type: text/html; charset=" . $txt_charset[$lang] . "\n");
	} elseif ($txt_charset[$setlang]) { 
		Header("Content-Type: text/html; charset=" . $txt_charset[$setlang] . "\n");
	}

	print "<HTML><HEAD><TITLE>$title   [$lang]</TITLE>\n";

	print "<!-- oMail-admin version $version - $cvs_version - " . session_id() . "-->\n";
	?>
<style type="text/css">
//<!--
body {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt}
th   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-weight: bold; background-color: #D3DCE3;}
td   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt;}
test.td   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt;}
form   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt}
h1   {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; font-weight: bold}
A:link    {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt; text-decoration: none; color: blue}
A:visited {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt; text-decoration: none; color: blue}
A:hover   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt; text-decoration: underline; color: red}
A:link.nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000}
A:visited.nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000}
A:hover.nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: red;}
.nav {  font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000}
//-->
</style>

	<?php if ($A == "menu") {  ?>

<SCRIPT LANGUAGE="JavaScript">
  <!--
  function oW(myLink,windowName)
  {
  if(! window.focus)return;
  var myWin=window.open("",windowName,"height=550,width=500,dependent=yes,resizable=yes,scrollbars=yes");
  myWin.focus();
  myLink.target=windowName;
  }
  <!--
  function oW2(myLink,windowName)
  {
  if(! window.focus)return;
  var myWin=window.open("",windowName,"height=610,width=600,dependent=yes,resizable=yes,scrollbars=yes");
  myWin.focus();
  myLink.target=windowName;
  }
  //-->
</SCRIPT>

	<?php } else if ($A != "login" || $A != "" || $A != "checkin") { ?>

<SCRIPT LANGUAGE="JavaScript">
  <!--
  function gO(myLink,closeme,closeonly)
  {
  if (! (window.focus && window.opener))return true;
  window.opener.focus();
  if (! closeonly)window.opener.location.href=myLink.href;
  if (closeme)window.close();
  return false;
  }
  //--> 
</SCRIPT>

	<?php } ?>

</HEAD><BODY BGCOLOR=#FFFFFF TEXT=#000000 LINK=#000080 VLINK=#000080 ALINK=#000080>

	<?php
}


function html_titlebar($title,$msg,$popup) {
	
	global $quota_on, $quota_data, $script, $A, $lang, $version;
	include("strings.php");

	$array["version"] = $version;
	$array["title"] = $title;
	$array["msg"] = $msg;

	if ($popup) { 
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_close[$lang];
		$array[buttonlabels][0][onClick] = 'onClick="return gO(this,true,true)"';
		$array[buttonlabels][1][url] = $script . "?A=logout&" . SID;
		$array[buttonlabels][1][txt] = $txt_logout[$lang];
		$array[buttonlabels][1][onClick] = 'onClick="return gO(this,true,true)"';
	} elseif ($A == "menu") { 	
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_refresh_menu[$lang];
		$array[buttonlabels][0][onClick] = '';
		$array[buttonlabels][1][url] = $script . "?A=logout&" . SID;
		$array[buttonlabels][1][txt] = $txt_logout[$lang];
		$array[buttonlabels][1][onClick] = '';
		$array[buttonlabels][2][url] = $script . "?A=about&" . SID;
		$array[buttonlabels][2][txt] = $txt_about[$lang];
		$array[buttonlabels][2][onClick] = '';
	} elseif ($A == "login" || $A == "" || $A == "splash") {
		$array[buttonlabels][0][url] = $script . "?A=about&" . SID;
		$array[buttonlabels][0][txt] = $txt_about[$lang];
		$array[buttonlabels][0][onClick] = '';
	} elseif ($A == "about") { 
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_back[$lang];
		$array[buttonlabels][0][onClick] = '';
	} else {
		$array[buttonlabels][0]='';
	}

	print parseTemplate($array, "templates/titlebar.temp");
}



function html_end() {

	print "</BODY></HTML>\n\n";	

}


function html_userform($userinfo, $action) {

	global $quota_on, $quota_data, $session, $script, $lang, $domain, $type;
	include("strings.php");

	$fwd = 0;

	if ($action == "edit") {
		// find how many forwarders there are
		$aliases = $userinfo[3];
		$nb_fwd = count($aliases);
	}

	print "<form action=\"" . $script . "?" . SID . "\" method=\"post\">";
	print "<table border=0>";	
	print "<tr><th align=right>" . $txt_username[$lang] . "&nbsp;</th>";	

	if ($action == "edit") {
	print "<td bgcolor=\"#DDDDDD\" align=left>" . $userinfo[0]. "@$domain&nbsp;</td></tr>";
	print "<input type=\"hidden\" name=\"U\" value=\"" . $userinfo[0] . "\">";
	} else {
	print "<td bgcolor=\"#DDDDDD\" align=left><input type=\"text\" name=\"U\" value=\"" . $userinfo[0]. "\" size=\"15\">@$domain&nbsp;</td></tr>";
	}


	print "<tr><th align=right>" . $txt_details[$lang] . "&nbsp;</th>";	
	if ($type == "user") {
	print "<td bgcolor=\"#DDDDDD\" align=left>" . $userinfo[4]. "&nbsp;</td></tr>";
	} else {
	print "<td bgcolor=\"#DDDDDD\" align=left><input type=\"text\" name=\"userdetail\" value=\"" . $userinfo[4]. "\" size=\"23\">&nbsp;</td></tr>";
	}

	print "<tr><th align=right>" . $txt_directory[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=left>" . $userinfo[2]. "&nbsp;</td></tr>";
	
	print "<tr><th align=right>" . $txt_passwd[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#DDDDDD\" align=left><input type=\"password\" name=\"passwd1\" value=\"\" size=\"9\">";
	if ($action == "newalias") { print "&nbsp;&nbsp;(" . $txt_facultatif[$lang] . ")"; }
	print "&nbsp;</td></tr>";

	print "<tr><th align=right>" . $txt_passwd[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=left><input type=\"password\" name=\"passwd2\" value=\"\" size=\"9\">";
	if ($action == "newalias") { print "&nbsp;&nbsp;(" . $txt_facultatif[$lang] . ")"; }
	print "&nbsp;</td></tr>";

	for ($i = 0; $i < ($nb_fwd + 5); $i++) {
		
		print "<tr><th align=right>" . $txt_fwd[$lang] . " " . ($i + 1) . "&nbsp;</th>";	

	if ($i/2 == floor($i/2)) { print "<td bgcolor=\"#DDDDDD\" align=left>"; }
					else { print "<td bgcolor=\"#CCCCCC\" align=left>"; }

		print "<input type=\"text\" name=\"fwd[]\" value=\"" . $aliases[$i]. "\" size=\"25\">&nbsp;</td></tr>";

	}	

	print "<tr><th align=right>" . $txt_submit[$lang] . "&nbsp;</th>";	

	if ($i/2 == floor($i/2)) { print "<td bgcolor=\"#DDDDDD\" align=left>"; }
					else { print "<td bgcolor=\"#CCCCCC\" align=left>"; }

	print "<input type=\"hidden\" name=\"A\" value=\"parse\">";
	print "<input type=\"hidden\" name=\"action\" value=\"" . $action . "\">";
	print "<input type=\"submit\" value=\"" . $txt_submit[$lang]. "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	print "<input type=\"reset\" value=\"" . $txt_cancel[$lang]. "\" onClick=\"return gO(this,true,true)\">&nbsp;</td></tr>";
	
	print "</table>";	
	print "</form>";	
}



function html_quotaform($userinfo, $action) {

	global $quota_on, $quota_data, $session, $script, $lang, $domain, $type;
	include("strings.php");

	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled)= $userinfo;

	// template = quotaform.temp - 23sep2k [om]

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
        $templdata["txt_username"]=$txt_username[$lang];
        $templdata["userinfo0"]=$userinfo[0];
        $templdata["domain"]=$domain;
        $templdata["txt_details"]=$txt_details[$lang];
        $templdata["userinfo4"]=$userinfo[4];
        $templdata["txt_date_of_creation"]=$txt_date_of_creation[$lang];
        $templdata["CreationTime"]=date("d.m.Y H\hi",$CreationTime);
        $templdata["txt_status"]=$txt_status[$lang];

	if ($Enabled == 1) { $templdata["checked_yes"] = "SELECTED"; $templdata["checked_no"] = ""; }
		else { $templdata["checked_no"] = "SELECTED"; $templdata["checked_yes"] = ""; }

        $templdata["txt_activated"]=$txt_activated[$lang];
        $templdata["txt_inactived"]=$txt_inactived[$lang];
        $templdata["txt_hardquota"]=$txt_hardquota[$lang];
        $templdata["HardQuota"]=$HardQuota;
        $templdata["txt_softquota"]=$txt_softquota[$lang];
        $templdata["SoftQuota"]=$SoftQuota;
        $templdata["txt_msgcount"]=$txt_msgcount[$lang];
        $templdata["CountLimit"]=$CountLimit;
        $templdata["txt_msgsize"]=$txt_msgsize[$lang];
        $templdata["SizeLimit"]=$SizeLimit;
        $templdata["txt_expiry"]=$txt_expiry[$lang];
        $templdata["ExpiryTimeString"]="";

	if ($ExpiryTime && $ExpiryTime != "-") { $templdata["ExpiryTimeString"] = date("d.m.Y H\hi",$ExpiryTime) . "<br>"; }

        $templdata["ExpiryTime"]=$ExpiryTime;
        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["username"]=$username;
        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];

        print parseTemplate($templdata, "templates/quotaform.temp");

}



function html_listmailbox($result) {

	global $quota_on, $quota_data, $session, $script, $lang, $domain;
	include("strings.php");

	print "<br><table border=0>";	
	print "<tr><th>" . $txt_number[$lang] . "&nbsp;</th>";	
	print "<th>" . $txt_date[$lang] . "&nbsp;</th>";	
	print "<th>" . $txt_from[$lang] . "&nbsp;</th>";	
	print "<th>" . $txt_subject[$lang] . "&nbsp;</th>";	
	print "<th>" . $txt_size[$lang] . "&nbsp;</th>";	

	$result_array1 = explode("\n", $result);
	$nb_mail = count($result_array1);

	for ($msg = 0; $msg<$nb_mail; $msg++) {

		$result_array2 = explode("|||", $result_array1[$msg]);

		if (!($result_array2[0] == "" && $result_array2[1] == "" && $result_array2[2] == "")) {

			if ($msg/2 == floor($msg/2)) { $color = "#DDDDDD"; } else { $color = "#CCCCCC"; }

			print "<tr><td bgcolor=\"$color\">" . ($msg + 1) . "&nbsp;</td>"; 
			print "<td bgcolor=\"$color\">" . date("d.m.Y H\hi",$result_array2[0]) . "&nbsp;</td>"; 
			print "<td bgcolor=\"$color\">" . htmlentities($result_array2[1]) . "&nbsp;</td>"; 
			print "<td bgcolor=\"$color\">" . htmlentities($result_array2[2]) . "&nbsp;</td>"; 
			print "<td bgcolor=\"$color\">" . htmlentities($result_array2[3]) . "&nbsp;</td></tr>"; 
		}
	}
	
	print "</table>";	
}



function html_respform($userinfo, $respinfo, $status) {

	global $session, $script, $lang, $domain;
	include("strings.php");

	print "<form action=\"" . $script . "?" . SID . "\" method=\"post\">";
	print "<table border=0>";	
	print "<tr><th align=right>" . $txt_username[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#DDDDDD\" align=left>" . $userinfo[0]. "@$domain&nbsp;</td></tr>";
	print "<input type=\"hidden\" name=\"U\" value=\"" . $userinfo[0] . "\">";

	print "<tr><th align=right>" . $txt_responder[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=left>";
	
	if ($status == 1) { $checked_yes = "SELECTED"; $checked_no = ""; }
		else { $checked_yes = ""; $checked_no = "SELECTED"; }

	print "<select name=\"responder\">";
	print "<option value=\"1\" $checked_yes>" . $txt_activated[$lang] . "</option>";	
	print "<option value=\"0\" $checked_no>" . $txt_inactived[$lang] . "</option>";	
	print "</select></td></tr>";

	print "<tr><th>&nbsp;</th><td bgcolor=\"#DDDDDD\"><b>" . $txt_autoanswertext[$lang] . ":</b>&nbsp;</td></tr>";
	
	print "<tr><th align=right>" . $txt_from[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"CCCCCC\" align=left><input type=\"text\" name=\"from\" value=\"" . $respinfo["from"] .
		 "\" size=\"50\">&nbsp;</td></tr>";

	print "<tr><th align=right>" . $txt_subject[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"CCCCCC\" align=left><input type=\"text\" name=\"subject\" value=\"" . $respinfo["subject"] .
		 "\" size=\"50\">&nbsp;</td></tr>";
	
	print "<tr><th align=right>" . $txt_text[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"DDDDDD\" align=left><font size=\"-1\"><textarea name=\"body\" cols=\"50\" rows=\"13\">" .
		$respinfo["body"] . "</textarea></font>&nbsp;</td></tr>";
	

	print "<tr><th align=right>" . $txt_submit[$lang] . "&nbsp;</th>";	

	print "<td bgcolor=\"#CCCCCC\" align=left>";
	print "<input type=\"hidden\" name=\"A\" value=\"parse\">";
	print "<input type=\"hidden\" name=\"action\" value=\"responder\">";
	print "<input type=\"submit\" value=\"" . $txt_submit[$lang]. "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	print "<input type=\"reset\" value=\"" . $txt_cancel[$lang]. "\" onClick=\"return gO(this,true,true)\">&nbsp;</td></tr>";

	print "</table>";	
	print "</form>";	
}




function html_delete_confirm($userinfo) {

	global $session, $script, $lang, $domain;
	include("strings.php");

	// find type of account (mbox or alias)

	print "<br><table border=0>";	
	print "<tr><th align=right>" . $txt_username[$lang] . "&nbsp;</th>";	

	print "<td colspan=\"2\" bgcolor=\"#DDDDDD\" align=left>" . $userinfo[0]. "@$domain&nbsp;</td></tr>";


	print "<tr><th align=right>" . $txt_action[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=\"center\" valign=\"center\">";
	print "<small><font color=\"red\">";


	print "<form action=\"" . $script . "?" . SID . "\" method=\"post\">";
	print "<input type=\"hidden\" name=\"A\" value=\"parse\">";
	print "<input type=\"hidden\" name=\"action\" value=\"delete_ok\">";
	print "<input type=\"hidden\" name=\"U\" value=\"" . $userinfo[0] . "\">";
	print "<br><input type=\"submit\" name=\"submit\" value=\"" . $txt_delete[$lang]. "\"></font>";
	print "</form></small></td><td bgcolor=\"#CCCCCC\" align=\"center\" valign=\"center\"><small>";


	print "<form action=\"" . $script . "?" . SID . "\" method=\"post\">";
	print "<input type=\"hidden\" name=\"A\" value=\"menu\">";
	print "<br><input type=\"reset\" name=\"submit\" onClick=\"return gO(this,true,true)\" value=\"" . $txt_cancel[$lang]. "\">";
	print "</form></small></td></tr>";	
	print "</table>";	
}


function html_error($title, $msg) {

        global $script, $lang, $domain;
        include("strings.php");

}


function html_display_mailboxes($mboxlist, $arg_action) {

	// action :  	1 = mailbox
	//		2 = alias
	//		0 = user   (no new user line, no delete)

	// if autoresp_support = 0 -> don't show autorespond button... and check if colspan are ok...



	global $quota_on, $quota_data, $session, $script, $lang, $domain;
	include("strings.php");

	switch ($arg_action) {
		case 1:
			print "<h1>" . $txt_mailboxes_title[$lang] . "</h1>";
			break;
		case 2:
			print "<h1>" . $txt_aliases_title[$lang] . "</h1>";
			break;
		case 0:
			print "<h1>" . $txt_user_title[$lang] . "</h1>";
			$tmp_user = $mboxlist[0];
			if ($tmp_user[2]) { $mtype = "mbox"; } else { $mtype = "alias"; }
			break;
	}

	print "<table border=0><TR><TH>N°</TH>";
	print "<TH>" . $txt_email[$lang] . "</TH>" .
		"<TH>" . $txt_info[$lang] . "</TH>" .
		"<TH>" . $txt_fwd[$lang] . "1</TH>" .
		"<TH>" . $txt_fwd[$lang] . "2</TH>" .
		"<TH>" . $txt_fwd[$lang] . "3</TH>" .
		"<TH>" . $txt_more_fwd[$lang] . "?</TH>";

	if ($arg_action != 2 && !(!$arg_action && $mtype == "alias")  && !($quota_on && !$quota_data["autoresp_support"])) {
		print "<TH>" . $txt_responder[$lang] . "?</TH>";
	}

	print "<TH>" . $txt_action[$lang] . "</TH></TR>";
			
	$yes = "<font color=\"green\">" . $txt_yes[$lang] . "</font>";
	$no = "<font color=\"red\">" . $txt_no[$lang] . "</font>";


	$activated = "<font color=\"green\">" . $txt_activated[$lang] . "</font>";
	$inactived = "<font color=\"red\">" . $txt_inactived[$lang] . "</font>";


	$total_size = 0;

	for ($i = 0; $i <  sizeof($mboxlist); $i++) {

		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled)=$mboxlist[$i];

		if ($i/2 == floor($i/2)) { 
			print "<tr bgcolor=\"#DDDDDD\">"; 
		} else { 
			print "<tr bgcolor=\"#CCCCCC\">"; 
		}			

		print "<TD>" . ($i+1)  . "&nbsp;</TD>"; // num

		if ($Enabled) {
			print "<TD><B><FONT COLOR=\"green\">" . $username  . "</FONT></B>&nbsp;</TD>"; // namae
		} else {
			print "<TD><B><FONT COLOR=\"red\">" . $username  . "</FONT></B>&nbsp;</TD>"; // namae
		}

		print "<TD><nobr>" . $PersonalInfo  . "</nobr>&nbsp;</TD>"; // namae
		print "<TD>" . $alias[0]  . "&nbsp;</TD>"; // fwd1
		print "<TD>" . $alias[1] . "&nbsp;</TD>"; // fwd2
		print "<TD>" . $alias[2] . "&nbsp;</TD>"; // fwd3

		print "<TD>";
		if ($alias[3]) { print $yes; } else { print $no; } 
		print "&nbsp;</TD>"; // alias?

		if ($arg_action != 2 && !(!$arg_action && $mtype == "alias") && !($quota_on && !$quota_data["autoresp_support"])) {
			print "<TD>";
			if ($resp) { print $activated; } else { print $inactived; } 
			print "&nbsp;</TD>"; // responder?
		}

		// convert the username to an html escaped string (because of user "+") 

		$username = urlencode($username);

		// actions
	
		print "<TD align=\"center\">";
		
		print "&nbsp;&nbsp;<A HREF=\"$script?A=edit&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\">"  . 
			$txt_edit[$lang]  . "</a>&nbsp;"; // action

		if ($arg_action != 2 && !(!$arg_action && $mtype == "alias") && !($quota_on && !$quota_data["autoresp_support"])) {
			print "&nbsp;&nbsp;<A HREF=\"$script?A=resp&U=" . $username . "&" . SID . "\" onClick=\"oW2(this,'pop')\">"  . 
				$txt_responder[$lang] . "</a>&nbsp;"; // action
		}	

		if ((($arg_action == 2 && $config_use_settings_with_quota) || $arg_action == 1) && !($quota_on && !$quota_data["user_quota_support"])) {
			print "&nbsp;&nbsp;<A HREF=\"$script?A=quota&U=" . $username . "&" . SID . "\" onClick=\"oW2(this,'pop')\">"  . 
				$txt_settings[$lang] . "</a>&nbsp;"; // action
		}	

		if ($arg_action) {
			print "&nbsp;&nbsp;<A HREF=\"$script?A=delete&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\">"  . 
				$txt_delete[$lang]  . "</a>&nbsp;"; // action
		}
		print "</TD></TR>";

	}
			

	switch ($arg_action) {
		case 1:
			$tmp_label = $txt_newuser[$lang];
			$tmp_action = "newuser";
			break;
		case 2:
			$tmp_label = $txt_newalias[$lang];
			$tmp_action = "newalias";
			break;
	}


	if ($arg_action != 0) {

		// prepare quota string
	
		$quota_string = "";

		if ($quota_on) {

			if ($arg_action == 1) {			
				if ($quota_data["max_users"] && $quota_data["max_users"] != 99999999) {
					$percent = round((100*$quota_data["nb_users"])/$quota_data["max_users"]);
					if ($percent == 100) { 	
						$percent = '<font color="red">' . $percent . '%</font>';
					} else {
						$percent = '<font color="green">' . $percent . '%</font>';
					}
					$quota_string = $txt_quota[$lang] . ": " . $txt_maximum[$lang] . " = " . $quota_data["max_users"] . " " . $txt_smallmailboxes[$lang] . " &nbsp; &nbsp; ($percent " . $txt_used[$lang] . ")" ;
				}
			}
			if ($arg_action == 2) {			
				if ($quota_data["max_alias"] && $quota_data["max_alias"] != 99999999) {
					$percent = round((100*$quota_data["nb_alias"])/$quota_data["max_alias"]);
					if ($percent == 100) { 	
						$percent = '<font color="red">' . $percent . '%</font>';
					} else {
						$percent = '<font color="green">' . $percent . '%</font>';
					}
					$quota_string = $txt_quota[$lang] . ": " . $txt_maximum[$lang] . " = " . $quota_data["max_alias"] . " " . $txt_smallaliases[$lang] . " &nbsp; &nbsp; ($percent " . $txt_used[$lang] . ")" ;
				
				}
			}

		} // if quota_on
	
		if ($arg_action != 2 && !($quota_on && !$quota_data["autoresp_support"])) {
			print "<tr><th COLSPAN=8 ALIGN=left><font size=-1>&nbsp;$quota_string &nbsp;</font></th>";
			print "<TH ALIGN=center>";
		} else { 
			print "<tr><th COLSPAN=7 ALIGN=left><font size=-1>&nbsp;$quota_string &nbsp;</font></th>";
			print "<TH ALIGN=center>";
		}
	
		print "<A HREF=\"$script?A=$tmp_action&" . SID . "\" onClick=\"oW(this,'pop')\">"  . $tmp_label  . "</a>&nbsp;</TH></TR>";
	}

	print "</table><br>"; 

}



function html_about() {

	global $A, $domain, $cvs_version, $version, $lang, $HTTP_HOST, $REQUEST_URI, $REMOTE_ADDR, $HTTP_ACCEPT_LANGUAGE;
	include("strings.php");

	$templdata["version"]=$version;
	$templdata["cvs_version"]=$cvs_version;

	reset($txt_langname);
	while(list ($id,$tmplang) = each ($txt_langname) ) {
		$templdata["languages"] .= ($tmplang) . " ";
	}

	$templdata["HTTP_HOST"]=$HTTP_HOST;
	$templdata["REQUEST_URI"]=$REQUEST_URI;
	$templdata["REMOTE_ADDR"]=$REMOTE_ADDR;
	$templdata["HTTP_ACCEPT_LANGUAGE"]=$HTTP_ACCEPT_LANGUAGE;
	$templdata["domain"]=$domain;

	print parseTemplate($templdata, "templates/about.temp");
}



function html_splash() {

	global $A, $domain, $cvs_version, $version, $lang, $sysadmin_mail, $splash_screen, $HTTP_HOST, $REQUEST_URI, $REMOTE_ADDR, $HTTP_ACCEPT_LANGUAGE;
	include("strings.php");

	if ($splash_screen) { $splash = '<font color="red">nok</font>'; } else { $splash = '<font color="green">ok</font>'; }
	if ($sysadmin_mail == "sysadmin@notdefined.yet") { 
		$smail = '<font color="red">nok</font>'; } else { $smail = '<font color="green">ok</font>'; 
	}

	?>

<table bgcolor="#eeeeee" width="80%">
<tr><td>
<br>
<ul>
<li><font color="blue"><b>Welcome to oMail-admin <?php echo($version); ?> ! </b><br><br></font></li>

<li>This is a kind of "splash screen". To turn it off, 2 little simple things : <br><br>
<ul>
<li>Make sure that the <b>$sysadmin_mail</b> variable in config.php is set to something else
than <i>sysadmin@notdefined.yet</i> : <?php echo($smail); ?></li>
<li>And simply set the <b>$splash_screen</b> variable to <i>0</i> (at the very end of config.php) : 
<?php echo($splash); ?>.
</li>
</ul><br><br></li>

<li>
I would be glad if you could take a few seconds to fill up this form : it would greatly<br>
help me improve the scripts, and see how many and which kind of people are using it.<br>
Thanks in advance for your support!  
<br><br>All fields are of course completely optional. It's up to you :) I will keep these infos private in any case (no spam).

<form action="http://www.8304.ch/cgi-bin/formmail.pl" method="post">
<table border="0">

<tr><td align="right">Name:</td><td><small>
<input type="text" size="30" name="name"></small></td></tr>

<tr><td align="right">Company:</td><td><small>
<input type="text" size="30" name="company"></small></td></tr>

<tr><td align="right">Company URL:</td><td><small>
<input type="text" size="40" name="company_url" value="http://"></small></td></tr>
 
<tr><td align="right">Email:</td><td><small>
<input type="text" size="40" name="email"></small></td></tr>

<tr><td align="right">City, Country:</td><td><small>
<input type="text" size="40" name="country"> &nbsp; (must be filled with anything)</small></td></tr>

<tr><td align="right">Splash screen:</td><td><small>
<select name="splashScreen"><option>I find this splash screen ok, no problem</option>
<option>Yuk, please remove this annoying splash screen from the next versions!</option></select></small></td></tr>

<tr><td align="right">May I list you on the omail-admin homepage?</td><td><small>
<select name="listCompanyUrl"><option>No, please don't</option>
<option>Yes, you can list our company on your homepage as omail-admin user</option></select></small></td></tr>

<tr><td align="right">Announcements (a few times a year):</td><td><small>
<select name="announcementsML"><option>Yes, please send me a mail on new major release and bugfixes</option>
<option>No, no announcements please, I know www.freshmeat.net :)</option></select></small></td></tr>

<tr><td align="right">Devel Mailing List (low trafic):</td><td><small>
<select name="develML"><option>No subscription please.</option>
<option>Yes, please subscribe me to the devel mailing list</option></select></small></td></tr>

<tr><td align="right">How long are you using omail-admin?</td><td><small>
<select name="howlong">
<option value=""> - </option>
<option>it's my first try</option>
<option>a few weeks</option>
<option>a few months</option>
<option>more than 6 months</option>
</select>
</small></td></tr>

<tr><td align="right">Use of omail-admin:</td><td><small>
<select name="use">
<option value=""> - </option>
<option>For a lots of different domains (ISP mail server)</option>
<option>Just for one or a few domains (Company mail server)</option>
</select>
</small></td></tr>

<tr><td align="right">Average nb of users:</td><td><small>
<select name="nb_of_users">
<option value=""> - </option>
<option>Less than 10 mailboxes/alias per domain</option>
<option>Between 10 and 50 mailboxes/alias per domain</option>
<option>More than 50 mailboxes/alias per domain (web interface should be improved...)</option>
</select>
</small></td></tr>


<tr><td align="right"><br>Currently supported languages are:</td><td><br><small><font color="blue">
<?php
        reset($txt_langname);
        while(list ($id,$tmplang) = each ($txt_langname) ) {
                echo ($tmplang) . " ";
        }
?>
</font></small></td></tr>
<tr><td align="right">Which other language would you need?</td><td><small>
<input type="text" size="30" name="new_language">

<select name="new_language_iMayHelp">
<option value=""> - </option>
<option>I could help</option>
<option>Sorry, no time</option>
</select>


</small></td></tr>

<tr><td align="right" valign="top"><br>Other comments and feature requests:</td><td>
<small><textarea name="comment" cols="40" rows="5"></textarea></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>

<tr><td colspan="2" align="center"><small><br><input type="submit" value="Submit form! Thanks for your participation!"></small></td></tr>
</table>

<input type="hidden" name="recipient" value="omail-splash@omnis.ch">
<input type="hidden" name="subject" value="omail-admin <?php echo($version); ?> splash form">
<input type="hidden" name="redirect" value="http://<?php echo($HTTP_HOST); ?><?php echo($REQUEST_URI); ?>">
<input type="hidden" name="sender" value="<?php echo($REMOTE_ADDR); ?>"><input type="hidden" name="language" value="<?php echo($HTTP_ACCEPT_LANGUAGE); ?>">
<input type="hidden" name="version" value="<?php echo($cvs_version); ?>">
<input type="hidden" name="required" value="country">
</form>
</li>
</ul></td></tr>
</table>

<br>
</td></tr></table><!-- logo: to be created -->
<p><img src="http://omail.omnis.ch/logo_splash.gif?<?php echo(urlencode($version)); ?>" height="1" width="1"></p>
	<?php

}


?>
