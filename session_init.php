<?
// Initialize session variables
if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "";
}
if (!isset($_SESSION["domain"])) {
    $_SESSION["domain"] = "";
}
if (!isset($_SESSION["passwd"])) {
    $_SESSION["passwd"] = "";
}
if (!isset($_SESSION["type"])) {
    $_SESSION["type"] = "";
}
if (!isset($_SESSION["ip"])) {
    $_SESSION["ip"] = "";
}
if (!isset($_SESSION["expire"])) {
    $_SESSION["expire"] = 0;
}
if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "";
}
if (!isset($_SESSION["active"])) {
    $_SESSION["active"] = 0;
}
if (!isset($_SESSION["quota_on"])) {
    $_SESSION["quota_on"] = 0;
}
if (!isset($_SESSION["quota_data"])) {
    $_SESSION["quota_data"] = array();
}
if (!isset($_SESSION["catchall_active"])) {
    $_SESSION["catchall_active"] = "";
}
if (!isset($_SESSION["sort_order"])) {
    $_SESSION["sort_order"] = "";
}
if (!isset($_SESSION["mb_start"])) {
    $_SESSION["mb_start"] = 0;
}
if (!isset($_SESSION["al_start"])) {
    $_SESSION["al_start"] = 0;
}
if (!isset($_SESSION["mb_letter"])) {
    $_SESSION["mb_letter"] = "";
}
if (!isset($_SESSION["al_letter"])) {
    $_SESSION[""] = "al_letter";
}
if (!isset($_SESSION["vm_tcphost"])) {
    $_SESSION["vm_tcphost"] = "";
}
if (!isset($_SESSION["vm_tcphost_port"])) {
    $_SESSION["vm_tcphost_port"] = "";
}
if (!isset($_SESSION["vmailstats"])) {
    $_SESSION["vmailstats"] = array();
}

?>
