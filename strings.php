<?php
/* 
	-----
	Omail  -  A PHP4 based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: strings.php,v 1.19 2000/09/22 15:05:57 swix Exp $
        $Source: /cvsroot/omail/admin2/strings.php,v $

	strings.php
	-----------
	Strings file, to make translations in other languages easier.

	16.jan.2k   om   Converted the strings from an older version of omail
	23.jan.2k   om   Some updates 
	06.aug.2k   jc   Added spanish
	20.aug.2k   nv   Added italian
	19.sep.2k   ak   Added russian


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
                        "en"=>"English",
			"es"=>"Castellano",
                        "it"=>"Italiano",
			"ru"=>"Russian");

$txt_charset=array(     "ru"=>"KOI8-R",
                        "fr"=>"",
                        "de"=>"",
                        "en"=>"",
			"es"=>"",
                        "it"=>"");

$txt_login=array(	"ru"=>"�����",
                        "fr"=>"Login",
			"de"=>"Login",
			"en"=>"Login",
			"es"=>"Login",
			"it"=>"Login");

$txt_passwd=array(      "ru"=>"������",
                        "fr"=>"Mot de passe",
			"de"=>"Passwort",
			"en"=>"Password",
			"es"=>"Contrase&ntilde;a",
			"it"=>"Password");

$txt_title=array(	"ru"=>"�����(������)",
                        "fr"=>"Titre",
			"de"=>"Anrede",
			"en"=>"Title",
			"es"=>"T�tulo",
			"it"=>"Titolo");

$txt_firstname=array(	"ru"=>"���",
			"fr"=>"Pr�nom",
			"de"=>"Vorname",
			"en"=>"Firstname",
			"es"=>"Nombre",
			"it"=>"Nome");

$txt_lastname=array(	"ru"=>"�������",
			"fr"=>"Nom",
			"de"=>"Name",
			"en"=>"Lastname",
			"es"=>"Apellido",
			"it"=>"Cognome");

$txt_adresse=array(	"ru"=>"�����",
                        "fr"=>"Adresse",
			"de"=>"Adresse",
			"en"=>"Address",
			"es"=>"Direcci&oacute;n",
			"it"=>"Indirizzo");

$txt_postalcode=array(	"ru"=>"����.������",
			"fr"=>"CP",
			"de"=>"PLZ",
			"en"=>"ZIP",
			"es"=>"CP",
			"it"=>"CAP");

$txt_city=array(	"ru"=>"�����",
                        "fr"=>"Localit�",
			"de"=>"Ort",
			"en"=>"City",
			"es"=>"Ciudad",
			"it"=>"Localit&agrave;");

$txt_country=array(	"ru"=>"������",
                        "fr"=>"Pays",
			"de"=>"Land",
			"en"=>"Country",
			"es"=>"Pa&iacute;is",
			"it"=>"Stato");

$txt_phone=array(	"ru"=>"�������",
                        "fr"=>"T�l�phone",
			"de"=>"Telefon",
			"en"=>"Phone",
			"es"=>"Tel�fono",
			"it"=>"Telefono");

$txt_fax=array(		"ru"=>"����",
                        "fr"=>"T�l�fax",
			"de"=>"Fax",
			"en"=>"Fax",
			"es"=>"Fax",
			"it"=>"Fax");

$txt_lang=array(	"ru"=>"����",
                        "fr"=>"Langue",
			"de"=>"Sprache",
			"en"=>"Language",
			"es"=>"Idioma",
			"it"=>"Lingua");

$txt_langs=array(	"ru"=>"�������",
                        "fr"=>"Francais",
			"de"=>"Deutsch",
			"en"=>"English",
			"es"=>"Castellano",
			"it"=>"Italiano");

$txt_homepage=array(	"ru"=>"URL",        // :)
                        "fr"=>"Homepage",
			"de"=>"Homepage",
			"en"=>"Homepage",
			"es"=>"Homepage",
			"it"=>"homepage");

$txt_company=array(	"ru"=>"�����������",
                        "fr"=>"Entreprise",
			"de"=>"Firma",
			"en"=>"Company",
			"es"=>"Empresa",
			"it"=>"Firma");

$txt_position=array(	"ru"=>"���������",
                        "fr"=>"Fonction",
			"de"=>"Funktion",
			"en"=>"Position",
			"es"=>"Posici&oacute;n",
			"it"=>"Posizione");

$txt_reason=array(	"ru"=>"�������",
                        "fr"=>"Raison",
			"de"=>"Grund",
			"en"=>"Reason",
			"es"=>"Raz&oacute;n",
			"it"=>"Ragione sociale");

$txt_notes=array(	"ru"=>"����������",
                        "fr"=>"Notes",
			"de"=>"Notizen",
			"en"=>"Notes",
			"es"=>"Notas",
			"it"=>"Note");

$txt_alias=array(	"ru"=>"�����",
                        "fr"=>"Alias",
			"de"=>"Alias",
			"en"=>"Alias",
			"es"=>"Alias",
			"it"=>"Alias");

$txt_fwd=array(		"ru"=>"Fwd",
                        "fr"=>"Fwd",
			"de"=>"Fwd",
			"en"=>"Fwd",
			"es"=>"Fwd",
			"it"=>"Fwd");

$txt_destination=array(	"ru"=>"Destination",
                        "fr"=>"Destination",
			"de"=>"Weiterleitung an",
			"en"=>"Destination",
			"es"=>"Destino",
			"it"=>"Destinatario");

$txt_email=array(	"ru"=>"Email",
                        "fr"=>"E-mail",
			"de"=>"E-Mail",
			"en"=>"Email",
			"es"=>"E-mail",
			"it"=>"E-mail");

$txt_edit=array(	"ru"=>"��������",
                        "fr"=>"Modifier",
			"de"=>"Aendern",
			"en"=>"Edit",
			"es"=>"Editar",
			"it"=>"Modifica");

$txt_delete=array(	"ru"=>"�������",
                        "fr"=>"Effacer",
			"de"=>"Loeschen",
			"en"=>"Delete",
			"es"=>"Eliminar",
			"it"=>"Elimina");

$txt_cancel=array(	"ru"=>"��������",
                        "fr"=>"Annuler",
			"de"=>"Annulieren",
			"en"=>"Cancel Operation",
			"es"=>"Cancelar",
			"it"=>"Annulla");

$txt_activate=array(	"ru"=>"������������",
                        "fr"=>"Activer",
			"de"=>"Aktivieren",
			"en"=>"Activate",
			"es"=>"Activar",
			"it"=>"Attiva");

$txt_account_name=array("ru"=>"����",
                        "fr"=>"Nom du compte",
			"de"=>"Konto name",
			"en"=>"Account name",
			"es"=>"Nombre de Cuenta",
			"it"=>"Account");

$txt_account_type=array("ru"=>"���",
                        "fr"=>"Sorte de compte",
			"de"=>"Kontoart",
			"en"=>"Account type",
			"es"=>"Tipo de Cuenta",
			"it"=>"Tipo di Account");

$txt_domain=array(	"ru"=>"�����",
                        "fr"=>"Domaine",
			"de"=>"Domain",
			"en"=>"Domain",
			"es"=>"Dominio",
			"it"=>"Dominio");

$txt_domain_or_email=array(	"ru"=>"����� Email",
                        "fr"=>"Adresse mail",
			"de"=>"E-Mail Adresse",
			"en"=>"Email Address",
			"es"=>"E-mail o Dominio",
			"it"=>"Indirizzo E-mail o Dominio");

$txt_status=array(	"ru"=>"������",
                        "fr"=>"Etat",
			"de"=>"Zustand",
			"en"=>"Status",
			"es"=>"Estado",
			"it"=>"Stato");

$txt_login=array(	"ru"=>"�����",
                        "fr"=>"Login",
			"de"=>"Login",
			"en"=>"Login",
			"es"=>"Login",
			"it"=>"Login");

$txt_delete=array(	"ru"=>"�������",
                        "fr"=>"Effacer",
			"de"=>"Loeschen",
			"en"=>"Delete",
			"es"=>"Borrar",
			"it"=>"Elimina");

$txt_info=array(	"ru"=>"����",
                        "fr"=>"Info",
			"de"=>"Info",
			"en"=>"Info",
			"es"=>"Info",
			"it"=>"Info");

$txt_action=array(	"ru"=>"��������",
                        "fr"=>"Action",
			"de"=>"Aktion",
			"en"=>"Action",
			"es"=>"Acci�n",
			"it"=>"Azione");

$txt_no_accounts=array(	"ru"=>"��� ������ ������������",
                        "fr"=>"Aucun comptes enregistr&eacute;s.",
			"de"=>"Keine registrierte Konto",
			"en"=>"No registred accounts",
			"es"=>"Ninguna cuenta registrada",
			"it"=>"Non ci sono account");

$txt_no_domains=array(	"ru"=>"��� ������ ������",
                        "fr"=>"Aucun domaines enregistr&eacute;s",
			"de"=>"Keine registrierte Domains",
			"en"=>"No registred domains",
			"es"=>"Ning�n dominio registrado",
			"it"=>"Non ci sono domini");

$txt_new=array(		"ru"=>"�����",
                        "fr"=>"Nouveau",
			"de"=>"Neu",
			"en"=>"New",
			"es"=>"Nuevo",
			"it"=>"Nuovo");

$txt_avail_domain=array(	"ru"=>"��������� ������",
                        "fr"=>"Domaines disponibles",
			"de"=>"Moeglich Domains",
			"en"=>"Available domains",
			"es"=>"Dominios disponibles",
			"it"=>"Domini disponibili");

$txt_own_domains=array(	"ru"=>"���� ������",
                        "fr"=>"Vos propres domaines",
			"de"=>"Ihre eigene Domains",
			"en"=>"Your own domains",
			"es"=>"Tus propios dominios",
			"it"=>"I tuoi domini");

$txt_open_domains=array(	 "ru"=>"�������� ������",
                        "fr"=>"Les domaines publics",
			"de"=>"Die offene Domains",
			"en"=>"The open domains",
			"es"=>"Los dominios p�blicos",
			"it"=>"Domini pubblici");

$txt_no_domain=array(	"ru"=>"��� �������",
                        "fr"=>"Pas de domaine",
			"de"=>"Keine Domains",
			"en"=>"No Domains",
			"es"=>"Sin dominios",
			"it"=>"Non c'&egrave; alcun dominio");

$txt_please_choose=array(	 "ru"=>"���������� ��������",
                        "fr"=>"Faites votre choix",
			"de"=>"Bitte waehlen",
			"en"=>"Please choose",
			"es"=>"Elige",
			"it"=>"Scegli");

$txt_subdomain_name=array(	"ru"=>"��� ���������",
                        "fr"=>"Nom du sous-domaine",
			"de"=>"Subdomain Name",
			"en"=>"Subdomain Name",
			"es"=>"Subdominio",
			"it"=>"Sottodominio");

$txt_authorized_chars=array(	 "ru"=>"����������� ������: a-z, 0-9 � '-'",
                        "fr"=>"Caracteres autorises : a-z, 0-9 et '-'",
			"de"=>"Zugelassen sind nur a-z, 0-9 und '-'",
			"en"=>"Only use a-z, 0-9 and '-'",
			"es"=>"Us� s�lo a-z, 0-9 y '-'",
			"it"=>"Usa solo a-z, 0-9 e '-'");

$txt_=array(		"ru"=>"",
                        "fr"=>"",
			"de"=>"",
			"en"=>"",
			"it"=>"");

$txt_=array(		"ru"=>"",
                        "fr"=>"",
			"de"=>"",
			"en"=>"",
			"it"=>"");


//$txt_=array(		"ru"=>"",
//                      "fr"=>"",
//			"de"=>"",
//			"en"=>"",
//			"it"=>"");
//



	//
	// stings for oMail2 - converted to php3 by om on 17.jan.2k
	//

	// Credits : M.Zenhausern for the german translation & corrections
	// 


$txt_current_language = array( "ru"=>"�������",
 "en" => "English",
 "fr" => "Fran�ais",
 "de" => "Deutsch",
 "es" => "Castellano",
 "it"=>"Italiano");

$txt_hello = array( 
 "ru"=>"�����������",
 "en" => "Hello",
 "fr" => "Bonjour",
 "de" => "Hallo",
 "es" => "Hola",
 "it"=>"Salve");

$txt_menu = array( 
 "ru" => "����",
 "en" => "Menu",
 "fr" => "Menu",
 "de" => "Menu",
 "es" => "Men�",
 "it" => "Menu");

$txt_welcome = array(
 "ru" => "����� ����������",
 "en" => "Welcome!",
 "fr" => "Bienvenue!",
 "de" => "Willkommen!",
 "es" => "Welcome!",
 "it"=>"Welcome!");

$txt_menu_domain_descr = array(
 "ru" => "����� ���������� � ������� ���� �������������� ������", 
 "en" => "Welcome in the domain administration main menu",
 "fr" => "Bienvenue dans le menu principal de l'adminstration de votre domaine",
 "de" => "Willkomen im Maildomain Administration Hauptmenu ",
 "es" => "Bienvenido al men� de administraci&oacute;n de dominios",
 "it"=>"Benvenuto al menu principale per la gestione del dominio");

$txt_menu_account_descr = array(
 "ru" => "����� ���������� � ������� ���� ���������� ����� �������� ������",
 "en" => "Welcome your mail account administration main menu",
 "fr" => "Bienvenue dans le menu principal de l'adminstration de votre compte Mel",
 "de" => "Willkomen im Mailkonto Administration Hauptmenu ",
 "es" => "Bienvenido al men� de administraci&oacute;n de cuenta de correo",
 "it"=>"Benvenuto al menu principale per la gestione del tuo account di posta");



$txt_edit = array(
"ru"=>"��������",
 "en" => "Edit",
 "fr" => "Editer",
 "de" => "Editieren",
 "es" => "Editar",
 "it"=>"Modifica");

$txt_mailbox = array(
 "ru"=>"Email",
 "en" => "Mailbox",
 "fr" => "Messages",
 "de" => "E-Mail",
 "es" => "Casilla",
 "it"=>"Casella");

$txt_list = array( 
 "ru"=>"������",
 "en" => "List",
 "fr" => "Liste",
 "de" => "Zur�ck",
 "es" => "Lista",
 "it"=>"Lista");

$txt_add_user = array( 
"ru"=>"����� ����",
 "en" => "Add_User",
 "fr" => "Ajouter_compte",
 "de" => "Neuer Account",
 "es" => "Agregar usuario",
 "it"=>"Aggiungi account");

$txt_add_alias = array(
"ru"=>"����� �����", 
 "en" => "Add_Alias",
 "fr" => "Ajouter_alias",
 "de" => "Neuer Alias",
 "es" => "Agregar Alias",
 "it"=>"Aggiungi Alias");

$txt_delete = array(
"ru"=>"�������",
 "en" => "Delete",
 "fr" => "Effacer",
 "de" => "L�schen",
 "es" => "Eliminar",
 "it"=>"Elimina");

$txt_info = array(
"ru"=>"����", 
 "en" => "Info",
 "fr" => "Info",
 "de" => "Info",
 "es" => "Info",
 "it"=>"Info");

$txt_login = array( 
"ru"=>"�����",
 "en" => "Login",
 "fr" => "Annonce",
 "de" => "Anmeldung",
 "es" => "Ingresar",
 "it"=>"Login");

$txt_login_again = array(
"ru"=>"����� �����", 
 "en" => "Login again",
 "fr" => "Nouvelle annonce",
 "de" => "Neue Anmeldung",
 "es" => "Reingresar",
 "it"=>"Esegui nuovamente il Login");

$txt_please_login = array(
"ru"=>"���������� ��������������� ����, ��������� ��� �������� �����, ����� � ������", 
 "en" => "Please Identify Yourself with your domain and password.",
 "fr" => "Veillez vous identifier a l'aide du nom de domaine et de votre mot de passe",
 "de" => "Bitte melden Sie sich ein mit Ihren Domain Name und Passwort",
 "es" => "Por favor ingrese su nombre de usuario o dominio y contrase&ntilde;a",
 "it"=>"Per favore inserisci il tuo dominio e la password.");

$txt_update_list = array( 
 "ru"=>"��������",
 "en" => "Update_List",
 "fr" => "Reactualiser_Liste",
 "de" => "Liste aktualisieren",
 "es" => "Actualizar",
 "it"=>"Aggiorna_Lista");

$txt_pw_chg_ok = array( "ru"=>"������ ������� �������", 
 "en" => "Password has been changed sucessfully",
 "fr" => "Le mot de passe a �t� chang� avec succ�s",
 "de" => "Passwort wurde erfolgreich ge�ndert",
 "es" => "El password ha sido cambiado con &eacute;xito",
 "it"=>"La password &egrave; stata correttamente cambiata");

$txt_password_str = array( 
"ru"=>"������",
 "en" => "Password",
 "fr" => "Mot de passe",
 "de" => "Passwort",
 "es" => "Contrase&ntilde;a",
 "it"=>"Password");

$txt_domain_name = array( 
"ru"=>"�����",
 "en" => "Domain",
 "fr" => "Domaine",
 "de" => "Domain",
 "es" => "Dominio",
 "it"=>"Dominio");

$txt_dom_ident = array(
"ru"=>"����������� ������", 
 "en" => "Domain Authentication",
 "fr" => "Identification du Domaine",
 "de" => "E-Mail Administration",
 "es" => "Autentificaci�n de dominio",
 "it"=>"Autentificazione");

$txt_secu_fail_dname = array(
"ru"=>"������: ��� ������ ������ ���� � ����� domain.ext", 
 "en" => "Security Failure : domain name must have the form domain.ext",
 "fr" => "Erreur de s�curit� : le nom de domaine doit etre de la forme domaine.ext",
 "de" => "Sicherheitsfehler : Domain Name muss der Form domain.ext sein",
 "es" => "Alerta de seguridad: El dominio de ser de la forma dominio.ext",
 "it"=>"Errore: il dominio deve essere della forma dominio.tld");

$txt_action_menu_title = array(
"ru"=>"���� ������",
 "en" => "Menu for domain",
 "fr" => "Menu pour domaine",
 "de" => "Menu f�r Domain",
 "es" => "Men� para el dominio",
 "it"=>"Menu del dominio");

$txt_err_action_not_found = array(
"ru"=>"�������� �� �������", 
 "en" => "Action not found",
 "fr" => "Action non trouv�e",
 "de" => "Befehl nicht gefunden",
 "es" => "Comando no encontrado",
 "it"=>"Comando errato");

$txt_title_info = array(
"ru"=>"������ ������������",
 "en" => "Entry for user",
 "fr" => "Enregistrement concernant",
 "de" => "Benutzer Info f�r",
 "es" => "Entrada para el usuario",
 "it"=>"Scheda dell'utente");

$txt_real_name = array(
 "ru"=>"���",
 "en" => "Real Name",
 "fr" => "Nom complet",
 "de" => "Name",
 "es" => "Nombre y Apellido",
 "it"=>"Nome e Cognome");

$txt_email_adr = array(
 "ru"=>"����� Email", 
 "en" => "Email Address",
 "fr" => "Adresse Mel",
 "de" => "E-Mail Adresse",
 "es" => "Direcci�n de correo",
 "it"=>"Indirizzo E-Mail");

$txt_account_type = array(
 "ru"=>"���", 
 "en" => "Account Type",
 "fr" => "Genre de compte",
 "de" => "Kontoart",
 "es" => "Tipo de cuenta",
 "it"=>"Tipo di Account");

$txt_mailbox_size = array(
"ru"=>"������",
 "en" => "Size",
 "fr" => "Taille",
 "de" => "Gr�sse",
 "es" => "Tama&ntilde;o",
 "it"=>"Dimensione");

$txt_numb_of_msg = array(
 "ru"=>"���������� �����", 
 "en" => "Number of Messages",
 "fr" => "Nombre de messages",
 "de" => "Anzahl E-Mails",
 "es" => "Cantidad de Mensajes",
 "it"=>"Numero di messaggi");

$txt_read_mails = array(
"ru"=>"������ �����",
 "en" => "Old Mails",
 "fr" => "Anciens Mails",
 "de" => "Alte Mails",
 "es" => "Mensajes viejos",
 "it"=>"Messaggi vecchi");

$txt_unread_mails = array(
"ru"=>"����� �����",
 "en" => "Unread Mails",
 "fr" => "Nouveaux Mails",
 "de" => "Neue Mails",
 "es" => "Mensajes nuevos",
 "it"=>"Messaggi nuovi");

$txt_read = array(
"ru"=>"������",
 "en" => "Read",
 "fr" => "Lire",
 "de" => "Lesen",
 "es" => "Leer",
 "it"=>"Letti");

$txt_last_mail_arrived = array(
"ru"=>"����� ����� ������ �", 
 "en" => "Last Mail came on",
 "fr" => "Derni�re arriv�e de mel",
 "de" => "Neueste E-Mail",
 "es" => "�ltimo correo",
 "it"=>"Ultimo messaggio ricevuto il");

$txt_last_mailbox_access = array(
"ru"=>"��������� ��������� � �����", 
 "en" => "Last Mailbox access",
 "fr" => "Dernier acc�s � la bo�te",
 "de" => "Letzte Zugriff",
 "es" => "�ltimo chequeo",
 "it"=>"Ultimo accesso alla casella avvenuto il");

$txt_quota = array(
"ru"=>"�����������",
 "en" => "Quota",
 "fr" => "Limites",
 "de" => "Grenzen",
 "es" => "Quota",
 "it"=>"Quota");

$txt_title_edit = array(
 "ru" => "��������� ������ ������������", 
 "en" => "Account Edit for user",
 "fr" => "Modification des donn�es pour",
 "de" => "Konto Daten �ndern f�r",
 "es" => "Edici�n de cuenta para",
 "it"=>"Modifica dell'account di");

$txt_username = array(
"ru"=>"�����",
 "en" => "Username",
 "fr" => "Nom d'utilisateur",
 "de" => "Benutzername",
 "es" => "Nombre de usuario",
 "it"=>"Nome Utente");

$txt_old = array(
 "ru"=>"������", 
 "en" => "Old",
 "fr" => "Ancien",
 "de" => "Altes",
 "es" => "Viejos",
 "it"=>"Vecchio");

$txt_new = array(
 "ru" => "�����",
 "en" => "New",
 "fr" => "Nouveau",
 "de" => "Neues",
 "es" => "Nuevos",
 "it"=>"Nuovo");

$txt_newuser = array( 
"ru"=>"����� ����",
 "en" => "New Mailbox",
 "fr" => "Nouvelle Boite",
 "de" => "Neue Mailbox",
 "es" => "Nuevo usuario",
 "it"=>"Nuova casella");

$txt_newalias = array(
"ru"=>"����� �����", 
 "en" => "New Alias",
 "fr" => "Nouvel Alias",
 "de" => "Neue Alias",
 "es" => "Nuevo alias",
 "it"=>"Nuovo Alias");

$txt_and_again = array( 
"ru"=>"��� ���",
 "en" => "And again",
 "fr" => "V�rification",
 "de" => "Nochmals",
 "es" => "Verificaci�n",
 "it"=>"Verifica");

$txt_edit_result = array(
"ru"=>"��������� �������� ������������ : ���������", 
 "en" => "Edit User Setup : Result",
 "fr" => "Modification des donn�es : resultats",
 "de" => "Konto Daten �nderung : Ergebnis",
 "es" => "Modificaci�n de usuario: Resultado",
 "it"=>"Modifica dell'account: Risultato");

$txt_entry_for_user = array( 
"ru"=>"������ ������������",
 "en" => "Entry for user",
 "fr" => "Donn�es concernant",
 "de" => "Daten von",
 "es" => "Entrada para el usuario",
 "it"=>"Scheda dell'utente");

$txt_title_mailbox = array(
"ru"=>"����",
 "en" => "Mailbox of",
 "fr" => "Boite aux lettres de",
 "de" => "Briefkasten von",
 "es" => "Casilla de",
 "it"=>"Casella E-Mail di");

$txt_delete_account = array( 
"ru"=>"��������",
 "en" => "Account Deletion",
 "fr" => "Effacage de compte",
 "de" => "Konto l�schen",
 "es" => "Eliminar cuenta",
 "it"=>"Elimina Account");

$txt_confirm_delete = array( 
"ru"=>"����������� ��������...",
 "en" => "Delete Request : Please confirm...",
 "fr" => "Effacement demand� : veuillez confirmer...",
 "de" => "L � S C H E N",
 "es" => "Eliminar cuenta: Por favor confirme...",
 "it"=>"Eliminazione: Per favore conferma...");

$txt_delete_account_confirm = array(
"ru"=>"�� �������, ��� ������ ������� ���?", 
 "en" => "Are you sure you want to delete this account?",
 "fr" => "Etes-vous certain de vouloir effacer le compte suivant?",
 "de" => "Bitte best�tigen Sie die L�schung des folgenden Konto:",
 "es" => "�Est� seguro que desea eliminar esta cuenta?",
 "it"=>"Sei sicuro di voler cancellare questo account?");

$txt_delete_for_user = array( 
 "ru"=>"��� ������������",
 "en" => "for user",
 "fr" => "pour l'utilisateur",
 "de" => "",
 "es" => "para el usuario",
 "it"=>"per l'utente");

$txt_delete_remove_now = array(
"ru"=>"����� <I>������������</I> ������", 
 "en" => "will remove it now, <I>definitely</I>",
 "fr" => "va detruire le compte, <I>irrem�diablement</I>",
 "de" => "L�scht das Konto unwiederruflich",
 "es" => "la eliminar� ahora <I>definitivamente</I>",
 "it"=>"lo canceller&agrave; ora <I>definitivamente</I>");

$txt_delete_backto_list = array(
"ru"=>"�������� � ������ <I>���</I> ��������",
 "en" => "will bring you back to the list, <I>without</i> deleting anything",
 "fr" => "vous ramenera � la liste, <i>sans</i> rien effacer",
 "de" => "Zur�ck zur Liste, ohne eine L�schung vorzunehmen",
 "es" => "te llevar� de regreso a la lista, <I>sin</I> eliminar nada",
 "it"=>"ti riporter&agrave; alla lista <I>senza</I> cancellare nulla");

$txt_deleted_sucessfully = array(
"ru"=>"������� ������",
 "en" => "deleted sucessfully",
 "fr" => "a �t� effac� avec succ�s",
 "de" => "ist gel�scht worden",
 "es" => "exitosamente eliminada",
 "it"=>"cancellato con successo");

$txt_delete_result = array(
 "ru" => "������ �� �������� : ���������",
 "en" => "Delete Request : Result",
 "fr" => "Effacement : Resultat",
 "de" => "L�schung (?) : Ergebnis",
 "es" => "Eliminar cuenta: Resultado",
 "it"=>"Eliminazione dell'account: Risultato");

$txt_delete_deletion = array(
"ru"=>"��������",
 "en" => "Deletion of",
 "fr" => "Effacement de",
 "de" => "L�schung von",
 "es" => "Eliminaci�n de",
 "it"=>"Eliminazione di");

$txt_for_user = array(
 "ru"=>"��� ������������", 
 "en" => "for user",
 "fr" => "pour le compte",
 "de" => "F�r Account",
 "es" => "para el usuario",
 "it"=>"per l'utente");

$txt_title_list = array(
"ru"=>"������ ��� ������",
 "en" => "Listing for domain",
 "fr" => "List pour le domaine",
 "de" => "Listing f�rs Domain",
 "es" => "Listado para el dominio",
 "it"=>"Lista del dominio");

$txt_domain_info = array(
"ru"=>"���������� � ������",
 "en" => "Domain Information",
 "fr" => "Informations sur le domaine",
 "de" => "Domaininformationen",
 "es" => "Informaci�n de Dominio",
 "it"=>"Informazione sul dominio");

$txt_date_of_creation = array(
"ru"=>"���� ��������", 
 "en" => "Date of creation",
 "fr" => "Date de mise en place",
 "de" => "Accountsetup Datum",
 "es" => "Fecha de creaci�n",
 "it"=>"Data di creazione");

$txt_last_change = array(
"ru"=>"��������� ���������", 
 "en" => "Last Change",
 "fr" => "Dernier changement",
 "de" => "Letzte �nderung",
 "es" => "�ltimo cambio",
 "it"=>"Ultima modifica");

$txt_how_many_mailbox = array(
"ru"=>"���������� ������", 
 "en" => "How many Mailboxes",
 "fr" => "Combien de Comptes",
 "de" => "Wieviele Konto",
 "es" => "Cu�ntas casillas",
 "it"=>"Quante caselle di posta");

$txt_how_many_alias = array(
"ru"=>"���������� �������", 
 "en" => "How many Aliases",
 "fr" => "Combiens d'Alias",
 "de" => "Vieviele Aliase",
 "es" => "C�antos Aliases",
 "it"=>"Quanti alias");

$txt_total_size = array( 
"ru"=>"����� ������ ������",
 "en" => "Total Size of Mailboxes",
 "fr" => "Taille totale des Boites aux lettres",
 "de" => "Gesamte Briefkastensgr�sse",
 "es" => "Tama�o total de las casillas",
 "it"=>"Dimensione totale delle caselle di posta");

$txt_biggest_mailbox = array(
"ru"=>"����� ������� ����", 
 "en" => "Biggest Mailbox",
 "fr" => "Compte le plus encombrant",
 "de" => "Gr�sste Briefkasten",
 "es" => "Casilla m�s grande",
 "it"=>"Massima dimensione di una casella di posta");

$txt_mailboxes = array(
"ru"=>"�����",
 "en" => "Mailboxes",
 "fr" => "Boites aux lettres",
 "de" => "Liste aller Accounts",
 "es" => "Casillas",
 "it"=>"Caselle di posta");

$txt_smallmailboxes = array(
 "ru"=>"������", 
 "en" => "mailboxes",
 "fr" => "boites aux lettres",
 "de" => "accounts",
 "es" => "casillas",
 "it"=>"caselle di posta");

$txt_aliases = array(
"ru"=>"������", 
 "en" => "Aliases",
 "fr" => "Aliases",
 "de" => "Liste aller Alias",
 "es" => "Aliases",
 "it"=>"Alias");

$txt_smallaliases = array(
"ru"=>"�������", 
 "en" => "aliases",
 "fr" => "aliases",
 "de" => "alias",
 "es" => "aliases",
 "it"=>"alias");

$txt_back_to_begining = array(
"ru"=>"� ������...", 
 "en" => "Back to the beginning...",
 "fr" => "Retour au d&eacute;but...",
 "de" => "Zur�ck zum Anfang...",
 "es" => "Volver al inicio...",
 "it"=>"Torna all'inizio...");

$txt_you_have_to_be_sysadmin_for_that = array(
"ru"=>"��������, ������ �� �������!", 
 "en" => "Sorry, you have to be sysadmin to do that!",
 "fr" => "D&eacute;sol&eacute; vous devez etre administrateur pour ca!",
 "de" => "Geht nicht: Sie m&uuml;ssen Administrator sein f&uuml;r das!",
 "es" => "�Debes ser el administrador de sistema para hacer eso!",
 "it"=>"Hai bisogno dei privilegi di amministratore per farlo!");

$txt_user_already_exists = array(
"ru"=>"��������. ����� ��� ����",
 "en" => "Sorry, user already exists, please choose another one!",
 "fr" => "D&eacute;sol&eacute; mais ce nom est deja utilise!",
 "de" => "Folgender Fehler ist aufgetreten : Benutzer existiert schon",
 "es" => "�El usuario ya existe!",
 "it"=>"L'utente esiste gi&agrave;. Scegli un altro nome.");

$txt_user_doesnt_exists = array(
"ru"=>"��������, ����� �� ������",
 "en" => "Sorry, user not found",
 "fr" => "Desole, aucun user avec ce nom",
 "de" => "Folgender Fehler ist aufgetreten : Benutzer existiert nicht",
 "es" => "No se ha encontrado el usuario",
 "it"=>"Utente non trovato");

$txt_err_dom_not_registred = array(
"ru"=>"��� ������ ������", 
 "en" => "Domain not registred on server",
 "fr" => "Domaine non enregistr� sur le serveur",
 "de" => "Domain nicht auf dem Server gespeichert",
 "es" => "Este dominio no se halla en el servidor",
 "it"=>"Quel dominio non &egrave; disponibile su questo server");

$txt_bad_passwd_for_domain = array(
"ru"=>"������������ ������ ��� ���������� �������", 
 "en" => "Bad Password for Domain manager",
 "fr" => "Mot de passe erron� pour l'administrateur du domaine",
 "de" => "Falsches Passwort f�r Domainadministrator",
 "es" => "Contrase&ntilde;a inv�lida para administrador de dominios",
 "it"=>"Password per l'amministrazione del dominio errata");

$txt_error = array(
 "ru"=>"������",
 "en" => "Error",
 "fr" => "Erreur",
 "de" => "Fehler",
 "es" => "Error",
 "it"=>"Errore");

$txt_more_fwd=array(	"ru"=>"��� Fwd",
			"fr"=>"Plus de Fwd",
			"de"=>"Mehr Fwd",
			"en"=>"More Fwd",
			 "es" => "M�s Fwd",
			"it"=>"Altri Fwd");

$txt_responder=array(	"ru"=>"���������",
			"fr"=>"Repondeur",
			"de"=>"Beantworter",
			"en"=>"Vacation",
			 "es" => "Autoresponder",
			"it"=>"Autoresponder");

$txt_directory=array(	"ru"=>"�����",
			"fr"=>"Repertoire",
			"de"=>"Verzeichnis",
			"en"=>"Directory",
			"es" => "Directorio",
			"it"=>"Cartella");


$txt_newalias = array( 
"ru"=>"����� �����",
 "en" => "New Mail Alias",
 "fr" => "Nouvelle Adresse de Redirection",
 "de" => "Neue Weiterleitungsadresse",
 "es" => "Nuevo Alias",
 "it"=>"Nuovo Alias");

$txt_newuser = array(
"ru"=>"����� ����", 
 "en" => "New Mailbox Account",
 "fr" => "Nouvelle Boite aux lettres",
 "de" => "Neue Mailbox",
 "es" => "Nuevo usuario",
 "it"=>"Nuova Mailbox");

$txt_delete_msg = array( 
"ru"=>"�������� �����",
 "en" => "Deletion of Account",
 "fr" => "Effacement du compte",
 "de" => "Konto erloeschung",
 "es" => "Eliminar cuenta",
 "it"=>"Eliminazione dell'account");

$txt_edit_account = array(
"ru"=>"��������� ���������� �����", 
 "en" => "Account Edition",
 "fr" => "Modification des informations du compte",
 "de" => "Kontoinformations Aenderung",
 "es" => "Editar cuenta",
 "it"=>"Modifica dell'account");

$txt_read_mail = array( 
"ru"=>"������ �����",
 "en" => "Mail Reading",
 "fr" => "Lecture des Mails",
 "de" => "Mails Lesen",
 "es" => "Lectura de E-mails",
 "it"=>"Lettura della posta");

$txt_logout = array( 
"ru"=>"�����",
 "en" => "Logout",
 "fr" => "Quitter",
 "de" => "Ausloggen",
 "es" => "Salir",
 "it"=>"Esci");

$txt_close = array(
"ru"=>"�������", 
 "en" => "Close",
 "fr" => "Fermer",
 "de" => "Schliessen",
 "es" => "Cerrar",
 "it"=>"Chiudi");

$txt_refresh_menu = array(
"ru"=>"�������� ����", 
 "en" => "Refresh Menu",
 "fr" => "R&eacute;actualiser",
 "de" => "Aktualisieren",
 "es" => "Actualizar el men�",
 "it"=>"Aggiorna Menu");

$txt_session_expired = array(
"ru"=>"����� ������ �����������", 
 "en" => "Session expired",
 "fr" => "Session trop ancienne",
 "de" => "Session zu alt",
 "es" => "La sesi�n ha expirado",
 "it"=>"Timeout Sessione");

$txt_submit = array(
"ru"=>"�����������",
 "en" => "Submit",
 "fr" => "Enregistrer",
 "de" => "Speichern",
 "es" => "Enviar",
 "it"=>"Invia");

$txt_error_no_username = array(
"ru"=>"����� ������ ���!", 
 "en" => "You have to mention a username!",
 "de" => "Vous devez indiquer un nom!",
 "fr" => "Sie m&uuml;ssen einen Konto Name eingeben!",
 "es" => "�Debes ingresar un nombre de usuario!",
 "it"=>"Devi specificare un nome utente!");

$txt_error_invalid_chars_in_username = array(
"ru"=>"����������� ������� � ����� (�����: A-Z, 0-9, _, -)!", 
 "en" => "Non valid chars in username (ok: A-Z, 0-9, _, -)!",
 "fr" => "Characters non autorises dans le nom (ok: A-Z, 0-9, _, -)!",
 "de" => "Verbotene Chars in username (ok: A-Z, 0-9, _, -)!",
 "es" => "Caract�res inv�lidos (S�lo a-Z, 0-9, _, -)",
 "it"=>"Il nome utente contiene caratteri non validi (usa solo: A-Z, 0-9, _, -)! ");

$txt_error_pw_not_same = array(
"ru"=>"�� ������ ������ ��� ���� ��� �� ������",
 "en" => "You have to type twice the same password",
 "fr" => "Vous devez indiquer deux fois le meme mot de passe",
 "de" => "Sie mussen zweimal das gleiche Passwort eintippen",
 "es" => "Debes ingresar la contrase&ntilde;a 2 veces",
 "it"=>"Le due password immesse non coincidono");

$txt_error_pw_needed = array( 
"ru"=>"�� ������ ������ ������",
 "en" => "You have to type a password",
 "fr" => "Vous devez indiquer un mot de passe",
 "de" => "Sie mussen einen Passwort eintippen",
 "es" => "Debes ingresar una contrase&ntilde;a",
 "it"=>"Devi specificare una password");

$txt_error_fwd_needed = array(
"ru"=>"����� ���� �� ���� ����� ���������", 
 "en" => "You have to type at least one forwarder",
 "fr" => "Vous devez indiquer au moins une adresse de redirection",
 "de" => "Sie mussen eine Weiterleitungadresse eingeben",
 "es" => "Debes ingresar al menos un forward",
 "it"=>"Devi specificare almeno un indirizzo di forward");

$txt_yes = array( 
"ru"=>"��",
 "en" => "Yes",
 "fr" => "Oui",
 "de" => "Ja",
 "es" => "Si",
 "it"=>"Si");

$txt_no = array(
"ru"=>"���", 
 "en" => "No",
 "fr" => "Non",
 "de" => "Nein",
 "es" => "No",
 "it"=>"No");

$txt_activated = array(
"ru"=>"�������", 
 "en" => "Actived",
 "fr" => "Activ�",
 "de" => "Eingeschaltet",
 "es" => "Activado",
 "it"=>"Attivato");

$txt_inactived = array(
 "ru"=>"��������", 
 "en" => "Inactived",
 "fr" => "Declenche",
 "de" => "Ausgeschaltet",
 "es" => "Desactivado",
 "it"=>"Disattivato");

$txt_subject = array(
 "ru"=>"����", 
 "en" => "Subject",
 "fr" => "Sujet",
 "de" => "Betreff",
 "es" => "Asunto",
 "it"=>"Oggetto");

$txt_from = array(
"ru"=>"��", 
 "en" => "From",
 "fr" => "Expediteur",
 "de" => "Absender",
 "es" => "De",
 "it"=>"Da");

$txt_text = array(
"ru"=>"�����", 
 "en" => "Text",
 "fr" => "Texte",
 "de" => "Text",
 "es" => "Texto",
 "it"=>"Testo");

$txt_autoanswertext = array(
"ru"=>"����� ����������", 
 "en" => "Autoreply Text",
 "fr" => "Texte du repondeur",
 "de" => "Beantwortertext",
 "es" => "Mensaje del Autoresponder",
 "it"=>"Risposta automatica");

$txt_date = array( 
"ru"=>"����",
 "en" => "Date",
 "fr" => "Date",
 "de" => "Datum",
 "es" => "Fecha",
 "it"=>"Data");

$txt_size = array( 
"ru"=>"������",
 "en" => "Size",
 "fr" => "Taille",
 "de" => "Groesse",
 "es" => "Tama�o",
 "it"=>"Dimensione");

$txt_mailbox_listing = array(
 "ru"=>"������ ������", 
 "en" => "Mailbox Listing",
 "fr" => "Liste des Mails",
 "de" => "E-Mails Listing",
 "es" => "Lista de E-mails",
 "it"=>"Lista delle caselle di posta");

$txt_mailboxes_title = array(
"ru"=>"�����", 
 "en" => "Mailboxes",
 "fr" => "Boites aux lettres",
 "de" => "E-Mail kontos",
 "es" => "Casillas",
 "it"=>"Caselle di posta");

$txt_aliases_title = array(
"ru"=>"������", 
 "en" => "Aliases",
 "fr" => "Alias",
 "de" => "Alias",
 "es" => "Aliases",
 "it"=>"Alias");

$txt_user_title = array(
"ru"=>"��� �������� ����", 
 "en" => "Your Mail Account",
 "fr" => "Votre compte mail",
 "de" => "Mailkonto",
 "es" => "Tu cuenta de E-mail",
 "it"=>"Il tuo account di posta");

$txt_info = array( 
 "ru"=>"����",
 "en" => "Info",
 "fr" => "Info",
 "de" => "Info",
 "es" => "Info",
 "it"=>"Info");

$txt_login_failed = array( 
"ru"=>"� ������� ��������: ����������, ��������� ����� � ������", 
 "en" => "Login failed : please check login and password",
 "fr" => "La connexion a �chou� : veuillez v�rifier le login et votre mot de passe",
 "de" => "Kein Zugang: bitte Login und Passwort �berpr�fen",
 "es" => "Login incorrecto : Por favor verifique su nombre de usuario y contrase&ntilde;a",
 "it"=>"Login errato: per favore controlla il nome utente e la password");

$txt_facultatif = array( 
"ru"=>"�������������",
 "en" => "optional",
 "fr" => "facultatif",
 "de" => "nicht obligatorisch",
 "es" => "opcional",
 "it"=>"facoltativo");

$txt_autoresp_subj = array(
"ru"=>"���������.", 
 "en" => "Automatic Answer - Out of office",
 "fr" => "R�ponse automatique - Actuellement non atteignable",
 "de" => "Automatische Antwort - Zur Zeit nicht erreichbar",
 "es" => "Respuesta autom�tica",
 "it"=>"Risposta automatica - Non sono in ufficio");

$txt_autoresp_body = array(
 "ru"=>"�������� ���� ������ � ����� '%S'\n\n � ������ ������ ���� ��� �� �����. � ������ �� ���� ������, ��� ������ �������.",
 "en" => "Just got your mail with subject '%S'\n\nI'm not there. I'll answer your mail when I'll be back.\n\n",
 "fr" => "Je viens de recevoir votre mail � propos de '%S'\n\nJ'y r�pondrai � mon retour.\n\n",
 "de" => "Habe Ihren mail betreffend '%S' erhalten.\n\nEine Antwort erhalten Sie wenn ich zur�ck bin.\n\n",
 "es" => "He recibido tu mensaje titulado '%S'.\n. En este momento no estoy aqu�. Te contestar� cuando regrese.\n\n",
 "it"=>"Ho appena ricevuto il tuo messaggio con oggetto '%S'\n\nNon sono qua. Ti risponder&ograve; appena torno.\n\n");

$txt_mail_sysadmin = array( 
 "ru"=>"��������� ������ ��������������",
 "en" => "Mail System Administrator",
 "fr" => "Enoyer un mail au responsable du syst�me",
 "de" => "Mail an Sysadmin",
 "es" => "Enviar un E-mail al administrador",
 "it"=>"Scrivi all'amministratore del sistema");

$txt_back = array( 
 "ru"=>"�����",
 "en" => "Back",
 "fr" => "Retour",
 "de" => "Zur�ck",
 "es" => "Atr�s",
 "it"=>"Indietro");

$txt_about = array( 
 "ru"=>"� �������",
 "en" => "About",
 "fr" => "� propos",
 "de" => "Info",
 "es" => "Acerca de",
 "it"=>"About");

$txt_details = array(
"ru"=>"���������� ������������", 
 "en" => "User Info",
 "fr" => "User Info",
 "de" => "User Info",
 "es" => "Informaci&oacute;n del usuario",
 "it"=>"Informazione utente");

$txt_goodbye = array( 
 "ru"=>"�� ��������!",
 "en" => "Good bye!",
 "fr" => "Au revoir!",
 "de" => "Auf wiedersehen!",
 "es" => "Adi&oacute;s",
 "it" =>"Ciao!");

$txt_error_quota_expired = array(
"ru"=>"�� �������� : ��� ����� ��������", 
 "en" => "Not allowed : your quota is expired",
 "fr" => "Non autorise : votre quota est depasse",
 "de" => "Nicht erlaubt : Ihr Quota ist ueberschritten",
 "es" => "Prohibido: La quota ha expirado",
 "it" =>"Errore : hai superato il tuo quota");

$txt_error_not_allowed = array( 
 "ru"=>"��������, ��� ��� �� ��������",
 "en" => "Sorry, you are not allowed to do that",
 "fr" => "Desole, vous n'avez pas les droits pour effectuer cette operation",
 "de" => "Sorry, Sie haben nicht die Berechtigung um diese Operation durchzufuehren",
 "es" => "Lo siento, esta operaci&oacute;no est� permitida",
 "it"=>"Mi dispiace, non hai i privilegi per farlo");

$txt_quota = array( 
 "ru" => "�����������", 
 "en" => "Quota",
 "fr" => "Quota",
 "de" => "Quota",
 "es" => "Quota",
 "it" => "Quota");

$txt_maximum = array( 
 "ru"=>"��������",
 "en" => "maximum",
 "fr" => "maximum",
 "de" => "maximal",
 "es" => "maximo",
 "it" =>"massimo");

$txt_current = array(
 "ru"=>"�������", 
 "en" => "current",
 "fr" => "actuellement",
 "de" => "zur Zeit",
 "es" => "actual",
 "it" =>"attuale");

$txt_used = array(
 "ru"=>"������������", 
 "en" => "used",
 "fr" => "utilis&eacute;",
 "de" => "belegt",
 "es" => "usados",
 "it" =>"usato");

$txt_hardquota = array(
 "ru"=>"������������ �����", 
 "en" => "Hard quota",
 "fr" => "Limitation dure",
 "de" => "Hartes Quota",
 "es" => "Quota dura",
 "it" =>"Hard Quota");

$txt_softquota = array(
"ru"=>"��������������",
 "en" => "Soft quota",
 "fr" => "Limitation legere",
 "de" => "Leichtes Quota",
 "es" => "Quota blanda",
 "it" =>"Soft quota");

$txt_msgsize = array( 
"ru"=>"������ �����", 
 "en" => "Message size",
 "fr" => "Taille de message",
 "de" => "Mailgroesse",
 "es" => "Tama&ntilde;o del mensaje",
 "it" =>"Dimensione messaggio");

$txt_msgcount = array(
"ru"=>"���������� �����", 
 "en" => "Message count",
 "fr" => "Nombre de messages",
 "de" => "Anzahl E-Mails",
 "es" => "Cantidad de mensajes",
 "it" =>"Numero di messaggi");

$txt_expiry = array( 
"ru"=>"���� ��������",
 "en" => "Expiry",
 "fr" => "Expiration",
 "de" => "Enddatum",
 "es" => "Expiraci&oacuten",
 "it" =>"Scade");

$txt_settings = array(
 "ru" => "���������", 
 "en" => "Settings",
 "fr" => "Config",
 "de" => "Config",
 "es" => "Config",
 "it" =>"Config");

$txt_ = array(
 "ru" => "",
 "en" => "",
 "fr" => "",
 "de" => "",
 "es" => "",
 "it" =>"");

$txt_ = array( 
 "ru" => "",
 "en" => "",
 "fr" => "",
 "de" => "",
 "es" => "",
 "it" =>"");

?>
