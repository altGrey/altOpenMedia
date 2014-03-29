<?php
include(pathprivate."includes/clientLIB.php");
include(pathprivate."includes/DBuniLIB.php");
include(pathprivate."includes/SYSTEMuniLIB.php");
$_SESSION = initSession($_SESSION);
$_SESSION = agentSession($_SESSION,$_SERVER['HTTP_USER_AGENT']);
if (!isset($_SESSION['securethis'])) {
	$itx['securethis']=md5(uniqid(rand(), true));
	$_SESSION['securethis'] = $itx['securethis'];
}
define("securethis",$_SESSION['securethis']);
$itx['get'] = safeGet($_GET);
define("unixtime",time());
define("ip",$_SERVER["REMOTE_ADDR"]);
define("prettytime",getPrettyTime(unixtime,"GMT"));
