<?php
$contentsLIST = file_get_contents('list.dat');
$explodeLIST = explode('|||',$contentsLIST);
$last = trim(file_get_contents('last.dat'));
$x = 0;
while(isset($explodeLIST[$x])) {
	if($last == trim($explodeLIST[$x])) {
		if(isset($explodeLIST[$x+1])) {
			file_put_contents("last.dat",trim($explodeLIST[$x+1]));
			header("location: ".trim($explodeLIST[$x+1])); die(); exit();
		}
		else {
			file_put_contents("last.dat",trim($explodeLIST[0]));
			header("location: ".trim($explodeLIST[0])); die(); exit();
		}
	}
	$x++;
}
echo "error"; die(); exit();
