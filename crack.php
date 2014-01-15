<?php
if ($argv[3]!="defult") {
	$thread=$argv[3];
}
else
	$thread="";
if ($argv[4]!="defult") {
	$port=$argv[4];
}
else
	$port="";
if ($argv[5]!="nossl") {
	$SSL=$argv[5];
}
$command="/usr/local/bin/hydra -L ".$argv[2]." -P ".$argv[2]." -vV -e ns ".$argv[1]." ".$argv[2].$thread.$port.$SSL;
exec($command,$result);
$file=fopen("result.txt","a");
$store = " 	<table class='table table-striped'>  
     		<caption>".date("Y-m-d   h:i:s A")." ".$argv[2]."</caption>  
     		<thead>  
        	<tr>  
          	<th>用户名</th>  
          	<th>密码</th>
          	<th>IP</th>  
        	</tr>  
      		</thead>  
      		<tbody>";
fwrite($file, $store);
foreach ($result as $value) {
	if (strpos($value, 'host')) {
		$user_start=strpos($value, 'login:');
		$pwd_start=strpos($value, 'password:');
		$lenth=$pwd_start-$user_start-7;
		$username=substr($value, $user_start+7,$lenth);
		$password=substr($value,$pwd_start+10);
		$output="	<tr>  
          			<td>".$username."</td>  
          			<td>".$password."</td> 
          			<td>".$argv[1]."</td>
        			</tr>";
		fwrite($file,$output);
	}
}
$store = "	</tbody>  
    		</table>";
fwrite($file, $store);
?>