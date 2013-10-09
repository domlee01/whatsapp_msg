<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_CTYPE, "en_US.UTF-8");

//GET unique developer api key to ensure no spamming
$code = $_REQUEST['code'];
if ( $code != '7a1cbecf361eceec96cd0e0e556d3442' ){
	echo 'Error Auth';
	exit(0);
}
$dst = $_REQUEST['phone'];
if (substr($dst, 0, 1) == '+'){
	$dst = substr($dst, 1);
}
$msg = $_REQUEST['msg'];
$msg = str_replace("http://", "", $msg);
//echo $msg;
//$enc = mb_detect_encoding($msg, "UTF-8,ISO-8859-1");
//echo iconv($enc, "UTF-8", $msg);

$last_line = exec('src/yowsup-cli -c src/config.1 -s '.$dst.' '.escapeshellarg($msg), $retval);

var_dump( $retval );

?>
