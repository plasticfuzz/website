<?php

include("db_mark.php");
loginInfo();

$table = "membersLogin";

$whatToDo = "reLogin";


	//////////////RELOGIN////////////

	if ( $whatToDo == "reLogin") {
	
	mysql_pconnect ($host, $user, $pass);
	mysql_select_db ($database);
	
	$reLoginName = "mark";
	$reLoginPassword = md5("shahid");
	
	$query = "SELECT password FROM $table WHERE loginName = '$reLoginName'  ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	
			if ($reLoginPassword == $row['password']) {
				echo "&loggedIn=true";
		
			} else {
				echo "&loggedIn=falsegayboy";
		
			}
	
	
	}
	
		
	//////////////NEW LOGIN////////////
	
	if ( $whatToDo == "newLogin") {
	
	
	
	}




?>