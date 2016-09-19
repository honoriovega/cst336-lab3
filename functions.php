<?php
// count number of times target appers in arr
function occurences($target, $arr) {
	$count = 0;

	foreach($arr as $num)
		$count += $num == $target ? 1 : 0;

	return $count;
}

// winner ? tie ? no winner ? check here
function playOutcome($scores) {

    // Check if no winnner
    if ($scores[0] > 42 && $scores[1] > 42 &&
            $scores[2] > 42 && $scores[3] > 42) return -1;

    // Find the number greater closer to 42
    $smallest = 1;
    $saveIndex;

    for ($i = 0; $i < 4; $i++) {

		if ($scores[$i] > $smallest && $scores[$i] <= 42) {
			$smallest = $scores[$i];
			$saveIndex = $i;
		}
    }

    // Check if their is a tie
    return occurences($smallest, $scores) > 1 ? -2 : $saveIndex;
}

// All pass by reference values
function dealHands(&$scores, &$playerHands) {
    $cards = [];

    // get cards
    $iterator = ['clubs', 'diamonds', 'hearts', 'spades'];
    foreach($iterator as $suits) {

        $directory = "images/cards/" . $suits;

        foreach(glob($directory . '/*.png') as $item)
            array_push($cards, $item);
	}

    shuffle($cards);
    $index = 0;

	// deal hand to 4 players
	for ($i = 0; $i < 4; $i++) {

		$numCards = rand(4, 6); // How many cards to deal
		$score = 0;
		$dealtHand = [];

		for ($j = 0; $j < $numCards; $j++) {
			$card = $cards[$index++];
			array_push($dealtHand, $card);
			$score+= basename($card, ".png");
		}

		array_push($scores, $score);
		array_push($playerHands, $dealtHand);
	}
}
?>
