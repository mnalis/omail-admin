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


$txt_langname=array(	"fr"=>"Fran�ais",
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

$txt_login=array(	"ru"=>"�����",
                        "fr"=>"Login",
			"de"=>"Login",
			"da"=>"Login",
			"en"=>"Login",
			"ja"=>"������",
			"tc"=>"Login",
			"es"=>"Login",
			"nl"=>"Aanmelden",
			"it"=>"Login",
                        "ro"=>"Login",
			"sv"=>"Inloggning");

$txt_passwd=array(      "ru"=>"������",
                        "fr"=>"Mot de passe",
			"de"=>"Passwort",
			"da"=>"Password",
			"en"=>"Password",
			"ja"=>"�ѥ����",
			"tc"=>"�K�X",
			"es"=>"Contrase&ntilde;a",
			"nl"=>"Wachtwoord",
			"it"=>"Password",
                        "ro"=>"Parola",
			"sv"=>"L�senord");

$txt_title=array(	"ru"=>"�����(������)",
                        "fr"=>"Titre",
			"de"=>"Anrede",
			"da"=>"Titel",
			"en"=>"Title",
			"ja"=>"ɸ��",
			"tc"=>"���D",
			"es"=>"T�tulo",
			"nl"=>"Titel",
			"it"=>"Titolo",
                        "ro"=>"Titlu",
			"sv"=>"Titel");

$txt_firstname=array(	"ru"=>"���",
			"fr"=>"Pr�nom",
			"de"=>"Vorname",
			"da"=>"Fornavn",
			"en"=>"Firstname",
			"ja"=>"̾",
			"tc"=>"�m��",
			"es"=>"Nombre",
			"nl"=>"Voornaam",
			"it"=>"Nome",
                        "ro"=>"Prenume",
			"sv"=>"F�rnamn");

$txt_lastname=array(	"ru"=>"�������",
			"fr"=>"Nom",
			"de"=>"Name",
			"da"=>"Efternavn",
			"en"=>"Lastname",
			"ja"=>"��",
			"tc"=>"�W�r",
			"es"=>"Apellido",
			"nl"=>"Achternaam",
			"it"=>"Cognome",
                        "ro"=>"Nume",
			"sv"=>"Efternamn");

$txt_adresse=array(	"ru"=>"�����",
                        "fr"=>"Adresse",
			"de"=>"Adresse",
			"da"=>"Adresse",
			"en"=>"Address",
			"ja"=>"����",
			"tc"=>"�a�}",
			"es"=>"Direcci&oacute;n",
			"nl"=>"Adres",
			"it"=>"Indirizzo",
                        "ro"=>"Adresa",
			"sv"=>"Adress");

$txt_postalcode=array(	"ru"=>"����.������",
			"fr"=>"CP",
			"de"=>"PLZ",
			"da"=>"Postnr.",
			"en"=>"ZIP",
			"ja"=>"͹���ֹ�",
			"tc"=>"�l���ϸ�",
			"es"=>"CP",
			"nl"=>"Postcode",
			"it"=>"CAP",
                        "ro"=>"Cod",
			"sv"=>"Postnr");


$txt_city=array(	"ru"=>"�����",
                        "fr"=>"Localit�",
			"de"=>"Ort",
			"da"=>"By",
			"en"=>"City",
			"ja"=>"��",
			"tc"=>"����",
			"es"=>"Ciudad",
			"nl"=>"Stad",
			"it"=>"Localit&agrave;",
                        "ro"=>"Oras",
			"sv"=>"Stad");

$txt_country=array(	"ru"=>"������",
                        "fr"=>"Pays",
			"de"=>"Land",
			"da"=>"Land",
			"en"=>"Country",
			"ja"=>"��",
			"tc"=>"��a",
			"es"=>"Pa&iacute;is",
			"nl"=>"Land",
			"it"=>"Stato",
                        "ro"=>"Tara",
			"sv"=>"Land");


$txt_phone=array(	"ru"=>"�������",
                        "fr"=>"T�l�phone",
			"de"=>"Telefon",
			"da"=>"Telefon",
			"en"=>"Phone",
			"ja"=>"�����ֹ�",
			"tc"=>"�q�ܸ��X",
			"es"=>"Tel�fono",
			"nl"=>"Telefoon",
			"it"=>"Telefono",
                        "ro"=>"Telefon",
			"sv"=>"Telefon");

$txt_fax=array(		"ru"=>"����",
                        "fr"=>"Fax",
			"de"=>"Fax",
			"da"=>"Fax",
			"en"=>"Fax",
			"ja"=>"Fax",
			"tc"=>"�ǯu���X",
			"es"=>"Fax",
			"nl"=>"Fax",
			"it"=>"Fax",
                        "ro"=>"Fax",
                        "sv"=>"Fax");

$txt_lang=array(	"ru"=>"����",
                        "fr"=>"Langue",
			"de"=>"Sprache",
			"da"=>"Sprog",
			"en"=>"Language",
			"ja"=>"����",
			"tc"=>"�y��",
			"es"=>"Idioma",
			"nl"=>"Taal",
			"it"=>"Lingua",
                        "ro"=>"Limba",
			"sv"=>"Spr�k");

$txt_langs=array(	"ru"=>"�������",
                        "fr"=>"Fran�ais",
			"de"=>"Deutsch",
			"da"=>"Dansk",
			"en"=>"English",
			"ja"=>"����",
			"tc"=>"�c�餤��",
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
			"ja"=>"�ۡ���ڡ���",
			"tc"=>"Homepage",
			"es"=>"Homepage",
			"nl"=>"Homepage",
			"it"=>"homepage",
                        "ro"=>"Homepage",
			"sv"=>"Hemsida");

$txt_company=array(	"ru"=>"�����������",
                        "fr"=>"Entreprise",
			"de"=>"Firma",
			"da"=>"Firma",
			"en"=>"Company",
			"ja"=>"���",
			"tc"=>"���q",
			"es"=>"Empresa",
			"nl"=>"Bedrijf",
			"it"=>"Firma",
                        "ro"=>"Firma",
			"sv"=>"F�retag");

$txt_position=array(	"ru"=>"���������",
                        "fr"=>"Fonction",
			"de"=>"Funktion",
			"da"=>"Stilling",
			"en"=>"Position",
			"ja"=>"����",
			"tc"=>"�Ҧb�a",
			"es"=>"Posici&oacute;n",
			"nl"=>"Functie",
			"it"=>"Posizione",
                        "ro"=>"Functie",
			"sv"=>"Funktion");

$txt_reason=array(	"ru"=>"�������",
                        "fr"=>"Raison sociale",
			"de"=>"Grund",
			"da"=>"Grund",
			"en"=>"Reason",
			"ja"=>"��ͳ",
			"tc"=>"��]",
			"es"=>"Raz&oacute;n",
			"nl"=>"Reden",
			"it"=>"Ragione sociale",
                        "ro"=>"Motiv",
			"sv"=>"Sk�l");

$txt_notes=array(	"ru"=>"����������",
                        "fr"=>"Notes",
			"de"=>"Notizen",
			"da"=>"Noter",
			"en"=>"Notes",
			"ja"=>"���",
			"tc"=>"�Ƶ�",
			"es"=>"Notas",
			"nl"=>"Notitie",
                        "it"=>"Note",
                        "ro"=>"Note",
			"sv"=>"Anteckningar");

$txt_alias=array(	"ru"=>"�����",
                        "fr"=>"Alias",
			"de"=>"Alias",
			"da"=>"Alias",
			"en"=>"Alias",
			"ja"=>"��̾",
			"tc"=>"�O�W",
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
			"ja"=>"ž����",
			"tc"=>"��H",
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
			"ja"=>"����",
			"tc"=>"�ت��a",
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
			"tc"=>"�q�l�l��",
			"es"=>"E-mail",
			"nl"=>"E-mail",
			"it"=>"E-mail",
                        "ro"=>"E-mail",
			"sv"=>"E-post");

$txt_edit=array(	"ru"=>"��������",
                        "fr"=>"Modifier",
			"de"=>"&Auml;ndern",
			"da"=>"Rediger",
			"en"=>"Edit",
			"ja"=>"�Խ�",
			"tc"=>"�s��",
			"es"=>"Editar",
			"nl"=>"Aanpassen",
			"it"=>"Modifica",
                        "ro"=>"Modifica",
			"sv"=>"Redigera");

$txt_delete=array(	"ru"=>"�������",
                        "fr"=>"Supprimer",
			"de"=>"L&ouml;schen",
			"da"=>"Slet",
			"en"=>"Delete",
			"ja"=>"���",
			"tc"=>"�R��",
			"es"=>"Eliminar",
			"nl"=>"Verwijderen",
			"it"=>"Elimina",
                        "ro"=>"Sterge",
			"sv"=>"Ta bort");

$txt_cancel=array(	"ru"=>"��������",
                        "fr"=>"Annuler",
			"de"=>"Abbrechen",
			"da"=>"Annuler",
			"en"=>"Cancel Operation",
			"ja"=>"�����ߤ�",
			"tc"=>"����",
			"es"=>"Cancelar",
			"nl"=>"Annuleren",
			"it"=>"Annulla",
                        "ro"=>"Anuleaza",
			"sv"=>"Avbryt");

$txt_activate=array(	"ru"=>"������������",
                        "fr"=>"Activer",
			"de"=>"Aktivieren",
			"da"=>"Aktiver",
			"en"=>"Activate",
			"ja"=>"ư���",
			"tc"=>"�ҥ�",
			"es"=>"Activar",
			"nl"=>"Activeren",
			"it"=>"Attiva",
                        "ro"=>"Activeaza",
			"sv"=>"Aktivera");

$txt_account_name=array("ru"=>"����",
                        "fr"=>"Nom du compte",
			"de"=>"Kontoname",
			"da"=>"Konto navn",
			"en"=>"Account name",
			"ja"=>"���������̾",
			"tc"=>"�b��",
			"es"=>"Nombre de Cuenta",
			"nl"=>"Account naam",
			"it"=>"Account",
                        "ro"=>"Nume de Cont",
			"sv"=>"Kontonamn");

$txt_account_type=array("ru"=>"���",
                        "fr"=>"Type de compte",
			"de"=>"Kontoart",
			"da"=>"Kontoart",
			"en"=>"Account type",
			"ja"=>"��������ȡ�������",
			"tc"=>"�b�����A",
			"es"=>"Tipo de Cuenta",
			"nl"=>"Account soort",
			"it"=>"Tipo di Account",
                        "ro"=>"Tipul contului",
			"sv"=>"Typ av konto");

$txt_domain=array(	"ru"=>"�����",
                        "fr"=>"Domaine",
			"de"=>"Domain",
			"da"=>"Dom�ne",
			"en"=>"Domain",
			"ja"=>"�ɥᥤ��",
			"tc"=>"Domain",
			"es"=>"Dominio",
			"nl"=>"Domein",
			"it"=>"Dominio",
                        "ro"=>"Domeniu",
			"sv"=>"Dom�nnamn");

$txt_domain_or_email=array(	"ru"=>"����� Email",
                        "fr"=>"Adresse e-mail ou Domaine",
			"de"=>"E-Mail Adresse oder Domain-Name",
			"da"=>"E-Mail Adresse eller Dom�ne Navn",
			"en"=>"Email Address or Domain Name",
			"ja"=>"�ɥᥤ��",
			"tc"=>"�q�l�l���m��Domain�W��",
			"es"=>"E-mail o Dominio",
			"nl"=>"E-mail adres of Domein naam",
			"it"=>"Indirizzo E-mail o Dominio",
                        "ro"=>"Adresa de E-mail",
			"sv"=>"Dom�nnamn eller e-post-adress");

$txt_status=array(	"ru"=>"������",
                        "fr"=>"Etat",
			"de"=>"Zustand",
			"da"=>"Status",
			"en"=>"Status",
			"ja"=>"����",
			"tc"=>"���A",
			"es"=>"Estado",
			"nl"=>"Status",
			"it"=>"Stato",
                        "ro"=>"Status",
			"sv"=>"Status");

$txt_login=array(	"ru"=>"�����",
                        "fr"=>"Login",
			"de"=>"Login",
			"da"=>"Login",
			"en"=>"Login",
			"ja"=>"������",
			"tc"=>"Login",
			"es"=>"Login",
			"nl"=>"Inloggen",
			"it"=>"Login",
                        "ro"=>"Login",
			"sv"=>"Anv�ndarnamn");

$txt_delete=array(	"ru"=>"�������",
                        "fr"=>"Effacer",
			"de"=>"L&ouml;schen",
			"da"=>"Slet",
			"en"=>"Delete",
			"ja"=>"���",
			"tc"=>"�R��",
			"es"=>"Borrar",
			"nl"=>"Verwijderen",
			"it"=>"Elimina",
                        "ro"=>"Sterge",
			"sv"=>"Ta bort");

$txt_info=array(	"ru"=>"����",
                        "fr"=>"Info",
			"de"=>"Info",
			"da"=>"Info",
			"en"=>"Info",
			"ja"=>"����ե��᡼�����",
			"tc"=>"Info",
			"es"=>"Info",
			"nl"=>"Info",
			"it"=>"Info",
                        "ro"=>"Info",
			"sv"=>"Info");

$txt_action=array(	"ru"=>"��������",
                        "fr"=>"Action",
			"de"=>"Aktion",
			"da"=>"Aktion",
			"en"=>"Action",
			"ja"=>"���",
			"tc"=>"�ʧ@",
			"es"=>"Acci�n",
			"nl"=>"Actie",
			"it"=>"Azione",
                        "ro"=>"Actiune",
			"sv"=>"Funktion");

$txt_no_accounts=array(	"ru"=>"��� ������ ������������",
                        "fr"=>"Aucun compte enregistr&eacute;.",
			"de"=>"Keine Konten eingerichtet",
			"da"=>"Ingen registrede Konto",
			"en"=>"No registred accounts",
			"ja"=>"̤��Ͽ�Υ��������",
			"tc"=>"�L�w���U�b��",
			"es"=>"Ninguna cuenta registrada",
			"nl"=>"Geen geregistreerde accounts",
			"it"=>"Non ci sono account",
                        "ro"=>"Nu exista conturi inregistrate",
			"sv"=>"Inget konto finns registrerat");

$txt_no_domains=array(	"ru"=>"��� ������ ������",
                        "fr"=>"Aucun domaine enregistr&eacute;",
			"de"=>"Keine Domains registriert",
			"da"=>"Ingen registrede Dom�ner",
			"en"=>"No registred domains",
			"ja"=>"̤��Ͽ�Υɥᥤ��",
			"tc"=>"�L�w���Udomains",
			"es"=>"Ning�n dominio registrado",
			"nl"=>"Geen geregistreerde domeinen",
			"it"=>"Non ci sono domini",
                        "ro"=>"Nu exista domenii inregistrate",
			"sv"=>"Inget dom�nnamn finns registrerat");

$txt_new=array(		"ru"=>"�����",
                        "fr"=>"Nouveau",
			"de"=>"Neu",
			"da"=>"Ny",
			"en"=>"New",
			"ja"=>"New",
			"tc"=>"�s��",
			"es"=>"Nuevo",
			"nl"=>"Nieuw",
			"it"=>"Nuovo",
                        "ro"=>"Nou",
			"sv"=>"Ny");

$txt_avail_domain=array(	"ru"=>"��������� ������",
                        "fr"=>"Domaines disponibles",
			"de"=>"Verf&uuml;gbare Domains",
			"da"=>"Oprettede Dom�ner",
			"en"=>"Available domains",
			"ja"=>"��¸�ɥᥤ��",
			"tc"=>"�i�Τ�domains",
			"es"=>"Dominios disponibles",
			"nl"=>"Beschikbare domeinen",
			"it"=>"Domini disponibili",
                        "ro"=>"Domenii disponibile",
			"sv"=>"Tillg�ngliga dom�nnamn");

$txt_own_domains=array(	"ru"=>"���� ������",
                        "fr"=>"Vos domaines",
			"de"=>"Ihre eigenen Domains",
			"da"=>"Deres egne Dom�ner",
			"en"=>"Your own domains",
			"ja"=>"���ʤ����ȤΥɥᥤ��",
			"tc"=>"����domains",
			"es"=>"Tus propios dominios",
			"nl"=>"Uw eigen domeinen",
			"it"=>"I tuoi domini",
                        "ro"=>"Domeniile dumneavoastra",
			"sv"=>"Dina egna dom�nnamn");

$txt_open_domains=array(	 "ru"=>"�������� ������",
                        "fr"=>"Les domaines publics",
			"de"=>"&Ouml;ffentlich zug&auml;ngliche Domains",
			"da"=>"�bne Dom�ner",
			"en"=>"The open domains",
			"ja"=>"�����ץ���Υɥᥤ��",
			"tc"=>"�}��domains",
			"es"=>"Los dominios p�blicos",
			"nl"=>"De open domeinen",
			"it"=>"Domini pubblici",
                        "ro"=>"Domenii publice",
			"sv"=>"�ppna dom�nnamn");

$txt_no_domain=array(	"ru"=>"��� �������",
                        "fr"=>"Pas de domaine",
			"de"=>"Keine Domains",
			"da"=>"Ingen Dom�ner",
			"en"=>"No Domains",
			"ja"=>"¸�ߤ��ʤ��ɥᥤ��",
			"tc"=>"�L��domains",
			"es"=>"Sin dominios",
			"nl"=>"Geen domeinen",
			"it"=>"Non c'&egrave; alcun dominio",
                        "ro"=>"Nici un domeniu",
			"sv"=>"Inget dom�nnamn");

$txt_please_choose=array(	 "ru"=>"���������� ��������",
                        "fr"=>"Faites votre choix",
			"de"=>"Bitte w&auml;hlen",
			"da"=>"V�lg venligst",
			"en"=>"Please choose",
			"ja"=>"����ǲ�����",
			"tc"=>"�п��",
			"es"=>"Elige",
			"nl"=>"Maake een keuze",
			"it"=>"Scegli",
                        "ro"=>"Alegeti",
			"sv"=>"V.v. v�lj");

$txt_subdomain_name=array(	"ru"=>"��� ���������",
                        "fr"=>"Nom du sous-domaine",
			"de"=>"Name der Subdomain",
			"da"=>"Subdomain Name",
			"en"=>"Subdomain Name",
			"ja"=>"���֥ɥᥤ��̾",
			"tc"=>"Subdomain �W��",
			"es"=>"Subdominio",
			"nl"=>"Subdomeinnaam",
			"it"=>"Sottodominio",
                        "ro"=>"Numele subdomeniului",
			"sv"=>"Namn p� underdom�n");


$txt_authorized_chars=array(	 "ru"=>"����������� ������: a-z, 0-9 � '-'",
                        "fr"=>"Caract�res autoris�s : a-z, 0-9 et '-'",
			"de"=>"Zugelassen sind nur a-z, 0-9 und '-'",
			"da"=>"Benyt venligst kun a-z, 0-9 eller '-'",
			"en"=>"Only use a-z, 0-9 and '-'",
			"ja"=>"���Ѳ�ǽʸ�� a-z, 0-9 and '-'",
			"tc"=>"�u��ϥ� a-z, 0-9 and '-'",
			"es"=>"Us� s�lo a-z, 0-9 y '-'",
			"nl"=>"Gebruik alleen a-z, 0-9 en '-'",
			"it"=>"Usa solo a-z, 0-9 e '-'",
                        "ro"=>"Folositi numai a-z, 0-9 si '-'",
			"sv"=>"V.v. anv�nd endast a-z o-9 och '-'");



$txt_current_language = array( "ru"=>"�������",
 "en" => "English",
 "ja" => "���ܸ�",
 "tc"=>"�c�餤��",
 "fr" => "Fran�ais",
 "de" => "Deutsch",
 "da" => "Dansk",
 "es" => "Castellano",
 "nl"=>"Nederlands",
 "it"=>"Italiano",
 "ro"=>"Romana",
 "sv"=>"Svenska");


$txt_hello = array( 
 "ru"=>"�����������",
 "en" => "Hello",
 "ja" => "����ˤ���",
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
 "ru" => "����",
 "en" => "Menu",
 "ja" => "��˥塼",
 "tc" => "Menu",
 "fr" => "Menu",
 "de" => "Menu",
 "da" => "Menu",
 "es" => "Men�",
 "nl"=>"Menu",
 "it" => "Menu",
 "ro"=>"Meniu",
 "sv"=>"Meny");

$txt_welcome = array(
 "ru" => "����� ����������",
 "en" => "Welcome!",
 "ja" => "�褦����!",
 "tc" => "�w��",
 "fr" => "Bienvenue !",
 "de" => "Willkommen!",
 "da" => "Velkommen!",
 "es" => "Welcome!",
 "nl"=>"Welkom",
 "it"=>"Welcome!",
 "ro"=>"Bine ati venit!",
 "sv"=>"V�lkommen");

$txt_menu_domain_descr = array(
 "ru" => "����� ���������� � ������� ���� �������������� ������", 
 "en" => "Welcome in the domain administration main menu",
 "ja" => "�ɥᥤ�������˥塼",
 "fr" => "Bienvenue dans le menu principal de l'administration de votre domaine",
 "de" => "Willkommen im Administrations-Hauptmenu Ihrer Maildomain",
 "da" => "Velkommen til Administrations menuen",
 "es" => "Bienvenido al men� de administraci&oacute;n de dominios",
 "nl"=>"Welkom in het domeinbeheer hoofdmenu",
 "it"=>"Benvenuto al menu principale per la gestione del dominio",
 "ro"=>"Bine ati venit in meniul principal de administrare a domeniului",
 "sv"=>"V�lkommen till huvudmenyn f�r administration av dina e-post-konton");

$txt_menu_account_descr = array(
 "ru" => "����� ���������� � ������� ���� ���������� ����� �������� ������",
 "en" => "Welcome your mail account administration main menu",
 "ja" => "�᡼�륢������ȴ�����˥塼",
 "tc" => "�w��i�J�ӤH�b���޲z���",
 "fr" => "Bienvenue dans le menu principal de l'administration de votre compte E-Mail",
 "de" => "Willkommen im Administration-Hauptmenu ihres Mailkontos",
 "da" => "Velkommen til Administrations menu for Mailkonto",
 "es" => "Bienvenido al men� de administraci&oacute;n de cuenta de correo",
 "nl"=>"Welkom in uw mailaccountbeheer hoofdmenu",
 "it"=>"Benvenuto al menu principale per la gestione del tuo account di posta",
 "ro"=>"Bine ati venit in meniul principal de administrare al contului dumneavoastra",
 "sv"=>"V�lkommen till administrationsmenyn f�r ditt / dina e-post-konton");


$txt_edit = array(
"ru"=>"��������",
 "en" => "Edit",
 "ja" => "�Խ�",
 "tc" => "�s��",
 "fr" => "Editer",
 "de" => "&Auml;ndern",
 "da" => "Rediger",
 "es" => "Editar",
 "nl"=>"Aanpassen",
 "it"=>"Modifica",
 "ro"=>"Modifica",
 "sv"=>"�ndra");


$txt_mailbox = array(
 "ru"=>"Email",
 "en" => "Mailbox",
 "ja" => "�᡼��ܥå���",
 "tc" => "�q�l�l��H�c",
 "fr" => "Messages",
 "de" => "E-Mail",
 "da" => "E-Mail",
 "es" => "Casilla",
 "nl"=>"Postbus",
 "it"=>"Casella",
 "ro"=>"Mesaje",
 "sv"=>"E-post-konto");

$txt_list = array( 
 "ru"=>"������",
 "en" => "List",
 "ja" => "�ꥹ��",
 "tc" => "�C�X",
 "fr" => "Liste",
 "de" => "Zur�ck",
 "da" => "Tilbage",
 "es" => "Lista",
 "nl"=>"Lijst",
 "it"=>"Lista",
 "ro"=>"Lista",
 "sv"=>"Lista");

$txt_add_user = array( 
"ru"=>"����� ����",
 "en" => "Add_User",
 "ja" => "�ɲå桼��",
 "tc" => "�s�W�ϥΪ�",
 "fr" => "Ajouter un utilisateur",
 "de" => "Neues Konto",
 "da" => "Ny konto",
 "es" => "Agregar usuario",
 "nl"=>"Toevoegen gebruiker",
 "it"=>"Aggiungi account",
 "ro"=>"Adauga utilizator",
 "sv"=>"Nytt konto");

$txt_add_alias = array(
"ru"=>"����� �����", 
 "en" => "Add_Alias",
 "ja" => "�ɲå����ꥢ��",
 "tc" => "�s�W�O�W",
 "fr" => "Ajouter un alias",
 "de" => "Neuer Alias",
 "da" => "Ny Alias",
 "es" => "Agregar Alias",
 "nl"=>"Toevoegen Alias",
 "it"=>"Aggiungi Alias",
 "ro"=>"Adauga Alias",
 "sv"=>"Nytt alias");

$txt_delete = array(
"ru"=>"�������",
 "en" => "Delete",
 "ja" => "���",
 "tc" => "�R��",
 "fr" => "Supprimer",
 "de" => "L&ouml;schen",
 "da" => "Slet",
 "es" => "Eliminar",
 "nl"=>"Verwijderen",
 "it"=>"Elimina",
 "ro"=>"Sterge",
 "sv"=>"Ta bort");


$txt_info = array(
"ru"=>"����", 
 "en" => "Info",
 "ja" => "����ե��᡼�����",
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
"ru"=>"�����",
 "en" => "Login",
 "ja" => "������",
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
"ru"=>"����� �����", 
 "en" => "Login again",
 "ja" => "�ƥ�����",
 "tc" => "�Э��slogin",
 "fr" => "Nouvelle connexion",
 "de" => "Neue Anmeldung",
 "da" => "Login igen",
 "es" => "Reingresar",
 "nl"=>"Opnieuw aanmelden",
 "it"=>"Esegui nuovamente il Login",
 "ro"=>"Re-login",
 "sv"=>"Logga in igen");

$txt_please_login = array(
"ru"=>"���������� ��������������� ����, ��������� ��� �������� �����, ����� � ������", 
 "en" => "Please Identify Yourself with your domain and password.",
 "ja" => "�ɥᥤ��ȥѥ���ɤ����ϲ�������",
 "tc" => "�п�Jdomain�M�K�X",
 "fr" => "Veillez vous identifier a l'aide du nom de domaine et de votre mot de passe",
  "de" => "M&ouml;chten Sie die Konten und Aliase einer Domain administrieren, 
           so melden Sie sich bitte mit dem Domainnamen (z.B. <i>testdomain.de</i>) und 
    	   dem dazugeh&ouml;rigen Passwort an. Wollen Sie
	   ein bestimmtes Mailkonto verwalten, so geben Sie die E-Mail-Adresse (z.B.
	   <i>hans@testdomain.de</i>) und das zugeh&ouml;rige Passwort ein.",
 "da" => "Identificer Dem venligst med dom�ne & password",
 "es" => "Por favor ingrese su nombre de usuario o dominio y contrase&ntilde;a",
 "nl"=>"Meld u aan met uw domeinnaam en wachtwoord",
 "it"=>"Per favore inserisci il tuo dominio e la password.",
 "ro"=>"Introduceti domeniul si parola",
 "sv"=>"V.v. logga in med ditt dom�nnamn och l�senord");

$txt_update_list = array( 
 "ru"=>"��������",
 "en" => "Update_List",
 "ja" => "�����ꥹ��",
 "tc" => "��s�C��",
 "fr" => "R�actualiser Liste",
 "de" => "Liste aktualisieren",
 "da" => "Opdater Liste",
 "es" => "Actualizar",
 "nl"=>"Lijst verversen",
 "it"=>"Aggiorna_Lista",
 "ro"=>"Reactualizare lista",
 "sv"=>"Uppdatera lista");

$txt_pw_chg_ok = array( "ru"=>"������ ������� �������", 
 "en" => "Password has been changed sucessfully",
 "ja" => "�ѥ���ɤ��ѹ�����ޤ���",
 "tc" => "�K�X�w�g��s���\ ",
 "fr" => "Le mot de passe a �t� chang� avec succ�s",
 "de" => "Das Passwort wurde erfolgreich ge&auml;ndert",
 "da" => "Passwordet er blevet �ndret",
 "es" => "El password ha sido cambiado con &eacute;xito",
 "nl"=>"Wachtwoord is sucessvol gewijzigd",
 "it"=>"La password &egrave; stata correttamente cambiata",
 "ro"=>"Parola a fost schimbata cu success",
 "sv"=>"L�senordet har �ndrats");

$txt_password_str = array( 
"ru"=>"������",
 "en" => "Password",
 "ja" => "�ѥ����",
 "tc" => "�K�X",
 "fr" => "Mot de passe",
 "de" => "Passwort",
 "da" => "Password",
 "es" => "Contrase&ntilde;a",
 "nl"=>"Wachtwoord",
 "it"=>"Password",
 "ro"=>"Parola",
 "sv"=>"L�senord");

$txt_domain_name = array( 
"ru"=>"�����",
 "en" => "Domain",
 "ja" => "�ɥᥤ��",
 "tc" => "Domain",
 "fr" => "Domaine",
 "de" => "Domain",
 "da" => "Dom�ne",
 "es" => "Dominio",
 "nl"=>"Domein",
 "it"=>"Dominio",
 "ro"=>"Domeniu",
 "sv"=>"Dom�nnamn");


$txt_dom_ident = array(
"ru"=>"����������� ������", 
 "en" => "Domain Authentication",
 "ja" => "�ɥᥤ���ǧ��",
 "tc" => "Domain �{��",
 "fr" => "Identification du Domaine",
 "de" => "Authentifizierung",
 "da" => "E-Mail Administration",
 "es" => "Autentificaci�n de dominio",
 "nl"=>"Domein authenticatie",
 "it"=>"Autenticazione",
 "ro"=>"Autentificarea Domeniului",
 "sv"=>"Dom�nnamnsidentifiering");

$txt_secu_fail_dname = array(
"ru"=>"������: ��� ������ ������ ���� � ����� domain.ext", 
 "en" => "Security Failure : domain name must have the form domain.ext",
 "ja" => "�������ƥ���������� : �����������Υɥᥤ��̾�Ȥ��뤳��",
 "tc" => "�w���ʥ��ѡGdomain���٥����O�ŦXdomain.txt�o�˦�",
 "fr" => "Erreur de s�curit� : le nom de domaine doit �tre de la forme domaine.ext",
 "de" => "Authentifizierungsfehler : Der Domainname muss in der Form domain.ext eingegeben werden",
 "da" => "Fejl! Dom�net skal have form som dom�ne.ext",
 "es" => "Alerta de seguridad: El dominio de ser de la forma dominio.ext",
 "nl"=>"Algemene beschermingsfout: Complete domeinnaam moet opgegeven worden",
 "it"=>"Errore: il dominio deve essere della forma dominio.tld",
 "ro"=>"Eroare: numele domeniul trebuie sa fie de forma domeniu.ext",
 "sv"=>"Fel: dom�nnamnet ska skrivas p� formen dom�nnamn.nu");

$txt_action_menu_title = array(
"ru"=>"���� ������",
 "en" => "Menu for domain",
 "ja" => "�ɥᥤ���ѥ�˥塼",
 "tc" => "Domain��menu",
 "fr" => "Menu pour domaine",
 "de" => "Menu f�r Domain",
 "da" => "Menu for Dom�ne",
 "es" => "Men� para el dominio",
 "nl"=>"Menu voor domein",
 "it"=>"Menu del dominio",
 "ro"=>"Meniu pentru domeniu",
 "sv"=>"Meny f�r dom�nnamn");

$txt_err_action_not_found = array(
"ru"=>"�������� �� �������", 
 "en" => "Action not found",
 "ja" => "�����Ĥ���ޤ���",
 "tc" => "���o�{���ʧ@",
 "fr" => "Action non trouv�e",
 "de" => "Befehl nicht gefunden",
 "da" => "Aktion ikke fundet",
 "es" => "Comando no encontrado",
 "nl"=>"Opdracht niet gevonden",
 "it"=>"Comando errato",
 "ro"=>"Comanda gresita",
 "sv"=>"Kommandot kunde inte hittas");

$txt_title_info = array(
"ru"=>"������ ������������",
 "en" => "Entry for user",
 "ja" => "�桼���ѥ���ȥ꡼",
 "tc" => "�ϥΪ̪��i�J�I",
 "fr" => "Enregistrement concernant",
 "de" => "Benutzerinformation f&uuml;r",
 "da" => "Info for",
 "es" => "Entrada para el usuario",
 "nl"=>"Gebruikers informatie",
 "it"=>"Scheda dell'utente",
 "ro" => "Date despre utilizator",
 "sv" => "Information f�r");

$txt_real_name = array(
 "ru"=>"���",
 "en" => "Real Name",
 "ja" => "��̾",
 "tc" => "�u��m�W",
 "fr" => "Nom complet",
 "de" => "Name",
 "da" => "Navn",
 "es" => "Nombre y Apellido",
 "nl"=>"Naam",
 "it"=>"Nome e Cognome",
 "ro" => "Nume complet",
 "sv" => "Namn");

$txt_email_adr = array(
 "ru"=>"����� Email", 
 "en" => "Email Address",
 "ja" => "Email ���ɥ쥹",
 "tc" => "Email Address",
 "fr" => "Adresse E-Mail",
 "de" => "E-Mail-Adresse",
 "da" => "E-Mail Adresse",
 "es" => "Direcci�n de correo",
"nl"=>"Email Adres",
 "it"=>"Indirizzo E-Mail",
 "ro" => "Adresa de E-mail",
 "sv" => "E-post-adress");

$txt_account_type = array(
 "ru"=>"���", 
 "en" => "Account Type",
 "ja" => "��������ȡ�������",
 "tc" => "�b�����A",
 "fr" => "Type de compte",
 "de" => "Kontoart",
 "da" => "Kontoart",
 "es" => "Tipo de cuenta",
 "nl"=>"Account soort",
 "it"=>"Tipo di Account",
 "ro" => "Tipul contului",
 "sv" => "Kontotyp");

$txt_mailbox_size = array(
"ru"=>"������",
 "en" => "Size",
 "ja" => "������",
 "tc" => "�j�p",
 "fr" => "Taille",
 "de" => "Gr&ouml;&szlig;e",
 "da" => "St�rrelse",
 "es" => "Tama&ntilde;o",
"nl"=>"Grootte",
 "it"=>"Dimensione",
 "ro" => "Dimensiune",
 "sv" => "Storlek");

$txt_numb_of_msg = array(
 "ru"=>"���������� �����", 
 "en" => "Number of Messages",
 "ja" => "��å�������",
 "tc" => "�T�����X",
 "fr" => "Nombre de messages",
 "de" => "Anzahl E-Mails",
 "da" => "Antal E-Mails",
 "es" => "Cantidad de Mensajes",
"nl"=>"Aantal Berichten",
 "it"=>"Numero di messaggi",
 "ro" => "Numarul mesajelor",
 "sv" =>"Antal meddelanden");

$txt_read_mails = array(
"ru"=>"������ �����",
 "en" => "Old Mails",
 "ja" => "�Ť��᡼��",
 "tc" => "�«H��",
 "fr" => "Anciens Mails",
 "de" => "Alte Mails",
 "da" => "Gamle Mails",
 "es" => "Mensajes viejos",
"nl"=>"Oude Berichten",
 "it"=>"Messaggi vecchi",
 "ro" => "Mesaje vechi",
 "sv" => "Gamla meddelanden");

$txt_unread_mails = array(
"ru"=>"����� �����",
 "en" => "Unread Mails",
 "ja" => "̤�ɤΥ᡼��",
 "tc" => "���iŪ�H��",
 "fr" => "Nouveaux Mails",
 "de" => "Neue Mails",
 "da" => "Nye Mails",
 "es" => "Mensajes nuevos",
"nl"=>"Ongelezen berichten",
 "it"=>"Messaggi nuovi",
 "ro" => "Mesaje noi",
 "sv" => "Ol�sta meddelanden");

$txt_read = array(
"ru"=>"������",
 "en" => "Read",
 "ja" => "�ɤ�",
 "tc" => "Ū��",
 "fr" => "Lire",
 "de" => "Lesen",
 "da" => "L�st",
 "es" => "Leer",
"nl"=>"Lees",
 "it"=>"Letti",
 "ro" => "Citeste",
 "sv" => "L�s"); 

$txt_last_mail_arrived = array(
"ru"=>"����� ����� ������ �", 
 "en" => "Last Mail came on",
 "ja" => "�Ǹ�Υ᡼������ on",
 "tc" => "�̫��F�l��",
 "fr" => "Derni�re arriv�e de mail",
 "de" => "Neueste E-Mail",
 "da" => "Seneste E-Mail",
 "es" => "�ltimo correo",
"nl"=>"Laatste Bericht gearriveerd op",
 "it"=>"Ultimo messaggio ricevuto il",
 "ro" => "Ultimul mesaj primit la",
 "sv" => "Nyaste meddelandet kom");

$txt_last_mailbox_access = array(
"ru"=>"��������� ��������� � �����", 
 "en" => "Last Mailbox access",
 "ja" => "�Ǹ�Υ᡼��ܥå�����������",
 "tc" => "�̫�s���q�l�H�c�ɶ�",
 "fr" => "Dernier acc�s � la bo�te",
 "de" => "Letzter Zugriff",
 "da" => "Sidst der har v�ret adgang til Mailkonto",
 "es" => "�ltimo chequeo",
"nl"=>"Laatste toegang tot postbus",
 "it"=>"Ultimo accesso alla casella avvenuto il",
 "ro" => "Ultimul access la Mailbox",
 "sv" => "Sista anv�ndning av e-post-konto"); 

$txt_quota = array(
"ru"=>"�����������",
 "en" => "Quota",
 "ja" => "����",
 "tc" => "Quota",
 "fr" => "Quota",
 "de" => "Grenzen",
 "da" => "Quota",
 "es" => "Quota",
"nl"=>"Limiet",
 "it"=>"Quota",
 "ro" => "Limita",
 "sv" => "Utrymmesbegr�nsning");

$txt_title_edit = array(
 "ru" => "��������� ������ ������������", 
 "en" => "Account Edit for user",
 "ja" => "�桼���ѥ���������Խ�",
 "tc" => "�ק�ϥΪ̱b��",
 "fr" => "Modification des donn�es pour",
 "de" => "Kontodaten &auml;ndern f�r",
 "da" => "Rediger konto for bruger", 
 "es" => "Edici�n de cuenta para",
"nl"=>"Account aanpassing voor gebruiker",
 "it"=>"Modifica dell'account di",
 "ro" => "Modifica cont pentru",
 "sv" =>"�ndra kontonamn f�r anv�ndare");

$txt_username = array(
"ru"=>"�����",
 "en" => "Username",
 "ja" => "�桼��̾",
 "tc" => "�ϥΪ̦W��",
 "fr" => "Nom d'utilisateur",
 "de" => "Benutzername",
 "da" => "Brugernavn",
 "es" => "Nombre de usuario",
"nl"=>"Gebruikersnaam",
 "it"=>"Nome Utente",
 "ro" => "Nume utilizator",
 "sv" => "Anv�ndarnamn"); 

$txt_old = array(
 "ru"=>"������", 
 "en" => "Old",
 "ja" => "Old",
 "tc" => "�ª�",
 "fr" => "Ancien",
 "de" => "Altes",
 "da" => "Gammel",
 "es" => "Viejos",
"nl"=>"Oud",
 "it"=>"Vecchio",
 "ro" => "Vechi",
 "sv" => "Gammal");

$txt_new = array(
 "ru" => "�����",
 "en" => "New",
 "ja" => "New",
 "tc" => "�s��",
 "fr" => "Nouveau",
 "de" => "Neu",
 "da" => "Ny",
 "es" => "Nuevos",
"nl"=>"Nieuw",
 "it"=>"Nuovo",
 "ro" => "Noi",
 "sv" => "Ny");

$txt_newuser = array( 
"ru"=>"����� ����",
 "en" => "New Mailbox",
 "ja" => "�����᡼��ܥå���",
 "tc" => "�s�W�H�c",
 "fr" => "Nouvelle Bo�te",
 "de" => "Neue Mailbox",
 "da" => "Ny Mailkonto",
 "es" => "Nuevo usuario",
"nl"=>"Nieuwe Postbus",
 "it"=>"Nuova casella",
 "ro" => "Mailbox nou",
 "sv" => "Nytt e-post-konto");

$txt_newalias = array(
"ru"=>"����� �����", 
 "en" => "New Alias",
 "ja" => "���������ꥢ��",
 "tc" => "�s�W�O�W",
 "fr" => "Nouvel Alias",
 "de" => "Neue Alias",
 "da" => "Nyt Alias",
 "es" => "Nuevo alias",
"nl"=>"Nieuwe Alias",
 "it"=>"Nuovo Alias",
 "ro" => "Alias nou",
 "sv" => "Nytt alias");

$txt_and_again = array( 
"ru"=>"��� ���",
 "en" => "And again",
 "ja" => "And again",
 "tc" => "�A�@��",
 "fr" => "V�rification",
 "de" => "Nochmals",
 "da" => "Gentag",
 "es" => "Verificaci�n",
"nl"=>"Nogmaals",
 "it"=>"Verifica",
 "ro" => "Verifica",
 "sv" => "Repetera en g�ng till");

$txt_edit_result = array(
"ru"=>"��������� �������� ������������ : ���������", 
 "en" => "Edit User Setup : Result",
 "ja" => "Edit User Setup : Result",
 "tc" => "�s��ϥΪ̪��]�w: ���G",
 "fr" => "Modification des donn�es : resultats",
 "de" => "�nderung der Kontodaten: Ergebnis",
 "da" => "Redigering af Bruger : Resultat",
 "es" => "Modificaci�n de usuario: Resultado",
"nl"=>"Aanpassen gebruikersinstellingen: Resultaat",
 "it"=>"Modifica dell'account: Risultato",
 "ro" => "Modificarea contului: rezultat",
 "sv" => "�ndring av konto: Resultat");

$txt_entry_for_user = array( 
"ru"=>"������ ������������",
 "en" => "Entry for user",
 "ja" => "�桼���ѥ���ȥ꡼",
 "tc" => "�ϥΪ̪��i�J�I",
 "fr" => "Donn�es concernant",
 "de" => "Daten von",
 "da" => "Adgang for bruger",
 "es" => "Entrada para el usuario",
"nl"=>"Gebruikersinformatie",
 "it"=>"Scheda dell'utente",
 "ro" => "Date utilizator",
 "sv" => "Inst�llningar f�r konto");

$txt_title_mailbox = array(
"ru"=>"����",
 "en" => "Mailbox of",
 "ja" => "�᡼��ܥå��� of",
 "tc" => "�H�c�ݩ�",
 "fr" => "Bo�te aux lettres de",
 "de" => "Briefkasten von",
 "da" => "Mailkonto for",
 "es" => "Casilla de",
"nl"=>"Postbus van",
 "it"=>"Casella E-Mail di",
 "ro" => "Mailbox pentru",
 "sv" => "E-post-konto f�r");

$txt_delete_account = array( 
"ru"=>"��������",
 "en" => "Account Deletion",
 "ja" => "��������Ⱥ��",
 "tc" => "�b���R��",
 "fr" => "Effacement de compte",
 "de" => "Konto l�schen",
 "da" => "Slet konto",
 "es" => "Eliminar cuenta",
"nl"=>"Account verwijdering",
 "it"=>"Elimina Account",
 "ro" => "Sterge cont",
 "sv" => "Ta bort konto");

$txt_confirm_delete = array( 
"ru"=>"����������� ��������...",
 "en" => "Delete Request : Please confirm...",
 "ja" => "����׵� : ��ǧ��������...",
 "tc" => "�n�D�R��: �нT�{...",
 "fr" => "Effacement demand� : veuillez confirmer...",
 "de" => "L � S C H E N",
 "da" => "Sletter : Bekr�ft venligst",
 "es" => "Eliminar cuenta: Por favor confirme...",
"nl"=>"Verwijderen: Bevestigen AUB...",
 "it"=>"Eliminazione: Per favore conferma...",
 "ro" => "Stergere cont: Confirmati",
 "sv" => "Ta bort: v.v. bekr�fta"); 

$txt_delete_account_confirm = array(
"ru"=>"�� �������, ��� ������ ������� ���?", 
 "en" => "Are you sure you want to delete this account?",
 "ja" => "�ۤ�Ȥ��˥�������Ȥ������Ƥ������Ǥ���?",
 "tc" => "�T�w�R���o�ӱb����?",
 "fr" => "Etes-vous certain de vouloir effacer le compte suivant?",
 "de" => "Bitte best�tigen Sie die L�schung des folgenden Kontos:",
 "da" => "Er De sikker p� at slette denne konto?",
 "es" => "�Est� seguro que desea eliminar esta cuenta?",
"nl"=>"Zeker weten dat dit account verwijderd moet worden?",
 "it"=>"Sei sicuro di voler cancellare questo account?",
 "ro" => "Sunteti sigur ca vreti sa stergeti contul?",
 "sv" =>"�r du s�ker p� att du vill ta bort detta konto?");

$txt_delete_for_user = array( 
 "ru"=>"��� ������������",
 "en" => "for user",
 "ja" => "for �桼��",
 "tc" => "���ϥΪ�",
 "fr" => "pour l'utilisateur",
 "de" => "",
 "da" => "For bruger",
 "es" => "para el usuario",
"nl"=>"voor gebruiker",
 "it"=>"per l'utente",
 "ro" => "pentru utilizatorul",
 "sv" => "f�r anv�ndare");

$txt_delete_remove_now = array(
"ru"=>"����� <I>������������</I> ������", 
 "en" => "will remove it now, <I>definitely</I>",
 "ja" => "�����˺������ޤ��� <I>�μ¤�</I>",
 "tc" => "�Y�N����,<I>�T�w��?</I>",
 "fr" => "va d�truire le compte, <I>irrem�diablement</I>",
 "de" => "L�scht das Konto unwiderruflich",
 "da" => "Sletter nu, <I>Kan ikke genskabes</I>",
 "es" => "la eliminar� ahora <I>definitivamente</I>",
"nl"=>"wordt nu <I>definitief</I> verwijderd",
 "it"=>"lo canceller&agrave; ora <I>definitivamente</I>",
 "ro" => "va fi sters acum, <I>definitiv</I>",
 "sv" => "Tar bort kontot nu, <I>kan ej �terskapas</I>");

$txt_delete_backto_list = array(
"ru"=>"�������� � ������ <I>���</I> ��������",
 "en" => "will bring you back to the list, <I>without</i> deleting anything",
 "ja" => "�ꥹ�Ȥ����ޤ��� <I>without</i> ���",
 "tc" => "�N�^����,<I>���R��</I>������",
 "fr" => "vous ram�nera � la liste, <i>sans</i> rien effacer",
 "de" => "Zur�ck zur Liste, <I>ohne</I> eine L�schung vorzunehmen",
 "da" => "Tilbage, <I>uden</I> at slette",
 "es" => "te llevar� de regreso a la lista, <I>sin</I> eliminar nada",
"nl"=>"wordt terug gebracht naar de lijst, <I>zonder</I> iets te verwijderen",
 "it"=>"ti riporter&agrave; alla lista <I>senza</I> cancellare nulla",
 "ro" => "va trimite la lista, <I>fara</I> a sterge nimic",
 "sv" => "Tillbaka, <I>utan</I> att ta bort");

$txt_deleted_sucessfully = array(
"ru"=>"������� ������",
 "en" => "deleted sucessfully",
 "ja" => "�����λ",
 "tc" => "���\�R��",
 "fr" => "a �t� effac� avec succ�s",
 "de" => "ist gel�scht worden",
 "da" => "er slettet",
 "es" => "exitosamente eliminada",
"nl"=>"sucessvol verwijderd",
 "it"=>"cancellato con successo",
 "ro" => "stergerea a fost efectuata",
 "sv" => "�r borttaget");

$txt_delete_result = array(
 "ru" => "������ �� �������� : ���������",
 "en" => "Delete Request : Result",
 "ja" => "����׵� : ���",
 "tc" => "�n�D�R��: ���G",
 "fr" => "Effacement : R�sultat",
 "de" => "L�schung : Ergebnis",
 "da" => "Slet (?) : Resultat",
 "es" => "Eliminar cuenta: Resultado",
"nl"=>"Verwijder verzoek: Resultaat",
 "it"=>"Eliminazione dell'account: Risultato",
 "ro" => "Stergere: Resultat",
 "sv" =>"Ta bort: Resultat");

$txt_delete_deletion = array(
"ru"=>"��������",
 "en" => "Deletion of",
 "ja" => "��� of",
 "tc" => "�R��",
 "fr" => "Effacement de",
 "de" => "L�schung von",
 "da" => "Slettet af",
 "es" => "Eliminaci�n de",
"nl"=>"Verwijdering van",
 "it"=>"Eliminazione di",
 "ro" => "Stergerea lui",
 "sv" => "Borttagning av");

$txt_for_user = array(
 "ru"=>"��� ������������", 
 "en" => "for user",
 "ja" => "�桼����",
 "tc" => "���ϥΪ�",
 "fr" => "pour le compte",
 "de" => "F�r den Benutzer",
 "da" => "For Konto",
 "es" => "para el usuario",
"nl"=>"voor gebruiker",
 "it"=>"per l'utente",
 "ro" => "pentru utilizatorul",
 "sv" => "f�r anv�ndare");

$txt_title_list = array(
"ru"=>"������ ��� ������",
 "en" => "Listing for domain",
 "ja" => "�ɥᥤ���ѥꥹ��ɽ��",
 "tc" => "�C�X�Ҧ���domain",
 "fr" => "Liste pour le domaine",
 "de" => "Listing f�r die Domain",
 "da" => "Listing for Dom�ne",
 "es" => "Listado para el dominio",
"nl"=>"Overzicht voor domein",
 "it"=>"Lista del dominio",
 "ro" => "Listing pentru domeniul",
 "sv" =>"Lista p� dom�nnamn");

$txt_domain_info = array(
"ru"=>"���������� � ������",
 "en" => "Domain Information",
 "ja" => "�ɥᥤ�󡦥���ե��᡼�����",
 "tc" => "Domain ��T",
 "fr" => "Informations sur le domaine",
 "de" => "Domaininformationen",
 "da" => "Dom�neinformation",
 "es" => "Informaci�n de Dominio",
"nl"=>"Domein Informatie",
 "it"=>"Informazione sul dominio",
 "ro" => "Informatii despre domeniul",
 "sv" =>"Information om dom�nnamn");

$txt_date_of_creation = array(
"ru"=>"���� ��������", 
 "en" => "Date of creation",
 "ja" => "������",
 "tc" => "�إߤ��",
 "fr" => "Date de mise en place",
 "de" => "Datum der Konto-Einrichtung",
 "da" => "Oprettet d.",
 "es" => "Fecha de creaci�n",
"nl"=>"Aanmaakdatum",
 "it"=>"Data di creazione",
 "ro" => "Data crearii",
 "sv" => "Skapat");

$txt_last_change = array(
"ru"=>"��������� ���������", 
 "en" => "Last Change",
 "ja" => "�ǽ�����",
 "tc" => "�̫���",
 "fr" => "Dernier changement",
 "de" => "Letzte �nderung",
 "da" => "Sidst �ndret",
 "es" => "�ltimo cambio",
"nl"=>"Laatst gewijzigd",
 "it"=>"Ultima modifica",
 "ro" => "Ultima modificare",
 "sv" =>"Senaste �ndring");

$txt_how_many_mailbox = array(
"ru"=>"���������� ������", 
 "en" => "How many Mailboxes",
 "ja" => "How many �᡼��ܥå���",
 "tc" => "���h�֫H�c",
 "fr" => "Combien de Comptes",
 "de" => "Wieviele Konten",
 "da" => "Hvor mange konti",
 "es" => "Cu�ntas casillas",
"nl"=>"Hoeveel postbussen",
 "it"=>"Quante caselle di posta",
 "ro" => "Cate casute postale",
 "sv" => "Hur m�nga e-post-konton");

$txt_how_many_alias = array(
"ru"=>"���������� �������", 
 "en" => "How many Aliases",
 "ja" => "How many �����ꥢ��",
 "tc" => "���h�֧O�W",
 "fr" => "Combiens d'Alias",
 "de" => "Vieviele Aliase",
 "da" => "Hvor mange Aliases",
 "es" => "C�antos Aliases",
"nl"=>"Hoeveel aliassen",
 "it"=>"Quanti alias",
 "ro" => "Cate alias-uri",
 "sv" =>"Hur m�nga alias");

$txt_total_size = array( 
"ru"=>"����� ������ ������",
 "en" => "Total Size of Mailboxes",
 "ja" => "�᡼��ܥå����ι�ץ�����",
 "tc" => "�Ҧ��H�c�j�p���`�M",
 "fr" => "Taille totale des Bo�tes aux lettres",
 "de" => "Gesamtegr&ouml;&szlig;e aller Briefk&auml;sten",
 "da" => "Samlet st�rrelse af Mailkontis",
 "es" => "Tama�o total de las casillas",
"nl"=>"Totale grootte van de postbussen",
 "it"=>"Dimensione totale delle caselle di posta",
 "ro" => "Dimensiunea totala a casutelor postale",
 "sv" =>"Total storlek f�r e-post-konton");

$txt_biggest_mailbox = array(
"ru"=>"����� ������� ����", 
 "en" => "Biggest Mailbox",
 "ja" => "����Υ᡼��ܥå���",
 "tc" => "�̤j���H�c",
 "fr" => "Compte le plus encombrant",
 "de" => "Gr&ouml;&szlgi;ter Briefkasten",
 "da" => "St�rste Mailkonto",
 "es" => "Casilla m�s grande",
"nl"=>"Grootste Postbus",
 "it"=>"Massima dimensione di una casella di posta",
 "ro" => "Cea mai mare casuta postala",
 "sv" =>"St�rsta e-post-konto");

$txt_mailboxes = array(
"ru"=>"�����",
 "en" => "Mailboxes",
 "ja" => "�᡼��ܥå���",
 "tc" => "�H�c",
 "fr" => "Bo�tes aux lettres",
 "de" => "Liste aller Konten",
 "da" => "Mailkonti",
 "es" => "Casillas",
"nl"=>"Postbussen",
 "it"=>"Caselle di posta",
 "ro" => "Casute postale",
 "sv" => "E-post-konton");

$txt_smallmailboxes = array(
 "ru"=>"������", 
 "en" => "mailboxes",
 "ja" => "�᡼��ܥå���",
 "tc" => "�H�c",
 "fr" => "bo�tes aux lettres",
 "de" => "accounts",
 "da" => "mailkonti",
 "es" => "casillas",
"nl"=>"postbussen",
 "it"=>"caselle di posta",
 "ro" => "casute postale",
 "sv" => "e-post-konton");

$txt_aliases = array(
"ru"=>"������", 
 "en" => "Aliases",
 "ja" => "�����ꥢ��",
 "tc" => "�O�W",
 "fr" => "Aliases",
 "de" => "Liste aller Aliase",
 "da" => "Aliases",
 "es" => "Aliases",
"nl"=>"Aliassen",
 "it"=>"Alias",
 "ro" => "Alias-uri",
 "sv" => "Alias");

$txt_smallaliases = array(
"ru"=>"�������", 
 "en" => "aliases",
 "ja" => "�����ꥢ��",
 "tc" => "�O�W",
 "fr" => "aliases",
 "de" => "aliase",
 "da" => "aliases",
 "es" => "aliases",
"nl"=>"aliassen",
 "it"=>"alias",
 "ro" => "aliasuri",
 "sv" =>"alias");

$txt_back_to_begining = array(
"ru"=>"� ������...", 
 "en" => "Back to the beginning...",
 "ja" => "�Ϥ�����...",
 "tc" => "�^��_�I",
 "fr" => "Retour au d&eacute;but...",
 "de" => "Zur�ck zum Anfang...",
 "da" => "Tilbage til begyndelsen",
 "es" => "Volver al inicio...",
"nl"=>"Terug naar het begin...",
 "it"=>"Torna all'inizio...",
 "ro" => "Inapoi...",
 "sv" => "Tillbaka till b�rjan");

$txt_you_have_to_be_sysadmin_for_that = array(
"ru"=>"��������, ������ �� �������!", 
 "en" => "Sorry, you have to be sysadmin to do that!",
 "ja" => "���ߤޤ��󡢼¹ԤǤ���Τϴ����Ԥ����Ǥ�!",
 "tc" => "��p,�u���t�κ޲z�~���v�O���榹�H�ʧ@",
 "fr" => "D&eacute;sol&eacute; vous devez etre administrateur pour cela !",
 "de" => "Nicht erlaubt: Um diese Operation asuf&ouml;hren zu k&ouml;nnen, m&uuml;ssen Sie Administrator sein!",
 "da" => "Du skal v�re systemadministrator",
 "es" => "�Debes ser el administrador de sistema para hacer eso!",
"nl"=>"U heeft systeembeheer rechten nodig hiervoor",
 "it"=>"Hai bisogno dei privilegi di amministratore per farlo!",
 "ro" => "Trebuie sa fiti administrator pentru a putea face asta!",
 "sv" =>"Tyv�rr m�ste du vara systemansvarig f�r att kunna utf�ra detta");

$txt_user_already_exists = array(
"ru"=>"��������. ����� ��� ����",
 "en" => "Sorry, user already exists, please choose another one!",
 "ja" => "���ߤޤ��󡢥桼���ϴ���¸�ߤ��Ƥ��ޤ���¾������Ǥ�������!",
 "tc" => "��p,�ϥΪ̤w�g�s�b�A�п�ܥt�~�@�ӨϥΪ̦W��",
 "fr" => "D&eacute;sol&eacute; mais ce nom est deja utilis� !",
 "de" => "Folgender Fehler ist aufgetreten : Der Benutzer existiert schon",
 "da" => "Brugeren eksisterer allerede, v�lg venligst en anden!",
 "es" => "�El usuario ya existe!",
"nl"=>"Gebruiker bestaat reeds, kies een andere!",
 "it"=>"L'utente esiste gi&agrave;. Scegli un altro nome.",
 "ro" => "Nume de utilizator deja existent, alegeti altul!",
 "sv" => "Anv�ndarnamn finns redan, v.v. v�lj ett annat");

$txt_user_doesnt_exists = array(
"ru"=>"��������, ����� �� ������",
 "en" => "Sorry, user not found",
 "ja" => "���ߤޤ��󡢥桼�������Ĥ���ޤ���",
 "tc" => "��p,�å���즹�@�ϥΪ�",
 "fr" => "D�sol�, aucun utilisateur avec ce nom",
 "de" => "Folgender Fehler ist aufgetreten : Der Benutzer existiert nicht",
 "da" => "Bruger ikke fundet.",
 "es" => "No se ha encontrado el usuario",
"nl"=>"Gebruiker niet gevonden",
 "it"=>"Utente non trovato",
 "ro" => "Utilizatorul nu exista",
 "sv" =>"Anv�nd�rnamnet kan inte hittas");

$txt_err_dom_not_registred = array(
"ru"=>"��� ������ ������", 
 "en" => "Domain not registred on server",
 "ja" => "�ɥᥤ�󤬥����Ф���Ͽ����Ƥ��ޤ���",
 "tc" => "Domain�å��b�t�ΤW�n�O",
 "fr" => "Domaine non enregistr� sur le serveur",
 "de" => "Domain nicht auf dem Server gespeichert",
 "da" => "Dom�net er ikke registreret p� serveren",
 "es" => "Este dominio no se halla en el servidor",
"nl"=>"Domein niet geregistreerd op deze server",
 "it"=>"Quel dominio non &egrave; disponibile su questo server",
 "ro" => "Domeniul nu exista pe server",
 "sv" => "Dom�nnamnet �r inte registrerat p� servern");

$txt_bad_passwd_for_domain = array(
"ru"=>"������������ ������ ��� ���������� �������", 
 "en" => "Bad Password for Domain manager",
 "ja" => "�ɥᥤ��δ����ԤȤ�����������ʤ��ѥ���ɤǤ�",
 "tc" => "Domain�޲z���b�����~",
 "fr" => "Mot de passe erron� pour l'administrateur du domaine",
 "de" => "Falsches Passwort f�r Domainadministrator",
 "da" => "Passwordet er ikke gyldigt",
 "es" => "Contrase&ntilde;a inv�lida para administrador de dominios",
"nl"=>"Foutief wachtwoord voor Domeinbeheerder",
 "it"=>"Password per l'amministrazione del dominio errata",
 "ro" => "Parola gresita pentru administratorul domeniului",
 "sv" => "Fel l�senord f�r dom�nadministration");

$txt_error = array(
 "ru"=>"������",
 "en" => "Error",
 "ja" => "���顼",
 "tc" => "���~",
 "fr" => "Erreur",
 "de" => "Fehler",
 "da" => "Fejl",
 "es" => "Error",
"nl"=>"Algemene beschermingsfout",
 "it"=>"Errore",
 "ro" => "Eroare",
 "sv" => "Fel");

$txt_more_fwd=array(	"ru"=>"��� Fwd",
			"fr"=>"Plus de Fwd",
			"de"=>"Weitere Fwd",
			"da"=>"Mere Fwd",
			"en"=>"More Fwd",
			"ja"=>"ž���� More",
			"tc"=>"��h��H",
			 "es" => "M�s Fwd",
			"nl"=>"Meer Fwd",
			"it"=>"Altri Fwd",
                         "ro" => "Alte Fwd",
			"sv" => "Fler Fwd");

$txt_responder=array(	"ru"=>"���������",
			"fr"=>"R�pondeur",
			"de"=>"Autoresponder",
			"da"=>"Ferie",
			"en"=>"Vacation",
			"ja"=>"����",
			"tc"=>"�۰ʦ^��",
			 "es" => "Autoresponder",
			"nl"=>"Auto-antwoord",
			"it"=>"Autoresponder",
                         "ro" => "Auto-raspuns",
			"sv" =>"Automatiskt svar");

$txt_directory=array(	"ru"=>"�����",
			"fr"=>"R�pertoire",
			"de"=>"Verzeichnis",
			"da"=>"Mappe",
			"en"=>"Directory",
			"ja"=>"�ݴɾ��",
			"tc"=>"�ؿ�",
			"es" => "Directorio",
			"nl"=>"Directorie",
			"it"=>"Cartella",
                         "ro" => "Director",
			"sv"=>"Katalog");


$txt_newalias = array( 
"ru"=>"����� �����",
 "en" => "New Mail Alias",
 "ja" => "���������ꥢ��",
 "tc" => "�s�W�l��O�W",
 "fr" => "Nouvelle Adresse de Redirection",
 "de" => "Neue Weiterleitungsadresse",
 "da" => "Ny Alias",
 "es" => "Nuevo Alias",
"nl"=>"Nieuw Alias",
 "it"=>"Nuovo Alias",
 "ro" => "Alias nou",
 "sv" =>"Nytt alias");

$txt_newuser = array(
"ru"=>"����� ����", 
 "en" => "New Mailbox Account",
 "ja" => "�����᡼��ܥå���",
 "tc" => "�s�W�H�c�b��",
 "fr" => "Nouvelle Bo�te aux lettres",
 "de" => "Neue Mailbox",
 "da" => "Ny Mailkonto",
 "es" => "Nuevo usuario",
"nl"=>"Nieuw Postbus Account",
 "it"=>"Nuova Mailbox",
 "ro" => "Mailbox nou",
 "sv" => "Nytt e-post-konto");

$txt_delete_msg = array( 
"ru"=>"�������� �����",
 "en" => "Deletion of Account",
 "ja" => "��������Ȥκ��",
 "tc" => "�R���b��",
 "fr" => "Effacement du compte",
 "de" => "Konto l&ouml;schen",
 "da" => "Konto slettet",
 "es" => "Eliminar cuenta",
"nl"=>"Verwijdering van Account",
 "it"=>"Eliminazione dell'account",
 "ro" => "Stergerea contului",
 "sv" => "Borttagning av konto");

$txt_edit_account = array(
"ru"=>"��������� ���������� �����", 
 "en" => "Account Edition",
 "ja" => "��������Ȥ��Խ�",
 "tc" => "�b���s��",
 "fr" => "Modification des informations du compte",
 "de" => "&Auml;nderung der Konto-Einstellungen",
 "da" => "Redigere konto",
 "es" => "Editar cuenta",
"nl"=>"Account Aanpassen",
 "it"=>"Modifica dell'account",
 "ro" => "Modificarea contului",
 "sv" => "�ndra konto");

$txt_quota_account = array(
"ru"=>"��������� ���������� �����", 
 "en" => "Account Edition",
 "ja" => "��������Ȥ��Խ�",
 "fr" => "Modification des informations du compte",
 "de" => "&Auml;nderung der Konto-Einstellungen",
 "da" => "Redigere konto",
 "es" => "Editar cuenta",
"nl"=>"Account Instellingen",
 "it"=>"Modifica dell'account",
 "ro" => "Modificarea contului",
 "sv" => "�ndring av kontoinst�llningar");

$txt_read_mail = array( 
"ru"=>"������ �����",
 "en" => "Mail Reading",
 "ja" => "�᡼���ɤ߹���",
 "tc" => "�l��Ū����",
 "fr" => "Lecture des Mails",
 "de" => "Mails lesen",
 "da" => "L�s Mail",
 "es" => "Lectura de E-mails",
"nl"=>"Mail lezen",
 "it"=>"Lettura della posta",
 "ro" => "Citire e-mail",
 "sv" => "L�s e-post-meddelanden");

$txt_logout = array( 
"ru"=>"�����",
 "en" => "Logout",
 "ja" => "��������",
 "tc" => "�n�X",
 "fr" => "Quitter",
 "de" => "Ausloggen",
 "da" => "Logout",
 "es" => "Salir",
"nl"=>"Afmelden",
 "it"=>"Esci",
 "ro" => "Logout",
 "sv" => "Logga ut");

$txt_close = array(
"ru"=>"�������", 
 "en" => "Close",
 "ja" => "�Ĥ���",
 "tc" => "����",
 "fr" => "Fermer",
 "de" => "Schlie&szlig;en",
 "da" => "Luk",
 "es" => "Cerrar",
"nl"=>"Sluiten",
 "it"=>"Chiudi",
 "ro" => "Inchide",
 "sv" => "St�ng");

$txt_refresh_menu = array(
"ru"=>"�������� ����", 
 "en" => "Refresh Menu",
 "ja" => "ɽ������",
 "tc" => "��sMenu",
 "fr" => "R&eacute;actualiser",
 "de" => "Aktualisieren",
 "da" => "Opdater Menu",
 "es" => "Actualizar el men�",
"nl"=>"Menu verversen",
 "it"=>"Aggiorna Menu",
 "ro" => "Reactualizare meniu",
 "sv" => "Uppdatera meny");

$txt_session_expired = array(
"ru"=>"����� ������ �����������", 
 "en" => "Session expired",
 "ja" => "��³�����ڤ�",
 "tc" => "Session �w�L��",
 "fr" => "Session expir�e",
 "de" => "Session zu alt",
 "da" => "Sessionen er udl�bet",
 "es" => "La sesi�n ha expirado",
"nl"=>"Sessie verlopen",
 "it"=>"Timeout Sessione",
 "ro" => "Sesiunea a expirat",
 "sv" => "Utloggning p.g.a. inaktivitet"); 

$txt_submit = array(
"ru"=>"�����������",
 "en" => "Submit",
 "ja" => "�¹�",
 "tc" => "����",
 "fr" => "Enregistrer",
 "de" => "Speichern",
 "da" => "Send",
 "es" => "Enviar",
"nl"=>"Opslaan",
 "it"=>"Invia",
 "ro" => "Inregistrare",
 "sv" => "Skicka");

$txt_error_no_username = array(
"ru"=>"����� ������ ���!", 
 "en" => "You have to mention a username!",
 "ja" => "�桼��̾�λ��꤬ɬ�פǤ�!",
 "tc" => "�A������J�@�ӨϥΪ̦W��!",
 "fr" => "Vous devez indiquer un nom !",
 "da" => "Angiv brugernavn",
 "de" => "Sie m&uuml;ssen einen Kontonamen eingeben!",
 "es" => "�Debes ingresar un nombre de usuario!",
"nl"=>"Er moet een gebruikersnaam ingevoerd worden",
 "it"=>"Devi specificare un nome utente!",
 "ro" => "Trebuie sa introduceti un nume de utilizator!",
 "sv" => "Fel: inget anv�ndarnamn har angivits!");

$txt_error_invalid_chars_in_username = array(
"ru"=>"����������� ������� � ����� (�����: A-Z, 0-9, _, -)!", 
 "en" => "Non valid chars in username (ok: A-Z, 0-9, _, -)!",
 "ja" => "�桼��̾�˻��ѤǤ��ʤ�ʸ�����ޤޤ�Ƥ��ޤ���(���Ѳ�ǽʸ����A-Z, 0-9, _, -)!",
 "tc" => "���X�k���r���X�{�b�ϥΪ̦W�٤�(ok: A-Z, 0-9. _, -)!",
 "fr" => "Characters non autoris�s dans le nom (ok: A-Z, 0-9, _, -)!",
 "de" => "Verbotene Zeichen im Benutzername (erlaubt: A-Z, 0-9, _, -)!",
 "da" => "Ugyldige tegn (ok: A-Z, 0-9, _, -)!",
 "es" => "Caract�res inv�lidos (S�lo a-Z, 0-9, _, -)",
"nl"=>"Ongeldige tekens in gebruikersnaam (alleen: A-Z, 0-9, _, -)!",
 "it"=>"Il nome utente contiene caratteri non validi (usa solo: A-Z, 0-9, _, -)!",
 "ro" => "Caractere invalide in numele utilizatorului (ok: A-Z, 0-9, _,-)!",
 "sv" => "Ogiltiga tecken i anv�ndarnamn (Bara a-z, 0-9, _, -)");

$txt_error_pw_not_same = array(
"ru"=>"�� ������ ������ ��� ���� ��� �� ������",
 "en" => "You have to type twice the same password",
 "ja" => "��ǧ�Τ��ᡢ�ѥ�����󣲲ս��ɬ��Ʊ���ѥ���ɤ����Ϥ��Ʋ�������",
 "tc" => "�A������J�⦸�@�˪��K�X",
 "fr" => "Vous devez indiquer deux fois le meme mot de passe",
 "de" => "Sie m&uuml;ssen zweimal das gleiche Passwort eintippen",
 "da" => "Tast password 2 gange",
 "es" => "Debes ingresar la contrase&ntilde;a 2 veces",
"nl"=>"Het wachtwoord moet twee keer ingevoerd worden",
 "it"=>"Le due password immesse non coincidono",
 "ro" => "Trebuie sa introduceti aceeasi parola de doua ori",
 "sv" => "Skriv l�senordet tv� g�nger");

$txt_error_pw_needed = array( 
"ru"=>"�� ������ ������ ������",
 "en" => "You have to type a password",
 "ja" => "�ѥ���ɤ����Ϥ��Ʋ�������",
 "tc" => "�A������J�K�X",
 "fr" => "Vous devez indiquer un mot de passe",
 "de" => "Sie m&uuml;ssen einen Passwort eintippen",
 "da" => "Password skal indtastes",
 "es" => "Debes ingresar una contrase&ntilde;a",
"nl"=>"Er moet een wachtwoord ingevoerd worden",
 "it"=>"Devi specificare una password",
 "ro" => "Trebuie sa introduceti o parola",
 "sv" => "Du m�ste skriva in ett l�senord");

$txt_error_fwd_needed = array(
"ru"=>"����� ���� �� ���� ����� ���������", 
 "en" => "You have to type at least one forwarder",
 "ja" => "���ʤ��Ȥ��Ĥ�ž�������ꤷ�ʤ���Фʤ�ʤ�",
 "tc" => "�A������J�ܤ֤@����H��",
 "fr" => "Vous devez indiquer au moins une adresse de redirection",
 "de" => "Sie m&uuml;ssen eine Weiterleitungadresse eingeben",
 "da" => "Tast venligst en forwarder",
 "es" => "Debes ingresar al menos un forward",
"nl"=>"Er moet op zijn minst een forwardadres opgegeven worden",
 "it"=>"Devi specificare almeno un indirizzo di forward",
 "ro" => "Trebuie sa introduceti cel putin un forward",
 "sv" => "Du m�ste skriva in minst en forward");

$txt_yes = array( 
"ru"=>"��",
 "en" => "Yes",
 "ja" => "Yes",
 "tc" => "�O",
 "fr" => "Oui",
 "de" => "Ja",
 "da" => "Ja",
 "es" => "Si",
"nl"=>"Ja",
 "it"=>"Si",
 "ro" => "Da",
 "sv" => "Ja");

$txt_no = array(
"ru"=>"���", 
 "en" => "No",
 "ja" => "No",
 "tc" => "�_",
 "fr" => "Non",
 "de" => "Nein",
 "da" => "Nej",
 "es" => "No",
"nl"=>"Nee",
 "it"=>"No",
 "ro" => "Nu",
 "sv" => "Nej");

$txt_activated = array(
"ru"=>"�������", 
 "en" => "On",
 "ja" => "On",
 "tc" => "�Ұ�",
 "fr" => "Activ�",
 "de" => "Aktiviert",
 "da" => "Aktiver",
 "es" => "Activado",
"nl"=>"Actief",
 "it"=>"Attivato",
 "ro" => "Activat",
 "sv" => "Aktiverad");

$txt_inactived = array(
 "ru"=>"��������", 
 "en" => "Off",
 "ja" => "Off",
 "tc" => "����",
 "fr" => "D�sactiv�",
 "de" => "Deaktiviert",
 "da" => "Deaktiver",
 "es" => "Desactivado",
"nl"=>"Inactief",
 "it"=>"Disattivato",
 "ro" => "Dezactivat",
 "sv" => "Inaktiverad");

$txt_subject = array(
 "ru"=>"����", 
 "en" => "Subject",
 "ja" => "ɽ��",
 "tc" => "�D�D",
 "fr" => "Sujet",
 "de" => "Betreff",
 "da" => "Emne",
 "es" => "Asunto",
"nl"=>"Onderwerp",
 "it"=>"Oggetto",
 "ro" => "Subiect",
 "sv" => "Rubrik");

$txt_from = array(
"ru"=>"��", 
 "en" => "From",
 "ja" => "���п�",
 "tc" => "�H���",
 "fr" => "Exp�diteur",
 "de" => "Absender",
 "da" => "Fra",
 "es" => "De",
"nl"=>"Van",
 "it"=>"Da",
 "ro" => "De la",
 "sv" => "Fr�n");

$txt_text = array(
"ru"=>"�����", 
 "en" => "Text",
 "ja" => "�ƥ�����",
 "tc" => "��r",
 "fr" => "Texte",
 "de" => "Text",
 "da" => "Tekst",
 "es" => "Texto",
"nl"=>"Tekst",
 "it"=>"Testo",
 "ro" => "Text",
 "sv" => "Text");

$txt_autoanswertext = array(
"ru"=>"����� ����������", 
 "en" => "Autoreply Text",
 "ja" => "��ư�ֿ��ƥ�����",
 "tc" => "�۰ʦ^�_��r",
 "fr" => "Texte du r�pondeur",
 "de" => "Text des Autoresponders",
 "da" => "Tekst til Autoreply",
 "es" => "Mensaje del Autoresponder",
"nl"=>"Auto-antwoord tekst",
 "it"=>"Risposta automatica",
 "ro" => "Auto-raspuns",
 "sv" => "Text f�r automatiskt svar");

$txt_date = array( 
"ru"=>"����",
 "en" => "Date",
 "ja" => "����",
 "tc" => "���",
 "fr" => "Date",
 "de" => "Datum",
 "da" => "Dato",
 "es" => "Fecha",
"nl"=>"Datum",
 "it"=>"Data",
 "ro" => "Data",
 "sv" => "Datum");

$txt_size = array( 
"ru"=>"������",
 "en" => "Size",
 "ja" => "������",
 "tc" => "�j�p",
 "fr" => "Taille",
 "de" => "Gr&ouml;&szlig;e",
 "da" => "St�rrelse",
 "es" => "Tama�o",
"nl"=>"Grootte",
 "it"=>"Dimensione",
 "ro" => "Dimensiune",
 "sv" => "Storlek");

$txt_mailbox_listing = array(
 "ru"=>"������ ������", 
 "en" => "Mailbox Listing",
 "ja" => "�᡼��ܥå�������ɽ��",
 "tc" => "�H�c�C��",
 "fr" => "Liste des Mails",
 "de" => "Liste der E-Mails",
 "da" => "E-Mails liste",
 "es" => "Lista de E-mails",
"nl"=>"Postbus lijst",
 "it"=>"Lista delle caselle di posta",
 "ro" => "Listing casute postale",
 "sv" => "Lista p� e-post");

$txt_mailboxes_title = array(
"ru"=>"�����", 
 "en" => "Mailboxes",
 "ja" => "�᡼��ܥå���",
 "tc" => "�H�c",
 "fr" => "Bo�tes aux lettres",
 "de" => "E-Mail-Kontos",
 "da" => "E-Mail kontis",
 "es" => "Casillas",
"nl"=>"Postbussen",
 "it"=>"Caselle di posta",
 "ro" => "Casute postale",
 "sv" => "E-post-konton");

$txt_aliases_title = array(
"ru"=>"������", 
 "en" => "Aliases",
 "ja" => "�����ꥢ��(ž�����ѥ᡼�륢�ɥ쥹)",
 "tc" => "�O�W",
 "fr" => "Alias",
 "de" => "Alias",
 "da" => "Aliases",
 "es" => "Aliases",
"nl"=>"Aliassen",
 "it"=>"Alias",
 "ro" => "Alias-uri",
 "sv" => "Alias");

$txt_user_title = array(
"ru"=>"��� �������� ����", 
 "en" => "Your Mail Account",
 "ja" => "���ʤ��Υ᡼�륢�������",
 "tc" => "�A���l��b��",
 "fr" => "Votre compte mail",
 "de" => "Ihr Mailkonto",
 "da" => "Mailkonto",
 "es" => "Tu cuenta de E-mail",
"nl"=>"Uw E-mail account",
 "it"=>"Il tuo account di posta",
 "ro" => "Contul dumneavoastra de E-mail",
 "sv" => "Ditt e-post-konto");

$txt_info = array( 
 "ru"=>"����",
 "en" => "Info",
 "ja" => "����ե��᡼�����",
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
"ru"=>"� ������� ��������: ����������, ��������� ����� � ������", 
 "en" => "Login failed : please check login and password",
 "ja" => "������˼��� : ������̾�ȥѥ���ɤ��ǧ������",
 "tc" => "Login ����:���ˬdlogin �P�K�X",
 "fr" => "La connexion a �chou� : veuillez v�rifier le login et votre mot de passe",
 "de" => "Kein Zugang: bitte Login und Passwort �berpr�fen",
 "da" => "Ingen adgang; Kontroller venligst Deres Login og Password",
 "es" => "Login incorrecto : Por favor verifique su nombre de usuario y contrase&ntilde;a",
"nl"=>"Aanmelden mislukt: controleer uw aanmeldnaam en wachtwoord",
 "it"=>"Login errato: per favore controlla il nome utente e la password",
 "ro" => "Login esuat: verificati numele de utilizator si parola",
 "sv" => "Inloggning misslyckades: V.v. kontrollera login och l�senord"); 

$txt_facultatif = array( 
"ru"=>"�������������",
 "en" => "optional",
 "ja" => "��ά��ǽ���ץ����",
 "tc" => "�H�N��",
 "fr" => "facultatif",
 "de" => "nicht obligatorisch",
 "da" => "Ikke obligatorisk",
 "es" => "opcional",
"nl"=>"optioneel",
 "it"=>"facoltativo",
 "ro" => "optional",
 "sv" => "frivillig");

$txt_autoresp_subj = array(
"ru"=>"���������.", 
 "en" => "Automatic Answer - Out of office",
 "ja" => "��ư���� - �мҤ��Ƥ���ޤ���",
 "tc" => "�۰����� - ���b�줽�Ǯ�",
 "fr" => "R�ponse automatique - Actuellement non joignable",
 "de" => "Automatische Antwort - Zur Zeit nicht erreichbar",
 "da" => "Automatisk svar - Ikke hjemme",
 "es" => "Respuesta autom�tica",
"nl"=>"Auto-antwoord - Tijdelijk afwezig",
 "it"=>"Risposta automatica - Non sono in ufficio",
 "ro" => "Auto-raspuns - dezactivat",
 "sv" => "Automatiskt svar - ej inne");

$txt_autoresp_body = array(
 "ru"=>"�������� ���� ������ � ����� '%S'\n\n � ������ ������ ���� ��� �� �����. � ������ �� ���� ������, ��� ������ �������.",
 "en" => "Just got your mail with subject '%S'\n\nI'm not there. I'll answer your mail when I'll be back.\n\n",
 "ja" => "���ʤ��Υ᡼���ɽ�ꡧ'%S'�פϼ������ޤ���������������ϽмҤ��Ƥ���ޤ���Τǡ����������򺹤��夲�ޤ���\n\n",
 "tc" => "�豵����D��'%S'\n\n���l��ڲ{�b�ä��b.��ڦ^�Ӥ���N���t�^�_�H��\n\n",
 "fr" => "Je viens de recevoir votre mail � propos de '%S'\n\nJ'y r�pondrai � mon retour.\n\n",
 "de" => "Ich babe Ihren mail betreffend '%S' erhalten.\n\nEine Antwort erhalten Sie, wenn ich zur&uuml;ckkehre.\n\n",
 "da" => "Har modtaget Deres E-Mail '%S'. \n\nJeg vil svare n�r jeg kommer tilbage. \n\n",
 "es" => "He recibido tu mensaje titulado '%S'.\n. En este momento no estoy aqu�. Te contestar� cuando regrese.\n\n",
"nl"=>"Ik heb zojuist je e-mail met als onderwerp '%S'\nontvangen.\n\nOp het moment ben ik afwezig. Ik zal je e-mail\nbeantwoorden zodra ik weer terug ben.\n\n",
 "it"=>"Ho appena ricevuto il tuo messaggio con oggetto '%S'\n\nNon sono qua. Ti risponder&ograve; appena torno.\n\n",
 "ro" => "Tocmai am primit mesajul dumneavoastra cu subiectul '%S'\n\nMomentan nu sunt aici. Voi raspunde mesajului cand ma voi intoarce.\n\n",
 "sv" => "Jag har mottagit ditt e-post-meddelande '%S'\n. Jag kommer att svara p� det n�r jag �r tillbaks.\n\n");

$txt_mail_sysadmin = array( 
 "ru"=>"��������� ������ ��������������",
 "en" => "Mail System Administrator",
 "ja" => "�᡼�륷���ƥ�δ�����",
 "tc" => "�l��t�κ޲z��",
 "fr" => "Enoyer un mail au responsable du syst�me",
 "de" => "E-Mail an Sysadmin",
 "da" => "Mail System Administrator",
 "es" => "Enviar un E-mail al administrador",
"nl"=>"Stuur een bericht naar de systeembeheerder",
 "it"=>"Scrivi all'amministratore del sistema",
 "ro" => "Scrieti Administratorului",
 "sv" => "Skicka e-post till systemadministrat�ren");

$txt_back = array( 
 "ru"=>"�����",
 "en" => "Back",
 "ja" => "���",
 "tc" => "��^",
 "fr" => "Retour",
 "de" => "Zur&uuml;ck",
 "da" => "Tilbage",
 "es" => "Atr�s",
"nl"=>"Terug",
 "it"=>"Indietro",
 "ro" => "Inapoi",
 "sv" => "Tillbaka");

$txt_about = array( 
 "ru"=>"� �������",
 "en" => "About",
 "ja" => "About",
 "tc" => "����...",
 "fr" => "� propos",
 "de" => "Info",
 "da" => "Info",
 "es" => "Acerca de",
"nl"=>"Over",
 "it"=>"About",
 "ro" => "Despre",
 "sv" => "Om");

$txt_details = array(
"ru"=>"���������� ������������", 
 "en" => "User Info",
 "ja" => "�桼��������ե��᡼�����",
 "tc" => "�ϥΪ̸��",
 "fr" => "User Info",
 "de" => "Benutzerinformation",
 "da" => "Bruger Info",
 "es" => "Informaci&oacute;n del usuario",
"nl"=>"Gebruikersinformatie",
 "it"=>"Informazione utente",
 "ro" => "Nume utilizator",
 "sv" => "Anv�ndarinformation");

$txt_goodbye = array( 
 "ru"=>"�� ��������!",
 "en" => "Good bye!",
 "ja" => "���褦�ʤ�!",
 "tc" => "�A��!",
 "fr" => "Au revoir !",
 "de" => "Auf Wiedersehen!",
 "da" => "P� gensyn",
 "es" => "Adi&oacute;s",
"nl"=>"Tot Ziens!!!",
 "it" =>"Ciao!",
 "ro" => "La revedere!",
 "sv" => "Hej d�!");

$txt_error_quota_expired = array(
"ru"=>"�� �������� : ��� ����� ��������", 
 "en" => "Not allowed : your quota is expired",
 "ja" => "�Ե��� : ���¤�ۤ��Ƥ��ޤ�",
 "tc" => "�T��:�A��quota�w�g�κ�",
 "fr" => "Non autoris� : votre quota est d�pass�",
 "de" => "Nicht erlaubt : Ihr Limit ist &uuml;berschritten",
 "da" => "Ikke muligt : Deres Quota er overskredet",
 "es" => "Prohibido: La quota ha expirado",
"nl"=>"Niet toegestaan: uw limiet is bereikt",
 "it" =>"Errore : hai superato il tuo quota",
 "ro" => "Eroare: quota a expirat",
 "sv" => "Fel: din utrymmesbegr�nsning �r �verskriden");

$txt_error_not_allowed = array( 
 "ru"=>"��������, ��� ��� �� ��������",
 "en" => "Sorry, you are not allowed to do that",
 "ja" => "���ߤޤ��󡢤��ʤ��ˤϤ��ν�������Ĥ���Ƥ���ޤ���",
 "tc" => "��p,�A���Q���\���榹�@�ʧ@",
 "fr" => "D�sol�, vous n'avez pas les droits pour effectuer cette op�ration",
 "de" => "Leider haben Sie nicht die Berechtigung, diese Operation durchzuf&uuml;hren",
 "da" => "Desv�rre, De har ikke tilladelse til dette",
 "es" => "Lo siento, esta operaci&oacute;no est� permitida",
"nl"=>"Het is niet toegestaan om dat te doen",
 "it"=>"Mi dispiace, non hai i privilegi per farlo",
 "ro" => "Nu sunteti autorizat sa faceti asta",
 "sv" => "Tyv�rr har du inte till�telse till detta");

$txt_quota = array( 
 "ru" => "�����������", 
 "en" => "Quota",
 "ja" => "����",
 "tc" => "Quota",
 "fr" => "Quota",
 "de" => "Limit",
 "da" => "Quota",
 "es" => "Quota",
"nl"=>"Limiet",
 "it" => "Quota",
 "ro" => "Quota",
 "sv" => "Utrymmesbegr�nsning");

$txt_maximum = array( 
 "ru"=>"��������",
 "en" => "maximum",
 "ja" => "�����",
 "tc" => "�̤j",
 "fr" => "maximum",
 "de" => "maximal",
 "da" => "maximum",
 "es" => "maximo",
"nl"=>"maximaal",
 "it" =>"massimo",
 "ro" => "maxim",
 "sv" => "maximalt");

$txt_current = array(
 "ru"=>"�������", 
 "en" => "current",
 "ja" => "current",
 "tc" => "�ثe",
 "fr" => "actuellement",
 "de" => "zur Zeit",
 "da" => "Nuv�rende",
 "es" => "actual",
"nl"=>"huidig",
 "it" =>"attuale",
 "ro" => "actual",
 "sv" => "nuvarande");

$txt_used = array(
 "ru"=>"������������", 
 "en" => "used",
 "ja" => "���ѺѤ�",
 "tc" => "�w�ϥ�",
 "fr" => "utilis&eacute;",
 "de" => "belegt",
 "da" => "brugt",
 "es" => "usados",
"nl"=>"gebruikt",
 "it" =>"usato",
 "ro" => "folosit",
 "sv" => "anv�nt");

$txt_hardquota = array(
 "ru"=>"������������ �����", 
 "en" => "Hard quota",
 "ja" => "�ϡ�������",
 "tc" => "Hard quota",
 "fr" => "Limite dure",
 "de" => "Hartes Limit",
 "da" => "Hard Quota",
 "es" => "Quota dura",
"nl"=>"Harde Limiet",
 "it" =>"Hard Quota",
 "ro" => "Quota dura",
 "sv" => "H�rd utrymmesbegr�nsning");

$txt_softquota = array(
"ru"=>"��������������",
 "en" => "Soft quota",
 "ja" => "���ե�����",
 "tc" => "Soft quota",
 "fr" => "Limite douce",
 "de" => "Flexibles Limit",
 "da" => "Soft Quota",
 "es" => "Quota blanda",
"nl"=>"Zachte Limiet",
 "it" =>"Soft quota",
 "ro" => "Quota lejera", 
 "sv" => "Mjuk utrymmesbegr�nsning");

$txt_msgsize = array( 
"ru"=>"������ �����", 
 "en" => "Message size",
 "ja" => "��å�������������",
 "tc" => "�l��j�p",
 "fr" => "Taille du message",
 "de" => "Mailgr&ouml;&szlig;e",
 "da" => "St�rrelse p� konto",
 "es" => "Tama&ntilde;o del mensaje",
"nl"=>"Bericht Grootte",
 "it" =>"Dimensione messaggio",
 "ro" => "Dimensiunea mesajului",
 "sv" => "Storlek p� meddelande");

$txt_msgcount = array(
"ru"=>"���������� �����", 
 "en" => "Message count",
 "ja" => "��å�������",
 "tc" => "�l��ƥ�",
 "fr" => "Nombre de messages",
 "de" => "Anzahl der E-Mails",
 "da" => "Antal E-Mails",
 "es" => "Cantidad de mensajes",
"nl"=>"Aantal berichten",
 "it" =>"Numero di messaggi",
 "ro" => "Numarul mesajelor",
 "sv" => "Antal meddelanden");

$txt_expiry = array( 
"ru"=>"���� ��������",
 "en" => "Expiry",
 "ja" => "ͭ������",
 "tc" => "�L��",
 "fr" => "Expiration",
 "de" => "Ablaufdatum",
 "da" => "Slut Dato",
 "es" => "Expiraci&oacuten",
"nl"=>"Vervaldatum",
 "it" =>"Scade",
 "ro" => "Expira",
 "sv" => "Slutdatum"); 

$txt_settings = array(
 "ru" => "���������", 
 "en" => "Settings",
 "ja" => "����",
 "tc" => "�]�w",
 "fr" => "Config",
 "de" => "Einstellungen",
 "da" => "Indstillinger",
 "es" => "Config",
"nl"=>"Instellingen",
 "it" =>"Config",
 "ro" => "Setari",
 "sv" => "Inst�llningar");

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
 "tc" => "�]�wcatchall",
 "fr" => "Affecter le catchall",
 "de" => "Einrichtung Catchall",
 "da" => "Setup catchall",
 "es" => "Setup catchall",
 "nl" =>"Catchall instellen",
 "it" => "Imposta catchall",
 "ro" => "Setup catchall",
 "sv" => "Inst�llningar f�r tar allt");

