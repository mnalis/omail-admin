<?

/* 
	-----
	Omail  -  A PHP/Perl based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

	htmlstuff.php
	-------------
	some usefull html things...

	16.jan.2k   om   First version

*/


function html_login() {

	global $script_url, $A, $lang, $version, $cookie_omail_last_domain;
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
[ <a href="<?php echo($script_url); ?>?setlang=<?php echo($id); ?>&<?=SID?>"> 
<?php echo($tmplang); ?></a> ] &nbsp;
                        <?php
                } else {
                                ?>
[ <font color="red"><?php echo($tmplang); ?></font> ] &nbsp;
                                <?php
                        }
        }
?>
</TD></TR></TABLE></TD>

<TD ROWSPAN="4" width=8 bgcolor="#ffffff">
<IMG SRC="srs.gif" width=16 height=250 alt=""></TD></TR>  
<TR><TD ALIGN="RIGHT"><?php echo($txt_domain_or_email[$lang]); ?>:&nbsp;</TD>
<TD ><input name="form_login" VALUE="<?php
if ($cookie_omail_last_domain) { print htmlentities($cookie_omail_last_domain); }
?>" size="20"></TD>
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
<TD COLSPAN=3><img src="sbs.gif" width=520 height=16 alt=""></TD>
<TD ALIGN="LEFT" BGCOLOR="#ffffff"><img src="sbc.gif" width=12 alt="" height=16></TD>
</TR>
</TABLE>
</CENTER>
</FORM>
        <?php


}


function html_head($title) {

	global $A, $domain;

	print "<HTML><HEAD><TITLE>$title</TITLE>";
	?>
<style type="text/css">
//<!--
body {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt}
th   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-weight: bold; background-color: #D3DCE3;}
td   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt;}
test.td   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt;}
form   {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt}
h1   {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16pt; font-weight: bold}
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

<SCRIPT>
  <!--
  function oW(myLink,windowName)
  {
  if(! window.focus)return;
  var myWin=window.open("",windowName,"height=500,width=500,dependent=yes,scrollbars=yes");
  myWin.focus();
  myLink.target=windowName;
  }
  <!--
  function oW2(myLink,windowName)
  {
  if(! window.focus)return;
  var myWin=window.open("",windowName,"height=610,width=600,dependent=yes,scrollbars=yes");
  myWin.focus();
  myLink.target=windowName;
  }
  //-->
</SCRIPT>

	<?php } else if ($A != "login" || $A != "" || $A != "checkin") { ?>

<SCRIPT>
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
	
	global $script, $A, $lang, $version;
	include("strings.php");

	?>
	
<TABLE cellpadding=10 cellspacing=0 border=0 width="80%">
<TR><TD BGCOLOR="#cccccc"><FONT SIZE="+3" COLOR="#000000"><b>oMail-Admin <?php echo($version); ?> - <?php echo($title); ?>
</b></FONT></TD>
<TD ALIGN="RIGHT" BGCOLOR="#cccccc">
<?php if ($popup) { ?>
[ <A HREF="<?php echo($script); ?>?<?=SID?>" onClick="return gO(this,true,true)"><?php echo($txt_close[$lang]); ?></A> ]
[ <A HREF="<?php echo($script); ?>?A=logout&<?=SID?>" onClick="return gO(this,true)"><?php echo($txt_logout[$lang]); ?></A> ]
<?php } elseif ($A == "menu") { ?>
[ <A HREF="<?php echo($script); ?>?A=logout&<?=SID?>"><?php echo($txt_logout[$lang]); ?></A> ]
[ <A HREF="<?php echo($script); ?>?A=menu&<?=SID?>"><?php echo($txt_refresh_menu[$lang]); ?></A> ]
<?php } ?>&nbsp;
</TD>
</TR>
<TR><TD COLSPAN="2" BGCOLOR="#eeeeee">
<?php echo($msg); ?>
</TD>
</TR>
</TABLE>
	
	<?php
}



function html_end() {

	print "</BODY></HTML>\n\n";	

}


