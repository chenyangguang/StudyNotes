<?php
$randNum = 5;
$num = 0;
while ($num < 20) {
	echo ++$num.', ';
}

for ($i = 1; $i <= 20; $i++) {
	echo $i;
	if ($i != 20) {
		echo ', ';
	}else {
		break;
	}
}

echo "<hr />";
$bestFriends = array('Joy', 'Willow', 'Ivy');
$bestFriends[4] = 'Steve';
foreach ($bestFriends as $friend) {
	echo $friend . ', ';
}

/*
$customer = array('Name'=>$usersName, 'Street'=> $streetAddress, 'City'=>$cityAddress);
foreach ($customer as $key=>$value) {
	echo $key .' : '. $value;
}

$bestFriends = $bestFriends + $customer;

 */
//== != ===
//
$customer = array(
	array('Decek',  '123 Main', '153232' ),
	array('Sally', '124 main', '154343'),
	array('Bob', '125 Main', '15242')
);
echo "<hr />";
for ($i = 0; $i < 3; $i++) {
	for ($col = 0; $col < 3; $col++) {
		echo $customer[$i][$col], ', ';
	}
	echo '<br />';
}

$randString = "               Random String       ";
echo strlen("$randString") . "</br>";
echo strlen(ltrim($randString)) . "</br>";
echo strlen(rtrim($randString)) . "</br>";
echo strlen(trim($randString)) . "</br>";

echo "<hr />";

printf("The randomString is %s <br /> ", $randString);

$decimalNum = 2.3456;
printf("decimal num = %.2f </br>", $decimalNum);

// other conversion codes
// b : integer to binary
// c : integer to charater
// d : integer to decimal 
// f : double to float
// o : string to string 
// x : integer to hexadecimal

echo "<hr />";
echo strtoupper($randString . "</br>");
echo strtolower($randString . "</br>");
echo ucfirst($randString . "</br>");


$arrayForString = explode(' ', $randString, 2);
$stringToArray = implode(' ', $arrayForString);
var_dump($stringToArray, $arrayForString);

$partOfString = substr('Random String', 0, 6);
echo $partOfString;

echo "<hr />";
$man = "Man";
$manhole = "Manhole";
echo strcmp($man, $manhole);
echo strcasecmp($man, $manhole);

echo "The String " . strstr($randString, "String");
echo "The String " . stristr($randString, "String");
echo "Loc The String " . strpos($randString, "String");


$newString = str_replace("String", "Stuff", $randString);
echo $newString;

echo "<hr />";

function addNumbers($num1, $num2)
{
<<<<<<< HEAD
	return $num1+$num2;
=======
	return $num1;
>>>>>>> eb791ab37b203dfab51e24907bd9a2b4d9f0b684
}
 function addNumber($num1, $num2)
{
	return $num1 + $num2;
}

echo "3+4=".addNumbers(3,4);
?>
