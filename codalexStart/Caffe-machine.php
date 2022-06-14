<?php
// Caffe machine -
//Wallet - you have coins (not sum of money but num of coins)
//have to put coins into Caffe machine (if you do not have that coin put error)
//Chose drink
//have to return spare change starting from the biggest coin possible

$wallet = [
    "1" => 7,
    "2" => 5,
    "5" => 4,
    "10" => 3,
    "20" => 5,
    "50" => 1,
    "100" => 3,
    "200" => 1
];

$drinks = [
    "latte" => 150,
    "espresso" => 115,
    "chocolate" => 177
];

$moneyInsideMachine = 0;
echo 'Coins inside your wallet : ' . PHP_EOL;
foreach ($wallet as $coin => $amount){
    echo $coin . ' = ' . $amount . 'coins / ';
}
echo PHP_EOL;

$a = "";
while ($a != "n"){

    $a = readline("Insert coins in the machine?  (Y/N)  :");
    echo PHP_EOL;

    if ($a == "y"){
        $b = readline("Enter the value of the coin : ");
        echo PHP_EOL;
        if ($wallet[$b] > 0){
            echo 'Money inside machine: ' .  ($moneyInsideMachine += (int)$b) . ' cents';
            echo PHP_EOL;
            $wallet[$b] --;
        }else{
            echo 'You do not have that coin in your wallet' . PHP_EOL;
            echo 'Coins inside your wallet : ' . PHP_EOL;
            foreach ($wallet as $coin => $amount){
                echo $coin . ' = ' . $amount . 'coins / ';
            }
            echo PHP_EOL;
        }
    }
}

echo 'Money inside machine: ' .  $moneyInsideMachine . ' cents';
echo PHP_EOL;
echo 'Available drinks' . PHP_EOL .
    '1. latte' . PHP_EOL .
    '2. espresso' . PHP_EOL .
    '3. chocolate'. PHP_EOL;

echo $c = readline('Enter the number of the drink you would like to purchase: ');

$moneyToReturn = 0;
switch ($c){

    case $c == "1":
        echo PHP_EOL;
        if ($moneyInsideMachine < $drinks['latte']){
            echo 'You cannot afford latte - drink water.';
            echo PHP_EOL;
        }else{
            $moneyToReturn = $moneyInsideMachine - $drinks['latte'];
            echo 'Drink costs : ' . $drinks['latte'] . ' cents' . PHP_EOL;
            echo PHP_EOL . 'Machine is making Your drink' . PHP_EOL;
        }
        break;

    case $c == "2";
        echo PHP_EOL;
        if ($moneyInsideMachine < $drinks['espresso']){
            echo 'You cannot afford espresso - drink water.';
            echo PHP_EOL;
        }else{
            $moneyToReturn = $moneyInsideMachine - $drinks['espresso'];
            echo 'Drink costs : ' . $drinks['espresso'] . ' cents' . PHP_EOL;
            echo PHP_EOL . 'Machine is making Your drink' . PHP_EOL;
        }
        break;

    case $c == "3";
        echo PHP_EOL;
        if ($moneyInsideMachine < $drinks['chocolate']){
            echo 'You cannot afford chocolate - drink water.';
            echo PHP_EOL;
        }else{
            $moneyToReturn = $moneyInsideMachine - $drinks['chocolate'];
            echo 'Drink costs : ' . $drinks['chocolate'] . ' cents' . PHP_EOL;
            echo PHP_EOL . 'Machine is making Your drink' . PHP_EOL;
        }
        break;
}

$coinsReturnOrder = [200,100,50,20,10,5,2,1];
while($moneyToReturn != 0){

    if ($moneyToReturn >= $coinsReturnOrder[0]){
        $moneyToReturn -= $coinsReturnOrder[0];
        echo "Coin returned : $coinsReturnOrder[0]" . ' cents' . PHP_EOL;
    }else{
        array_shift($coinsReturnOrder);
    }

}
echo 'Please come again' . PHP_EOL;