function html_userform($userinfo, $action) {

	global $session, $script, $lang, $domain;
	include("strings.php");

	$fwd = 0;

	if ($action == "edit") {
		// find how many forwarders there are
		$nb_fwd = count($userinfo) - 2;
	}

	print "<form action=\"" . $script . "?<?=SID?>\" method=\"post\">";
	print "<table border=0>";	
	print "<tr><th align=right>" . $txt_username[$lang] . "&nbsp;</th>";	

	if ($action == "edit") {
	print "<td bgcolor=\"#DDDDDD\" align=left>" . $userinfo[1]. "@$domain&nbsp;</td></tr>";
	print "<input type=\"hidden\" name=\"username\" value=\"" . $userinfo[1] . "\">";
	} else {
	print "<td bgcolor=\"#DDDDDD\" align=left><input type=\"text\" name=\"username\" value=\"" . $userinfo[1]. "\" size=\"15\">@$domain&nbsp;</td></tr>";
	}

	print "<tr><th align=right>" . $txt_directory[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=left>" . $userinfo[2]. "&nbsp;</td></tr>";
	
	print "<tr><th align=right>" . $txt_passwd[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#DDDDDD\" align=left><input type=\"password\" name=\"passwd1\" value=\"\" size=\"9\">&nbsp;</td></tr>";

	print "<tr><th align=right>" . $txt_passwd[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=left><input type=\"password\" name=\"passwd2\" value=\"\" size=\"9\">&nbsp;</td></tr>";

	for ($i = 3; $i < ($nb_fwd + 7); $i++) {
		
		print "<tr><th align=right>" . $txt_fwd[$lang] . " " . ($i - 1) . "&nbsp;</th>";	

	if ($i/2 == floor($i/2)) { print "<td bgcolor=\"#DDDDDD\" align=left>"; }
					else { print "<td bgcolor=\"#CCCCCC\" align=left>"; }

		print "<input type=\"text\" name=\"fwd[]\" value=\"" . $userinfo[$i]. "\" size=\"25\">&nbsp;</td></tr>";

	}	

	print "<tr><th align=right>" . $txt_submit[$lang] . "&nbsp;</th>";	

	if ($i/2 == floor($i/2)) { print "<td bgcolor=\"#DDDDDD\" align=left>"; }
					else { print "<td bgcolor=\"#CCCCCC\" align=left>"; }

	print "<input type=\"hidden\" name=\"A\" value=\"parse\">";
	print "<input type=\"hidden\" name=\"action\" value=\"" . $action . "\">";
	print "<input type=\"submit\" value=\"" . $txt_submit[$lang]. "\">&nbsp;</td></tr>";
	
	print "</table>";	
	print "</form>";	
}



function html_listmailbox($result) {

	global $session, $script, $lang, $domain;
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



function html_respform($userinfo, $respinfo) {

	global $session, $script, $lang, $domain;
	include("strings.php");

	print "<form action=\"" . $script . "\" method=\"post\">";
	print "<table border=0>";	
	print "<form action=\"" . $script . "\" method=\"post\">";
	print "<tr><th align=right>" . $txt_username[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#DDDDDD\" align=left>" . $userinfo[1]. "@$domain&nbsp;</td></tr>";
	print "<input type=\"hidden\" name=\"username\" value=\"" . $userinfo[1] . "\">";

	print "<tr><th align=right>" . $txt_responder[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=left>";
	

	if ($userinfo[0]) { $checked_yes = "SELECTED"; $checked_no = ""; }
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
	print "<input type=\"submit\" value=\"" . $txt_submit[$lang]. "\">&nbsp;</td></tr>";
	
	print "</table>";	
	print "</form>";	
}



function html_delete_confirm($userinfo, $type) {

	global $session, $script, $lang, $domain;
	include("strings.php");

	// find type of account (mbox or alias)

	print "<br><table border=0>";	
	print "<tr><th align=right>" . $txt_username[$lang] . "&nbsp;</th>";	

	print "<td colspan=\"2\" bgcolor=\"#DDDDDD\" align=left>" . $userinfo[1]. "@$domain&nbsp;</td></tr>";


	print "<tr><th align=right>" . $txt_action[$lang] . "&nbsp;</th>";	
	print "<td bgcolor=\"#CCCCCC\" align=\"center\" valign=\"top\">";
	print "<small><font color=\"red\">";

	print "<form action=\"" . $script . "?<?=SID?>\" method=\"post\">";
	print "<input type=\"hidden\" name=\"A\" value=\"parse\">";
	print "<input type=\"hidden\" name=\"action\" value=\"delete_ok\">";
	print "<input type=\"hidden\" name=\"type\" value=\"". $type . "\">";
	print "<input type=\"hidden\" name=\"username\" value=\"" . $userinfo[1] . "\">";
	print "<br><input type=\"submit\" name=\"submit\" value=\"" . $txt_delete[$lang]. "\"></font>";
	print "</form></small></td><td bgcolor=\"#CCCCCC\" align=\"center\" valign=\"top\"><small>";
	print "<form action=\"" . $script . "\" method=\"post\">";
	print "<input type=\"hidden\" name=\"A\" value=\"menu\">";
	print "<br><input type=\"submit\" name=\"submit\" onClick=\"return gO(this,true,true)\" value=\"" . $txt_cancel[$lang]. "\">";
	print "</form></small></td></tr>";	
	print "</table>";	
}


function html_error($title, $msg) {

        global $script, $lang, $domain;
        include("strings.php");


}


?>
