<!doctype html>
<html>
<head>
<link href="images/favicon.ico" rel="icon" type="image/x-icon" />
<title>Lab 3 - Silverjack</title>

<link rel="stylesheet" type="text/css" href="css/theme.css">

</head>

<body>
<div class='title'><img src='images/rsz_2silverjack.png' alt='headingLogo'></div>;

<div class="wrapper">
<div class='gameContainer'>
<?php

include 'functions.php';


$playerHands = [];
$scores = [];

dealHands($scores, $playerHands);

$outcome = playOutcome($scores);
$pics = array(1,2,3,4);

shuffle($pics);

// nested loop to print the hands of each player
for ($i = 0; $i < count($playerHands); $i++)  {

	echo "<div class='row'>";
	echo "<div class='player'><img src='images/players/$pics[$i].jpg'></div>";

    for ($j = 0; $j < count($playerHands[$i]); $j++) {
		echo "<div class='card'><img src='".$playerHands[$i][$j]."'></div>";
    }

	for($k = 0; $k < 6 - count($playerHands[$i]); $k++) {
		echo "<div class='card'></div>";
	}

	echo "<div class='score'>$scores[$i]</div>";
	echo "<div class='winner'>". ($outcome == $i ? "<img src='images/Winner.png'": "")."</div>";

	echo "</div>";
}

echo "</div></div>";

echo "<div class ='message'><h1>";

if ($outcome == -1)
    echo "No winner";
else if ($outcome == -2)
    echo "There was a tie";

else
	echo "";

echo "</h1></div>";
?>

<script>
function myFunction() {
    location.reload();
}
</script>
<!-- Button to refresh the page -->
<div class="centerButton">
<button onclick="myFunction()" class="playAgain">Play Again</button>
</div>
<!-- Button to refresh the page -->

</body>
</html>
