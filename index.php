<<<<<<< HEAD
<html>
<head>
<title>Lab 3</title>
<?php

// Count the number of occurences in an array
// of a target value
function occurences($arr,$target)
{
	$count = 0;
	for($i = 0; $i < count($arr); $i++)
	{
		if($arr[$i] == $target)
			$count++;
	}

	return $count;
}

// just to shuffle again to make it more random
function myShuffle(&$deck)
{
    for($i = 0; $i < 52; $i++)
    {
        $a = rand(0,51);
        $b = rand(0,51);

        $temp = $deck[$a];
        $deck[$a] = $deck[$b];
        $deck[$b] = $temp;

    }
}

function playOutcome($scores)
{

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
function dealHand(&$index,&$keys, &$scores, &$playerHands)
{

$cards = array(
		"images/cards/spades/1.png",     "images/cards/spades/2.png",
	    "images/cards/spades/3.png",     "images/cards/spades/4.png",
	    "images/cards/spades/5.png",     "images/cards/spades/6.png",
	    "images/cards/spades/7.png",     "images/cards/spades/8.png",
	    "images/cards/spades/9.png",    "images/cards/spades/10.png",
	   "images/cards/spades/11.png",    "images/cards/spades/12.png",
	   "images/cards/spades/13.png",      "images/cards/clubs/1.png",
	     "images/cards/clubs/2.png",      "images/cards/clubs/3.png",
	     "images/cards/clubs/4.png",      "images/cards/clubs/5.png",
	     "images/cards/clubs/6.png",      "images/cards/clubs/7.png",
	     "images/cards/clubs/8.png",      "images/cards/clubs/9.png",
	    "images/cards/clubs/10.png",     "images/cards/clubs/11.png",
	    "images/cards/clubs/12.png",     "images/cards/clubs/13.png",
	  "images/cards/diamonds/1.png",   "images/cards/diamonds/2.png",
	  "images/cards/diamonds/3.png",   "images/cards/diamonds/4.png",
	  "images/cards/diamonds/5.png",   "images/cards/diamonds/6.png",
	  "images/cards/diamonds/7.png",   "images/cards/diamonds/8.png",
	  "images/cards/diamonds/9.png",  "images/cards/diamonds/10.png",
	 "images/cards/diamonds/11.png",  "images/cards/diamonds/12.png",
	 "images/cards/diamonds/13.png",     "images/cards/hearts/1.png",
	    "images/cards/hearts/2.png",     "images/cards/hearts/3.png",
	    "images/cards/hearts/4.png",     "images/cards/hearts/5.png",
	    "images/cards/hearts/6.png",     "images/cards/hearts/7.png",
	    "images/cards/hearts/8.png",     "images/cards/hearts/9.png",
	   "images/cards/hearts/10.png",    "images/cards/hearts/11.png",
	   "images/cards/hearts/12.png", "   images/cards/hearts/13.png");

   // How many cards to deal
   $numCards = rand(4,6);
   $score = 0;

   $temp = array();

   for($i = $index; $i < $index + $numCards; $i++)
   {
        $key = $keys[$i];
        array_push($temp, $cards[$key]);
        $score += ($key % 13) + 1;
   }

   $index  = $index + $numCards;

   array_push($scores, $score);
   array_push($playerHands, $temp);

}

$index = 0;
$deck = array(0); // will hold keys to access deck
$playerHands = array(); // will hold the players hand
$scores = array();	    // keep track of the scores

for($i = 1; $i < 52; $i++)
{
	array_push($deck,$i);
}

// Shuffle it twice, just to make it more random
myShuffle($deck);
shuffle($deck);

// deal hand to 4 players
for($i = 0; $i < 4; $i++)
{
    dealHand($index,$deck,$scores,$playerHands);
}

// was it a tie ? who won ? was their no winner ?
$outcome = playOutcome($scores);

// nested loop to print the hands of each player
for($i = 0; $i < count($playerHands); $i++)
{
    echo "Player $i"; // change it here to show picture

	for($j = 0; $j < count($playerHands[$i]); $j++)
		echo "<img src=\"". $playerHands[$i][$j] . "\">";

    echo "$scores[$i] "; // print their score
    echo $i == $outcome ? "Winner!<br>" : "<br>"; // logic to display
												  // winner
}

if($outcome == -1)
    echo "<h1>No Winner </h1>";

else if($outcome == -2)
    echo "<h1>There was a tie </h1>";

?>
</head>

<body>

<!-- Button to refresh the page -->
<center><button onclick="myFunction()" style="background-color:#66CD00">Play Again</button></center>

<script>
function myFunction() {
    location.reload();
}
</script>
<!-- Button to refresh the page -->

</body>
</html>
=======
<?php
$cards = [];

//get cards
$iterator = ['clubs', 'diamonds', 'hearts', 'spades'];
foreach($iterator as $suits) {
	$directory = "images/cards/".$suits;
	foreach(glob($directory.'/*.png') as $item)
		array_push($cards, $item);
}

//print all cards
function printCards($cards){
	$count = 0;
	foreach($cards as $card) {
		echo "<img src='$card'>";
		$value =  basename($card, ".png");
		echo $value." ";
		$count++;
		if($count % 13 == 0)
			echo "<br>";
	}
}
// in order

// print shuffled deck
echo "<br>Shuffle<br>";
shuffle($cards);
printCards($cards);

// get sorted deck
echo "<br><br>Sorted<br>";
natsort($cards);
printCards($cards);

?>
>>>>>>> 07f1303b4927e30a8cafd1611c5a6ec5960b37a4
