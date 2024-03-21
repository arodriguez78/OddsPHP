<?php
header("Content-type:text/plain; charset=utf-8");

//
function catch_errors($n, $str){
    print "Exception: [{$n}] {$str}".PHP_EOL;
    die();
}
set_error_handler("catch_errors");

/*
 * 
 * Load the Odds Class.
 * 
 */
require dirname(__FILE__)."/../src/Odds.php";
require dirname(__FILE__)."/../src/Payouts.php";
require dirname(__FILE__)."/../src/Surebets.php";

/*
 * 
 * Odds convertions
 * 
 */
use OddsPHP\Odds as Odds;
$odd = new Odds();

print "1800.00 to decimal:\n".$odd->set('decimal', 1800.00)->get('decimal')."\n".PHP_EOL;

// Converting from decimal to fractional.
print "1.55 to fractional:\n".$odd->set('decimal', 1.55)->get('fractional')."\n".PHP_EOL;

// Convert a decimal to fractional
print "5.50 to fractional:\n".$odd->set('decimal', 5.50)->get('fractional')."\n".PHP_EOL;

// Reducing a fraction
print "Reduce 44/100:\n".$odd->set('fractional', '44/100')->reduce()."\n".PHP_EOL;

// Reducing a fraction
print "Calculate implied probability:\n".$odd->set('fractional', '44/100')->get('implied')."%\n".PHP_EOL;

// Converting fractional to decimal.
print "11/20 to decimal:\n".$odd->set('fractional', '11/20')->get('decimal')."\n".PHP_EOL;
print "22/40 to decimal:\n".$odd->set('fractional', '22/40')->get('decimal')."\n".PHP_EOL; // Fractions are automatically reduced.

// Converting moneyline to decimal.
print "-500 to decimal:\n".$odd->set('moneyline', '-500')->get('decimal')."\n".PHP_EOL;
print "125 to decimal:\n".$odd->set('moneyline', '125')->get('decimal')."\n".PHP_EOL;

// Fractional to moneyline
print "11/20 to moneyline: ".$odd->set('fractional', '11/20')->get('moneyline')."\n".PHP_EOL;


//Convert decimal to hongkong
print "5 to hongkong:\n".$odd->set('decimal', 5)->get('hongkong')."\n".PHP_EOL;

print "1.55 to hongkong:\n".$odd->set('decimal', 1)->get('hongkong')."\n".PHP_EOL;

//Convert Hongkong to decimal
print "0.2 to decimal:\n".$odd->set('hongkong', 0.2)->get('decimal')."\n".PHP_EOL;


//Convert decimal to malay
print "5 to malay:\n".$odd->set('decimal', 2)->get('malay')."\n".PHP_EOL;

//Convert malay to decimal
print "0.2 to decimal:\n".$odd->set('malay', 1)->get('decimal')."\n".PHP_EOL;

//Convert decimal to indonesian
print "5 to indonesian:\n".$odd->set('decimal', 5)->get('indonesian')."\n".PHP_EOL;

//Convert indonesian to decimal
print "2 to decimal:\n".$odd->set('indonesian', 1)->get('decimal')."\n".PHP_EOL;


print "Calculate implied probability:\n".$odd->set('decimal', 3)->get('implied')."%\n".PHP_EOL;

exit("Test completed!");

?>