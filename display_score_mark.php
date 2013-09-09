<?php

include("db_mark.php");

$table = 'highScore';

$whatToDo = $_POST['whatToDo'];

///////////////////////////////////////////////////////////////
/////////////////////Displayign Scores from Datebase///////////////////////////////////////////
//////////////////////////////////////////////////////

if ($whatToDo == NULL) {

$numScoresToGet = 10;

mysql_connect ($host, $user, $pass);
mysql_select_db ($database);
$result = mysql_query ("SELECT * FROM `highScore` ORDER BY score DESC LIMIT $numScoresToGet");

$echoString = "&totalScores=".$numScoresToGet;

$i = 1; 

	while ( $i <= $numScoresToGet){
	
	

		$row = mysql_fetch_array($result);
		extract($row);
		$echoString .= "&player".$i."=".$row['player']."&score".$i."=".$row['score'];
		
			if ($i == $numScoresToGet){
				$lowestHighScore = $score;			
			
			}
		$i = $i + 1;
	}	
	echo $echoString."&lowestHighScore=".$lowestHighScore;
	
}
///////////////////////////////////////////////////////////////
/////////////////////Submitting New Score to Datebase///////////////////////////////////////////
//////////////////////////////////////////////////////
if ($whatToDo == "submitScore") {

	$newScore = $_POST['newScore'];
	$newPlayer = $_POST['newPlayer'];
	$lowestHighScore = $_POST['lowestHighScore'];
	
	mysql_connect ($host, $user, $pass);
	mysql_select_db ($database);

	
	if ( $newScore > $lowestHighScore) {
		$insertScore = "INSERT INTO $table VALUES ('$newPlayer', '$newScore')";
		mysql_query($insertScore);
		$deleteScore = "DELETE FROM $table WHERE score < $lowestHighScore";
		mysql_query($deleteScore);
		echo "&scoresUpdated=true";

	}

}


?>