$txt_remove_catchall = array(
 "ru" => "Remove catchall",
 "en" => "Remove catchall",
 "ja" => "Remove catchall",
 "tc" => "�R��catchall",
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
 "tc" => "�T�{Catchall",
 "fr" => "Confirmer le catchall",
 "de" => "Catchall best&auml;tigen",
 "da" => "Catchall confirmation",
 "es" => "Catchall confirmation",
 "nl" => "Catchall bevestiging",
 "it" => "Conferma Catchall",
 "ro" => "Confirma catchall",
 "sv" => "Ta allt bekr�ftelse");

$txt_system_account = array(
 "ru" => "System account",
 "en" => "System account",
 "ja" => "�����ƥࡦ���������",
 "tc" => "�t�αb��",
 "fr" => "Compte syst�me",
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
 "tc" => "�ثecatchall�b����",
 "fr" => "Le compte r�ceptionant tous les emails non d�finis (<i>catchall</i>) est",
 "de" => "Das aktuelle Catchall-Konto is",
 "da" => "current_catchall_account_is",
 "es" => "current_catchall_account_is",
 "nl" => "huidig catchall account is",
 "it" => "L'account che fa da catchall attualmente &egrave",
 "ro" => "Contul catchall curent este",
 "sv" => "Nuvarande 'tar all e-post' konto �r");

$txt_help = array(
 "ru" => "Help",
 "en" => "Help",
 "ja" => "�إ��",
 "tc" => "�D�U",
 "fr" => "Aide",
 "de" => "Hilfe",
 "da" => "Help",
 "es" => "Help",
 "nl" => "Help",
 "it" => "Aiuto",
 "ro" => "Help",
 "sv" => "Hj�lp");

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
