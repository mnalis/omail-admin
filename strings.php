<?php
/* 
	-----------
	oMail-admin  -  A PHP4 based Vmailmgrd Web interface
	-----------

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: strings.php,v 1.38 2001/01/10 16:28:46 swix Exp $
        $Source: /cvsroot/omail/admin2/strings.php,v $

	strings.php
	-----------
	Strings file, to make translations in other languages easier.

	16.jan.2k   om      Converted the strings from an older version of omail
	23.jan.2k   om      Some updates 
	06.aug.2k   jc      Added spanish
	20.aug.2k   nv      Added italian
	19.sep.2k   ak      Added russian
	12.oct.2k   kg	    Added Danish
	19.oct.2k   hn+bt   Added Romanian
	29.nov.2k   ri	    Added Dutch
	29.nov.2k   hs      Added Japanese
	29.nov.2k   mg      Added Chinese
	08.jan.01   th      Added Swedish

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


$txt_langname=array(	"fr"=>"Français",
                        "de"=>"Deutsch",
			"da"=>"Dansk",
                        "en"=>"English",
                        "ja"=>"Japanese",
                        "tc"=>"Traditional chinese",
			"es"=>"Castellano",
			"nl"=>"Nederlands",
                        "it"=>"Italiano",
                        "ro"=>"Romana",
			"ru"=>"Russian",
			"sv"=>"Svenska");

$txt_charset=array(     "ru"=>"KOI8-R",
                        "fr"=>"",
                        "de"=>"",
			"da"=>"",
                        "en"=>"",
                        "ja"=>"euc-jp",
                        "tc"=>"gb2312",
			"es"=>"",
			"nl"=>"",
                        "it"=>"",
 			"ro"=>"",
			"sv"=>"");

$txt_login=array(	"ru"=>"ìÏÇÉÎ",
                        "fr"=>"Login",
			"de"=>"Login",
			"da"=>"Login",
			"en"=>"Login",
			"ja"=>"¥í¥°¥¤¥ó",
			"tc"=>"Login",
			"es"=>"Login",
			"nl"=>"Aanmelden",
			"it"=>"Login",
                        "ro"=>"Login",
			"sv"=>"Inloggning");

$txt_passwd=array(      "ru"=>"ğÁÒÏÌØ",
                        "fr"=>"Mot de passe",
			"de"=>"Passwort",
			"da"=>"Password",
			"en"=>"Password",
			"ja"=>"¥Ñ¥¹¥ï¡¼¥É",
			"tc"=>"±K½X",
			"es"=>"Contrase&ntilde;a",
			"nl"=>"Wachtwoord",
			"it"=>"Password",
                        "ro"=>"Parola",
			"sv"=>"Lösenord");

$txt_title=array(	"ru"=>"ôÉÔÕÌ(ú×ÁÎÉÅ)",
                        "fr"=>"Titre",
			"de"=>"Anrede",
			"da"=>"Titel",
			"en"=>"Title",
			"ja"=>"É¸Âê",
			"tc"=>"¼ĞÃD",
			"es"=>"T¡tulo",
			"nl"=>"Titel",
			"it"=>"Titolo",
                        "ro"=>"Titlu",
			"sv"=>"Titel");

$txt_firstname=array(	"ru"=>"éÍÑ",
			"fr"=>"Prénom",
			"de"=>"Vorname",
			"da"=>"Fornavn",
			"en"=>"Firstname",
			"ja"=>"Ì¾",
			"tc"=>"©m¤ó",
			"es"=>"Nombre",
			"nl"=>"Voornaam",
			"it"=>"Nome",
                        "ro"=>"Prenume",
			"sv"=>"Förnamn");

$txt_lastname=array(	"ru"=>"æÁÍÉÌÉÑ",
			"fr"=>"Nom",
			"de"=>"Name",
			"da"=>"Efternavn",
			"en"=>"Lastname",
			"ja"=>"»á",
			"tc"=>"¦W¦r",
			"es"=>"Apellido",
			"nl"=>"Achternaam",
			"it"=>"Cognome",
                        "ro"=>"Nume",
			"sv"=>"Efternamn");

$txt_adresse=array(	"ru"=>"áÄÒÅÓ",
                        "fr"=>"Adresse",
			"de"=>"Adresse",
			"da"=>"Adresse",
			"en"=>"Address",
			"ja"=>"½»½ê",
			"tc"=>"¦a§}",
			"es"=>"Direcci&oacute;n",
			"nl"=>"Adres",
			"it"=>"Indirizzo",
                        "ro"=>"Adresa",
			"sv"=>"Adress");

$txt_postalcode=array(	"ru"=>"ğÏŞÔ.éÎÄÅËÓ",
			"fr"=>"CP",
			"de"=>"PLZ",
			"da"=>"Postnr.",
			"en"=>"ZIP",
			"ja"=>"Í¹ÊØÈÖ¹æ",
			"tc"=>"¶l»¼°Ï¸¹",
			"es"=>"CP",
			"nl"=>"Postcode",
			"it"=>"CAP",
                        "ro"=>"Cod",
			"sv"=>"Postnr");


$txt_city=array(	"ru"=>"çÏÒÏÄ",
                        "fr"=>"Localité",
			"de"=>"Ort",
			"da"=>"By",
			"en"=>"City",
			"ja"=>"»Ô",
			"tc"=>"«°¥«",
			"es"=>"Ciudad",
			"nl"=>"Stad",
			"it"=>"Localit&agrave;",
                        "ro"=>"Oras",
			"sv"=>"Stad");

$txt_country=array(	"ru"=>"óÔÒÁÎÁ",
                        "fr"=>"Pays",
			"de"=>"Land",
			"da"=>"Land",
			"en"=>"Country",
			"ja"=>"¹ñ",
			"tc"=>"°ê®a",
			"es"=>"Pa&iacute;is",
			"nl"=>"Land",
			"it"=>"Stato",
                        "ro"=>"Tara",
			"sv"=>"Land");


$txt_phone=array(	"ru"=>"ôÅÌÅÆÏÎ",
                        "fr"=>"Téléphone",
			"de"=>"Telefon",
			"da"=>"Telefon",
			"en"=>"Phone",
			"ja"=>"ÅÅÏÃÈÖ¹æ",
			"tc"=>"¹q¸Ü¸¹½X",
			"es"=>"Teléfono",
			"nl"=>"Telefoon",
			"it"=>"Telefono",
                        "ro"=>"Telefon",
			"sv"=>"Telefon");

$txt_fax=array(		"ru"=>"æÁËÓ",
                        "fr"=>"Fax",
			"de"=>"Fax",
			"da"=>"Fax",
			"en"=>"Fax",
			"ja"=>"Fax",
			"tc"=>"¶Ç¯u¸¹½X",
			"es"=>"Fax",
			"nl"=>"Fax",
			"it"=>"Fax",
                        "ro"=>"Fax",
                        "sv"=>"Fax");

$txt_lang=array(	"ru"=>"ñÚÙË",
                        "fr"=>"Langue",
			"de"=>"Sprache",
			"da"=>"Sprog",
			"en"=>"Language",
			"ja"=>"¸À¸ì",
			"tc"=>"»y¨¥",
			"es"=>"Idioma",
			"nl"=>"Taal",
			"it"=>"Lingua",
                        "ro"=>"Limba",
			"sv"=>"Språk");

$txt_langs=array(	"ru"=>"òÕÓÓËÉÊ",
                        "fr"=>"Français",
			"de"=>"Deutsch",
			"da"=>"Dansk",
			"en"=>"English",
			"ja"=>"ÆüËÜ",
			"tc"=>"ÁcÅé¤¤¤å",
			"es"=>"Castellano",
			"nl"=>"Nederlands",
			"it"=>"Italiano",
                        "ro"=>"Romana",
			"sv"=>"Svenska");

$txt_homepage=array(	"ru"=>"URL",        // :)
                        "fr"=>"Homepage",
			"de"=>"Homepage",
			"da"=>"Homepage",
			"en"=>"Homepage",
			"ja"=>"¥Û¡¼¥à¥Ú¡¼¥¸",
			"tc"=>"Homepage",
			"es"=>"Homepage",
			"nl"=>"Homepage",
			"it"=>"homepage",
                        "ro"=>"Homepage",
			"sv"=>"Hemsida");

$txt_company=array(	"ru"=>"ïÒÇÁÎÉÚÁÃÉÑ",
                        "fr"=>"Entreprise",
			"de"=>"Firma",
			"da"=>"Firma",
			"en"=>"Company",
			"ja"=>"²ñ¼Ò",
			"tc"=>"¤½¥q",
			"es"=>"Empresa",
			"nl"=>"Bedrijf",
			"it"=>"Firma",
                        "ro"=>"Firma",
			"sv"=>"Företag");

$txt_position=array(	"ru"=>"äÏÌÖÎÏÓÔØ",
                        "fr"=>"Fonction",
			"de"=>"Funktion",
			"da"=>"Stilling",
			"en"=>"Position",
			"ja"=>"¸ª½ñ",
			"tc"=>"©Ò¦b¦a",
			"es"=>"Posici&oacute;n",
			"nl"=>"Functie",
			"it"=>"Posizione",
                        "ro"=>"Functie",
			"sv"=>"Funktion");

$txt_reason=array(	"ru"=>"ğÒÉŞÉÎÁ",
                        "fr"=>"Raison sociale",
			"de"=>"Grund",
			"da"=>"Grund",
			"en"=>"Reason",
			"ja"=>"ÍıÍ³",
			"tc"=>"­ì¦]",
			"es"=>"Raz&oacute;n",
			"nl"=>"Reden",
			"it"=>"Ragione sociale",
                        "ro"=>"Motiv",
			"sv"=>"Skäl");

$txt_notes=array(	"ru"=>"ğÒÉÍÅŞÁÎÉÅ",
                        "fr"=>"Notes",
			"de"=>"Notizen",
			"da"=>"Noter",
			"en"=>"Notes",
			"ja"=>"Ãí°Õ",
			"tc"=>"³Æµù",
			"es"=>"Notas",
			"nl"=>"Notitie",
                        "it"=>"Note",
                        "ro"=>"Note",
			"sv"=>"Anteckningar");

$txt_alias=array(	"ru"=>"áÌÉÁÓ",
                        "fr"=>"Alias",
			"de"=>"Alias",
			"da"=>"Alias",
			"en"=>"Alias",
			"ja"=>"ÊÌÌ¾",
			"tc"=>"§O¦W",
			"es"=>"Alias",
			"nl"=>"Alias",
			"it"=>"Alias",
                        "ro"=>"Alias",
			"sv"=>"Alias");

$txt_fwd=array(		"ru"=>"Fwd",
                        "fr"=>"Fwd",
			"de"=>"Fwd",
			"da"=>"Fwd",
			"en"=>"Fwd",
			"ja"=>"Å¾Á÷Àè",
			"tc"=>"Âà±H",
			"es"=>"Fwd",
			"nl"=>"Fwd",
			"it"=>"Fwd",
                        "ro"=>"Fwd",
			"sv"=>"Fwd");

$txt_destination=array(	"ru"=>"Destination",
                        "fr"=>"Destination",
			"de"=>"Weiterleitung an",
			"da"=>"Destination",
			"en"=>"Destination",
			"ja"=>"°¸Àè",
			"tc"=>"¥Øªº¦a",
			"es"=>"Destino",
			"nl"=>"Bestemming",
			"it"=>"Destinatario",
                        "ro"=>"Destinatar",
			"sv"=>"Destionation");

$txt_email=array(	"ru"=>"Email",
                        "fr"=>"E-mail",
			"de"=>"E-Mail",
			"da"=>"E-Mail",
			"en"=>"Email",
			"ja"=>"E-mail",
			"tc"=>"¹q¤l¶l¥ó",
			"es"=>"E-mail",
			"nl"=>"E-mail",
			"it"=>"E-mail",
                        "ro"=>"E-mail",
			"sv"=>"E-post");

$txt_edit=array(	"ru"=>"éÚÍÅÎÉÔØ",
                        "fr"=>"Modifier",
			"de"=>"&Auml;ndern",
			"da"=>"Rediger",
			"en"=>"Edit",
			"ja"=>"ÊÔ½¸",
			"tc"=>"½s¿è",
			"es"=>"Editar",
			"nl"=>"Aanpassen",
			"it"=>"Modifica",
                        "ro"=>"Modifica",
			"sv"=>"Redigera");

$txt_delete=array(	"ru"=>"õÄÁÌÉÔØ",
                        "fr"=>"Supprimer",
			"de"=>"L&ouml;schen",
			"da"=>"Slet",
			"en"=>"Delete",
			"ja"=>"ºï½ü",
			"tc"=>"§R°£",
			"es"=>"Eliminar",
			"nl"=>"Verwijderen",
			"it"=>"Elimina",
                        "ro"=>"Sterge",
			"sv"=>"Ta bort");

$txt_cancel=array(	"ru"=>"ğÒÅÒ×ÁÔØ",
                        "fr"=>"Annuler",
			"de"=>"Abbrechen",
			"da"=>"Annuler",
			"en"=>"Cancel Operation",
			"ja"=>"Áàºî¼è¤ê»ß¤á",
			"tc"=>"¨ú®ø",
			"es"=>"Cancelar",
			"nl"=>"Annuleren",
			"it"=>"Annulla",
                        "ro"=>"Anuleaza",
			"sv"=>"Avbryt");

$txt_activate=array(	"ru"=>"áËÔÉ×ÉÒÏ×ÁÔØ",
                        "fr"=>"Activer",
			"de"=>"Aktivieren",
			"da"=>"Aktiver",
			"en"=>"Activate",
			"ja"=>"Æ°ºî³«»Ï",
			"tc"=>"±Ò¥Î",
			"es"=>"Activar",
			"nl"=>"Activeren",
			"it"=>"Attiva",
                        "ro"=>"Activeaza",
			"sv"=>"Aktivera");

$txt_account_name=array("ru"=>"óŞÅÔ",
                        "fr"=>"Nom du compte",
			"de"=>"Kontoname",
			"da"=>"Konto navn",
			"en"=>"Account name",
			"ja"=>"¥¢¥«¥¦¥ó¥ÈÌ¾",
			"tc"=>"±b¸¹",
			"es"=>"Nombre de Cuenta",
			"nl"=>"Account naam",
			"it"=>"Account",
                        "ro"=>"Nume de Cont",
			"sv"=>"Kontonamn");

$txt_account_type=array("ru"=>"ôÉĞ",
                        "fr"=>"Type de compte",
			"de"=>"Kontoart",
			"da"=>"Kontoart",
			"en"=>"Account type",
			"ja"=>"¥¢¥«¥¦¥ó¥È¡¦¥¿¥¤¥×",
			"tc"=>"±b¸¹«¬ºA",
			"es"=>"Tipo de Cuenta",
			"nl"=>"Account soort",
			"it"=>"Tipo di Account",
                        "ro"=>"Tipul contului",
			"sv"=>"Typ av konto");

$txt_domain=array(	"ru"=>"äÏÍÅÎ",
                        "fr"=>"Domaine",
			"de"=>"Domain",
			"da"=>"Domæne",
			"en"=>"Domain",
			"ja"=>"¥É¥á¥¤¥ó",
			"tc"=>"Domain",
			"es"=>"Dominio",
			"nl"=>"Domein",
			"it"=>"Dominio",
                        "ro"=>"Domeniu",
			"sv"=>"Domännamn");

$txt_domain_or_email=array(	"ru"=>"áÄÒÅÓ Email",
                        "fr"=>"Adresse e-mail ou Domaine",
			"de"=>"E-Mail Adresse oder Domain-Name",
			"da"=>"E-Mail Adresse eller Domæne Navn",
			"en"=>"Email Address or Domain Name",
			"ja"=>"¥É¥á¥¤¥ó",
			"tc"=>"¹q¤l¶l¥ó¦ì¸m©ÎDomain¦WºÙ",
			"es"=>"E-mail o Dominio",
			"nl"=>"E-mail adres of Domein naam",
			"it"=>"Indirizzo E-mail o Dominio",
                        "ro"=>"Adresa de E-mail",
			"sv"=>"Domännamn eller e-post-adress");

$txt_status=array(	"ru"=>"óÔÁÔÕÓ",
                        "fr"=>"Etat",
			"de"=>"Zustand",
			"da"=>"Status",
			"en"=>"Status",
			"ja"=>"¾õÂÖ",
			"tc"=>"ª¬ºA",
			"es"=>"Estado",
			"nl"=>"Status",
			"it"=>"Stato",
                        "ro"=>"Status",
			"sv"=>"Status");

$txt_login=array(	"ru"=>"ìÏÇÉÎ",
                        "fr"=>"Login",
			"de"=>"Login",
			"da"=>"Login",
			"en"=>"Login",
			"ja"=>"¥í¥°¥¤¥ó",
			"tc"=>"Login",
			"es"=>"Login",
			"nl"=>"Inloggen",
			"it"=>"Login",
                        "ro"=>"Login",
			"sv"=>"Användarnamn");

$txt_delete=array(	"ru"=>"õÄÁÌÉÔØ",
                        "fr"=>"Effacer",
			"de"=>"L&ouml;schen",
			"da"=>"Slet",
			"en"=>"Delete",
			"ja"=>"ºï½ü",
			"tc"=>"§R°£",
			"es"=>"Borrar",
			"nl"=>"Verwijderen",
			"it"=>"Elimina",
                        "ro"=>"Sterge",
			"sv"=>"Ta bort");

$txt_info=array(	"ru"=>"éÎÆÏ",
                        "fr"=>"Info",
			"de"=>"Info",
			"da"=>"Info",
			"en"=>"Info",
			"ja"=>"¥¤¥ó¥Õ¥©¥á¡¼¥·¥ç¥ó",
			"tc"=>"Info",
			"es"=>"Info",
			"nl"=>"Info",
			"it"=>"Info",
                        "ro"=>"Info",
			"sv"=>"Info");

$txt_action=array(	"ru"=>"äÅÊÓÔ×ÉÅ",
                        "fr"=>"Action",
			"de"=>"Aktion",
			"da"=>"Aktion",
			"en"=>"Action",
			"ja"=>"Áàºî",
			"tc"=>"°Ê§@",
			"es"=>"Acción",
			"nl"=>"Actie",
			"it"=>"Azione",
                        "ro"=>"Actiune",
			"sv"=>"Funktion");

$txt_no_accounts=array(	"ru"=>"îÅÔ ÔÁËÏÇÏ ĞÏÌØÚÏ×ÁÔÅÌÑ",
                        "fr"=>"Aucun compte enregistr&eacute;.",
			"de"=>"Keine Konten eingerichtet",
			"da"=>"Ingen registrede Konto",
			"en"=>"No registred accounts",
			"ja"=>"Ì¤ÅĞÏ¿¤Î¥¢¥«¥¦¥ó¥È",
			"tc"=>"µL¤wµù¥U±b¸¹",
			"es"=>"Ninguna cuenta registrada",
			"nl"=>"Geen geregistreerde accounts",
			"it"=>"Non ci sono account",
                        "ro"=>"Nu exista conturi inregistrate",
			"sv"=>"Inget konto finns registrerat");

$txt_no_domains=array(	"ru"=>"îÅÔ ÔÁËÏÇÏ ÄÏÍÅÎÁ",
                        "fr"=>"Aucun domaine enregistr&eacute;",
			"de"=>"Keine Domains registriert",
			"da"=>"Ingen registrede Domæner",
			"en"=>"No registred domains",
			"ja"=>"Ì¤ÅĞÏ¿¤Î¥É¥á¥¤¥ó",
			"tc"=>"µL¤wµù¥Udomains",
			"es"=>"Ningún dominio registrado",
			"nl"=>"Geen geregistreerde domeinen",
			"it"=>"Non ci sono domini",
                        "ro"=>"Nu exista domenii inregistrate",
			"sv"=>"Inget domännamn finns registrerat");

$txt_new=array(		"ru"=>"îÏ×ÙÊ",
                        "fr"=>"Nouveau",
			"de"=>"Neu",
			"da"=>"Ny",
			"en"=>"New",
			"ja"=>"New",
			"tc"=>"·sªº",
			"es"=>"Nuevo",
			"nl"=>"Nieuw",
			"it"=>"Nuovo",
                        "ro"=>"Nou",
			"sv"=>"Ny");

$txt_avail_domain=array(	"ru"=>"÷ÏÚÍÏÖÎÙÅ ÄÏÍÅÎÙ",
                        "fr"=>"Domaines disponibles",
			"de"=>"Verf&uuml;gbare Domains",
			"da"=>"Oprettede Domæner",
			"en"=>"Available domains",
			"ja"=>"´ûÂ¸¥É¥á¥¤¥ó",
			"tc"=>"¥i¥Î¤§domains",
			"es"=>"Dominios disponibles",
			"nl"=>"Beschikbare domeinen",
			"it"=>"Domini disponibili",
                        "ro"=>"Domenii disponibile",
			"sv"=>"Tillgängliga domännamn");

$txt_own_domains=array(	"ru"=>"÷ÁÛÉ ÄÏÍÅÎÙ",
                        "fr"=>"Vos domaines",
			"de"=>"Ihre eigenen Domains",
			"da"=>"Deres egne Domæner",
			"en"=>"Your own domains",
			"ja"=>"¤¢¤Ê¤¿¼«¿È¤Î¥É¥á¥¤¥ó",
			"tc"=>"¥»¨­domains",
			"es"=>"Tus propios dominios",
			"nl"=>"Uw eigen domeinen",
			"it"=>"I tuoi domini",
                        "ro"=>"Domeniile dumneavoastra",
			"sv"=>"Dina egna domännamn");

$txt_open_domains=array(	 "ru"=>"ïÔËÒÙÔÙÅ ÄÏÍÅÎÙ",
                        "fr"=>"Les domaines publics",
			"de"=>"&Ouml;ffentlich zug&auml;ngliche Domains",
			"da"=>"Åbne Domæner",
			"en"=>"The open domains",
			"ja"=>"¥ª¡¼¥×¥óÃæ¤Î¥É¥á¥¤¥ó",
			"tc"=>"¶}©ñ¤§domains",
			"es"=>"Los dominios públicos",
			"nl"=>"De open domeinen",
			"it"=>"Domini pubblici",
                        "ro"=>"Domenii publice",
			"sv"=>"Öppna domännamn");

$txt_no_domain=array(	"ru"=>"îÅÔ ÄÏÍÅÎÏ×",
                        "fr"=>"Pas de domaine",
			"de"=>"Keine Domains",
			"da"=>"Ingen Domæner",
			"en"=>"No Domains",
			"ja"=>"Â¸ºß¤·¤Ê¤¤¥É¥á¥¤¥ó",
			"tc"=>"µL¦¹domains",
			"es"=>"Sin dominios",
			"nl"=>"Geen domeinen",
			"it"=>"Non c'&egrave; alcun dominio",
                        "ro"=>"Nici un domeniu",
			"sv"=>"Inget domännamn");

$txt_please_choose=array(	 "ru"=>"ğÏÖÁÌÕÊÓÔÁ ×ÙÂÅÒÉÔÅ",
                        "fr"=>"Faites votre choix",
			"de"=>"Bitte w&auml;hlen",
			"da"=>"Vælg venligst",
			"en"=>"Please choose",
			"ja"=>"Áª¤ó¤Ç²¼¤µ¤¤",
			"tc"=>"½Ğ¿ï¾Ü",
			"es"=>"Elige",
			"nl"=>"Maake een keuze",
			"it"=>"Scegli",
                        "ro"=>"Alegeti",
			"sv"=>"V.v. välj");

$txt_subdomain_name=array(	"ru"=>"éÍÑ ĞÏÄÄÏÍÅÎÁ",
                        "fr"=>"Nom du sous-domaine",
			"de"=>"Name der Subdomain",
			"da"=>"Subdomain Name",
			"en"=>"Subdomain Name",
			"ja"=>"¥µ¥Ö¥É¥á¥¤¥óÌ¾",
			"tc"=>"Subdomain ¦WºÙ",
			"es"=>"Subdominio",
			"nl"=>"Subdomeinnaam",
			"it"=>"Sottodominio",
                        "ro"=>"Numele subdomeniului",
			"sv"=>"Namn på underdomän");


$txt_authorized_chars=array(	 "ru"=>"éÓĞÏÌØÚÕÊÔÅ ÔÏÌØËÏ: a-z, 0-9 É '-'",
                        "fr"=>"Caractères autorisés : a-z, 0-9 et '-'",
			"de"=>"Zugelassen sind nur a-z, 0-9 und '-'",
			"da"=>"Benyt venligst kun a-z, 0-9 eller '-'",
			"en"=>"Only use a-z, 0-9 and '-'",
			"ja"=>"»ÈÍÑ²ÄÇ½Ê¸»ú a-z, 0-9 and '-'",
			"tc"=>"¥u¯à¨Ï¥Î a-z, 0-9 and '-'",
			"es"=>"Usá sólo a-z, 0-9 y '-'",
			"nl"=>"Gebruik alleen a-z, 0-9 en '-'",
			"it"=>"Usa solo a-z, 0-9 e '-'",
                        "ro"=>"Folositi numai a-z, 0-9 si '-'",
			"sv"=>"V.v. använd endast a-z o-9 och '-'");



$txt_current_language = array( "ru"=>"òÕÓÓËÉÊ",
 "en" => "English",
 "ja" => "ÆüËÜ¸ì",
 "tc"=>"ÁcÅé¤¤¤å",
 "fr" => "Français",
 "de" => "Deutsch",
 "da" => "Dansk",
 "es" => "Castellano",
 "nl"=>"Nederlands",
 "it"=>"Italiano",
 "ro"=>"Romana",
 "sv"=>"Svenska");


$txt_hello = array( 
 "ru"=>"úÄÒÁÓÔ×ÕÊÔÅ",
 "en" => "Hello",
 "ja" => "¤³¤ó¤Ë¤Á¤Ï",
 "tc"=>"Hello",
 "fr" => "Bonjour",
 "de" => "Hallo",
 "da" => "Hallo",
 "es" => "Hola",
 "nl"=>"Hallo",
 "it"=>"Salve",
 "ro"=>"Salut",
 "sv"=>"Hej");

$txt_menu = array( 
 "ru" => "íÅÎÀ",
 "en" => "Menu",
 "ja" => "¥á¥Ë¥å¡¼",
 "tc" => "Menu",
 "fr" => "Menu",
 "de" => "Menu",
 "da" => "Menu",
 "es" => "Menú",
 "nl"=>"Menu",
 "it" => "Menu",
 "ro"=>"Meniu",
 "sv"=>"Meny");

$txt_welcome = array(
 "ru" => "äÏÂÒÏ ĞÏÖÁÌÏ×ÁÔØ",
 "en" => "Welcome!",
 "ja" => "¤è¤¦¤³¤½!",
 "tc" => "Åwªï",
 "fr" => "Bienvenue !",
 "de" => "Willkommen!",
 "da" => "Velkommen!",
 "es" => "Welcome!",
 "nl"=>"Welkom",
 "it"=>"Welcome!",
 "ro"=>"Bine ati venit!",
 "sv"=>"Välkommen");

$txt_menu_domain_descr = array(
 "ru" => "äÏÂÒÏ ĞÏÖÁÌÏ×ÁÔØ × ÇÌÁ×ÎÏÅ ÍÅÎÀ ÁÄÍÉÎÉÓÔÒÁÔÏÒÁ ÄÏÍÅÎÁ", 
 "en" => "Welcome in the domain administration main menu",
 "ja" => "¥É¥á¥¤¥ó´ÉÍı¥á¥Ë¥å¡¼",
 "fr" => "Bienvenue dans le menu principal de l'administration de votre domaine",
 "de" => "Willkommen im Administrations-Hauptmenu Ihrer Maildomain",
 "da" => "Velkommen til Administrations menuen",
 "es" => "Bienvenido al menú de administraci&oacute;n de dominios",
 "nl"=>"Welkom in het domeinbeheer hoofdmenu",
 "it"=>"Benvenuto al menu principale per la gestione del dominio",
 "ro"=>"Bine ati venit in meniul principal de administrare a domeniului",
 "sv"=>"Välkommen till huvudmenyn för administration av dina e-post-konton");

$txt_menu_account_descr = array(
 "ru" => "äÏÂÒÏ ĞÏÖÁÌÏ×ÁÔØ × ÇÌÁ×ÎÏÅ ÍÅÎÀ ÕĞÒÁ×ÌÅÎÉÑ ×ÁÛÉÍ ĞÏŞÔÏ×ÙÍ ÑİÉËÏÍ",
 "en" => "Welcome your mail account administration main menu",
 "ja" => "¥á¡¼¥ë¥¢¥«¥¦¥ó¥È´ÉÍı¥á¥Ë¥å¡¼",
 "tc" => "Åwªï¶i¤J­Ó¤H±b¸¹ºŞ²z¿ï³æ",
 "fr" => "Bienvenue dans le menu principal de l'administration de votre compte E-Mail",
 "de" => "Willkommen im Administration-Hauptmenu ihres Mailkontos",
 "da" => "Velkommen til Administrations menu for Mailkonto",
 "es" => "Bienvenido al menú de administraci&oacute;n de cuenta de correo",
 "nl"=>"Welkom in uw mailaccountbeheer hoofdmenu",
 "it"=>"Benvenuto al menu principale per la gestione del tuo account di posta",
 "ro"=>"Bine ati venit in meniul principal de administrare al contului dumneavoastra",
 "sv"=>"Välkommen till administrationsmenyn för ditt / dina e-post-konton");


$txt_edit = array(
"ru"=>"éÚÍÅÎÉÔØ",
 "en" => "Edit",
 "ja" => "ÊÔ½¸",
 "tc" => "½s¿è",
 "fr" => "Editer",
 "de" => "&Auml;ndern",
 "da" => "Rediger",
 "es" => "Editar",
 "nl"=>"Aanpassen",
 "it"=>"Modifica",
 "ro"=>"Modifica",
 "sv"=>"Ändra");


$txt_mailbox = array(
 "ru"=>"Email",
 "en" => "Mailbox",
 "ja" => "¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "¹q¤l¶l¥ó«H½c",
 "fr" => "Messages",
 "de" => "E-Mail",
 "da" => "E-Mail",
 "es" => "Casilla",
 "nl"=>"Postbus",
 "it"=>"Casella",
 "ro"=>"Mesaje",
 "sv"=>"E-post-konto");

$txt_list = array( 
 "ru"=>"óĞÉÓÏË",
 "en" => "List",
 "ja" => "¥ê¥¹¥È",
 "tc" => "¦C¥X",
 "fr" => "Liste",
 "de" => "Zurück",
 "da" => "Tilbage",
 "es" => "Lista",
 "nl"=>"Lijst",
 "it"=>"Lista",
 "ro"=>"Lista",
 "sv"=>"Lista");

$txt_add_user = array( 
"ru"=>"îÏ×ÙÊ ÑİÉË",
 "en" => "Add_User",
 "ja" => "ÄÉ²Ã¥æ¡¼¥¶",
 "tc" => "·s¼W¨Ï¥ÎªÌ",
 "fr" => "Ajouter un utilisateur",
 "de" => "Neues Konto",
 "da" => "Ny konto",
 "es" => "Agregar usuario",
 "nl"=>"Toevoegen gebruiker",
 "it"=>"Aggiungi account",
 "ro"=>"Adauga utilizator",
 "sv"=>"Nytt konto");

$txt_add_alias = array(
"ru"=>"îÏ×ÙÊ ÁÌÉÁÓ", 
 "en" => "Add_Alias",
 "ja" => "ÄÉ²Ã¥¨¥¤¥ê¥¢¥¹",
 "tc" => "·s¼W§O¦W",
 "fr" => "Ajouter un alias",
 "de" => "Neuer Alias",
 "da" => "Ny Alias",
 "es" => "Agregar Alias",
 "nl"=>"Toevoegen Alias",
 "it"=>"Aggiungi Alias",
 "ro"=>"Adauga Alias",
 "sv"=>"Nytt alias");

$txt_delete = array(
"ru"=>"õÄÁÌÉÔØ",
 "en" => "Delete",
 "ja" => "ºï½ü",
 "tc" => "§R°£",
 "fr" => "Supprimer",
 "de" => "L&ouml;schen",
 "da" => "Slet",
 "es" => "Eliminar",
 "nl"=>"Verwijderen",
 "it"=>"Elimina",
 "ro"=>"Sterge",
 "sv"=>"Ta bort");


$txt_info = array(
"ru"=>"éÎÆÏ", 
 "en" => "Info",
 "ja" => "¥¤¥ó¥Õ¥©¥á¡¼¥·¥ç¥ó",
 "tc" => "Info",
 "fr" => "Info",
 "de" => "Info",
 "da" => "Info",
 "es" => "Info",
 "nl"=>"Info",
 "it"=>"Info",
 "ro"=>"Info",
 "sv"=>"Info");


$txt_login = array( 
"ru"=>"ìÏÇÉÎ",
 "en" => "Login",
 "ja" => "¥í¥°¥¤¥ó",
 "tc" => "Login",
 "fr" => "Connexion",
 "de" => "Anmeldung",
 "da" => "Login",
 "es" => "Ingresar",
 "nl"=>"Aanmelden",
 "it"=>"Login",
 "ro"=>"Login",
 "sv"=>"Logga in");

$txt_login_again = array(
"ru"=>"÷ÏÊÔÉ ÓÎÏ×Á", 
 "en" => "Login again",
 "ja" => "ºÆ¥í¥°¥¤¥ó",
 "tc" => "½Ğ­«·slogin",
 "fr" => "Nouvelle connexion",
 "de" => "Neue Anmeldung",
 "da" => "Login igen",
 "es" => "Reingresar",
 "nl"=>"Opnieuw aanmelden",
 "it"=>"Esegui nuovamente il Login",
 "ro"=>"Re-login",
 "sv"=>"Logga in igen");

$txt_please_login = array(
"ru"=>"ğÏÖÁÌÕÊÓÔÁ ÉÄÅÎÔÉÆÉÃÉÒÕÊÔÅ ÓÅÂÑ, ÉÓĞÏÌØÚÕÑ ×ÁÛ ĞÏŞÔÏ×ÙÊ ÌÏÇÉÎ, ÄÏÍÅÎ É ĞÁÒÏÌØ", 
 "en" => "Please Identify Yourself with your domain and password.",
 "ja" => "¥É¥á¥¤¥ó¤È¥Ñ¥¹¥ï¡¼¥É¤òÆşÎÏ²¼¤µ¤¤¡£",
 "tc" => "½Ğ¿é¤Jdomain©M±K½X",
 "fr" => "Veillez vous identifier a l'aide du nom de domaine et de votre mot de passe",
  "de" => "M&ouml;chten Sie die Konten und Aliase einer Domain administrieren, 
           so melden Sie sich bitte mit dem Domainnamen (z.B. <i>testdomain.de</i>) und 
    	   dem dazugeh&ouml;rigen Passwort an. Wollen Sie
	   ein bestimmtes Mailkonto verwalten, so geben Sie die E-Mail-Adresse (z.B.
	   <i>hans@testdomain.de</i>) und das zugeh&ouml;rige Passwort ein.",
 "da" => "Identificer Dem venligst med domæne & password",
 "es" => "Por favor ingrese su nombre de usuario o dominio y contrase&ntilde;a",
 "nl"=>"Meld u aan met uw domeinnaam en wachtwoord",
 "it"=>"Per favore inserisci il tuo dominio e la password.",
 "ro"=>"Introduceti domeniul si parola",
 "sv"=>"V.v. logga in med ditt domännamn och lösenord");

$txt_update_list = array( 
 "ru"=>"ïÂÎÏ×ÉÔØ",
 "en" => "Update_List",
 "ja" => "¹¹¿·¥ê¥¹¥È",
 "tc" => "§ó·s¦Cªí",
 "fr" => "Réactualiser Liste",
 "de" => "Liste aktualisieren",
 "da" => "Opdater Liste",
 "es" => "Actualizar",
 "nl"=>"Lijst verversen",
 "it"=>"Aggiorna_Lista",
 "ro"=>"Reactualizare lista",
 "sv"=>"Uppdatera lista");

$txt_pw_chg_ok = array( "ru"=>"ğÁÒÏÌØ ÕÓĞÅÛÎÏ ÉÚÍÅÎÅÎ", 
 "en" => "Password has been changed sucessfully",
 "ja" => "¥Ñ¥¹¥ï¡¼¥É¤¬ÊÑ¹¹¤µ¤ì¤Ş¤·¤¿",
 "tc" => "±K½X¤w¸g§ó·s¦¨¥\ ",
 "fr" => "Le mot de passe a été changé avec succès",
 "de" => "Das Passwort wurde erfolgreich ge&auml;ndert",
 "da" => "Passwordet er blevet ændret",
 "es" => "El password ha sido cambiado con &eacute;xito",
 "nl"=>"Wachtwoord is sucessvol gewijzigd",
 "it"=>"La password &egrave; stata correttamente cambiata",
 "ro"=>"Parola a fost schimbata cu success",
 "sv"=>"Lösenordet har ändrats");

$txt_password_str = array( 
"ru"=>"ğÁÒÏÌØ",
 "en" => "Password",
 "ja" => "¥Ñ¥¹¥ï¡¼¥É",
 "tc" => "±K½X",
 "fr" => "Mot de passe",
 "de" => "Passwort",
 "da" => "Password",
 "es" => "Contrase&ntilde;a",
 "nl"=>"Wachtwoord",
 "it"=>"Password",
 "ro"=>"Parola",
 "sv"=>"Lösenord");

$txt_domain_name = array( 
"ru"=>"äÏÍÅÎ",
 "en" => "Domain",
 "ja" => "¥É¥á¥¤¥ó",
 "tc" => "Domain",
 "fr" => "Domaine",
 "de" => "Domain",
 "da" => "Domæne",
 "es" => "Dominio",
 "nl"=>"Domein",
 "it"=>"Dominio",
 "ro"=>"Domeniu",
 "sv"=>"Domännamn");


$txt_dom_ident = array(
"ru"=>"á×ÔÏÒÉÚÁÃÉÑ ÄÏÍÅÎÁ", 
 "en" => "Domain Authentication",
 "ja" => "¥É¥á¥¤¥ó¤ÎÇ§¾Ú",
 "tc" => "Domain »{ÃÒ",
 "fr" => "Identification du Domaine",
 "de" => "Authentifizierung",
 "da" => "E-Mail Administration",
 "es" => "Autentificación de dominio",
 "nl"=>"Domein authenticatie",
 "it"=>"Autenticazione",
 "ro"=>"Autentificarea Domeniului",
 "sv"=>"Domännamnsidentifiering");

$txt_secu_fail_dname = array(
"ru"=>"ïÛÉÂËÁ: éÍÑ ÄÏÍÅÎÁ ÄÏÌÖÎÏ ÂÙÔØ × ÆÏÒÍÅ domain.ext", 
 "en" => "Security Failure : domain name must have the form domain.ext",
 "ja" => "¥»¥­¥å¥ê¥Æ¥£¡¼¾å¤ÎÌäÂê : Àµ¤·¤¤·Á¼°¤Î¥É¥á¥¤¥óÌ¾¤È¤¹¤ë¤³¤È",
 "tc" => "¦w¥ş©Ê¥¢±Ñ¡Gdomain©úºÙ¥²¶·¬O²Å¦Xdomain.txt±o¼Ë¦¡",
 "fr" => "Erreur de sécurité : le nom de domaine doit être de la forme domaine.ext",
 "de" => "Authentifizierungsfehler : Der Domainname muss in der Form domain.ext eingegeben werden",
 "da" => "Fejl! Domænet skal have form som domæne.ext",
 "es" => "Alerta de seguridad: El dominio de ser de la forma dominio.ext",
 "nl"=>"Algemene beschermingsfout: Complete domeinnaam moet opgegeven worden",
 "it"=>"Errore: il dominio deve essere della forma dominio.tld",
 "ro"=>"Eroare: numele domeniul trebuie sa fie de forma domeniu.ext",
 "sv"=>"Fel: domännamnet ska skrivas på formen domännamn.nu");

$txt_action_menu_title = array(
"ru"=>"íÅÎÀ ÄÏÍÅÎÁ",
 "en" => "Menu for domain",
 "ja" => "¥É¥á¥¤¥óÍÑ¥á¥Ë¥å¡¼",
 "tc" => "Domain¤§menu",
 "fr" => "Menu pour domaine",
 "de" => "Menu für Domain",
 "da" => "Menu for Domæne",
 "es" => "Menú para el dominio",
 "nl"=>"Menu voor domein",
 "it"=>"Menu del dominio",
 "ro"=>"Meniu pentru domeniu",
 "sv"=>"Meny för domännamn");

$txt_err_action_not_found = array(
"ru"=>"äÅÊÓÔ×ÉÅ ÎÅ ÎÁÊÄÅÎÏ", 
 "en" => "Action not found",
 "ja" => "Áàºî¤¬¸«¤Ä¤«¤ê¤Ş¤»¤ó",
 "tc" => "¥¼µo²{¤§°Ê§@",
 "fr" => "Action non trouvée",
 "de" => "Befehl nicht gefunden",
 "da" => "Aktion ikke fundet",
 "es" => "Comando no encontrado",
 "nl"=>"Opdracht niet gevonden",
 "it"=>"Comando errato",
 "ro"=>"Comanda gresita",
 "sv"=>"Kommandot kunde inte hittas");

$txt_title_info = array(
"ru"=>"úÁĞÉÓØ ĞÏÌØÚÏ×ÁÔÅÌÑ",
 "en" => "Entry for user",
 "ja" => "¥æ¡¼¥¶ÍÑ¥¨¥ó¥È¥ê¡¼",
 "tc" => "¨Ï¥ÎªÌªº¶i¤JÂI",
 "fr" => "Enregistrement concernant",
 "de" => "Benutzerinformation f&uuml;r",
 "da" => "Info for",
 "es" => "Entrada para el usuario",
 "nl"=>"Gebruikers informatie",
 "it"=>"Scheda dell'utente",
 "ro" => "Date despre utilizator",
 "sv" => "Information för");

$txt_real_name = array(
 "ru"=>"éÍÑ",
 "en" => "Real Name",
 "ja" => "ËÜÌ¾",
 "tc" => "¯u¹ê©m¦W",
 "fr" => "Nom complet",
 "de" => "Name",
 "da" => "Navn",
 "es" => "Nombre y Apellido",
 "nl"=>"Naam",
 "it"=>"Nome e Cognome",
 "ro" => "Nume complet",
 "sv" => "Namn");

$txt_email_adr = array(
 "ru"=>"áÄÒÅÓ Email", 
 "en" => "Email Address",
 "ja" => "Email ¥¢¥É¥ì¥¹",
 "tc" => "Email Address",
 "fr" => "Adresse E-Mail",
 "de" => "E-Mail-Adresse",
 "da" => "E-Mail Adresse",
 "es" => "Dirección de correo",
"nl"=>"Email Adres",
 "it"=>"Indirizzo E-Mail",
 "ro" => "Adresa de E-mail",
 "sv" => "E-post-adress");

$txt_account_type = array(
 "ru"=>"ôÉĞ", 
 "en" => "Account Type",
 "ja" => "¥¢¥«¥¦¥ó¥È¡¦¥¿¥¤¥×",
 "tc" => "±b¸¹«¬ºA",
 "fr" => "Type de compte",
 "de" => "Kontoart",
 "da" => "Kontoart",
 "es" => "Tipo de cuenta",
 "nl"=>"Account soort",
 "it"=>"Tipo di Account",
 "ro" => "Tipul contului",
 "sv" => "Kontotyp");

$txt_mailbox_size = array(
"ru"=>"òÁÚÍÅÒ",
 "en" => "Size",
 "ja" => "¥µ¥¤¥º",
 "tc" => "¤j¤p",
 "fr" => "Taille",
 "de" => "Gr&ouml;&szlig;e",
 "da" => "Størrelse",
 "es" => "Tama&ntilde;o",
"nl"=>"Grootte",
 "it"=>"Dimensione",
 "ro" => "Dimensiune",
 "sv" => "Storlek");

$txt_numb_of_msg = array(
 "ru"=>"ëÏÌÉŞÅÓÔ×Ï ĞÉÓÅÍ", 
 "en" => "Number of Messages",
 "ja" => "¥á¥Ã¥»¡¼¥¸¿ô",
 "tc" => "°T®§¸¹½X",
 "fr" => "Nombre de messages",
 "de" => "Anzahl E-Mails",
 "da" => "Antal E-Mails",
 "es" => "Cantidad de Mensajes",
"nl"=>"Aantal Berichten",
 "it"=>"Numero di messaggi",
 "ro" => "Numarul mesajelor",
 "sv" =>"Antal meddelanden");

$txt_read_mails = array(
"ru"=>"óÔÁÒÙÈ ĞÉÓÅÍ",
 "en" => "Old Mails",
 "ja" => "¸Å¤¤¥á¡¼¥ë",
 "tc" => "ÂÂ«H¥ó",
 "fr" => "Anciens Mails",
 "de" => "Alte Mails",
 "da" => "Gamle Mails",
 "es" => "Mensajes viejos",
"nl"=>"Oude Berichten",
 "it"=>"Messaggi vecchi",
 "ro" => "Mesaje vechi",
 "sv" => "Gamla meddelanden");

$txt_unread_mails = array(
"ru"=>"îÏ×ÙÈ ĞÉÓÅÍ",
 "en" => "Unread Mails",
 "ja" => "Ì¤ÆÉ¤Î¥á¡¼¥ë",
 "tc" => "¤£¥iÅª«H¥ó",
 "fr" => "Nouveaux Mails",
 "de" => "Neue Mails",
 "da" => "Nye Mails",
 "es" => "Mensajes nuevos",
"nl"=>"Ongelezen berichten",
 "it"=>"Messaggi nuovi",
 "ro" => "Mesaje noi",
 "sv" => "Olästa meddelanden");

$txt_read = array(
"ru"=>"şÉÔÁÔØ",
 "en" => "Read",
 "ja" => "ÆÉ¤à",
 "tc" => "Åª¨ú",
 "fr" => "Lire",
 "de" => "Lesen",
 "da" => "Læst",
 "es" => "Leer",
"nl"=>"Lees",
 "it"=>"Letti",
 "ro" => "Citeste",
 "sv" => "Läs"); 

$txt_last_mail_arrived = array(
"ru"=>"îÏ×ÁÑ ĞÏŞÔÁ ĞÒÉÛÌÁ ×", 
 "en" => "Last Mail came on",
 "ja" => "ºÇ¸å¤Î¥á¡¼¥ë¤ò¼õ¿® on",
 "tc" => "³Ì«á¨ì¹F¶l¥ó",
 "fr" => "Dernière arrivée de mail",
 "de" => "Neueste E-Mail",
 "da" => "Seneste E-Mail",
 "es" => "Último correo",
"nl"=>"Laatste Bericht gearriveerd op",
 "it"=>"Ultimo messaggio ricevuto il",
 "ro" => "Ultimul mesaj primit la",
 "sv" => "Nyaste meddelandet kom");

$txt_last_mailbox_access = array(
"ru"=>"ğÏÓÌÅÄÎÅÅ ÏÂÒÁİÅÎÉÅ Ë ÑİÉËÕ", 
 "en" => "Last Mailbox access",
 "ja" => "ºÇ¸å¤Î¥á¡¼¥ë¥Ü¥Ã¥¯¥¹¥¢¥¯¥»¥¹",
 "tc" => "³Ì«á¦s¨ú¹q¤l«H½c®É¶¡",
 "fr" => "Dernier accès à la boîte",
 "de" => "Letzter Zugriff",
 "da" => "Sidst der har været adgang til Mailkonto",
 "es" => "Último chequeo",
"nl"=>"Laatste toegang tot postbus",
 "it"=>"Ultimo accesso alla casella avvenuto il",
 "ro" => "Ultimul access la Mailbox",
 "sv" => "Sista användning av e-post-konto"); 

$txt_quota = array(
"ru"=>"ïÇÒÁÎÉŞÅÎÉÅ",
 "en" => "Quota",
 "ja" => "À©¸Â",
 "tc" => "Quota",
 "fr" => "Quota",
 "de" => "Grenzen",
 "da" => "Quota",
 "es" => "Quota",
"nl"=>"Limiet",
 "it"=>"Quota",
 "ro" => "Limita",
 "sv" => "Utrymmesbegränsning");

$txt_title_edit = array(
 "ru" => "éÚÍÅÎÅÎÉÅ ÄÁÎÎÙÈ ĞÏÌØÚÏ×ÁÔÅÌÑ", 
 "en" => "Account Edit for user",
 "ja" => "¥æ¡¼¥¶ÍÑ¥¢¥«¥¦¥ó¥ÈÊÔ½¸",
 "tc" => "­×§ï¨Ï¥ÎªÌ±b¸¹",
 "fr" => "Modification des données pour",
 "de" => "Kontodaten &auml;ndern für",
 "da" => "Rediger konto for bruger", 
 "es" => "Edición de cuenta para",
"nl"=>"Account aanpassing voor gebruiker",
 "it"=>"Modifica dell'account di",
 "ro" => "Modifica cont pentru",
 "sv" =>"Ändra kontonamn för användare");

$txt_username = array(
"ru"=>"ìÏÇÉÎ",
 "en" => "Username",
 "ja" => "¥æ¡¼¥¶Ì¾",
 "tc" => "¨Ï¥ÎªÌ¦WºÙ",
 "fr" => "Nom d'utilisateur",
 "de" => "Benutzername",
 "da" => "Brugernavn",
 "es" => "Nombre de usuario",
"nl"=>"Gebruikersnaam",
 "it"=>"Nome Utente",
 "ro" => "Nume utilizator",
 "sv" => "Användarnamn"); 

$txt_old = array(
 "ru"=>"óÔÁÒÙÊ", 
 "en" => "Old",
 "ja" => "Old",
 "tc" => "ÂÂªº",
 "fr" => "Ancien",
 "de" => "Altes",
 "da" => "Gammel",
 "es" => "Viejos",
"nl"=>"Oud",
 "it"=>"Vecchio",
 "ro" => "Vechi",
 "sv" => "Gammal");

$txt_new = array(
 "ru" => "îÏ×ÙÊ",
 "en" => "New",
 "ja" => "New",
 "tc" => "·sªº",
 "fr" => "Nouveau",
 "de" => "Neu",
 "da" => "Ny",
 "es" => "Nuevos",
"nl"=>"Nieuw",
 "it"=>"Nuovo",
 "ro" => "Noi",
 "sv" => "Ny");

$txt_newuser = array( 
"ru"=>"îÏ×ÙÊ ÑİÉË",
 "en" => "New Mailbox",
 "ja" => "¿·µ¬¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "·s¼W«H½c",
 "fr" => "Nouvelle Boîte",
 "de" => "Neue Mailbox",
 "da" => "Ny Mailkonto",
 "es" => "Nuevo usuario",
"nl"=>"Nieuwe Postbus",
 "it"=>"Nuova casella",
 "ro" => "Mailbox nou",
 "sv" => "Nytt e-post-konto");

$txt_newalias = array(
"ru"=>"îÏ×ÙÊ ÁÌÉÁÓ", 
 "en" => "New Alias",
 "ja" => "¿·µ¬¥¨¥¤¥ê¥¢¥¹",
 "tc" => "·s¼W§O¦W",
 "fr" => "Nouvel Alias",
 "de" => "Neue Alias",
 "da" => "Nyt Alias",
 "es" => "Nuevo alias",
"nl"=>"Nieuwe Alias",
 "it"=>"Nuovo Alias",
 "ro" => "Alias nou",
 "sv" => "Nytt alias");

$txt_and_again = array( 
"ru"=>"åİÅ ÒÁÚ",
 "en" => "And again",
 "ja" => "And again",
 "tc" => "¦A¤@¦¸",
 "fr" => "Vérification",
 "de" => "Nochmals",
 "da" => "Gentag",
 "es" => "Verificación",
"nl"=>"Nogmaals",
 "it"=>"Verifica",
 "ro" => "Verifica",
 "sv" => "Repetera en gång till");

$txt_edit_result = array(
"ru"=>"éÚÍÅÎÅÎÉÅ ÎÁÓÔÒÏÅË ĞÏÌØÚÏ×ÁÔÅÌÑ : òÅÚÕÌØÔÁÔ", 
 "en" => "Edit User Setup : Result",
 "ja" => "Edit User Setup : Result",
 "tc" => "½s¿è¨Ï¥ÎªÌªº³]©w: µ²ªG",
 "fr" => "Modification des données : resultats",
 "de" => "Änderung der Kontodaten: Ergebnis",
 "da" => "Redigering af Bruger : Resultat",
 "es" => "Modificación de usuario: Resultado",
"nl"=>"Aanpassen gebruikersinstellingen: Resultaat",
 "it"=>"Modifica dell'account: Risultato",
 "ro" => "Modificarea contului: rezultat",
 "sv" => "Ändring av konto: Resultat");

$txt_entry_for_user = array( 
"ru"=>"úÁĞÉÓØ ĞÏÌØÚÏ×ÁÔÅÌÑ",
 "en" => "Entry for user",
 "ja" => "¥æ¡¼¥¶ÍÑ¥¨¥ó¥È¥ê¡¼",
 "tc" => "¨Ï¥ÎªÌªº¶i¤JÂI",
 "fr" => "Données concernant",
 "de" => "Daten von",
 "da" => "Adgang for bruger",
 "es" => "Entrada para el usuario",
"nl"=>"Gebruikersinformatie",
 "it"=>"Scheda dell'utente",
 "ro" => "Date utilizator",
 "sv" => "Inställningar för konto");

$txt_title_mailbox = array(
"ru"=>"ñİÉË",
 "en" => "Mailbox of",
 "ja" => "¥á¡¼¥ë¥Ü¥Ã¥¯¥¹ of",
 "tc" => "«H½cÄİ©ó",
 "fr" => "Boîte aux lettres de",
 "de" => "Briefkasten von",
 "da" => "Mailkonto for",
 "es" => "Casilla de",
"nl"=>"Postbus van",
 "it"=>"Casella E-Mail di",
 "ro" => "Mailbox pentru",
 "sv" => "E-post-konto för");

$txt_delete_account = array( 
"ru"=>"õÄÁÌÅÎÉÅ",
 "en" => "Account Deletion",
 "ja" => "¥¢¥«¥¦¥ó¥Èºï½ü",
 "tc" => "±b¸¹§R°£",
 "fr" => "Effacement de compte",
 "de" => "Konto löschen",
 "da" => "Slet konto",
 "es" => "Eliminar cuenta",
"nl"=>"Account verwijdering",
 "it"=>"Elimina Account",
 "ro" => "Sterge cont",
 "sv" => "Ta bort konto");

$txt_confirm_delete = array( 
"ru"=>"ğÏÄÔ×ÅÒÄÉÔÅ ÕÄÁÌÅÎÉÅ...",
 "en" => "Delete Request : Please confirm...",
 "ja" => "ºï½üÍ×µá : ³ÎÇ§¤¯¤À¤µ¤¤...",
 "tc" => "­n¨D§R°£: ½Ğ½T»{...",
 "fr" => "Effacement demandé : veuillez confirmer...",
 "de" => "L Ö S C H E N",
 "da" => "Sletter : Bekræft venligst",
 "es" => "Eliminar cuenta: Por favor confirme...",
"nl"=>"Verwijderen: Bevestigen AUB...",
 "it"=>"Eliminazione: Per favore conferma...",
 "ro" => "Stergere cont: Confirmati",
 "sv" => "Ta bort: v.v. bekräfta"); 

$txt_delete_account_confirm = array(
"ru"=>"÷Ù Õ×ÅÒÅÎÙ, ŞÔÏ ÈÏÔÉÔÅ ÕÄÁÌÉÔØ ÅÇÏ?", 
 "en" => "Are you sure you want to delete this account?",
 "ja" => "¤Û¤ó¤È¤¦¤Ë¥¢¥«¥¦¥ó¥È¤òºï½ü¤·¤Æ¤â¤è¤í¤·¤¤¤Ç¤¹¤«?",
 "tc" => "½T©w§R°£³o­Ó±b¸¹¶Ü?",
 "fr" => "Etes-vous certain de vouloir effacer le compte suivant?",
 "de" => "Bitte bestätigen Sie die Löschung des folgenden Kontos:",
 "da" => "Er De sikker på at slette denne konto?",
 "es" => "¿Está seguro que desea eliminar esta cuenta?",
"nl"=>"Zeker weten dat dit account verwijderd moet worden?",
 "it"=>"Sei sicuro di voler cancellare questo account?",
 "ro" => "Sunteti sigur ca vreti sa stergeti contul?",
 "sv" =>"Är du säker på att du vill ta bort detta konto?");

$txt_delete_for_user = array( 
 "ru"=>"ÄÌÑ ĞÏÌØÚÏ×ÁÔÅÌÑ",
 "en" => "for user",
 "ja" => "for ¥æ¡¼¥¶",
 "tc" => "¹ï©ó¨Ï¥ÎªÌ",
 "fr" => "pour l'utilisateur",
 "de" => "",
 "da" => "For bruger",
 "es" => "para el usuario",
"nl"=>"voor gebruiker",
 "it"=>"per l'utente",
 "ro" => "pentru utilizatorul",
 "sv" => "för användare");

$txt_delete_remove_now = array(
"ru"=>"ÂÕÄÅÔ <I>ÂÅÚ×ÏÚ×ÒÁÔÎÏ</I> ÕÄÁÌÅÎ", 
 "en" => "will remove it now, <I>definitely</I>",
 "ja" => "¤¹¤°¤Ëºï½ü¤µ¤ì¤Ş¤¹¡£ <I>³Î¼Â¤Ë</I>",
 "tc" => "§Y±N²¾°£,<I>½T©w¶Ü?</I>",
 "fr" => "va détruire le compte, <I>irremédiablement</I>",
 "de" => "Löscht das Konto unwiderruflich",
 "da" => "Sletter nu, <I>Kan ikke genskabes</I>",
 "es" => "la eliminará ahora <I>definitivamente</I>",
"nl"=>"wordt nu <I>definitief</I> verwijderd",
 "it"=>"lo canceller&agrave; ora <I>definitivamente</I>",
 "ro" => "va fi sters acum, <I>definitiv</I>",
 "sv" => "Tar bort kontot nu, <I>kan ej återskapas</I>");

$txt_delete_backto_list = array(
"ru"=>"ĞÅÒÅÊÄÅÔ Ë ÓĞÉÓËÕ <I>ÂÅÚ</I> ÕÄÁÌÅÎÉÑ",
 "en" => "will bring you back to the list, <I>without</i> deleting anything",
 "ja" => "¥ê¥¹¥È¤ËÌá¤ê¤Ş¤¹¡£ <I>without</i> ºï½ü",
 "tc" => "±N¦^¨ì¿ï³æ,<I>¤£§R°£</I>¥ô¦ó¸ê®Æ",
 "fr" => "vous ramènera à la liste, <i>sans</i> rien effacer",
 "de" => "Zurück zur Liste, <I>ohne</I> eine Löschung vorzunehmen",
 "da" => "Tilbage, <I>uden</I> at slette",
 "es" => "te llevará de regreso a la lista, <I>sin</I> eliminar nada",
"nl"=>"wordt terug gebracht naar de lijst, <I>zonder</I> iets te verwijderen",
 "it"=>"ti riporter&agrave; alla lista <I>senza</I> cancellare nulla",
 "ro" => "va trimite la lista, <I>fara</I> a sterge nimic",
 "sv" => "Tillbaka, <I>utan</I> att ta bort");

$txt_deleted_sucessfully = array(
"ru"=>"ÕÓĞÅÛÎÏ ÕÄÁÌÅÎ",
 "en" => "deleted sucessfully",
 "ja" => "ºï½ü´°Î»",
 "tc" => "¦¨¥\§R°£",
 "fr" => "a été effacé avec succès",
 "de" => "ist gelöscht worden",
 "da" => "er slettet",
 "es" => "exitosamente eliminada",
"nl"=>"sucessvol verwijderd",
 "it"=>"cancellato con successo",
 "ro" => "stergerea a fost efectuata",
 "sv" => "är borttaget");

$txt_delete_result = array(
 "ru" => "úÁĞÒÏÓ ÎÁ ÕÄÁÌÅÎÉÅ : òÅÚÕÌØÔÁÔ",
 "en" => "Delete Request : Result",
 "ja" => "ºï½üÍ×µá : ·ë²Ì",
 "tc" => "­n¨D§R°£: µ²ªG",
 "fr" => "Effacement : Résultat",
 "de" => "Löschung : Ergebnis",
 "da" => "Slet (?) : Resultat",
 "es" => "Eliminar cuenta: Resultado",
"nl"=>"Verwijder verzoek: Resultaat",
 "it"=>"Eliminazione dell'account: Risultato",
 "ro" => "Stergere: Resultat",
 "sv" =>"Ta bort: Resultat");

$txt_delete_deletion = array(
"ru"=>"õÄÁÌÅÎÉÅ",
 "en" => "Deletion of",
 "ja" => "ºï½ü of",
 "tc" => "§R°£",
 "fr" => "Effacement de",
 "de" => "Löschung von",
 "da" => "Slettet af",
 "es" => "Eliminación de",
"nl"=>"Verwijdering van",
 "it"=>"Eliminazione di",
 "ro" => "Stergerea lui",
 "sv" => "Borttagning av");

$txt_for_user = array(
 "ru"=>"ÄÌÑ ĞÏÌØÚÏ×ÁÔÅÌÑ", 
 "en" => "for user",
 "ja" => "¥æ¡¼¥¶ÍÑ",
 "tc" => "¹ï©ó¨Ï¥ÎªÌ",
 "fr" => "pour le compte",
 "de" => "Für den Benutzer",
 "da" => "For Konto",
 "es" => "para el usuario",
"nl"=>"voor gebruiker",
 "it"=>"per l'utente",
 "ro" => "pentru utilizatorul",
 "sv" => "för användare");

$txt_title_list = array(
"ru"=>"óĞÉÓÏË ÄÌÑ ÄÏÍÅÎÁ",
 "en" => "Listing for domain",
 "ja" => "¥É¥á¥¤¥óÍÑ¥ê¥¹¥ÈÉ½¼¨",
 "tc" => "¦C¥X©Ò¦³ªºdomain",
 "fr" => "Liste pour le domaine",
 "de" => "Listing für die Domain",
 "da" => "Listing for Domæne",
 "es" => "Listado para el dominio",
"nl"=>"Overzicht voor domein",
 "it"=>"Lista del dominio",
 "ro" => "Listing pentru domeniul",
 "sv" =>"Lista på domännamn");

$txt_domain_info = array(
"ru"=>"éÎÆÏÒÍÁÃÉÑ Ï ÄÏÍÅÎÅ",
 "en" => "Domain Information",
 "ja" => "¥É¥á¥¤¥ó¡¦¥¤¥ó¥Õ¥©¥á¡¼¥·¥ç¥ó",
 "tc" => "Domain ¸ê°T",
 "fr" => "Informations sur le domaine",
 "de" => "Domaininformationen",
 "da" => "Domæneinformation",
 "es" => "Información de Dominio",
"nl"=>"Domein Informatie",
 "it"=>"Informazione sul dominio",
 "ro" => "Informatii despre domeniul",
 "sv" =>"Information om domännamn");

$txt_date_of_creation = array(
"ru"=>"äÁÔÁ ÓÏÚÄÁÎÉÑ", 
 "en" => "Date of creation",
 "ja" => "ºîÀ®Æü",
 "tc" => "«Ø¥ß¤é´Á",
 "fr" => "Date de mise en place",
 "de" => "Datum der Konto-Einrichtung",
 "da" => "Oprettet d.",
 "es" => "Fecha de creación",
"nl"=>"Aanmaakdatum",
 "it"=>"Data di creazione",
 "ro" => "Data crearii",
 "sv" => "Skapat");

$txt_last_change = array(
"ru"=>"ğÏÓÌÅÄÎÅÅ ÉÚÍÅÎÅÎÉÅ", 
 "en" => "Last Change",
 "ja" => "ºÇ½ª¹¹¿·",
 "tc" => "³Ì«á§ó°Ê",
 "fr" => "Dernier changement",
 "de" => "Letzte Änderung",
 "da" => "Sidst ændret",
 "es" => "Último cambio",
"nl"=>"Laatst gewijzigd",
 "it"=>"Ultima modifica",
 "ro" => "Ultima modificare",
 "sv" =>"Senaste ändring");

$txt_how_many_mailbox = array(
"ru"=>"ëÏÌÉŞÅÓÔ×Ï ÑİÉËÏ×", 
 "en" => "How many Mailboxes",
 "ja" => "How many ¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "¦³¦h¤Ö«H½c",
 "fr" => "Combien de Comptes",
 "de" => "Wieviele Konten",
 "da" => "Hvor mange konti",
 "es" => "Cuántas casillas",
"nl"=>"Hoeveel postbussen",
 "it"=>"Quante caselle di posta",
 "ro" => "Cate casute postale",
 "sv" => "Hur många e-post-konton");

$txt_how_many_alias = array(
"ru"=>"ëÏÌÉŞÅÓÔ×Ï ÁÌÉÁÓÏ×", 
 "en" => "How many Aliases",
 "ja" => "How many ¥¨¥¤¥ê¥¢¥¹",
 "tc" => "¦³¦h¤Ö§O¦W",
 "fr" => "Combiens d'Alias",
 "de" => "Vieviele Aliase",
 "da" => "Hvor mange Aliases",
 "es" => "Cúantos Aliases",
"nl"=>"Hoeveel aliassen",
 "it"=>"Quanti alias",
 "ro" => "Cate alias-uri",
 "sv" =>"Hur många alias");

$txt_total_size = array( 
"ru"=>"ïÂİÉÊ ÒÁÚÍÅÒ ÑİÉËÏ×",
 "en" => "Total Size of Mailboxes",
 "ja" => "¥á¡¼¥ë¥Ü¥Ã¥¯¥¹¤Î¹ç·×¥µ¥¤¥º",
 "tc" => "©Ò¦³«H½c¤j¤p¤§Á`©M",
 "fr" => "Taille totale des Boîtes aux lettres",
 "de" => "Gesamtegr&ouml;&szlig;e aller Briefk&auml;sten",
 "da" => "Samlet størrelse af Mailkontis",
 "es" => "Tamaño total de las casillas",
"nl"=>"Totale grootte van de postbussen",
 "it"=>"Dimensione totale delle caselle di posta",
 "ro" => "Dimensiunea totala a casutelor postale",
 "sv" =>"Total storlek för e-post-konton");

$txt_biggest_mailbox = array(
"ru"=>"óÁÍÙÊ ÔÑÖÅÌÙÊ ÑİÉË", 
 "en" => "Biggest Mailbox",
 "ja" => "ºÇÂç¤Î¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "³Ì¤jªº«H½c",
 "fr" => "Compte le plus encombrant",
 "de" => "Gr&ouml;&szlgi;ter Briefkasten",
 "da" => "Største Mailkonto",
 "es" => "Casilla más grande",
"nl"=>"Grootste Postbus",
 "it"=>"Massima dimensione di una casella di posta",
 "ro" => "Cea mai mare casuta postala",
 "sv" =>"Största e-post-konto");

$txt_mailboxes = array(
"ru"=>"ñİÉËÉ",
 "en" => "Mailboxes",
 "ja" => "¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "«H½c",
 "fr" => "Boîtes aux lettres",
 "de" => "Liste aller Konten",
 "da" => "Mailkonti",
 "es" => "Casillas",
"nl"=>"Postbussen",
 "it"=>"Caselle di posta",
 "ro" => "Casute postale",
 "sv" => "E-post-konton");

$txt_smallmailboxes = array(
 "ru"=>"ÑİÉËÏ×", 
 "en" => "mailboxes",
 "ja" => "¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "«H½c",
 "fr" => "boîtes aux lettres",
 "de" => "accounts",
 "da" => "mailkonti",
 "es" => "casillas",
"nl"=>"postbussen",
 "it"=>"caselle di posta",
 "ro" => "casute postale",
 "sv" => "e-post-konton");

$txt_aliases = array(
"ru"=>"áÌÉÁÓÙ", 
 "en" => "Aliases",
 "ja" => "¥¨¥¤¥ê¥¢¥¹",
 "tc" => "§O¦W",
 "fr" => "Aliases",
 "de" => "Liste aller Aliase",
 "da" => "Aliases",
 "es" => "Aliases",
"nl"=>"Aliassen",
 "it"=>"Alias",
 "ro" => "Alias-uri",
 "sv" => "Alias");

$txt_smallaliases = array(
"ru"=>"ÁÌÉÁÓÏ×", 
 "en" => "aliases",
 "ja" => "¥¨¥¤¥ê¥¢¥¹",
 "tc" => "§O¦W",
 "fr" => "aliases",
 "de" => "aliase",
 "da" => "aliases",
 "es" => "aliases",
"nl"=>"aliassen",
 "it"=>"alias",
 "ro" => "aliasuri",
 "sv" =>"alias");

$txt_back_to_begining = array(
"ru"=>"÷ ÎÁŞÁÌÏ...", 
 "en" => "Back to the beginning...",
 "ja" => "»Ï¤á¤ËÌá¤ë...",
 "tc" => "¦^¨ì°_ÂI",
 "fr" => "Retour au d&eacute;but...",
 "de" => "Zurück zum Anfang...",
 "da" => "Tilbage til begyndelsen",
 "es" => "Volver al inicio...",
"nl"=>"Terug naar het begin...",
 "it"=>"Torna all'inizio...",
 "ro" => "Inapoi...",
 "sv" => "Tillbaka till början");

$txt_you_have_to_be_sysadmin_for_that = array(
"ru"=>"éÚ×ÉÎÉÔÅ, ĞÒÁ×ÅÊ ÎÅ È×ÁÔÁÅÔ!", 
 "en" => "Sorry, you have to be sysadmin to do that!",
 "ja" => "¤¹¤ß¤Ş¤»¤ó¡¢¼Â¹Ô¤Ç¤­¤ë¤Î¤Ï´ÉÍı¼Ô¤À¤±¤Ç¤¹!",
 "tc" => "©êºp,¥u¦³¨t²ÎºŞ²z¤~¦³Åv¤O°õ¦æ¦¹¥H°Ê§@",
 "fr" => "D&eacute;sol&eacute; vous devez etre administrateur pour cela !",
 "de" => "Nicht erlaubt: Um diese Operation asuf&ouml;hren zu k&ouml;nnen, m&uuml;ssen Sie Administrator sein!",
 "da" => "Du skal være systemadministrator",
 "es" => "¡Debes ser el administrador de sistema para hacer eso!",
"nl"=>"U heeft systeembeheer rechten nodig hiervoor",
 "it"=>"Hai bisogno dei privilegi di amministratore per farlo!",
 "ro" => "Trebuie sa fiti administrator pentru a putea face asta!",
 "sv" =>"Tyvärr måste du vara systemansvarig för att kunna utföra detta");

$txt_user_already_exists = array(
"ru"=>"éÚ×ÉÎÉÔÅ. ÔÁËÏÊ ÕÖÅ ÅÓÔØ",
 "en" => "Sorry, user already exists, please choose another one!",
 "ja" => "¤¹¤ß¤Ş¤»¤ó¡¢¥æ¡¼¥¶¤Ï´û¤ËÂ¸ºß¤·¤Æ¤¤¤Ş¤¹¡£Â¾¤òÁª¤ó¤Ç¤¯¤À¤µ¤¤!",
 "tc" => "©êºp,¨Ï¥ÎªÌ¤w¸g¦s¦b¡A½Ğ¿ï¾Ü¥t¥~¤@­Ó¨Ï¥ÎªÌ¦WºÙ",
 "fr" => "D&eacute;sol&eacute; mais ce nom est deja utilisé !",
 "de" => "Folgender Fehler ist aufgetreten : Der Benutzer existiert schon",
 "da" => "Brugeren eksisterer allerede, vælg venligst en anden!",
 "es" => "¡El usuario ya existe!",
"nl"=>"Gebruiker bestaat reeds, kies een andere!",
 "it"=>"L'utente esiste gi&agrave;. Scegli un altro nome.",
 "ro" => "Nume de utilizator deja existent, alegeti altul!",
 "sv" => "Användarnamn finns redan, v.v. välj ett annat");

$txt_user_doesnt_exists = array(
"ru"=>"éÚ×ÉÎÉÔÅ, ÔÁËÏÊ ÎÅ ÎÁÊÄÅÎ",
 "en" => "Sorry, user not found",
 "ja" => "¤¹¤ß¤Ş¤»¤ó¡¢¥æ¡¼¥¶¤¬¸«¤Ä¤«¤ê¤Ş¤»¤ó",
 "tc" => "©êºp,¨Ã¥¼§ä¨ì¦¹¤@¨Ï¥ÎªÌ",
 "fr" => "Désolé, aucun utilisateur avec ce nom",
 "de" => "Folgender Fehler ist aufgetreten : Der Benutzer existiert nicht",
 "da" => "Bruger ikke fundet.",
 "es" => "No se ha encontrado el usuario",
"nl"=>"Gebruiker niet gevonden",
 "it"=>"Utente non trovato",
 "ro" => "Utilizatorul nu exista",
 "sv" =>"Användärnamnet kan inte hittas");

$txt_err_dom_not_registred = array(
"ru"=>"îÅÔ ÔÁËÏÇÏ ÄÏÍÅÎÁ", 
 "en" => "Domain not registred on server",
 "ja" => "¥É¥á¥¤¥ó¤¬¥µ¡¼¥Ğ¤ËÅĞÏ¿¤µ¤ì¤Æ¤¤¤Ş¤»¤ó",
 "tc" => "Domain¨Ã¥¼¦b¨t²Î¤Wµn°O",
 "fr" => "Domaine non enregistré sur le serveur",
 "de" => "Domain nicht auf dem Server gespeichert",
 "da" => "Domænet er ikke registreret på serveren",
 "es" => "Este dominio no se halla en el servidor",
"nl"=>"Domein niet geregistreerd op deze server",
 "it"=>"Quel dominio non &egrave; disponibile su questo server",
 "ro" => "Domeniul nu exista pe server",
 "sv" => "Domännamnet är inte registrerat på servern");

$txt_bad_passwd_for_domain = array(
"ru"=>"îÅĞÒÁ×ÉÌØÎÙÊ ĞÁÒÏÌØ ÄÌÑ ÕĞÒÁ×ÌÅÎÉÑ ÄÏÍÅÎÏÍ", 
 "en" => "Bad Password for Domain manager",
 "ja" => "¥É¥á¥¤¥ó¤Î´ÉÍı¼Ô¤È¤·¤ÆÁê±ş¤·¤¯¤Ê¤¤¥Ñ¥¹¥ï¡¼¥É¤Ç¤¹",
 "tc" => "DomainºŞ²zªº±b¸¹¿ù»~",
 "fr" => "Mot de passe erroné pour l'administrateur du domaine",
 "de" => "Falsches Passwort für Domainadministrator",
 "da" => "Passwordet er ikke gyldigt",
 "es" => "Contrase&ntilde;a inválida para administrador de dominios",
"nl"=>"Foutief wachtwoord voor Domeinbeheerder",
 "it"=>"Password per l'amministrazione del dominio errata",
 "ro" => "Parola gresita pentru administratorul domeniului",
 "sv" => "Fel lösenord för domänadministration");

$txt_error = array(
 "ru"=>"ïÛÉÂËÁ",
 "en" => "Error",
 "ja" => "¥¨¥é¡¼",
 "tc" => "¿ù»~",
 "fr" => "Erreur",
 "de" => "Fehler",
 "da" => "Fejl",
 "es" => "Error",
"nl"=>"Algemene beschermingsfout",
 "it"=>"Errore",
 "ro" => "Eroare",
 "sv" => "Fel");

$txt_more_fwd=array(	"ru"=>"åİÅ Fwd",
			"fr"=>"Plus de Fwd",
			"de"=>"Weitere Fwd",
			"da"=>"Mere Fwd",
			"en"=>"More Fwd",
			"ja"=>"Å¾Á÷Àè More",
			"tc"=>"§ó¦hÂà±H",
			 "es" => "Más Fwd",
			"nl"=>"Meer Fwd",
			"it"=>"Altri Fwd",
                         "ro" => "Alte Fwd",
			"sv" => "Fler Fwd");

$txt_responder=array(	"ru"=>"á×ÔÏÏÔ×ÅÔ",
			"fr"=>"Répondeur",
			"de"=>"Autoresponder",
			"da"=>"Ferie",
			"en"=>"Vacation",
			"ja"=>"µÙÆü",
			"tc"=>"¦Û°Ê¦^À³",
			 "es" => "Autoresponder",
			"nl"=>"Auto-antwoord",
			"it"=>"Autoresponder",
                         "ro" => "Auto-raspuns",
			"sv" =>"Automatiskt svar");

$txt_directory=array(	"ru"=>"ğÁĞËÁ",
			"fr"=>"Répertoire",
			"de"=>"Verzeichnis",
			"da"=>"Mappe",
			"en"=>"Directory",
			"ja"=>"Êİ´É¾ì½ê",
			"tc"=>"¥Ø¿ı",
			"es" => "Directorio",
			"nl"=>"Directorie",
			"it"=>"Cartella",
                         "ro" => "Director",
			"sv"=>"Katalog");


$txt_newalias = array( 
"ru"=>"îÏ×ÙÊ ÁÌÉÁÓ",
 "en" => "New Mail Alias",
 "ja" => "¿·µ¬¥¨¥¤¥ê¥¢¥¹",
 "tc" => "·s¼W¶l¥ó§O¦W",
 "fr" => "Nouvelle Adresse de Redirection",
 "de" => "Neue Weiterleitungsadresse",
 "da" => "Ny Alias",
 "es" => "Nuevo Alias",
"nl"=>"Nieuw Alias",
 "it"=>"Nuovo Alias",
 "ro" => "Alias nou",
 "sv" =>"Nytt alias");

$txt_newuser = array(
"ru"=>"îÏ×ÙÊ ÑİÉË", 
 "en" => "New Mailbox Account",
 "ja" => "¿·µ¬¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "·s¼W«H½c±b¸¹",
 "fr" => "Nouvelle Boîte aux lettres",
 "de" => "Neue Mailbox",
 "da" => "Ny Mailkonto",
 "es" => "Nuevo usuario",
"nl"=>"Nieuw Postbus Account",
 "it"=>"Nuova Mailbox",
 "ro" => "Mailbox nou",
 "sv" => "Nytt e-post-konto");

$txt_delete_msg = array( 
"ru"=>"õÄÁÌÅÎÉÅ ÑİÉËÁ",
 "en" => "Deletion of Account",
 "ja" => "¥¢¥«¥¦¥ó¥È¤Îºï½ü",
 "tc" => "§R°£±b¸¹",
 "fr" => "Effacement du compte",
 "de" => "Konto l&ouml;schen",
 "da" => "Konto slettet",
 "es" => "Eliminar cuenta",
"nl"=>"Verwijdering van Account",
 "it"=>"Eliminazione dell'account",
 "ro" => "Stergerea contului",
 "sv" => "Borttagning av konto");

$txt_edit_account = array(
"ru"=>"éÚÍÅÎÅÎÉÅ ĞÁÒÁÍÅÔÒÏ× ÑİÉËÁ", 
 "en" => "Account Edition",
 "ja" => "¥¢¥«¥¦¥ó¥È¤ÎÊÔ½¸",
 "tc" => "±b¸¹½s¿è",
 "fr" => "Modification des informations du compte",
 "de" => "&Auml;nderung der Konto-Einstellungen",
 "da" => "Redigere konto",
 "es" => "Editar cuenta",
"nl"=>"Account Aanpassen",
 "it"=>"Modifica dell'account",
 "ro" => "Modificarea contului",
 "sv" => "Ändra konto");

$txt_quota_account = array(
"ru"=>"éÚÍÅÎÅÎÉÅ ĞÁÒÁÍÅÔÒÏ× ÑİÉËÁ", 
 "en" => "Account Edition",
 "ja" => "¥¢¥«¥¦¥ó¥È¤ÎÊÔ½¸",
 "fr" => "Modification des informations du compte",
 "de" => "&Auml;nderung der Konto-Einstellungen",
 "da" => "Redigere konto",
 "es" => "Editar cuenta",
"nl"=>"Account Instellingen",
 "it"=>"Modifica dell'account",
 "ro" => "Modificarea contului",
 "sv" => "Ändring av kontoinställningar");

$txt_read_mail = array( 
"ru"=>"şÔÅÎÉÅ ĞÏŞÔÙ",
 "en" => "Mail Reading",
 "ja" => "¥á¡¼¥ëÆÉ¤ß¹ş¤ß",
 "tc" => "¶l¥óÅª¨ú¤¤",
 "fr" => "Lecture des Mails",
 "de" => "Mails lesen",
 "da" => "Læs Mail",
 "es" => "Lectura de E-mails",
"nl"=>"Mail lezen",
 "it"=>"Lettura della posta",
 "ro" => "Citire e-mail",
 "sv" => "Läs e-post-meddelanden");

$txt_logout = array( 
"ru"=>"÷ÙÈÏÄ",
 "en" => "Logout",
 "ja" => "¥í¥°¥¢¥¦¥È",
 "tc" => "µn¥X",
 "fr" => "Quitter",
 "de" => "Ausloggen",
 "da" => "Logout",
 "es" => "Salir",
"nl"=>"Afmelden",
 "it"=>"Esci",
 "ro" => "Logout",
 "sv" => "Logga ut");

$txt_close = array(
"ru"=>"úÁËÒÙÔØ", 
 "en" => "Close",
 "ja" => "ÊÄ¤¸¤ë",
 "tc" => "Ãö³¬",
 "fr" => "Fermer",
 "de" => "Schlie&szlig;en",
 "da" => "Luk",
 "es" => "Cerrar",
"nl"=>"Sluiten",
 "it"=>"Chiudi",
 "ro" => "Inchide",
 "sv" => "Stäng");

$txt_refresh_menu = array(
"ru"=>"ïÂÎÏ×ÉÔØ ÍÅÎÀ", 
 "en" => "Refresh Menu",
 "ja" => "É½¼¨¹¹¿·",
 "tc" => "§ó·sMenu",
 "fr" => "R&eacute;actualiser",
 "de" => "Aktualisieren",
 "da" => "Opdater Menu",
 "es" => "Actualizar el menú",
"nl"=>"Menu verversen",
 "it"=>"Aggiorna Menu",
 "ro" => "Reactualizare meniu",
 "sv" => "Uppdatera meny");

$txt_session_expired = array(
"ru"=>"÷ÒÅÍÑ ÓÅÓÓÉÉ ÚÁËÏÎŞÉÌÏÓØ", 
 "en" => "Session expired",
 "ja" => "ÀÜÂ³»ş´ÖÀÚ¤ì",
 "tc" => "Session ¤w¹L´Á",
 "fr" => "Session expirée",
 "de" => "Session zu alt",
 "da" => "Sessionen er udløbet",
 "es" => "La sesión ha expirado",
"nl"=>"Sessie verlopen",
 "it"=>"Timeout Sessione",
 "ro" => "Sesiunea a expirat",
 "sv" => "Utloggning p.g.a. inaktivitet"); 

$txt_submit = array(
"ru"=>"ğÏÄÔ×ÅÒÄÉÔØ",
 "en" => "Submit",
 "ja" => "¼Â¹Ô",
 "tc" => "±µ¨ü",
 "fr" => "Enregistrer",
 "de" => "Speichern",
 "da" => "Send",
 "es" => "Enviar",
"nl"=>"Opslaan",
 "it"=>"Invia",
 "ro" => "Inregistrare",
 "sv" => "Skicka");

$txt_error_no_username = array(
"ru"=>"îÕÖÎÏ ××ÅÓÔÉ ÉÍÑ!", 
 "en" => "You have to mention a username!",
 "ja" => "¥æ¡¼¥¶Ì¾¤Î»ØÄê¤¬É¬Í×¤Ç¤¹!",
 "tc" => "§A¥²¶·¿é¤J¤@­Ó¨Ï¥ÎªÌ¦WºÙ!",
 "fr" => "Vous devez indiquer un nom !",
 "da" => "Angiv brugernavn",
 "de" => "Sie m&uuml;ssen einen Kontonamen eingeben!",
 "es" => "¡Debes ingresar un nombre de usuario!",
"nl"=>"Er moet een gebruikersnaam ingevoerd worden",
 "it"=>"Devi specificare un nome utente!",
 "ro" => "Trebuie sa introduceti un nume de utilizator!",
 "sv" => "Fel: inget användarnamn har angivits!");

$txt_error_invalid_chars_in_username = array(
"ru"=>"úÁĞÒÅİÅÎÎÙÅ ÓÉÍ×ÏÌÙ × ÉÍÅÎÉ (ÍÏÖÎÏ: A-Z, 0-9, _, -)!", 
 "en" => "Non valid chars in username (ok: A-Z, 0-9, _, -)!",
 "ja" => "¥æ¡¼¥¶Ì¾¤Ë»ÈÍÑ¤Ç¤­¤Ê¤¤Ê¸»ú¤¬´Ş¤Ş¤ì¤Æ¤¤¤Ş¤¹¡£(»ÈÍÑ²ÄÇ½Ê¸»ú¡§A-Z, 0-9, _, -)!",
 "tc" => "¤£¦Xªkªº¦r¤¸¥X²{¦b¨Ï¥ÎªÌ¦WºÙ¤¤(ok: A-Z, 0-9. _, -)!",
 "fr" => "Characters non autorisés dans le nom (ok: A-Z, 0-9, _, -)!",
 "de" => "Verbotene Zeichen im Benutzername (erlaubt: A-Z, 0-9, _, -)!",
 "da" => "Ugyldige tegn (ok: A-Z, 0-9, _, -)!",
 "es" => "Caractéres inválidos (Sólo a-Z, 0-9, _, -)",
"nl"=>"Ongeldige tekens in gebruikersnaam (alleen: A-Z, 0-9, _, -)!",
 "it"=>"Il nome utente contiene caratteri non validi (usa solo: A-Z, 0-9, _, -)!",
 "ro" => "Caractere invalide in numele utilizatorului (ok: A-Z, 0-9, _,-)!",
 "sv" => "Ogiltiga tecken i användarnamn (Bara a-z, 0-9, _, -)");

$txt_error_pw_not_same = array(
"ru"=>"÷Ù ÄÏÌÖÎÙ ××ÅÓÔÉ Ä×Á ÒÁÚÁ ÔÏÔ ÖÅ ĞÁÒÏÌØ",
 "en" => "You have to type twice the same password",
 "ja" => "³ÎÇ§¤Î¤¿¤á¡¢¥Ñ¥¹¥ï¡¼¥ÉÍó£²²Õ½ê¤ËÉ¬¤ºÆ±¤¸¥Ñ¥¹¥ï¡¼¥É¤òÆşÎÏ¤·¤Æ²¼¤µ¤¤¡£",
 "tc" => "§A¥²¶·¿é¤J¨â¦¸¤@¼Ëªº±K½X",
 "fr" => "Vous devez indiquer deux fois le meme mot de passe",
 "de" => "Sie m&uuml;ssen zweimal das gleiche Passwort eintippen",
 "da" => "Tast password 2 gange",
 "es" => "Debes ingresar la contrase&ntilde;a 2 veces",
"nl"=>"Het wachtwoord moet twee keer ingevoerd worden",
 "it"=>"Le due password immesse non coincidono",
 "ro" => "Trebuie sa introduceti aceeasi parola de doua ori",
 "sv" => "Skriv lösenordet två gånger");

$txt_error_pw_needed = array( 
"ru"=>"÷Ù ÄÏÌÖÎÙ ××ÅÓÔÉ ĞÁÒÏÌØ",
 "en" => "You have to type a password",
 "ja" => "¥Ñ¥¹¥ï¡¼¥É¤òÆşÎÏ¤·¤Æ²¼¤µ¤¤¡£",
 "tc" => "§A¥²¶·¿é¤J±K½X",
 "fr" => "Vous devez indiquer un mot de passe",
 "de" => "Sie m&uuml;ssen einen Passwort eintippen",
 "da" => "Password skal indtastes",
 "es" => "Debes ingresar una contrase&ntilde;a",
"nl"=>"Er moet een wachtwoord ingevoerd worden",
 "it"=>"Devi specificare una password",
 "ro" => "Trebuie sa introduceti o parola",
 "sv" => "Du måste skriva in ett lösenord");

$txt_error_fwd_needed = array(
"ru"=>"îÕÖÅÎ ÈÏÔÑ ÂÙ ÏÄÉÎ ÁÄÒÅÓ ĞÅÒÅÓÙÌËÉ", 
 "en" => "You have to type at least one forwarder",
 "ja" => "¾¯¤Ê¤¯¤È¤â°ì¤Ä¤ÎÅ¾Á÷Àè¤ò»ØÄê¤·¤Ê¤±¤ì¤Ğ¤Ê¤é¤Ê¤¤",
 "tc" => "§A¥²¶·¿é¤J¦Ü¤Ö¤@­ÓÂà±HªÌ",
 "fr" => "Vous devez indiquer au moins une adresse de redirection",
 "de" => "Sie m&uuml;ssen eine Weiterleitungadresse eingeben",
 "da" => "Tast venligst en forwarder",
 "es" => "Debes ingresar al menos un forward",
"nl"=>"Er moet op zijn minst een forwardadres opgegeven worden",
 "it"=>"Devi specificare almeno un indirizzo di forward",
 "ro" => "Trebuie sa introduceti cel putin un forward",
 "sv" => "Du måste skriva in minst en forward");

$txt_yes = array( 
"ru"=>"äÁ",
 "en" => "Yes",
 "ja" => "Yes",
 "tc" => "¬O",
 "fr" => "Oui",
 "de" => "Ja",
 "da" => "Ja",
 "es" => "Si",
"nl"=>"Ja",
 "it"=>"Si",
 "ro" => "Da",
 "sv" => "Ja");

$txt_no = array(
"ru"=>"îÅÔ", 
 "en" => "No",
 "ja" => "No",
 "tc" => "§_",
 "fr" => "Non",
 "de" => "Nein",
 "da" => "Nej",
 "es" => "No",
"nl"=>"Nee",
 "it"=>"No",
 "ro" => "Nu",
 "sv" => "Nej");

$txt_activated = array(
"ru"=>"÷ËÌÀŞÅÎ", 
 "en" => "On",
 "ja" => "On",
 "tc" => "±Ò°Ê",
 "fr" => "Activé",
 "de" => "Aktiviert",
 "da" => "Aktiver",
 "es" => "Activado",
"nl"=>"Actief",
 "it"=>"Attivato",
 "ro" => "Activat",
 "sv" => "Aktiverad");

$txt_inactived = array(
 "ru"=>"÷ÙËÌÀŞÅÎ", 
 "en" => "Off",
 "ja" => "Off",
 "tc" => "Ãö³¬",
 "fr" => "Désactivé",
 "de" => "Deaktiviert",
 "da" => "Deaktiver",
 "es" => "Desactivado",
"nl"=>"Inactief",
 "it"=>"Disattivato",
 "ro" => "Dezactivat",
 "sv" => "Inaktiverad");

$txt_subject = array(
 "ru"=>"ôÅÍÁ", 
 "en" => "Subject",
 "ja" => "É½Âê",
 "tc" => "¥DÃD",
 "fr" => "Sujet",
 "de" => "Betreff",
 "da" => "Emne",
 "es" => "Asunto",
"nl"=>"Onderwerp",
 "it"=>"Oggetto",
 "ro" => "Subiect",
 "sv" => "Rubrik");

$txt_from = array(
"ru"=>"ïÔ", 
 "en" => "From",
 "ja" => "º¹½Ğ¿Í",
 "tc" => "±H¥óªÌ",
 "fr" => "Expéditeur",
 "de" => "Absender",
 "da" => "Fra",
 "es" => "De",
"nl"=>"Van",
 "it"=>"Da",
 "ro" => "De la",
 "sv" => "Från");

$txt_text = array(
"ru"=>"ôÅËÓÔ", 
 "en" => "Text",
 "ja" => "¥Æ¥­¥¹¥È",
 "tc" => "¤å¦r",
 "fr" => "Texte",
 "de" => "Text",
 "da" => "Tekst",
 "es" => "Texto",
"nl"=>"Tekst",
 "it"=>"Testo",
 "ro" => "Text",
 "sv" => "Text");

$txt_autoanswertext = array(
"ru"=>"ôÅËÓÔ Á×ÔÏÏÔ×ÅÔÁ", 
 "en" => "Autoreply Text",
 "ja" => "¼«Æ°ÊÖ¿®¥Æ¥­¥¹¥È",
 "tc" => "¦Û°Ê¦^´_¤å¦r",
 "fr" => "Texte du répondeur",
 "de" => "Text des Autoresponders",
 "da" => "Tekst til Autoreply",
 "es" => "Mensaje del Autoresponder",
"nl"=>"Auto-antwoord tekst",
 "it"=>"Risposta automatica",
 "ro" => "Auto-raspuns",
 "sv" => "Text för automatiskt svar");

$txt_date = array( 
"ru"=>"äÁÔÁ",
 "en" => "Date",
 "ja" => "ÆüÉÕ",
 "tc" => "¤é´Á",
 "fr" => "Date",
 "de" => "Datum",
 "da" => "Dato",
 "es" => "Fecha",
"nl"=>"Datum",
 "it"=>"Data",
 "ro" => "Data",
 "sv" => "Datum");

$txt_size = array( 
"ru"=>"òÁÚÍÅÒ",
 "en" => "Size",
 "ja" => "¥µ¥¤¥º",
 "tc" => "¤j¤p",
 "fr" => "Taille",
 "de" => "Gr&ouml;&szlig;e",
 "da" => "Størrelse",
 "es" => "Tamaño",
"nl"=>"Grootte",
 "it"=>"Dimensione",
 "ro" => "Dimensiune",
 "sv" => "Storlek");

$txt_mailbox_listing = array(
 "ru"=>"óĞÉÓÏË ÑİÉËÏ×", 
 "en" => "Mailbox Listing",
 "ja" => "¥á¡¼¥ë¥Ü¥Ã¥¯¥¹°ìÍ÷É½¼¨",
 "tc" => "«H½c¦Cªí",
 "fr" => "Liste des Mails",
 "de" => "Liste der E-Mails",
 "da" => "E-Mails liste",
 "es" => "Lista de E-mails",
"nl"=>"Postbus lijst",
 "it"=>"Lista delle caselle di posta",
 "ro" => "Listing casute postale",
 "sv" => "Lista på e-post");

$txt_mailboxes_title = array(
"ru"=>"ñİÉËÉ", 
 "en" => "Mailboxes",
 "ja" => "¥á¡¼¥ë¥Ü¥Ã¥¯¥¹",
 "tc" => "«H½c",
 "fr" => "Boîtes aux lettres",
 "de" => "E-Mail-Kontos",
 "da" => "E-Mail kontis",
 "es" => "Casillas",
"nl"=>"Postbussen",
 "it"=>"Caselle di posta",
 "ro" => "Casute postale",
 "sv" => "E-post-konton");

$txt_aliases_title = array(
"ru"=>"áÌÉÁÓÙ", 
 "en" => "Aliases",
 "ja" => "¥¨¥¤¥ê¥¢¥¹(Å¾Á÷ÀìÍÑ¥á¡¼¥ë¥¢¥É¥ì¥¹)",
 "tc" => "§O¦W",
 "fr" => "Alias",
 "de" => "Alias",
 "da" => "Aliases",
 "es" => "Aliases",
"nl"=>"Aliassen",
 "it"=>"Alias",
 "ro" => "Alias-uri",
 "sv" => "Alias");

$txt_user_title = array(
"ru"=>"÷ÁÛ ĞÏŞÔÏ×ÙÊ ÑİÉË", 
 "en" => "Your Mail Account",
 "ja" => "¤¢¤Ê¤¿¤Î¥á¡¼¥ë¥¢¥«¥¦¥ó¥È",
 "tc" => "§Aªº¶l¥ó±b¸¹",
 "fr" => "Votre compte mail",
 "de" => "Ihr Mailkonto",
 "da" => "Mailkonto",
 "es" => "Tu cuenta de E-mail",
"nl"=>"Uw E-mail account",
 "it"=>"Il tuo account di posta",
 "ro" => "Contul dumneavoastra de E-mail",
 "sv" => "Ditt e-post-konto");

$txt_info = array( 
 "ru"=>"éÎÆÏ",
 "en" => "Info",
 "ja" => "¥¤¥ó¥Õ¥©¥á¡¼¥·¥ç¥ó",
 "tc" => "Info",
 "fr" => "Info",
 "de" => "Info",
 "da" => "Info",
 "es" => "Info",
"nl"=>"Info",
 "it"=>"Info",
 "ro" => "Info",
 "sv" => "Info");

$txt_login_failed = array( 
"ru"=>"÷ ÄÏÓÔÕĞÅ ÏÔËÁÚÁÎÏ: ğÏÖÁÌÕÊÓÔÁ, ĞÒÏ×ÅÒØÔÅ ÌÏÇÉÎ É ĞÁÒÏÌØ", 
 "en" => "Login failed : please check login and password",
 "ja" => "¥í¥°¥¤¥ó¤Ë¼ºÇÔ : ¥í¥°¥¤¥óÌ¾¤È¥Ñ¥¹¥ï¡¼¥É¤ò³ÎÇ§²¼¤µ¤¤",
 "tc" => "Login ¥¢±Ñ:½ĞÀË¬dlogin »P±K½X",
 "fr" => "La connexion a échoué : veuillez vérifier le login et votre mot de passe",
 "de" => "Kein Zugang: bitte Login und Passwort überprüfen",
 "da" => "Ingen adgang; Kontroller venligst Deres Login og Password",
 "es" => "Login incorrecto : Por favor verifique su nombre de usuario y contrase&ntilde;a",
"nl"=>"Aanmelden mislukt: controleer uw aanmeldnaam en wachtwoord",
 "it"=>"Login errato: per favore controlla il nome utente e la password",
 "ro" => "Login esuat: verificati numele de utilizator si parola",
 "sv" => "Inloggning misslyckades: V.v. kontrollera login och lösenord"); 

$txt_facultatif = array( 
"ru"=>"ÎÅÏÂÑÚÁÔÅÌØÎÏ",
 "en" => "optional",
 "ja" => "¾ÊÎ¬²ÄÇ½¥ª¥×¥·¥ç¥ó",
 "tc" => "ÀH·Nªº",
 "fr" => "facultatif",
 "de" => "nicht obligatorisch",
 "da" => "Ikke obligatorisk",
 "es" => "opcional",
"nl"=>"optioneel",
 "it"=>"facoltativo",
 "ro" => "optional",
 "sv" => "frivillig");

$txt_autoresp_subj = array(
"ru"=>"á×ÔÏÏÔ×ÅÔ.", 
 "en" => "Automatic Answer - Out of office",
 "ja" => "¼«Æ°±şÅú - ½Ğ¼Ò¤·¤Æ¤ª¤ê¤Ş¤»¤ó",
 "tc" => "¦Û°ÊÀ³µª - ¤£¦b¿ì¤½«Ç®É",
 "fr" => "Réponse automatique - Actuellement non joignable",
 "de" => "Automatische Antwort - Zur Zeit nicht erreichbar",
 "da" => "Automatisk svar - Ikke hjemme",
 "es" => "Respuesta automática",
"nl"=>"Auto-antwoord - Tijdelijk afwezig",
 "it"=>"Risposta automatica - Non sono in ufficio",
 "ro" => "Auto-raspuns - dezactivat",
 "sv" => "Automatiskt svar - ej inne");

$txt_autoresp_body = array(
 "ru"=>"ğÏÌÕŞÅÎÏ ÷ÁÛÅ ĞÉÓØÍÏ Ó ÔÅÍÏÊ '%S'\n\n ÷ ÄÁÎÎÙÊ ÍÏÍÅÎÔ ÍÅÎÑ ÎÅÔ ÎÁ ÍÅÓÔÅ. ñ ÏÔ×ÅŞÕ ÎÁ ÷ÁÛÅ ĞÉÓØÍÏ, ËÁË ÔÏÌØËÏ ×ÅÒÎÕÓØ.",
 "en" => "Just got your mail with subject '%S'\n\nI'm not there. I'll answer your mail when I'll be back.\n\n",
 "ja" => "¤¢¤Ê¤¿¤Î¥á¡¼¥ë¡ÖÉ½Âê¡§'%S'¡×¤Ï¼õ¤±¼è¤ê¤Ş¤·¤¿¡£¤·¤«¤·¡¢»ä¤Ï½Ğ¼Ò¤·¤Æ¤ª¤ê¤Ş¤»¤ó¤Î¤Ç¡¢¸åÆü²óÅú¤òº¹¤·¾å¤²¤Ş¤¹¡£\n\n",
 "tc" => "­è±µÀò¼ĞÃD¬°'%S'\n\nªº¶l¥ó§Ú²{¦b¨Ã¤£¦b.·í§Ú¦^¨Ó¤§«á±N¾¨³t¦^´_«H¥ó\n\n",
 "fr" => "Je viens de recevoir votre mail à propos de '%S'\n\nJ'y répondrai à mon retour.\n\n",
 "de" => "Ich babe Ihren mail betreffend '%S' erhalten.\n\nEine Antwort erhalten Sie, wenn ich zur&uuml;ckkehre.\n\n",
 "da" => "Har modtaget Deres E-Mail '%S'. \n\nJeg vil svare når jeg kommer tilbage. \n\n",
 "es" => "He recibido tu mensaje titulado '%S'.\n. En este momento no estoy aquí. Te contestaré cuando regrese.\n\n",
"nl"=>"Ik heb zojuist je e-mail met als onderwerp '%S'\nontvangen.\n\nOp het moment ben ik afwezig. Ik zal je e-mail\nbeantwoorden zodra ik weer terug ben.\n\n",
 "it"=>"Ho appena ricevuto il tuo messaggio con oggetto '%S'\n\nNon sono qua. Ti risponder&ograve; appena torno.\n\n",
 "ro" => "Tocmai am primit mesajul dumneavoastra cu subiectul '%S'\n\nMomentan nu sunt aici. Voi raspunde mesajului cand ma voi intoarce.\n\n",
 "sv" => "Jag har mottagit ditt e-post-meddelande '%S'\n. Jag kommer att svara på det när jag är tillbaks.\n\n");

$txt_mail_sysadmin = array( 
 "ru"=>"ïÔĞÒÁ×ÉÔØ ĞÉÓØÍÏ ÁÄÍÉÎÉÓÔÒÁÔÏÒÕ",
 "en" => "Mail System Administrator",
 "ja" => "¥á¡¼¥ë¥·¥¹¥Æ¥à¤Î´ÉÍı¼Ô",
 "tc" => "¶l¥ó¨t²ÎºŞ²zªÌ",
 "fr" => "Enoyer un mail au responsable du système",
 "de" => "E-Mail an Sysadmin",
 "da" => "Mail System Administrator",
 "es" => "Enviar un E-mail al administrador",
"nl"=>"Stuur een bericht naar de systeembeheerder",
 "it"=>"Scrivi all'amministratore del sistema",
 "ro" => "Scrieti Administratorului",
 "sv" => "Skicka e-post till systemadministratören");

$txt_back = array( 
 "ru"=>"îÁÚÁÄ",
 "en" => "Back",
 "ja" => "Ìá¤ë",
 "tc" => "ªğ¦^",
 "fr" => "Retour",
 "de" => "Zur&uuml;ck",
 "da" => "Tilbage",
 "es" => "Atrás",
"nl"=>"Terug",
 "it"=>"Indietro",
 "ro" => "Inapoi",
 "sv" => "Tillbaka");

$txt_about = array( 
 "ru"=>"ï ÓÉÓÔÅÍÅ",
 "en" => "About",
 "ja" => "About",
 "tc" => "Ãö©ó...",
 "fr" => "À propos",
 "de" => "Info",
 "da" => "Info",
 "es" => "Acerca de",
"nl"=>"Over",
 "it"=>"About",
 "ro" => "Despre",
 "sv" => "Om");

$txt_details = array(
"ru"=>"éÎÆÏÒÍÁÃÉÑ ĞÏÌØÚÏ×ÁÔÅÌÑ", 
 "en" => "User Info",
 "ja" => "¥æ¡¼¥¶¡¦¥¤¥ó¥Õ¥©¥á¡¼¥·¥ç¥ó",
 "tc" => "¨Ï¥ÎªÌ¸ê®Æ",
 "fr" => "User Info",
 "de" => "Benutzerinformation",
 "da" => "Bruger Info",
 "es" => "Informaci&oacute;n del usuario",
"nl"=>"Gebruikersinformatie",
 "it"=>"Informazione utente",
 "ro" => "Nume utilizator",
 "sv" => "Användarinformation");

$txt_goodbye = array( 
 "ru"=>"äÏ Ó×ÉÄÁÎÉÑ!",
 "en" => "Good bye!",
 "ja" => "¤µ¤è¤¦¤Ê¤é!",
 "tc" => "¦A¨£!",
 "fr" => "Au revoir !",
 "de" => "Auf Wiedersehen!",
 "da" => "På gensyn",
 "es" => "Adi&oacute;s",
"nl"=>"Tot Ziens!!!",
 "it" =>"Ciao!",
 "ro" => "La revedere!",
 "sv" => "Hej då!");

$txt_error_quota_expired = array(
"ru"=>"îÅ ÄÏÓÔÕĞÎÏ : ÷ÁÛ ÌÉÍÉÔ ÉÓŞÅÒĞÁÎ", 
 "en" => "Not allowed : your quota is expired",
 "ja" => "ÉÔµö²Ä : À©¸Â¤ò±Û¤¨¤Æ¤¤¤Ş¤¹",
 "tc" => "¸T¤î:§Aªºquota¤w¸g¥ÎºÉ",
 "fr" => "Non autorisé : votre quota est dépassé",
 "de" => "Nicht erlaubt : Ihr Limit ist &uuml;berschritten",
 "da" => "Ikke muligt : Deres Quota er overskredet",
 "es" => "Prohibido: La quota ha expirado",
"nl"=>"Niet toegestaan: uw limiet is bereikt",
 "it" =>"Errore : hai superato il tuo quota",
 "ro" => "Eroare: quota a expirat",
 "sv" => "Fel: din utrymmesbegränsning är överskriden");

$txt_error_not_allowed = array( 
 "ru"=>"éÚ×ÉÎÉÔÅ, ÷ÁÍ ÜÔÏ ÎÅ ÄÏÓÔÕĞÎÏ",
 "en" => "Sorry, you are not allowed to do that",
 "ja" => "¤¹¤ß¤Ş¤»¤ó¡¢¤¢¤Ê¤¿¤Ë¤Ï¤½¤Î½èÍı¤òµö²Ä¤µ¤ì¤Æ¤ª¤ê¤Ş¤»¤ó",
 "tc" => "©êºp,§A¤£³Q¤¹³\°õ¦æ¦¹¤@°Ê§@",
 "fr" => "Désolé, vous n'avez pas les droits pour effectuer cette opération",
 "de" => "Leider haben Sie nicht die Berechtigung, diese Operation durchzuf&uuml;hren",
 "da" => "Desværre, De har ikke tilladelse til dette",
 "es" => "Lo siento, esta operaci&oacute;no está permitida",
"nl"=>"Het is niet toegestaan om dat te doen",
 "it"=>"Mi dispiace, non hai i privilegi per farlo",
 "ro" => "Nu sunteti autorizat sa faceti asta",
 "sv" => "Tyvärr har du inte tillåtelse till detta");

$txt_quota = array( 
 "ru" => "ïÇÒÁÎÉŞÅÎÉÅ", 
 "en" => "Quota",
 "ja" => "À©¸Â",
 "tc" => "Quota",
 "fr" => "Quota",
 "de" => "Limit",
 "da" => "Quota",
 "es" => "Quota",
"nl"=>"Limiet",
 "it" => "Quota",
 "ro" => "Quota",
 "sv" => "Utrymmesbegränsning");

$txt_maximum = array( 
 "ru"=>"ÍÁËÓÉÍÕÍ",
 "en" => "maximum",
 "ja" => "ºÇÂç¿ô",
 "tc" => "³Ì¤j",
 "fr" => "maximum",
 "de" => "maximal",
 "da" => "maximum",
 "es" => "maximo",
"nl"=>"maximaal",
 "it" =>"massimo",
 "ro" => "maxim",
 "sv" => "maximalt");

$txt_current = array(
 "ru"=>"ÔÅËÕİÉÊ", 
 "en" => "current",
 "ja" => "current",
 "tc" => "¥Ø«e",
 "fr" => "actuellement",
 "de" => "zur Zeit",
 "da" => "Nuværende",
 "es" => "actual",
"nl"=>"huidig",
 "it" =>"attuale",
 "ro" => "actual",
 "sv" => "nuvarande");

$txt_used = array(
 "ru"=>"ÉÓĞÏÌØÚÏ×ÁÎÏ", 
 "en" => "used",
 "ja" => "»ÈÍÑºÑ¤ß",
 "tc" => "¤w¨Ï¥Î",
 "fr" => "utilis&eacute;",
 "de" => "belegt",
 "da" => "brugt",
 "es" => "usados",
"nl"=>"gebruikt",
 "it" =>"usato",
 "ro" => "folosit",
 "sv" => "använt");

$txt_hardquota = array(
 "ru"=>"íÁËÓÉÍÁÌØÎÙÊ ÌÉÍÉÔ", 
 "en" => "Hard quota",
 "ja" => "¥Ï¡¼¥ÉÀ©¸Â",
 "tc" => "Hard quota",
 "fr" => "Limite dure",
 "de" => "Hartes Limit",
 "da" => "Hard Quota",
 "es" => "Quota dura",
"nl"=>"Harde Limiet",
 "it" =>"Hard Quota",
 "ro" => "Quota dura",
 "sv" => "Hård utrymmesbegränsning");

$txt_softquota = array(
"ru"=>"ğÒÅÄÕĞÒÅÖÄÅÎÉÅ",
 "en" => "Soft quota",
 "ja" => "¥½¥Õ¥ÈÀ©¸Â",
 "tc" => "Soft quota",
 "fr" => "Limite douce",
 "de" => "Flexibles Limit",
 "da" => "Soft Quota",
 "es" => "Quota blanda",
"nl"=>"Zachte Limiet",
 "it" =>"Soft quota",
 "ro" => "Quota lejera", 
 "sv" => "Mjuk utrymmesbegränsning");

$txt_msgsize = array( 
"ru"=>"òÁÚÍÅÒ ĞÉÓÅÍ", 
 "en" => "Message size",
 "ja" => "¥á¥Ã¥»¡¼¥¸¡¦¥µ¥¤¥º",
 "tc" => "¶l¥ó¤j¤p",
 "fr" => "Taille du message",
 "de" => "Mailgr&ouml;&szlig;e",
 "da" => "Størrelse på konto",
 "es" => "Tama&ntilde;o del mensaje",
"nl"=>"Bericht Grootte",
 "it" =>"Dimensione messaggio",
 "ro" => "Dimensiunea mesajului",
 "sv" => "Storlek på meddelande");

$txt_msgcount = array(
"ru"=>"ëÏÌÉŞÅÓÔ×Ï ĞÉÓÅÍ", 
 "en" => "Message count",
 "ja" => "¥á¥Ã¥»¡¼¥¸¿ô",
 "tc" => "¶l¥ó¼Æ¥Ø",
 "fr" => "Nombre de messages",
 "de" => "Anzahl der E-Mails",
 "da" => "Antal E-Mails",
 "es" => "Cantidad de mensajes",
"nl"=>"Aantal berichten",
 "it" =>"Numero di messaggi",
 "ro" => "Numarul mesajelor",
 "sv" => "Antal meddelanden");

$txt_expiry = array( 
"ru"=>"óÒÏË ÄÅÊÓÔ×ÉÑ",
 "en" => "Expiry",
 "ja" => "Í­¸ú´ü¸Â",
 "tc" => "¹L´Á",
 "fr" => "Expiration",
 "de" => "Ablaufdatum",
 "da" => "Slut Dato",
 "es" => "Expiraci&oacuten",
"nl"=>"Vervaldatum",
 "it" =>"Scade",
 "ro" => "Expira",
 "sv" => "Slutdatum"); 

$txt_settings = array(
 "ru" => "îÁÓÔÒÏÊËÉ", 
 "en" => "Settings",
 "ja" => "ÀßÄê",
 "tc" => "³]©w",
 "fr" => "Config",
 "de" => "Einstellungen",
 "da" => "Indstillinger",
 "es" => "Config",
"nl"=>"Instellingen",
 "it" =>"Config",
 "ro" => "Setari",
 "sv" => "Inställningar");

$txt_catchall = array(
 "ru" => "Catchall",
 "en" => "Catchall",
 "ja" => "Catchall",
 "tc" => "Catchall",
 "fr" => "Catchall",
 "de" => "Catchall",
 "da" => "Catchall",
 "es" => "Catchall",
"nl"=>"Catchall",
 "it" => "Catchall",
 "ro" => "Catchall",
 "sv" => "Tar allt");

$txt_setup_catchall = array(
 "ru" => "Setup catchall",
 "en" => "Setup catchall",
 "ja" => "Setup catchall",
 "tc" => "³]©wcatchall",
 "fr" => "Affecter le catchall",
 "de" => "Einrichtung Catchall",
 "da" => "Setup catchall",
 "es" => "Setup catchall",
 "nl" =>"Catchall instellen",
 "it" => "Imposta catchall",
 "ro" => "Setup catchall",
 "sv" => "Inställningar för tar allt");

$txt_remove_catchall = array(
 "ru" => "Remove catchall",
 "en" => "Remove catchall",
 "ja" => "Remove catchall",
 "tc" => "§R°£catchall",
 "fr" => "Supprimer le catchall",
 "de" => "Catchall entfernen",
 "da" => "Remove catchall",
 "es" => "Remove catchall",
 "nl" => "Verwijder catchall",
 "it" => "Rimuovi catchall",
 "ro" => "Dezactiveaza catchall",
 "sv" => "Ta bort tar allt");

$txt_catchall_confirm = array(
 "ru" => "Catchall confirmation",
 "en" => "Catchall confirmation",
 "ja" => "Catchall confirmation",
 "tc" => "½T»{Catchall",
 "fr" => "Confirmer le catchall",
 "de" => "Catchall best&auml;tigen",
 "da" => "Catchall confirmation",
 "es" => "Catchall confirmation",
 "nl" => "Catchall bevestiging",
 "it" => "Conferma Catchall",
 "ro" => "Confirma catchall",
 "sv" => "Ta allt bekräftelse");

$txt_system_account = array(
 "ru" => "System account",
 "en" => "System account",
 "ja" => "¥·¥¹¥Æ¥à¡¦¥¢¥«¥¦¥ó¥È",
 "tc" => "¨t²Î±b¸¹",
 "fr" => "Compte système",
 "de" => "Systemkonto",
 "da" => "System account",
 "es" => "System account",
 "nl" => "Systeem account",
 "it" => "Account di sistema",
 "ro" => "Contul sistemului",
 "sv" => "Systemkonto");

$txt_current_catchall_account_is = array(
 "ru" => "current_catchall_account_is",
 "en" => "Current 'catch all emails' account is",
 "ja" => "Current 'catch all emails' account is",
 "tc" => "¥Ø«ecatchall±b¸¹¬°",
 "fr" => "Le compte réceptionant tous les emails non définis (<i>catchall</i>) est",
 "de" => "Das aktuelle Catchall-Konto is",
 "da" => "current_catchall_account_is",
 "es" => "current_catchall_account_is",
 "nl" => "huidig catchall account is",
 "it" => "L'account che fa da catchall attualmente &egrave",
 "ro" => "Contul catchall curent este",
 "sv" => "Nuvarande 'tar all e-post' konto är");

$txt_help = array(
 "ru" => "Help",
 "en" => "Help",
 "ja" => "¥Ø¥ë¥×",
 "tc" => "¨D§U",
 "fr" => "Aide",
 "de" => "Hilfe",
 "da" => "Help",
 "es" => "Help",
 "nl" => "Help",
 "it" => "Aiuto",
 "ro" => "Help",
 "sv" => "Hjälp");

$txt_prev = array(
  "ru" => "&lt;--",
  "en" => "&lt;--",
  "ja" => "&lt;--",
  "tc" => "&lt;--",
  "fr" => "&lt;--",
  "de" => "&lt;--",
  "da" => "&lt;--",
  "es" => "&lt;--",
  "nl" => "Vorige",
  "it" => "&lt;--",
  "ro" => "&lt;--",
  "sv" => "&lt;--");
 
 $txt_prev_off = array(
  "ru" => "&lt;--",
  "en" => "&lt;--",
  "ja" => "&lt;--",
  "tc" => "&lt;--",
  "fr" => "&lt;--",
  "de" => "&lt;--",
  "da" => "&lt;--",
  "es" => "&lt;--",
  "nl" => "Vorige",
  "it" => "&lt;--",
  "ro" => "&lt;--",
  "sv" => "&lt;--");
 
 $txt_next = array(
  "ru" => "--&gt;",
  "en" => "--&gt;",
  "ja" => "--&gt;",
  "tc" => "--&gt;",
  "fr" => "--&gt;",
  "de" => "--&gt;",
  "da" => "--&gt;",
  "es" => "--&gt;",
  "nl" => "Volgende",
  "it" => "--&gt;",
  "ro" => "--&gt;",
  "sv" => "--&gt;");
 
 $txt_next_off = array(
  "ru" => "--&gt;",
  "en" => "--&gt;",
  "ja" => "--&gt;",
  "tc" => "--&gt;",
  "fr" => "--&gt;",
  "de" => "--&gt;",
  "da" => "--&gt;",
  "es" => "--&gt;",
  "nl" => "Volgende",
  "it" => "--&gt;",
  "ro" => "--&gt;",
  "sv" => "--&gt;");

 $txt_first = array(
  "ru" => "&lt;&lt;&lt;",
  "en" => "&lt;&lt;&lt;",
  "ja" => "&lt;&lt;&lt;",
  "tc" => "&lt;&lt;&lt;",
  "fr" => "&lt;&lt;&lt;",
  "de" => "&lt;&lt;&lt;",
  "da" => "&lt;&lt;&lt;",
  "es" => "&lt;&lt;&lt;",
  "nl" => "Eerste",
  "it" => "&lt;&lt;&lt;",
  "ro" => "&lt;&lt;&lt;",
  "sv" => "&lt;&lt;&lt;");
 
 $txt_first_off = array(
  "ru" => "&lt;&lt;&lt;",
  "en" => "&lt;&lt;&lt;",
  "ja" => "&lt;&lt;&lt;",
  "tc" => "&lt;&lt;&lt;",
  "fr" => "&lt;&lt;&lt;",
  "de" => "&lt;&lt;&lt;",
  "da" => "&lt;&lt;&lt;",
  "es" => "&lt;&lt;&lt;",
  "nl" => "Eerste",
  "it" => "&lt;&lt;&lt;",
  "ro" => "&lt;&lt;&lt;",
  "sv" => "&lt;&lt;&lt;");
 
$txt_last = array(
  "ru" => "&gt;&gt;&gt;",
  "en" => "&gt;&gt;&gt;",
  "ja" => "&gt;&gt;&gt;",
  "tc" => "&gt;&gt;&gt;",
  "fr" => "&gt;&gt;&gt;",
  "de" => "&gt;&gt;&gt;",
  "da" => "&gt;&gt;&gt;",
  "es" => "&gt;&gt;&gt;",
  "nl" => "Laatste",
  "it" => "&gt;&gt;&gt;",
  "ro" => "&gt;&gt;&gt;",
  "sv" => "&gt;&gt;&gt;");
 
 $txt_last_off = array(
  "ru" => "&gt;&gt;&gt;",
  "en" => "&gt;&gt;&gt;",
  "ja" => "&gt;&gt;&gt;",
  "tc" => "&gt;&gt;&gt;",
  "fr" => "&gt;&gt;&gt;",
  "de" => "&gt;&gt;&gt;",
  "da" => "&gt;&gt;&gt;",
  "es" => "&gt;&gt;&gt;",
  "nl" => "Laatste",
  "it" => "&gt;&gt;&gt;",
  "ro" => "&gt;&gt;&gt;",
  "sv" => "&gt;&gt;&gt;");



 $txt_any = array(
  "ru" => "Any",
  "en" => "Any",
  "ja" => "Any",
  "tc" => "Any",
  "fr" => "Tous",
  "de" => "Alle",
  "da" => "Any",
  "es" => "Any",
  "nl" => "Alles",
  "it" => "Any",
  "ro" => "Any",
  "sv" => "Allt");



?>
