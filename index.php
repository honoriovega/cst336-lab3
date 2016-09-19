<!doctype html>
<html>
<head>
<link href="images/favicon.ico" rel="icon" type="image/x-icon" />
<title>Lab 3 - Silverjack</title>
<link rel="stylesheet" type="text/css" href="css/theme.css">
</head>

<body>
<div class='title'><img src='images/Silverjack.png'></div>
<?php

// our functions
include 'functions.php';

$playerHands = [];
$scores = [];

dealHands($scores, $playerHands);

// was it a tie ? who won ? was their no winner ?
$outcome = playOutcome($scores);

$pics = array(1,2,3,4);
shuffle($pics);

// displays players and cards
echo "<div class='gameContainer'>";

// nested loop to print the hands of each player
for ($i = 0; $i < count($playerHands); $i++)  {

    echo "<div class='player' class='playerImage'><img src='images/players/$pics[$i].jpg'></div>";
    echo "<div class='dealtHand'>";
    for ($j = 0; $j < count($playerHands[$i]); $j++) {
        echo "<div class='card'><img src='".$playerHands[$i][$j] . "'></div>";
    }
    // print their score
    echo "<div class='outcome'><div class='outcome'>$scores[$i]";

    // to display winner
    echo $i == $outcome ? "</div><img class='winner' .
              src='images/Winner.png'></div></div><br />" :
                "</div></div></div><br />";
    }

echo "</div> ";

if ($outcome == - 1)
    echo "<div class ='message'><h1>No Winner </h1></div>";
else if ($outcome == - 2)
    echo "<div class ='message'><h1>There was a tie </h1></div>";
?>

<script>
function myFunction() {
    location.reload();
}
</script>
<!-- Button to refresh the page -->
<center><button onclick="myFunction()" class="playAgain">Play Again</button></center>
<div class="mydiv"></div>
</body>
</html>
