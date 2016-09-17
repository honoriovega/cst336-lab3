<!doctype html>
<html>
<head>
<title>Lab 3</title>
<link rel="stylesheet" type="text/css" href="css/theme.css">
</head>

<body>
<div class='title'>><img src='images/Silverjack.png'></div>
<?php

// Count the number of occurences in an array
// of a target value
function occurences($arr,$target) {
	$count = 0;
	for($i = 0; $i < count($arr); $i++) {
		if($arr[$i] == $target)
			$count++;
	}

	return $count;
}

function playOutcome($scores) {

    // There is no winner
    if($scores[0] > 42 && $scores[1] > 42 && $scores[2] > 42 && $scores[3] > 42)
        return -1;

	// Find the number greater closer to 42
    $smallest = 1;
    $saveIndex;
    for($i = 0; $i < 4; $i++)
    {
        if($scores[$i] > $smallest && $scores[$i] <= 42)
        {
            $smallest = $scores[$i];
            $saveIndex = $i;
        }
    }

			// Check if their is a tie
    return occurences($scores,$smallest) > 1 ? -2 : $saveIndex;

}

// All pass by reference values
function dealHand(&$scores, &$playerHands) {
    $cards = [];

    //get cards
    $iterator = ['clubs', 'diamonds', 'hearts', 'spades'];
    foreach($iterator as $suits) {
	    $directory = "images/cards/".$suits;
	    foreach(glob($directory.'/*.png') as $item)
		    array_push($cards, $item);
    }
    
    // shuffle cards
     //shuffle cards
    shuffle($cards);
    
    // How many cards to deal
    $numCards = rand(4,6);
    $score = 0;
    
    $dealtHand=[];
    
    for($i=0; $i<$numCards; $i++) {
        $card = $cards[$i];
        array_push($dealtHand, $card);
    	$score +=  basename($card, ".png");
       }

    array_push($scores, $score);
    array_push($playerHands, $dealtHand);
}

$playerHands = array(); // will hold the players hand
$scores = array();	    // keep track of the scores

// deal hand to 4 players
for($i = 0; $i < 4; $i++) {
   dealHand($scores,$playerHands);
}

// was it a tie ? who won ? was their no winner ?
$outcome = playOutcome($scores);


echo "<div class='gameContainer'>";
// nested loop to print the hands of each player
for($i = 0; $i < count($playerHands); $i++) {
    // change it here to show picture
	echo "<div class='player'><img src='images/players/player" .($i+1) . ".jpg'></div> "; 
	for($j = 0; $j < count($playerHands[$i]); $j++)
		echo "<div class='card'><img src=\"". $playerHands[$i][$j] . "\"></div>";
    echo "$scores[$i]"; // print their score
    echo $i == $outcome ? " Winner!<br>" : "<br>"; // logic to display
												  // winner
}
echo "</div> ";

if($outcome == -1)
    echo "<div style='text-align: center'><h1>No Winner </h1></div>";

else if($outcome == -2)
    echo "<div style='text-align: center'><h1>There was a tie </h1></div>";

?>

<script>
function myFunction() {
    location.reload();
}
</script>
<!-- Button to refresh the page -->
<center><button onclick="myFunction()" style="background-color:#66CD00">Play Again</button></center>

</body>
</html>
