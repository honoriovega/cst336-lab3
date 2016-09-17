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

// print shuffled deck
echo "<br>Shuffle<br>";
shuffle($cards);
printCards($cards);

// get sorted deck
echo "<br><br>Sorted<br>";
sort($cards);
printCards($cards);

?>