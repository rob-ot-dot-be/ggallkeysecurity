<?php

function user_file2http($content,$conf) {
	// Replacementfunction for file://
	$url=$content["url"];
	$TAG=$content["TAG"];
	if(substr($url,0,5)=="file:") {
		$a=str_replace("file://", "http://",$TAG);
		return $a;
	}
	return $TAG;
}
?>