<!doctype html>
<html>
<head>
<title>Lab 3</title>
<link rel="stylesheet" type="text/css" href="css/theme.css">
</head>

<body>
<div class='title'><img src='images/Silverjack.png'></div>
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
function dealHands(&$scores, &$playerHands) {
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
    $index=0;
    
    // How many cards to deal
    // deal hand to 4 players
    for($i = 0; $i < 4; $i++) {
        $numCards = rand(4,6);
        $score = 0;
        $dealtHand=[];
        for($j=0; $j<$numCards; $j++) {
            $card = $cards[$index++];
            array_push($dealtHand, $card);
    	    $score +=  basename($card, ".png");
        }
        array_push($scores, $score);
        array_push($playerHands, $dealtHand);
    }
}


$playerHands = array(); // will hold the players hand
$scores = array();	    // keep track of the scores

dealHands($scores,$playerHands);

// was it a tie ? who won ? was their no winner ?
$outcome = playOutcome($scores);


$playerPicutres = array("images/players/player1.jpg",
                        "images/players/player2.jpg",
                        "images/players/player3.jpg",
                        "images/players/player4.jpg");
$indexes = array(0,1,2,3);
shuffle($indexes);
// displays players and cards
echo "<div class='gameContainer'>";
// nested loop to print the hands of each player
for($i = 0; $i < count($playerHands); $i++) {
    $key = $indexes[$i];
        // Need to add scores to shuffle the picture on each reload
        
    // img src='$playerPicutres[$key]'>
    echo "<div class='player'><img src='$playerPicutres[$key]'></div>";
	echo "<div class='dealtHand'>";
	for($j = 0; $j < count($playerHands[$i]); $j++)
		echo "<div class='card'><img src=\"". $playerHands[$i][$j] . "\"></div>";
    echo "</div><div class='outcome'><div>$scores[$i]"; // print their score
    echo $i == $outcome ? " Winner!</div></div><br>" : "</div></div><br>"; // logic to display
												  // winner
}
echo "</div> ";

if($outcome == -1)
    echo "<div class ='message'><h1>No Winner </h1></div>";

else if($outcome == -2)
    echo "<div class ='message'><h1>There was a tie </h1></div>";


s

?>

<script>
function myFunction() {
    location.reload();
}
</script>
<!-- Button to refresh the page -->
<center><button onclick="myFunction()" style="background-color:#66CD00">Play Again</button></center>
<div class="mydiv"></div>
</body>
</html>
