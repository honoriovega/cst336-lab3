
<?php
$cards = array("images/cards/spades/1.png",
"images/cards/spades/2.png",
"images/cards/spades/3.png",
"images/cards/spades/4.png",
"images/cards/spades/5.png",
"images/cards/spades/6.png",
"images/cards/spades/7.png",
"images/cards/spades/8.png",
"images/cards/spades/9.png",
"images/cards/spades/10.png",
"images/cards/spades/11.png",
"images/cards/spades/12.png",
"images/cards/spades/13.png",
"images/cards/clubs/1.png",
"images/cards/clubs/2.png",
"images/cards/clubs/3.png",
"images/cards/clubs/4.png",
"images/cards/clubs/5.png",
"images/cards/clubs/6.png",
"images/cards/clubs/7.png",
"images/cards/clubs/8.png",
"images/cards/clubs/9.png",
"images/cards/clubs/10.png",
"images/cards/clubs/11.png",
"images/cards/clubs/12.png",
"images/cards/clubs/13.png",
"images/cards/diamonds/1.png",
"images/cards/diamonds/2.png",
"images/cards/diamonds/3.png",
"images/cards/diamonds/4.png",
"images/cards/diamonds/5.png",
"images/cards/diamonds/6.png",
"images/cards/diamonds/7.png",
"images/cards/diamonds/8.png",
"images/cards/diamonds/9.png",
"images/cards/diamonds/10.png",
"images/cards/diamonds/11.png",
"images/cards/diamonds/12.png",
"images/cards/diamonds/13.png",
"images/cards/hearts/1.png",
"images/cards/hearts/2.png",
"images/cards/hearts/3.png",
"images/cards/hearts/4.png",
"images/cards/hearts/5.png",
"images/cards/hearts/6.png",
"images/cards/hearts/7.png",
"images/cards/hearts/8.png",
"images/cards/hearts/9.png",
"images/cards/hearts/10.png",
"images/cards/hearts/11.png",
"images/cards/hearts/12.png",
"images/cards/hearts/13.png",);

$count = 0;
shuffle($cards);
foreach($cards as $card)
{
	echo "<img src=\"$card\">";
	$count++;
	
	if($count % 13 == 0)
		echo "<br>";
}
?>