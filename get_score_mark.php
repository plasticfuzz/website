<?php

include("db_mark.php");

$numScoresToGet = 10;

mysql_connect ($host, $user, $pass);
mysql_select_db ($database);
$result = mysql_query ("SELECT * FROM `highScore` ORDER BY score DESC LIMIT $numScoresToGet");

$echoString = "&totalScores=".$numScoresToGet;

$i = 1; 

	while ($i <= $numScoresToGet){

		$row = mysql_fetch_array($result);
		extract($row);
		$echoString .= "&player".$i."=".$row['player']."&score".$i."=".$row['score'];
		//echo "$player : $score <br>";
		$i = $i +1;
	}
	
	echo $echoString;

?>