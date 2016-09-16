<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
This is a skeleton html file that you can use to get you started on each new
HTML project

Name: Your Name Here
Class: CIS 3303
Section: x
-->
<html>

<head>
<title>Lab 3</title>
<style>

.rules
{
	font-family: Lucida Console,Lucida Sans Typewriter,monaco,Bitstream Vera Sans Mono,monospace;
	font-size: 15;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 26.4px;
}


.heading
{
	text-align:center;
	color:gray;
}

.button
{
	background-color:#61B329;
	width:100px;
	height:50px;
	border:1px solid black;
	margin-left:400px;
	margin-right:400px;
}

p
{
	text-align:center;
	font-size: 110%;
}

.score
{
	display:inline-block;
	align:center;
float:right; width:44%;

margin-top:20px;

	margin-bottom:10px;
	font-size: 250%;
}

</style>


<?php

/*
jack = 11 points
queen = 12 points
king  = 13 points
ace = 1 point
lower or closer to 42 is the winner

values greater than 42 lose automatically

all other cards are worth the number on the card


52 cards in a deck

*/

// 1 - 13
// $deck = array(

//$source = "home/logitech/Desktop/cards/clubs/";

function dealCard()
{
	$num = rand(1,13);
	
	
	$names = array("diamonds_","spades_","hearts_","clubs_");
	
	
$file =  $names[rand(0,3)] . $num . ".png";
echo "<img src=\"$file\">";
}

function getCardRep()
{
	return rand(1,13);
}

function addPoints(&$player_scores,$i)
{
	for($j = 0; $j < rand(4,6); $j++)
		$player_scores[$i] += rand(1,13);

}

// deal hand to the player
function dealHandToPlayer($player_number,$score,$index)
{
$times = rand(4,6); // 4 to 6 cards;


echo "<img src=\"player" .$player_number. ".jpg\" height=\"100\" width=\"100\"></div>";
for($i = 0; $i < $times; $i++)
	dealCard();

echo "<div class=\"score\">$score". ($score == $index ? " Winner!": "") ."</div><br>"; // new line after dealing for player
}

echo "<div class=\"heading\"><h1>SilverJack</h1></div>";


$player_scores = array(0,0,0,0);

for($i  = 0; $i < 4; $i++)
	addPoints($player_scores,$i);


$i = 0;
while($player_scores[$i] > 42)
{
	$i++;

}


$smallest = $player_scores[$i];
$index = 0;
for($j = $i;$j < 4; $j++)
{
    if($player_scores[$j] > 42) # if the value is greater than 42 skip it
        continue;
    
    if($player_scores[$j] > $smallest)
    {
        $index = $j;
        $smallest = $player_scores[$j];
    }
}

//sort($player_scores);
// do this 4 times because there are 4 players
$players = array(1,2,3,4);
shuffle($players);
for($i = 0; $i < 4; $i++)
	dealHandToPlayer($players[$i],$player_scores[$i],$smallest);


/*
foreach($player_scores as $score)
	echo "$score<br>";
*/

?>


</head>

<body>

<div class="rules"><pre>
<!--
Lab 3: PHP Arrays

Silverjack Game

Rubric:

1) Each player gets the "right amount" of cards to get close to 42 (20pts)
2) The cards are not duplicated (15pts)
3) The total points per player is displayed properly (15pts)
4) The winner(s) is(are) displayed properly with the earned points (15pts)
5) Players pictures are displayed RANDOMLY (10pts)
6) Your contribution in GitHub is similar to your teammates (15pts)
7) There is an external CSS file with 10 rules (10pts)
-->
<center><button onclick="myFunction()" style="background-color:#66CD00">Play Again</button></center>

<script>
function myFunction() {
    location.reload();
}
</script>
</body>
</html>
