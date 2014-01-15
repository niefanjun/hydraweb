<html>
<body>

<meta charset="UTF-8">
<?php
if (isset($_POST["SSL"]))
	$SSL=" -S";
else
	$SSL="nossl";
if($_POST["port"]!="")
	$port=" -s ".$_POST["port"];
else
	$port="defult";
if ($_POST["thread"]!="") {
	$thread=" -t ".$_POST["thread"];
}
else
	$thread="defult";
$protocol=$_POST["protocol"];
//$command="/usr/local/bin/hydra -L user -P password -vV -e ns ".$SSL." ".$port." ".$_POST["ip"]." ".$protocol;
//echo $command;
//exec($command,$result);
system("/usr/local/php/bin/php -f crack.php ".$_POST["ip"]." ".$protocol." ".$thread." ".$port." ".$SSL." > /dev/null &");
echo "/usr/local/php/bin/php -f crack.php ".$_POST["ip"]." ".$protocol." ".$thread." ".$port." ".$SSL." > /dev/null &";
echo "成功提交";
//$file=fopen("result.txt","a");
//foreach ($result as $value) {
//	if (strpos($value, 'host')) {
//		$user_start=strpos($value, 'login:');
//		$pwd_start=strpos($value, 'password:');
//		$lenth=$pwd_start-$user_start-7;
//		$username=substr($value, $user_start+7,$lenth);
//		$password=substr($value,$pwd_start+10);
//		$output=$_POST["ip"]."	".$protocol."	".$username."	".$password."\n";
//		fwrite($file,$output);
//		echo $output;
//	}
//}
?>