<?php
/* 
	-----------
	oMail-admin  -  A PHP4 based Vmailmgrd Web interface
	-----------

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: strings.php,v 1.27 2000/11/14 00:32:44 swix Exp $
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


$txt_langname=array(	"fr"=>"FranГais",
                        "de"=>"Deutsch",
			"da"=>"Dansk",
                        "en"=>"English",
			"es"=>"Castellano",
                        "it"=>"Italiano",
                        "ro"=>"Romana",
			"ru"=>"Russian");

$txt_charset=array(     "ru"=>"KOI8-R",
                        "fr"=>"",
                        "de"=>"",
			"da"=>"",
                        "en"=>"",
			"es"=>"",
                        "it"=>"",
 			"ro"=>"");

$txt_login=array(	"ru"=>"Логин",
                        "fr"=>"Login",
			"de"=>"Login",
			"da"=>"Login",
			"en"=>"Login",
			"es"=>"Login",
			"it"=>"Login",
                        "ro"=>"Login");

$txt_passwd=array(      "ru"=>"Пароль",
                        "fr"=>"Mot de passe",
			"de"=>"Passwort",
			"da"=>"Password",
			"en"=>"Password",
			"es"=>"Contrase&ntilde;a",
			"it"=>"Password",
                        "ro"=>"Parola");

$txt_title=array(	"ru"=>"Титул(Звание)",
                        "fr"=>"Titre",
			"de"=>"Anrede",
			"da"=>"Titel",
			"en"=>"Title",
			"es"=>"T║tulo",
			"it"=>"Titolo",
                        "ro"=>"Titlu");

$txt_firstname=array(	"ru"=>"Имя",
			"fr"=>"PrИnom",
			"de"=>"Vorname",
			"da"=>"Fornavn",
			"en"=>"Firstname",
			"es"=>"Nombre",
			"it"=>"Nome",
                        "ro"=>"Prenume");

$txt_lastname=array(	"ru"=>"Фамилия",
			"fr"=>"Nom",
			"de"=>"Name",
			"da"=>"Efternavn",
			"en"=>"Lastname",
			"es"=>"Apellido",
			"it"=>"Cognome",
                        "ro"=>"Nume");

$txt_adresse=array(	"ru"=>"Адрес",
                        "fr"=>"Adresse",
			"de"=>"Adresse",
			"da"=>"Adresse",
			"en"=>"Address",
			"es"=>"Direcci&oacute;n",
			"it"=>"Indirizzo",
                        "ro"=>"Adresa");

$txt_postalcode=array(	"ru"=>"Почт.Индекс",
			"fr"=>"CP",
			"de"=>"PLZ",
			"da"=>"Postnr.",
			"en"=>"ZIP",
			"es"=>"CP",
			"it"=>"CAP",
                        "ro"=>"Cod");


$txt_city=array(	"ru"=>"Город",
                        "fr"=>"LocalitИ",
			"de"=>"Ort",
			"da"=>"By",
			"en"=>"City",
			"es"=>"Ciudad",
			"it"=>"Localit&agrave;",
                        "ro"=>"Oras");

$txt_country=array(	"ru"=>"Страна",
                        "fr"=>"Pays",
			"de"=>"Land",
			"da"=>"Land",
			"en"=>"Country",
			"es"=>"Pa&iacute;is",
			"it"=>"Stato",
                        "ro"=>"Tara");


$txt_phone=array(	"ru"=>"Телефон",
                        "fr"=>"TИlИphone",
			"de"=>"Telefon",
			"da"=>"Telefon",
			"en"=>"Phone",
			"es"=>"TelИfono",
			"it"=>"Telefono",
                        "ro"=>"Telefon");

$txt_fax=array(		"ru"=>"Факс",
                        "fr"=>"Fax",
			"de"=>"Fax",
			"da"=>"Fax",
			"en"=>"Fax",
			"es"=>"Fax",
			"it"=>"Fax",
                        "ro"=>"Fax");

$txt_lang=array(	"ru"=>"Язык",
                        "fr"=>"Langue",
			"de"=>"Sprache",
			"da"=>"Sprog",
			"en"=>"Language",
			"es"=>"Idioma",
			"it"=>"Lingua",
                        "ro"=>"Limba");

$txt_langs=array(	"ru"=>"Русский",
                        "fr"=>"FranГais",
			"de"=>"Deutsch",
			"da"=>"Dansk",
			"en"=>"English",
			"es"=>"Castellano",
			"it"=>"Italiano",
                        "ro"=>"Romana");

$txt_homepage=array(	"ru"=>"URL",        // :)
                        "fr"=>"Homepage",
			"de"=>"Homepage",
			"da"=>"Homepage",
			"en"=>"Homepage",
			"es"=>"Homepage",
			"it"=>"homepage",
                        "ro"=>"Homepage");

$txt_company=array(	"ru"=>"Организация",
                        "fr"=>"Entreprise",
			"de"=>"Firma",
			"da"=>"Firma",
			"en"=>"Company",
			"es"=>"Empresa",
			"it"=>"Firma",
                        "ro"=>"Firma");

$txt_position=array(	"ru"=>"Должность",
                        "fr"=>"Fonction",
			"de"=>"Funktion",
			"da"=>"Stilling",
			"en"=>"Position",
			"es"=>"Posici&oacute;n",
			"it"=>"Posizione",
                        "ro"=>"Functie");

$txt_reason=array(	"ru"=>"Причина",
                        "fr"=>"Raison sociale",
			"de"=>"Grund",
			"da"=>"Grund",
			"en"=>"Reason",
			"es"=>"Raz&oacute;n",
			"it"=>"Ragione sociale",
                        "ro"=>"Motiv");

$txt_notes=array(	"ru"=>"Примечание",
                        "fr"=>"Notes",
			"de"=>"Notizen",
			"da"=>"Noter",
			"en"=>"Notes",
			"es"=>"Notas",
			"it"=>"Note",
                        "it"=>"Note",
                        "ro"=>"Note");

$txt_alias=array(	"ru"=>"Алиас",
                        "fr"=>"Alias",
			"de"=>"Alias",
			"da"=>"Alias",
			"en"=>"Alias",
			"es"=>"Alias",
			"it"=>"Alias",
                        "ro"=>"Alias");

$txt_fwd=array(		"ru"=>"Fwd",
                        "fr"=>"Fwd",
			"de"=>"Fwd",
			"da"=>"Fwd",
			"en"=>"Fwd",
			"es"=>"Fwd",
			"it"=>"Fwd",
                        "ro"=>"Fwd");

$txt_destination=array(	"ru"=>"Destination",
                        "fr"=>"Destination",
			"de"=>"Weiterleitung an",
			"da"=>"Destination",
			"en"=>"Destination",
			"es"=>"Destino",
			"it"=>"Destinatario",
                        "ro"=>"Destinatar");

$txt_email=array(	"ru"=>"Email",
                        "fr"=>"E-mail",
			"de"=>"E-Mail",
			"da"=>"E-Mail",
			"en"=>"Email",
			"es"=>"E-mail",
			"it"=>"E-mail",
                        "ro"=>"E-mail");

$txt_edit=array(	"ru"=>"Изменить",
                        "fr"=>"Modifier",
			"de"=>"&Auml;ndern",
			"da"=>"Rediger",
			"en"=>"Edit",
			"es"=>"Editar",
			"it"=>"Modifica",
                        "ro"=>"Modifica");

$txt_delete=array(	"ru"=>"Удалить",
                        "fr"=>"Supprimer",
			"de"=>"L&ouml;schen",
			"da"=>"Slet",
			"en"=>"Delete",
			"es"=>"Eliminar",
			"it"=>"Elimina",
                        "ro"=>"Sterge");

$txt_cancel=array(	"ru"=>"Прервать",
                        "fr"=>"Annuler",
			"de"=>"Abbrechen",
			"da"=>"Annuler",
			"en"=>"Cancel Operation",
			"es"=>"Cancelar",
			"it"=>"Annulla",
                        "ro"=>"Anuleaza");

$txt_activate=array(	"ru"=>"Активировать",
                        "fr"=>"Activer",
			"de"=>"Aktivieren",
			"da"=>"Aktiver",
			"en"=>"Activate",
			"es"=>"Activar",
			"it"=>"Attiva",
                        "ro"=>"Activeaza");

$txt_account_name=array("ru"=>"Счет",
                        "fr"=>"Nom du compte",
			"de"=>"Kontoname",
			"da"=>"Konto navn",
			"en"=>"Account name",
			"es"=>"Nombre de Cuenta",
			"it"=>"Account",
                        "ro"=>"Nume de Cont");

$txt_account_type=array("ru"=>"Тип",
                        "fr"=>"Type de compte",
			"de"=>"Kontoart",
			"da"=>"Kontoart",
			"en"=>"Account type",
			"es"=>"Tipo de Cuenta",
			"it"=>"Tipo di Account",
                        "ro"=>"Tipul contului");

$txt_domain=array(	"ru"=>"Домен",
                        "fr"=>"Domaine",
			"de"=>"Domain",
			"da"=>"DomФne",
			"en"=>"Domain",
			"es"=>"Dominio",
			"it"=>"Dominio",
                        "ro"=>"Domeniu");

$txt_domain_or_email=array(	"ru"=>"Адрес Email",
                        "fr"=>"Adresse e-mail ou Domaine",
			"de"=>"E-Mail Adresse oder Domain-Name",
			"da"=>"E-Mail Adresse eller DomФne Navn",
			"en"=>"Email Address or Domain Name",
			"es"=>"E-mail o Dominio",
			"it"=>"Indirizzo E-mail o Dominio",
                        "ro"=>"Adresa de E-mail");

$txt_status=array(	"ru"=>"Статус",
                        "fr"=>"Etat",
			"de"=>"Zustand",
			"da"=>"Status",
			"en"=>"Status",
			"es"=>"Estado",
			"it"=>"Stato",
                        "ro"=>"Status");

$txt_login=array(	"ru"=>"Логин",
                        "fr"=>"Login",
			"de"=>"Login",
			"da"=>"Login",
			"en"=>"Login",
			"es"=>"Login",
			"it"=>"Login",
                        "ro"=>"Login");

$txt_delete=array(	"ru"=>"Удалить",
                        "fr"=>"Effacer",
			"de"=>"L&ouml;schen",
			"da"=>"Slet",
			"en"=>"Delete",
			"es"=>"Borrar",
			"it"=>"Elimina",
                        "ro"=>"Sterge");

$txt_info=array(	"ru"=>"Инфо",
                        "fr"=>"Info",
			"de"=>"Info",
			"da"=>"Info",
			"en"=>"Info",
			"es"=>"Info",
			"it"=>"Info",
                        "ro"=>"Info");

$txt_action=array(	"ru"=>"Действие",
                        "fr"=>"Action",
			"de"=>"Aktion",
			"da"=>"Aktion",
			"en"=>"Action",
			"es"=>"AcciСn",
			"it"=>"Azione",
                        "ro"=>"Actiune");

$txt_no_accounts=array(	"ru"=>"Нет такого пользователя",
                        "fr"=>"Aucun compte enregistr&eacute;.",
			"de"=>"Keine Konten eingerichtet",
			"da"=>"Ingen registrede Konto",
			"en"=>"No registred accounts",
			"es"=>"Ninguna cuenta registrada",
			"it"=>"Non ci sono account",
                        "ro"=>"Nu exista conturi inregistrate");

$txt_no_domains=array(	"ru"=>"Нет такого домена",
                        "fr"=>"Aucun domaine enregistr&eacute;",
			"de"=>"Keine Domains registriert",
			"da"=>"Ingen registrede DomФner",
			"en"=>"No registred domains",
			"es"=>"NingЗn dominio registrado",
			"it"=>"Non ci sono domini",
                        "ro"=>"Nu exista domenii inregistrate");

$txt_new=array(		"ru"=>"Новый",
                        "fr"=>"Nouveau",
			"de"=>"Neu",
			"da"=>"Ny",
			"en"=>"New",
			"es"=>"Nuevo",
			"it"=>"Nuovo",
                        "ro"=>"Nou");

$txt_avail_domain=array(	"ru"=>"Возможные домены",
                        "fr"=>"Domaines disponibles",
			"de"=>"Verf&uuml;gbare Domains",
			"da"=>"Oprettede DomФner",
			"en"=>"Available domains",
			"es"=>"Dominios disponibles",
			"it"=>"Domini disponibili",
                        "ro"=>"Domenii disponibile");

$txt_own_domains=array(	"ru"=>"Ваши домены",
                        "fr"=>"Vos domaines",
			"de"=>"Ihre eigenen Domains",
			"da"=>"Deres egne DomФner",
			"en"=>"Your own domains",
			"es"=>"Tus propios dominios",
			"it"=>"I tuoi domini",
                        "ro"=>"Domeniile dumneavoastra");

$txt_open_domains=array(	 "ru"=>"Открытые домены",
                        "fr"=>"Les domaines publics",
			"de"=>"&Ouml;ffentlich zug&auml;ngliche Domains",
			"da"=>"еbne DomФner",
			"en"=>"The open domains",
			"es"=>"Los dominios pЗblicos",
			"it"=>"Domini pubblici",
                        "ro"=>"Domenii publice");

$txt_no_domain=array(	"ru"=>"Нет доменов",
                        "fr"=>"Pas de domaine",
			"de"=>"Keine Domains",
			"da"=>"Ingen DomФner",
			"en"=>"No Domains",
			"es"=>"Sin dominios",
			"it"=>"Non c'&egrave; alcun dominio",
                        "ro"=>"Nici un domeniu");

$txt_please_choose=array(	 "ru"=>"Пожалуйста выберите",
                        "fr"=>"Faites votre choix",
			"de"=>"Bitte w&auml;hlen",
			"da"=>"VФlg venligst",
			"en"=>"Please choose",
			"es"=>"Elige",
			"it"=>"Scegli",
                        "ro"=>"Alegeti");

$txt_subdomain_name=array(	"ru"=>"Имя поддомена",
                        "fr"=>"Nom du sous-domaine",
			"de"=>"Name der Subdomain",
			"da"=>"Subdomain Name",
			"en"=>"Subdomain Name",
			"es"=>"Subdominio",
			"it"=>"Sottodominio",
                        "ro"=>"Numele subdomeniului");


$txt_authorized_chars=array(	 "ru"=>"Используйте только: a-z, 0-9 и '-'",
                        "fr"=>"CaractХres autorisИs : a-z, 0-9 et '-'",
			"de"=>"Zugelassen sind nur a-z, 0-9 und '-'",
			"da"=>"Benyt venligst kun a-z, 0-9 eller '-'",
			"en"=>"Only use a-z, 0-9 and '-'",
			"es"=>"UsА sСlo a-z, 0-9 y '-'",
			"it"=>"Usa solo a-z, 0-9 e '-'",
                        "ro"=>"Folositi numai a-z, 0-9 si '-'");



$txt_current_language = array( "ru"=>"Русский",
 "en" => "English",
 "fr" => "FranГais",
 "de" => "Deutsch",
 "da" => "Dansk",
 "es" => "Castellano",
 "it"=>"Italiano",
 "ro"=>"Romana");


$txt_hello = array( 
 "ru"=>"Здраствуйте",
 "en" => "Hello",
 "fr" => "Bonjour",
 "de" => "Hallo",
 "da" => "Hallo",
 "es" => "Hola",
 "it"=>"Salve",
 "ro"=>"Salut");

$txt_menu = array( 
 "ru" => "Меню",
 "en" => "Menu",
 "fr" => "Menu",
 "de" => "Menu",
 "da" => "Menu",
 "es" => "MenЗ",
 "it" => "Menu",
 "ro"=>"Meniu");

$txt_welcome = array(
 "ru" => "Добро пожаловать",
 "en" => "Welcome!",
 "fr" => "Bienvenue !",
 "de" => "Willkommen!",
 "da" => "Velkommen!",
 "es" => "Welcome!",
 "it"=>"Welcome!",
 "ro"=>"Bine ati venit!");

$txt_menu_domain_descr = array(
 "ru" => "Добро пожаловать в главное меню администратора домена", 
 "en" => "Welcome in the domain administration main menu",
 "fr" => "Bienvenue dans le menu principal de l'administration de votre domaine",
 "de" => "Willkommen im Administrations-Hauptmenu Ihrer Maildomain",
 "da" => "Velkommen til Administrations menuen",
 "es" => "Bienvenido al menЗ de administraci&oacute;n de dominios",
 "it"=>"Benvenuto al menu principale per la gestione del dominio",
 "ro"=>"Bine ati venit in meniul principal de administrare a domeniului");

$txt_menu_account_descr = array(
 "ru" => "Добро пожаловать в главное меню управления вашим почтовым ящиком",
 "en" => "Welcome your mail account administration main menu",
 "fr" => "Bienvenue dans le menu principal de l'administration de votre compte E-Mail",
 "de" => "Willkommen im Administration-Hauptmenu ihres Mailkontos",
 "da" => "Velkommen til Administrations menu for Mailkonto",
 "es" => "Bienvenido al menЗ de administraci&oacute;n de cuenta de correo",
 "it"=>"Benvenuto al menu principale per la gestione del tuo account di posta",
 "ro"=>"Bine ati venit in meniul principal de administrare al contului dumneavoastra");


$txt_edit = array(
"ru"=>"Изменить",
 "en" => "Edit",
 "fr" => "Editer",
 "de" => "&Auml;ndern",
 "da" => "Rediger",
 "es" => "Editar",
 "it"=>"Modifica",
 "ro"=>"Modifica");


$txt_mailbox = array(
 "ru"=>"Email",
 "en" => "Mailbox",
 "fr" => "Messages",
 "de" => "E-Mail",
 "da" => "E-Mail",
 "es" => "Casilla",
 "it"=>"Casella",
 "ro"=>"Mesaje");

$txt_list = array( 
 "ru"=>"Список",
 "en" => "List",
 "fr" => "Liste",
 "de" => "ZurЭck",
 "da" => "Tilbage",
 "es" => "Lista",
 "it"=>"Lista",
 "ro"=>"Lista");

$txt_add_user = array( 
"ru"=>"Новый ящик",
 "en" => "Add_User",
 "fr" => "Ajouter un utilisateur",
 "de" => "Neues Konto",
 "da" => "Ny konto",
 "es" => "Agregar usuario",
 "it"=>"Aggiungi account",
 "ro"=>"Adauga utilizator");

$txt_add_alias = array(
"ru"=>"Новый алиас", 
 "en" => "Add_Alias",
 "fr" => "Ajouter un alias",
 "de" => "Neuer Alias",
 "da" => "Ny Alias",
 "es" => "Agregar Alias",
 "it"=>"Aggiungi Alias",
 "ro"=>"Adauga Alias");

$txt_delete = array(
"ru"=>"Удалить",
 "en" => "Delete",
 "fr" => "Supprimer",
 "de" => "L&ouml;schen",
 "da" => "Slet",
 "es" => "Eliminar",
 "it"=>"Elimina",
 "ro"=>"Sterge");


$txt_info = array(
"ru"=>"Инфо", 
 "en" => "Info",
 "fr" => "Info",
 "de" => "Info",
 "da" => "Info",
 "es" => "Info",
 "it"=>"Info",
 "ro"=>"Info");


$txt_login = array( 
"ru"=>"Логин",
 "en" => "Login",
 "fr" => "Connexion",
 "de" => "Anmeldung",
 "da" => "Login",
 "es" => "Ingresar",
 "it"=>"Login",
 "ro"=>"Login");

$txt_login_again = array(
"ru"=>"Войти снова", 
 "en" => "Login again",
 "fr" => "Nouvelle connexion",
 "de" => "Neue Anmeldung",
 "da" => "Login igen",
 "es" => "Reingresar",
 "it"=>"Esegui nuovamente il Login",
 "ro"=>"Re-login");

$txt_please_login = array(
"ru"=>"Пожалуйста идентифицируйте себя, используя ваш почтовый логин, домен и пароль", 
 "en" => "Please Identify Yourself with your domain and password.",
 "fr" => "Veillez vous identifier a l'aide du nom de domaine et de votre mot de passe",
  "de" => "M&ouml;chten Sie die Konten und Aliase einer Domain administrieren, 
           so melden Sie sich bitte mit dem Domainnamen (z.B. <i>testdomain.de</i>) und 
    	   dem dazugeh&ouml;rigen Passwort an. <br> Wollen Sie
	   ein bestimmtes Mailkonto verwalten, so geben Sie die E-Mail-Adresse (z.B.
	   <i>hans@testdomain.de</i>) und das zugeh&ouml;rige Passwort ein.",
 "da" => "Identificer Dem venligst med domФne & password",
 "es" => "Por favor ingrese su nombre de usuario o dominio y contrase&ntilde;a",
 "it"=>"Per favore inserisci il tuo dominio e la password.",
 "ro"=>"Introduceti domeniul si parola");

$txt_update_list = array( 
 "ru"=>"Обновить",
 "en" => "Update_List",
 "fr" => "RИactualiser Liste",
 "de" => "Liste aktualisieren",
 "da" => "Opdater Liste",
 "es" => "Actualizar",
 "it"=>"Aggiorna_Lista",
 "ro"=>"Reactualizare lista");

$txt_pw_chg_ok = array( "ru"=>"Пароль успешно изменен", 
 "en" => "Password has been changed sucessfully",
 "fr" => "Le mot de passe a ИtИ changИ avec succХs",
 "de" => "Das Passwort wurde erfolgreich ge&auml;ndert",
 "da" => "Passwordet er blevet Фndret",
 "es" => "El password ha sido cambiado con &eacute;xito",
 "it"=>"La password &egrave; stata correttamente cambiata",
 "ro"=>"Parola a fost schimbata cu success");

$txt_password_str = array( 
"ru"=>"Пароль",
 "en" => "Password",
 "fr" => "Mot de passe",
 "de" => "Passwort",
 "da" => "Password",
 "es" => "Contrase&ntilde;a",
 "it"=>"Password",
 "ro"=>"Parola");

$txt_domain_name = array( 
"ru"=>"Домен",
 "en" => "Domain",
 "fr" => "Domaine",
 "de" => "Domain",
 "da" => "DomФne",
 "es" => "Dominio",
 "it"=>"Dominio",
 "ro"=>"Domeniu");


$txt_dom_ident = array(
"ru"=>"Авторизация домена", 
 "en" => "Domain Authentication",
 "fr" => "Identification du Domaine",
 "de" => "Authentifizierung",
 "da" => "E-Mail Administration",
 "es" => "AutentificaciСn de dominio",
 "it"=>"Autentificazione",
 "ro"=>"Autentificarea Domeniului");

$txt_secu_fail_dname = array(
"ru"=>"Ошибка: Имя домена должно быть в форме domain.ext", 
 "en" => "Security Failure : domain name must have the form domain.ext",
 "fr" => "Erreur de sИcuritИ : le nom de domaine doit Йtre de la forme domaine.ext",
 "de" => "Authentifizierungsfehler : Der Domainname muss in der Form domain.ext eingegeben werden",
 "da" => "Fejl! DomФnet skal have form som domФne.ext",
 "es" => "Alerta de seguridad: El dominio de ser de la forma dominio.ext",
 "it"=>"Errore: il dominio deve essere della forma dominio.tld",
 "ro"=>"Eroare: numele domeniul trebuie sa fie de forma domeniu.ext");

$txt_action_menu_title = array(
"ru"=>"Меню домена",
 "en" => "Menu for domain",
 "fr" => "Menu pour domaine",
 "de" => "Menu fЭr Domain",
 "da" => "Menu for DomФne",
 "es" => "MenЗ para el dominio",
 "it"=>"Menu del dominio",
 "ro"=>"Meniu pentru domeniu");

$txt_err_action_not_found = array(
"ru"=>"Действие не найдено", 
 "en" => "Action not found",
 "fr" => "Action non trouvИe",
 "de" => "Befehl nicht gefunden",
 "da" => "Aktion ikke fundet",
 "es" => "Comando no encontrado",
 "it"=>"Comando errato",
 "ro"=>"Comanda gresita");

$txt_title_info = array(
"ru"=>"Запись пользователя",
 "en" => "Entry for user",
 "fr" => "Enregistrement concernant",
 "de" => "Benutzerinformation f&uuml;r",
 "da" => "Info for",
 "es" => "Entrada para el usuario",
 "it"=>"Scheda dell'utente",
 "ro" => "Date despre utilizator");

$txt_real_name = array(
 "ru"=>"Имя",
 "en" => "Real Name",
 "fr" => "Nom complet",
 "de" => "Name",
 "da" => "Navn",
 "es" => "Nombre y Apellido",
 "it"=>"Nome e Cognome",
 "ro" => "Nume complet");

$txt_email_adr = array(
 "ru"=>"Адрес Email", 
 "en" => "Email Address",
 "fr" => "Adresse E-Mail",
 "de" => "E-Mail-Adresse",
 "da" => "E-Mail Adresse",
 "es" => "DirecciСn de correo",
 "it"=>"Indirizzo E-Mail",
 "ro" => "Adresa de E-mail");

$txt_account_type = array(
 "ru"=>"Тип", 
 "en" => "Account Type",
 "fr" => "Type de compte",
 "de" => "Kontoart",
 "da" => "Kontoart",
 "es" => "Tipo de cuenta",
 "it"=>"Tipo di Account",
 "ro" => "Tipul contului");

$txt_mailbox_size = array(
"ru"=>"Размер",
 "en" => "Size",
 "fr" => "Taille",
 "de" => "Gr&ouml;&szlig;e",
 "da" => "StЬrrelse",
 "es" => "Tama&ntilde;o",
 "it"=>"Dimensione",
 "ro" => "Dimensiune");

$txt_numb_of_msg = array(
 "ru"=>"Количество писем", 
 "en" => "Number of Messages",
 "fr" => "Nombre de messages",
 "de" => "Anzahl E-Mails",
 "da" => "Antal E-Mails",
 "es" => "Cantidad de Mensajes",
 "it"=>"Numero di messaggi",
 "ro" => "Numarul mesajelor");

$txt_read_mails = array(
"ru"=>"Старых писем",
 "en" => "Old Mails",
 "fr" => "Anciens Mails",
 "de" => "Alte Mails",
 "da" => "Gamle Mails",
 "es" => "Mensajes viejos",
 "it"=>"Messaggi vecchi",
 "ro" => "Mesaje vechi");

$txt_unread_mails = array(
"ru"=>"Новых писем",
 "en" => "Unread Mails",
 "fr" => "Nouveaux Mails",
 "de" => "Neue Mails",
 "da" => "Nye Mails",
 "es" => "Mensajes nuevos",
 "it"=>"Messaggi nuovi",
 "ro" => "Mesaje noi");

$txt_read = array(
"ru"=>"Читать",
 "en" => "Read",
 "fr" => "Lire",
 "de" => "Lesen",
 "da" => "LФst",
 "es" => "Leer",
 "it"=>"Letti",
 "ro" => "Citeste"); 

$txt_last_mail_arrived = array(
"ru"=>"Новая почта пришла в", 
 "en" => "Last Mail came on",
 "fr" => "DerniХre arrivИe de mail",
 "de" => "Neueste E-Mail",
 "da" => "Seneste E-Mail",
 "es" => "зltimo correo",
 "it"=>"Ultimo messaggio ricevuto il",
 "ro" => "Ultimul mesaj primit la");

$txt_last_mailbox_access = array(
"ru"=>"Последнее обращение к ящику", 
 "en" => "Last Mailbox access",
 "fr" => "Dernier accХs Ю la boНte",
 "de" => "Letzter Zugriff",
 "da" => "Sidst der har vФret adgang til Mailkonto",
 "es" => "зltimo chequeo",
 "it"=>"Ultimo accesso alla casella avvenuto il",
 "ro" => "Ultimul access la Mailbox"); 

$txt_quota = array(
"ru"=>"Ограничение",
 "en" => "Quota",
 "fr" => "Quota",
 "de" => "Grenzen",
 "da" => "Quota",
 "es" => "Quota",
 "it"=>"Quota",
 "ro" => "Limita");

$txt_title_edit = array(
 "ru" => "Изменение данных пользователя", 
 "en" => "Account Edit for user",
 "fr" => "Modification des donnИes pour",
 "de" => "Kontodaten &auml;ndern fЭr",
 "da" => "Rediger konto for bruger", 
 "es" => "EdiciСn de cuenta para",
 "it"=>"Modifica dell'account di",
 "ro" => "Modifica cont pentru");

$txt_username = array(
"ru"=>"Логин",
 "en" => "Username",
 "fr" => "Nom d'utilisateur",
 "de" => "Benutzername",
 "da" => "Brugernavn",
 "es" => "Nombre de usuario",
 "it"=>"Nome Utente",
 "ro" => "Nume utilizator"); 

$txt_old = array(
 "ru"=>"Старый", 
 "en" => "Old",
 "fr" => "Ancien",
 "de" => "Altes",
 "da" => "Gammel",
 "es" => "Viejos",
 "it"=>"Vecchio",
 "ro" => "Vechi");

$txt_new = array(
 "ru" => "Новый",
 "en" => "New",
 "fr" => "Nouveau",
 "de" => "Neu",
 "da" => "Ny",
 "es" => "Nuevos",
 "it"=>"Nuovo",
 "ro" => "Noi");

$txt_newuser = array( 
"ru"=>"Новый ящик",
 "en" => "New Mailbox",
 "fr" => "Nouvelle BoНte",
 "de" => "Neue Mailbox",
 "da" => "Ny Mailkonto",
 "es" => "Nuevo usuario",
 "it"=>"Nuova casella",
 "ro" => "Mailbox nou");

$txt_newalias = array(
"ru"=>"Новый алиас", 
 "en" => "New Alias",
 "fr" => "Nouvel Alias",
 "de" => "Neue Alias",
 "da" => "Nyt Alias",
 "es" => "Nuevo alias",
 "it"=>"Nuovo Alias",
 "ro" => "Alias nou");

$txt_and_again = array( 
"ru"=>"Еще раз",
 "en" => "And again",
 "fr" => "VИrification",
 "de" => "Nochmals",
 "da" => "Gentag",
 "es" => "VerificaciСn",
 "it"=>"Verifica",
 "ro" => "Verifica");

$txt_edit_result = array(
"ru"=>"Изменение настроек пользователя : Результат", 
 "en" => "Edit User Setup : Result",
 "fr" => "Modification des donnИes : resultats",
 "de" => "дnderung der Kontodaten: Ergebnis",
 "da" => "Redigering af Bruger : Resultat",
 "es" => "ModificaciСn de usuario: Resultado",
 "it"=>"Modifica dell'account: Risultato",
 "ro" => "Modificarea contului: rezultat");

$txt_entry_for_user = array( 
"ru"=>"Запись пользователя",
 "en" => "Entry for user",
 "fr" => "DonnИes concernant",
 "de" => "Daten von",
 "da" => "Adgang for bruger",
 "es" => "Entrada para el usuario",
 "it"=>"Scheda dell'utente",
 "ro" => "Date utilizator");

$txt_title_mailbox = array(
"ru"=>"Ящик",
 "en" => "Mailbox of",
 "fr" => "BoНte aux lettres de",
 "de" => "Briefkasten von",
 "da" => "Mailkonto for",
 "es" => "Casilla de",
 "it"=>"Casella E-Mail di",
 "ro" => "Mailbox pentru");

$txt_delete_account = array( 
"ru"=>"Удаление",
 "en" => "Account Deletion",
 "fr" => "Effacement de compte",
 "de" => "Konto lЖschen",
 "da" => "Slet konto",
 "es" => "Eliminar cuenta",
 "it"=>"Elimina Account",
 "ro" => "Sterge cont");

$txt_confirm_delete = array( 
"ru"=>"Подтвердите удаление...",
 "en" => "Delete Request : Please confirm...",
 "fr" => "Effacement demandИ : veuillez confirmer...",
 "de" => "L ж S C H E N",
 "da" => "Sletter : BekrФft venligst",
 "es" => "Eliminar cuenta: Por favor confirme...",
 "it"=>"Eliminazione: Per favore conferma...",
 "ro" => "Stergere cont: Confirmati"); 

$txt_delete_account_confirm = array(
"ru"=>"Вы уверены, что хотите удалить его?", 
 "en" => "Are you sure you want to delete this account?",
 "fr" => "Etes-vous certain de vouloir effacer le compte suivant?",
 "de" => "Bitte bestДtigen Sie die LЖschung des folgenden Kontos:",
 "da" => "Er De sikker pЕ at slette denne konto?",
 "es" => "©EstА seguro que desea eliminar esta cuenta?",
 "it"=>"Sei sicuro di voler cancellare questo account?",
 "ro" => "Sunteti sigur ca vreti sa stergeti contul?");

$txt_delete_for_user = array( 
 "ru"=>"для пользователя",
 "en" => "for user",
 "fr" => "pour l'utilisateur",
 "de" => "",
 "da" => "For bruger",
 "es" => "para el usuario",
 "it"=>"per l'utente",
 "ro" => "pentru utilizatorul");

$txt_delete_remove_now = array(
"ru"=>"будет <I>безвозвратно</I> удален", 
 "en" => "will remove it now, <I>definitely</I>",
 "fr" => "va dИtruire le compte, <I>irremИdiablement</I>",
 "de" => "LЖscht das Konto unwiderruflich",
 "da" => "Sletter nu, <I>Kan ikke genskabes</I>",
 "es" => "la eliminarА ahora <I>definitivamente</I>",
 "it"=>"lo canceller&agrave; ora <I>definitivamente</I>",
 "ro" => "va fi sters acum, <I>definitiv</I>");

$txt_delete_backto_list = array(
"ru"=>"перейдет к списку <I>без</I> удаления",
 "en" => "will bring you back to the list, <I>without</i> deleting anything",
 "fr" => "vous ramХnera Ю la liste, <i>sans</i> rien effacer",
 "de" => "ZurЭck zur Liste, <I>ohne</I> eine LЖschung vorzunehmen",
 "da" => "Tilbage, <I>uden</I> at slette",
 "es" => "te llevarА de regreso a la lista, <I>sin</I> eliminar nada",
 "it"=>"ti riporter&agrave; alla lista <I>senza</I> cancellare nulla",
 "ro" => "va trimite la lista, <I>fara</I> a sterge nimic");

$txt_deleted_sucessfully = array(
"ru"=>"успешно удален",
 "en" => "deleted sucessfully",
 "fr" => "a ИtИ effacИ avec succХs",
 "de" => "ist gelЖscht worden",
 "da" => "er slettet",
 "es" => "exitosamente eliminada",
 "it"=>"cancellato con successo",
 "ro" => "stergerea a fost efectuata");

$txt_delete_result = array(
 "ru" => "Запрос на удаление : Результат",
 "en" => "Delete Request : Result",
 "fr" => "Effacement : RИsultat",
 "de" => "LЖschung : Ergebnis",
 "da" => "Slet (?) : Resultat",
 "es" => "Eliminar cuenta: Resultado",
 "it"=>"Eliminazione dell'account: Risultato",
 "ro" => "Stergere: Resultat");

$txt_delete_deletion = array(
"ru"=>"Удаление",
 "en" => "Deletion of",
 "fr" => "Effacement de",
 "de" => "LЖschung von",
 "da" => "Slettet af",
 "es" => "EliminaciСn de",
 "it"=>"Eliminazione di",
 "ro" => "Stergerea lui");

$txt_for_user = array(
 "ru"=>"для пользователя", 
 "en" => "for user",
 "fr" => "pour le compte",
 "de" => "FЭr den Benutzer",
 "da" => "For Konto",
 "es" => "para el usuario",
 "it"=>"per l'utente",
 "ro" => "pentru utilizatorul");

$txt_title_list = array(
"ru"=>"Список для домена",
 "en" => "Listing for domain",
 "fr" => "Liste pour le domaine",
 "de" => "Listing fЭr die Domain",
 "da" => "Listing for DomФne",
 "es" => "Listado para el dominio",
 "it"=>"Lista del dominio",
 "ro" => "Listing pentru domeniul");

$txt_domain_info = array(
"ru"=>"Информация о домене",
 "en" => "Domain Information",
 "fr" => "Informations sur le domaine",
 "de" => "Domaininformationen",
 "da" => "DomФneinformation",
 "es" => "InformaciСn de Dominio",
 "it"=>"Informazione sul dominio",
 "ro" => "Informatii despre domeniul");

$txt_date_of_creation = array(
"ru"=>"Дата создания", 
 "en" => "Date of creation",
 "fr" => "Date de mise en place",
 "de" => "Datum der Konto-Einrichtung",
 "da" => "Oprettet d.",
 "es" => "Fecha de creaciСn",
 "it"=>"Data di creazione",
 "ro" => "Data crearii");

$txt_last_change = array(
"ru"=>"Последнее изменение", 
 "en" => "Last Change",
 "fr" => "Dernier changement",
 "de" => "Letzte дnderung",
 "da" => "Sidst Фndret",
 "es" => "зltimo cambio",
 "it"=>"Ultima modifica",
 "ro" => "Ultima modificare");

$txt_how_many_mailbox = array(
"ru"=>"Количество ящиков", 
 "en" => "How many Mailboxes",
 "fr" => "Combien de Comptes",
 "de" => "Wieviele Konten",
 "da" => "Hvor mange konti",
 "es" => "CuАntas casillas",
 "it"=>"Quante caselle di posta",
 "ro" => "Cate casute postale");

$txt_how_many_alias = array(
"ru"=>"Количество алиасов", 
 "en" => "How many Aliases",
 "fr" => "Combiens d'Alias",
 "de" => "Vieviele Aliase",
 "da" => "Hvor mange Aliases",
 "es" => "CЗantos Aliases",
 "it"=>"Quanti alias",
 "ro" => "Cate alias-uri");

$txt_total_size = array( 
"ru"=>"Общий размер ящиков",
 "en" => "Total Size of Mailboxes",
 "fr" => "Taille totale des BoНtes aux lettres",
 "de" => "Gesamtegr&ouml;&szlig;e aller Briefk&auml;sten",
 "da" => "Samlet stЬrrelse af Mailkontis",
 "es" => "TamaЯo total de las casillas",
 "it"=>"Dimensione totale delle caselle di posta",
 "ro" => "Dimensiunea totala a casutelor postale");

$txt_biggest_mailbox = array(
"ru"=>"Самый тяжелый ящик", 
 "en" => "Biggest Mailbox",
 "fr" => "Compte le plus encombrant",
 "de" => "Gr&ouml;&szlgi;ter Briefkasten",
 "da" => "StЬrste Mailkonto",
 "es" => "Casilla mАs grande",
 "it"=>"Massima dimensione di una casella di posta",
 "ro" => "Cea mai mare casuta postala");

$txt_mailboxes = array(
"ru"=>"Ящики",
 "en" => "Mailboxes",
 "fr" => "BoНtes aux lettres",
 "de" => "Liste aller Konten",
 "da" => "Mailkonti",
 "es" => "Casillas",
 "it"=>"Caselle di posta",
 "ro" => "Casute postale");

$txt_smallmailboxes = array(
 "ru"=>"ящиков", 
 "en" => "mailboxes",
 "fr" => "boНtes aux lettres",
 "de" => "accounts",
 "da" => "mailkonti",
 "es" => "casillas",
 "it"=>"caselle di posta",
 "ro" => "casute postale");

$txt_aliases = array(
"ru"=>"Алиасы", 
 "en" => "Aliases",
 "fr" => "Aliases",
 "de" => "Liste aller Aliase",
 "da" => "Aliases",
 "es" => "Aliases",
 "it"=>"Alias",
 "ro" => "Alias-uri");

$txt_smallaliases = array(
"ru"=>"алиасов", 
 "en" => "aliases",
 "fr" => "aliases",
 "de" => "aliase",
 "da" => "aliases",
 "es" => "aliases",
 "it"=>"alias",
 "ro" => "aliasuri");

$txt_back_to_begining = array(
"ru"=>"В начало...", 
 "en" => "Back to the beginning...",
 "fr" => "Retour au d&eacute;but...",
 "de" => "ZurЭck zum Anfang...",
 "da" => "Tilbage til begyndelsen",
 "es" => "Volver al inicio...",
 "it"=>"Torna all'inizio...",
 "ro" => "Inapoi...");

$txt_you_have_to_be_sysadmin_for_that = array(
"ru"=>"Извините, правей не хватает!", 
 "en" => "Sorry, you have to be sysadmin to do that!",
 "fr" => "D&eacute;sol&eacute; vous devez etre administrateur pour cela !",
 "de" => "Nicht erlaubt: Um diese Operation asuf&ouml;hren zu k&ouml;nnen, m&uuml;ssen Sie Administrator sein!",
 "da" => "Du skal vФre systemadministrator",
 "es" => "║Debes ser el administrador de sistema para hacer eso!",
 "it"=>"Hai bisogno dei privilegi di amministratore per farlo!",
 "ro" => "Trebuie sa fiti administrator pentru a putea face asta!");

$txt_user_already_exists = array(
"ru"=>"Извините. такой уже есть",
 "en" => "Sorry, user already exists, please choose another one!",
 "fr" => "D&eacute;sol&eacute; mais ce nom est deja utilisИ !",
 "de" => "Folgender Fehler ist aufgetreten : Der Benutzer existiert schon",
 "da" => "Brugeren eksisterer allerede, vФlg venligst en anden!",
 "es" => "║El usuario ya existe!",
 "it"=>"L'utente esiste gi&agrave;. Scegli un altro nome.",
 "ro" => "Nume de utilizator deja existent, alegeti altul!");

$txt_user_doesnt_exists = array(
"ru"=>"Извините, такой не найден",
 "en" => "Sorry, user not found",
 "fr" => "DИsolИ, aucun utilisateur avec ce nom",
 "de" => "Folgender Fehler ist aufgetreten : Der Benutzer existiert nicht",
 "da" => "Bruger ikke fundet.",
 "es" => "No se ha encontrado el usuario",
 "it"=>"Utente non trovato",
 "ro" => "Utilizatorul nu exista");

$txt_err_dom_not_registred = array(
"ru"=>"Нет такого домена", 
 "en" => "Domain not registred on server",
 "fr" => "Domaine non enregistrИ sur le serveur",
 "de" => "Domain nicht auf dem Server gespeichert",
 "da" => "DomФnet er ikke registreret pЕ serveren",
 "es" => "Este dominio no se halla en el servidor",
 "it"=>"Quel dominio non &egrave; disponibile su questo server",
 "ro" => "Domeniul nu exista pe server");

$txt_bad_passwd_for_domain = array(
"ru"=>"Неправильный пароль для управления доменом", 
 "en" => "Bad Password for Domain manager",
 "fr" => "Mot de passe erronИ pour l'administrateur du domaine",
 "de" => "Falsches Passwort fЭr Domainadministrator",
 "da" => "Passwordet er ikke gyldigt",
 "es" => "Contrase&ntilde;a invАlida para administrador de dominios",
 "it"=>"Password per l'amministrazione del dominio errata",
 "ro" => "Parola gresita pentru administratorul domeniului");

$txt_error = array(
 "ru"=>"Ошибка",
 "en" => "Error",
 "fr" => "Erreur",
 "de" => "Fehler",
 "da" => "Fejl",
 "es" => "Error",
 "it"=>"Errore",
 "ro" => "Eroare");

$txt_more_fwd=array(	"ru"=>"Еще Fwd",
			"fr"=>"Plus de Fwd",
			"de"=>"Weitere Fwd",
			"da"=>"Mere Fwd",
			"en"=>"More Fwd",
			 "es" => "MАs Fwd",
			"it"=>"Altri Fwd",
                         "ro" => "Alte Fwd");

$txt_responder=array(	"ru"=>"Автоответ",
			"fr"=>"RИpondeur",
			"de"=>"Autoresponder",
			"da"=>"Ferie",
			"en"=>"Vacation",
			 "es" => "Autoresponder",
			"it"=>"Autoresponder",
                         "ro" => "Auto-raspuns");

$txt_directory=array(	"ru"=>"Папка",
			"fr"=>"RИpertoire",
			"de"=>"Verzeichnis",
			"da"=>"Mappe",
			"en"=>"Directory",
			"es" => "Directorio",
			"it"=>"Cartella",
                         "ro" => "Director");


$txt_newalias = array( 
"ru"=>"Новый алиас",
 "en" => "New Mail Alias",
 "fr" => "Nouvelle Adresse de Redirection",
 "de" => "Neue Weiterleitungsadresse",
 "da" => "Ny Alias",
 "es" => "Nuevo Alias",
 "it"=>"Nuovo Alias",
 "ro" => "Alias nou");

$txt_newuser = array(
"ru"=>"Новый ящик", 
 "en" => "New Mailbox Account",
 "fr" => "Nouvelle BoНte aux lettres",
 "de" => "Neue Mailbox",
 "da" => "Ny Mailkonto",
 "es" => "Nuevo usuario",
 "it"=>"Nuova Mailbox",
 "ro" => "Mailbox nou");

$txt_delete_msg = array( 
"ru"=>"Удаление ящика",
 "en" => "Deletion of Account",
 "fr" => "Effacement du compte",
 "de" => "Konto l&ouml;schen",
 "da" => "Konto slettet",
 "es" => "Eliminar cuenta",
 "it"=>"Eliminazione dell'account",
 "ro" => "Stergerea contului");

$txt_edit_account = array(
"ru"=>"Изменение параметров ящика", 
 "en" => "Account Edition",
 "fr" => "Modification des informations du compte",
 "de" => "&Auml;nderung der Konto-Einstellungen",
 "da" => "Redigere konto",
 "es" => "Editar cuenta",
 "it"=>"Modifica dell'account",
 "ro" => "Modificarea contului");

$txt_read_mail = array( 
"ru"=>"Чтение почты",
 "en" => "Mail Reading",
 "fr" => "Lecture des Mails",
 "de" => "Mails lesen",
 "da" => "LФs Mail",
 "es" => "Lectura de E-mails",
 "it"=>"Lettura della posta",
 "ro" => "Citire e-mail");

$txt_logout = array( 
"ru"=>"Выход",
 "en" => "Logout",
 "fr" => "Quitter",
 "de" => "Ausloggen",
 "da" => "Logout",
 "es" => "Salir",
 "it"=>"Esci",
 "ro" => "Logout");

$txt_close = array(
"ru"=>"Закрыть", 
 "en" => "Close",
 "fr" => "Fermer",
 "de" => "Schlie&szlig;en",
 "da" => "Luk",
 "es" => "Cerrar",
 "it"=>"Chiudi",
 "ro" => "Inchide");

$txt_refresh_menu = array(
"ru"=>"Обновить меню", 
 "en" => "Refresh Menu",
 "fr" => "R&eacute;actualiser",
 "de" => "Aktualisieren",
 "da" => "Opdater Menu",
 "es" => "Actualizar el menЗ",
 "it"=>"Aggiorna Menu",
 "ro" => "Reactualizare meniu");

$txt_session_expired = array(
"ru"=>"Время сессии закончилось", 
 "en" => "Session expired",
 "fr" => "Session expirИe",
 "de" => "Session zu alt",
 "da" => "Sessionen er udlЬbet",
 "es" => "La sesiСn ha expirado",
 "it"=>"Timeout Sessione",
 "ro" => "Sesiunea a expirat"); 

$txt_submit = array(
"ru"=>"Подтвердить",
 "en" => "Submit",
 "fr" => "Enregistrer",
 "de" => "Speichern",
 "da" => "Send",
 "es" => "Enviar",
 "it"=>"Invia",
 "ro" => "Inregistrare");

$txt_error_no_username = array(
"ru"=>"Нужно ввести имя!", 
 "en" => "You have to mention a username!",
 "de" => "Vous devez indiquer un nom !",
 "da" => "Angiv brugernavn",
 "fr" => "Sie m&uuml;ssen einen Kontonamen eingeben!",
 "es" => "║Debes ingresar un nombre de usuario!",
 "it"=>"Devi specificare un nome utente!",
 "ro" => "Trebuie sa introduceti un nume de utilizator!");

$txt_error_invalid_chars_in_username = array(
"ru"=>"Запрещенные символы в имени (можно: A-Z, 0-9, _, -)!", 
 "en" => "Non valid chars in username (ok: A-Z, 0-9, _, -)!",
 "fr" => "Characters non autorisИs dans le nom (ok: A-Z, 0-9, _, -)!",
 "de" => "Verbotene Zeichen im Benutzername (erlaubt: A-Z, 0-9, _, -)!",
 "da" => "Ugyldige tegn (ok: A-Z, 0-9, _, -)!",
 "es" => "CaractИres invАlidos (SСlo a-Z, 0-9, _, -)",
 "it"=>"Il nome utente contiene caratteri non validi (usa solo: A-Z, 0-9, _, -)!",
 "ro" => "Caractere invalide in numele utilizatorului (ok: A-Z, 0-9, _, -)!");

$txt_error_pw_not_same = array(
"ru"=>"Вы должны ввести два раза тот же пароль",
 "en" => "You have to type twice the same password",
 "fr" => "Vous devez indiquer deux fois le meme mot de passe",
 "de" => "Sie m&uuml;ssen zweimal das gleiche Passwort eintippen",
 "da" => "Tast password 2 gange",
 "es" => "Debes ingresar la contrase&ntilde;a 2 veces",
 "it"=>"Le due password immesse non coincidono",
 "ro" => "Trebuie sa introduceti aceeasi parola de doua ori");

$txt_error_pw_needed = array( 
"ru"=>"Вы должны ввести пароль",
 "en" => "You have to type a password",
 "fr" => "Vous devez indiquer un mot de passe",
 "de" => "Sie m&uuml;ssen einen Passwort eintippen",
 "da" => "Password skal indtastes",
 "es" => "Debes ingresar una contrase&ntilde;a",
 "it"=>"Devi specificare una password",
 "ro" => "Trebuie sa introduceti o parola");

$txt_error_fwd_needed = array(
"ru"=>"Нужен хотя бы один адрес пересылки", 
 "en" => "You have to type at least one forwarder",
 "fr" => "Vous devez indiquer au moins une adresse de redirection",
 "de" => "Sie m&uuml;ssen eine Weiterleitungadresse eingeben",
 "da" => "Tast venligst en forwarder",
 "es" => "Debes ingresar al menos un forward",
 "it"=>"Devi specificare almeno un indirizzo di forward",
 "ro" => "Trebuie sa introduceti cel putin un forward");

$txt_yes = array( 
"ru"=>"Да",
 "en" => "Yes",
 "fr" => "Oui",
 "de" => "Ja",
 "da" => "Ja",
 "es" => "Si",
 "it"=>"Si",
 "ro" => "Da");

$txt_no = array(
"ru"=>"Нет", 
 "en" => "No",
 "fr" => "Non",
 "de" => "Nein",
 "da" => "Nej",
 "es" => "No",
 "it"=>"No",
 "ro" => "Nu");

$txt_activated = array(
"ru"=>"Включен", 
 "en" => "On",
 "fr" => "ActivИ",
 "de" => "Aktiviert",
 "da" => "Aktiver",
 "es" => "Activado",
 "it"=>"Attivato",
 "ro" => "Activat");

$txt_inactived = array(
 "ru"=>"Выключен", 
 "en" => "Off",
 "fr" => "DИsactivИ",
 "de" => "Deaktiviert",
 "da" => "Deaktiver",
 "es" => "Desactivado",
 "it"=>"Disattivato",
 "ro" => "Dezactivat");

$txt_subject = array(
 "ru"=>"Тема", 
 "en" => "Subject",
 "fr" => "Sujet",
 "de" => "Betreff",
 "da" => "Emne",
 "es" => "Asunto",
 "it"=>"Oggetto",
 "ro" => "Subiect");

$txt_from = array(
"ru"=>"От", 
 "en" => "From",
 "fr" => "ExpИditeur",
 "de" => "Absender",
 "da" => "Fra",
 "es" => "De",
 "it"=>"Da",
 "ro" => "De la");

$txt_text = array(
"ru"=>"Текст", 
 "en" => "Text",
 "fr" => "Texte",
 "de" => "Text",
 "da" => "Tekst",
 "es" => "Texto",
 "it"=>"Testo",
 "ro" => "Text");

$txt_autoanswertext = array(
"ru"=>"Текст автоответа", 
 "en" => "Autoreply Text",
 "fr" => "Texte du rИpondeur",
 "de" => "Text des Autoresponders",
 "da" => "Tekst til Autoreply",
 "es" => "Mensaje del Autoresponder",
 "it"=>"Risposta automatica",
 "ro" => "Auto-raspuns");

$txt_date = array( 
"ru"=>"Дата",
 "en" => "Date",
 "fr" => "Date",
 "de" => "Datum",
 "da" => "Dato",
 "es" => "Fecha",
 "it"=>"Data",
 "ro" => "Data");

$txt_size = array( 
"ru"=>"Размер",
 "en" => "Size",
 "fr" => "Taille",
 "de" => "Gr&ouml;&szlig;e",
 "da" => "StЬrrelse",
 "es" => "TamaЯo",
 "it"=>"Dimensione",
 "ro" => "Dimensiune");

$txt_mailbox_listing = array(
 "ru"=>"Список ящиков", 
 "en" => "Mailbox Listing",
 "fr" => "Liste des Mails",
 "de" => "Liste der E-Mails",
 "da" => "E-Mails liste",
 "es" => "Lista de E-mails",
 "it"=>"Lista delle caselle di posta",
 "ro" => "Listing casute postale");

$txt_mailboxes_title = array(
"ru"=>"Ящики", 
 "en" => "Mailboxes",
 "fr" => "BoНtes aux lettres",
 "de" => "E-Mail-Kontos",
 "da" => "E-Mail kontis",
 "es" => "Casillas",
 "it"=>"Caselle di posta",
 "ro" => "Casute postale");

$txt_aliases_title = array(
"ru"=>"Алиасы", 
 "en" => "Aliases",
 "fr" => "Alias",
 "de" => "Alias",
 "da" => "Aliases",
 "es" => "Aliases",
 "it"=>"Alias",
 "ro" => "Alias-uri");

$txt_user_title = array(
"ru"=>"Ваш почтовый ящик", 
 "en" => "Your Mail Account",
 "fr" => "Votre compte mail",
 "de" => "Ihr Mailkonto",
 "da" => "Mailkonto",
 "es" => "Tu cuenta de E-mail",
 "it"=>"Il tuo account di posta",
 "ro" => "Contul dumneavoastra de E-mail");

$txt_info = array( 
 "ru"=>"Инфо",
 "en" => "Info",
 "fr" => "Info",
 "de" => "Info",
 "da" => "Info",
 "es" => "Info",
 "it"=>"Info",
 "ro" => "Info");

$txt_login_failed = array( 
"ru"=>"В доступе отказано: Пожалуйста, проверьте логин и пароль", 
 "en" => "Login failed : please check login and password",
 "fr" => "La connexion a ИchouИ : veuillez vИrifier le login et votre mot de passe",
 "de" => "Kein Zugang: bitte Login und Passwort ЭberprЭfen",
 "da" => "Ingen adgang; Kontroller venligst Deres Login og Password",
 "es" => "Login incorrecto : Por favor verifique su nombre de usuario y contrase&ntilde;a",
 "it"=>"Login errato: per favore controlla il nome utente e la password",
 "ro" => "Login esuat: verificati numele de utilizator si parola"); 

$txt_facultatif = array( 
"ru"=>"необязательно",
 "en" => "optional",
 "fr" => "facultatif",
 "de" => "nicht obligatorisch",
 "da" => "Ikke obligatorisk",
 "es" => "opcional",
 "it"=>"facoltativo",
 "ro" => "optional");

$txt_autoresp_subj = array(
"ru"=>"Автоответ.", 
 "en" => "Automatic Answer - Out of office",
 "fr" => "RИponse automatique - Actuellement non joignable",
 "de" => "Automatische Antwort - Zur Zeit nicht erreichbar",
 "da" => "Automatisk svar - Ikke hjemme",
 "es" => "Respuesta automАtica",
 "it"=>"Risposta automatica - Non sono in ufficio",
 "ro" => "Auto-raspuns - dezactivat");

$txt_autoresp_body = array(
 "ru"=>"Получено Ваше письмо с темой '%S'\n\n В данный момент меня нет на месте. Я отвечу на Ваше письмо, как только вернусь.",
 "en" => "Just got your mail with subject '%S'\n\nI'm not there. I'll answer your mail when I'll be back.\n\n",
 "fr" => "Je viens de recevoir votre mail Ю propos de '%S'\n\nJ'y rИpondrai Ю mon retour.\n\n",
 "de" => "Ich babe Ihren mail betreffend '%S' erhalten.\n\nEine Antwort erhalten Sie, wenn ich zur&uuml;ckkehre.\n\n",
 "da" => "Har modtaget Deres E-Mail '%S'. \n\nJeg vil svare nЕr jeg kommer tilbage. \n\n",
 "es" => "He recibido tu mensaje titulado '%S'.\n. En este momento no estoy aquМ. Te contestarИ cuando regrese.\n\n",
 "it"=>"Ho appena ricevuto il tuo messaggio con oggetto '%S'\n\nNon sono qua. Ti risponder&ograve; appena torno.\n\n",
 "ro" => "Tocmai am primit mesajul dumneavoastra cu subiectul '%S'\n\nMomentan nu sunt aici. Voi raspunde mesajului cand ma voi intoarce.\n\n");

$txt_mail_sysadmin = array( 
 "ru"=>"Отправить письмо администратору",
 "en" => "Mail System Administrator",
 "fr" => "Enoyer un mail au responsable du systХme",
 "de" => "E-Mail an Sysadmin",
 "da" => "Mail System Administrator",
 "es" => "Enviar un E-mail al administrador",
 "it"=>"Scrivi all'amministratore del sistema",
 "ro" => "Scrieti Administratorului");

$txt_back = array( 
 "ru"=>"Назад",
 "en" => "Back",
 "fr" => "Retour",
 "de" => "Zur&uuml;ck",
 "da" => "Tilbage",
 "es" => "AtrАs",
 "it"=>"Indietro",
 "ro" => "Inapoi");

$txt_about = array( 
 "ru"=>"О системе",
 "en" => "About",
 "fr" => "ю propos",
 "de" => "Info",
 "da" => "Info",
 "es" => "Acerca de",
 "it"=>"About",
 "ro" => "Despre");

$txt_details = array(
"ru"=>"Информация пользователя", 
 "en" => "User Info",
 "fr" => "User Info",
 "de" => "Benutzerinformation",
 "da" => "Bruger Info",
 "es" => "Informaci&oacute;n del usuario",
 "it"=>"Informazione utente",
 "ro" => "Nume utilizator");

$txt_goodbye = array( 
 "ru"=>"До свидания!",
 "en" => "Good bye!",
 "fr" => "Au revoir !",
 "de" => "Auf Wiedersehen!",
 "da" => "PЕ gensyn",
 "es" => "Adi&oacute;s",
 "it" =>"Ciao!",
 "ro" => "La revedere!");

$txt_error_quota_expired = array(
"ru"=>"Не доступно : Ваш лимит исчерпан", 
 "en" => "Not allowed : your quota is expired",
 "fr" => "Non autorisИ : votre quota est dИpassИ",
 "de" => "Nicht erlaubt : Ihr Limit ist &uuml;berschritten",
 "da" => "Ikke muligt : Deres Quota er overskredet",
 "es" => "Prohibido: La quota ha expirado",
 "it" =>"Errore : hai superato il tuo quota",
 "ro" => "Eroare: quota a expirat");

$txt_error_not_allowed = array( 
 "ru"=>"Извините, Вам это не доступно",
 "en" => "Sorry, you are not allowed to do that",
 "fr" => "DИsolИ, vous n'avez pas les droits pour effectuer cette opИration",
 "de" => "Leider haben Sie nicht die Berechtigung, diese Operation durchzuf&uuml;hren",
 "da" => "DesvФrre, De har ikke tilladelse til dette",
 "es" => "Lo siento, esta operaci&oacute;no estА permitida",
 "it"=>"Mi dispiace, non hai i privilegi per farlo",
 "ro" => "Nu sunteti autorizat sa faceti asta");

$txt_quota = array( 
 "ru" => "Ограничение", 
 "en" => "Quota",
 "fr" => "Quota",
 "de" => "Limit",
 "da" => "Quota",
 "es" => "Quota",
 "it" => "Quota",
 "ro" => "Quota");

$txt_maximum = array( 
 "ru"=>"максимум",
 "en" => "maximum",
 "fr" => "maximum",
 "de" => "maximal",
 "da" => "maximum",
 "es" => "maximo",
 "it" =>"massimo",
 "ro" => "maxim");

$txt_current = array(
 "ru"=>"текущий", 
 "en" => "current",
 "fr" => "actuellement",
 "de" => "zur Zeit",
 "da" => "NuvФrende",
 "es" => "actual",
 "it" =>"attuale",
 "ro" => "actual");

$txt_used = array(
 "ru"=>"использовано", 
 "en" => "used",
 "fr" => "utilis&eacute;",
 "de" => "belegt",
 "da" => "brugt",
 "es" => "usados",
 "it" =>"usato",
 "ro" => "folosit");

$txt_hardquota = array(
 "ru"=>"Максимальный лимит", 
 "en" => "Hard quota",
 "fr" => "Limite dure",
 "de" => "Hartes Limit",
 "da" => "Hard Quota",
 "es" => "Quota dura",
 "it" =>"Hard Quota",
 "ro" => "Quota dura");

$txt_softquota = array(
"ru"=>"Предупреждение",
 "en" => "Soft quota",
 "fr" => "Limite douce",
 "de" => "Flexibles Limit",
 "da" => "Soft Quota",
 "es" => "Quota blanda",
 "it" =>"Soft quota",
 "ro" => "Quota lejera");

$txt_msgsize = array( 
"ru"=>"Размер писем", 
 "en" => "Message size",
 "fr" => "Taille du message",
 "de" => "Mailgr&ouml;&szlig;e",
 "da" => "StЬrrelse pЕ konto",
 "es" => "Tama&ntilde;o del mensaje",
 "it" =>"Dimensione messaggio",
 "ro" => "Dimensiunea mesajului");

$txt_msgcount = array(
"ru"=>"Количество писем", 
 "en" => "Message count",
 "fr" => "Nombre de messages",
 "de" => "Anzahl der E-Mails",
 "da" => "Antal E-Mails",
 "es" => "Cantidad de mensajes",
 "it" =>"Numero di messaggi",
 "ro" => "Numarul mesajelor");

$txt_expiry = array( 
"ru"=>"Срок действия",
 "en" => "Expiry",
 "fr" => "Expiration",
 "de" => "Ablaufdatum",
 "da" => "Slut Dato",
 "es" => "Expiraci&oacuten",
 "it" =>"Scade",
 "ro" => "Expira"); 

$txt_settings = array(
 "ru" => "Настройки", 
 "en" => "Settings",
 "fr" => "Config",
 "de" => "Einstellungen",
 "da" => "Indstillinger",
 "es" => "Config",
 "it" =>"Config",
 "ro" => "Setari");

$txt_catchall = array(
 "ru" => "Catchall",
 "en" => "Catchall",
 "fr" => "Catchall",
 "de" => "Catchall",
 "da" => "Catchall",
 "es" => "Catchall",
 "it" => "Catchall",
 "ro" => "Catchall");

$txt_setup_catchall = array(
 "ru" => "Setup catchall",
 "en" => "Setup catchall",
 "fr" => "Affecter le catchall",
 "de" => "Einrichtung Catchall",
 "da" => "Setup catchall",
 "es" => "Setup catchall",
 "it" => "Setup catchall",
 "ro" => "Setup catchall");

$txt_remove_catchall = array(
 "ru" => "Remove catchall",
 "en" => "Remove catchall",
 "fr" => "Supprimer le catchall",
 "de" => "Catchall entfernen",
 "da" => "Remove catchall",
 "es" => "Remove catchall",
 "it" => "Remove catchall",
 "ro" => "Dezactiveaza catchall");

$txt_catchall_confirm = array(
 "ru" => "Catchall confirmation",
 "en" => "Catchall confirmation",
 "fr" => "Confirmer le catchall",
 "de" => "Catchall best&auml;tigen",
 "da" => "Catchall confirmation",
 "es" => "Catchall confirmation",
 "it" => "Catchall confirmation",
 "ro" => "Confirma catchall");

$txt_system_account = array(
 "ru" => "System account",
 "en" => "System account",
 "fr" => "Compte systХme",
 "de" => "Systemkonto",
 "da" => "System account",
 "es" => "System account",
 "it" => "System account",
 "ro" => "Contul sistemului");

$txt_current_catchall_account_is = array(
 "ru" => "current_catchall_account_is",
 "en" => "Current 'catch all emails' account is",
 "fr" => "Le compte rИceptionant tous les emails non dИfinis (<i>catchall</i>) est",
 "de" => "Das aktuelle Catchall-Konto is",
 "da" => "current_catchall_account_is",
 "es" => "current_catchall_account_is",
 "it" => "current_catchall_account_is",
 "ro" => "Contul catchall curent este");

$txt_help = array(
 "ru" => "Help",
 "en" => "Help",
 "fr" => "Aide",
 "de" => "Hilfe",
 "da" => "Help",
 "es" => "Help",
 "it" => "Help",
 "ro" => "Help");

$txt_ = array(
 "ru" => "",
 "en" => "",
 "fr" => "",
 "de" => "",
 "da" => "",
 "es" => "",
 "it" => "",
 "ro" => "");

$txt_ = array(
 "ru" => "",
 "en" => "",
 "fr" => "",
 "de" => "",
 "da" => "",
 "es" => "",
 "it" => "",
 "ro" => "");

$txt_ = array(
 "ru" => "",
 "en" => "",
 "fr" => "",
 "de" => "",
 "da" => "",
 "es" => "",
 "it" => "",
 "ro" => "");

?>
