<?php  error_reporting(E_ALL);
//Vital file include
require_once("../load.php");
ob_start();
// physical path of admin
if( !defined( 'ADM' ) )
	define( 'ADM', ABSPATH.'/'.ADMINCP);
define( 'in_admin', 'true' );
require_once( ADM.'/adm-functions.php' );
require_once( ADM.'/adm-hooks.php' );
if(get_option('UseAdPin') == 1) {
if(_get('sk') != "pin") {
if(is_empty(get_option('PINA1',''))) {
add_option('PINA1',1);
}	
if(is_empty(get_option('PINA2',''))) {
add_option('PINA2',2);
}
if(is_empty(get_option('PINA3',''))) {
add_option('PINA3',3);
}
if(is_empty(get_option('PINA4',''))) {
add_option('PINA4',4);
}
$adpin = get_option('PINA1',1).get_option('PINA2',2).get_option('PINA3',3).get_option('PINA4',4);	
if(!isset($_SESSION['admpin']) || ( $_SESSION['admpin'] <> $adpin) ) {redirect(admin_url('pin'));}
}
}
include_once( ADM.'/main7.php' );

ob_end_flush();
//That's all folks!
?>