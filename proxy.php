<?php
#header('Content-Type: text/javascript; charset=UTF-8');
$url1  = $_GET['url']; //Õâ¶ùÌîÒ³ÃæµØÖ·
if(empty($url1)){
	echo 'the url is empty.';
	return;
}	
$tempu= parse_url($url1);
$pro=$tempu['scheme'];
$url=$pro.'://'.$tempu['host'];
$info = file_get_contents($url1);

$info = str_replace('"//','"'.$pro.'://',$info);
$info = str_replace('"//','"'.$pro.'://',$info);

#$info = str_replace('href="//','href="'.$pro.'://',$info);
#$info = str_replace('src="//','src="'.$pro.'://',$info);


$info = str_replace('href="/','href="/proxy.php?url='.$url.'/',$info);
$info = str_replace('src="/','src="/proxy.php?url='.$url.'/',$info);

$info = str_replace('href="http://','href="/proxy.php?url=http://',$info);
$info = str_replace('href="https://','href="/proxy.php?url=https://',$info);

$info = str_replace('src="http://','src="/proxy.php?url=http://',$info);
$info = str_replace('src="https://','src="/proxy.php?url=https://',$info);
if(strpos($url1, '.css'))
{
	header("Content-type:text/css");
}else 
	if(strpos($url1, '.js'))
	header("Content-type:text/javascript");	
echo $info;

?>
