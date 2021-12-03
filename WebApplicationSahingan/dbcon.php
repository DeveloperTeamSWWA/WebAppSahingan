<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('swwadatabase-firebase-adminsdk-etfa4-48b12034de.json')
->withDatabaseUri('https://swwadatabase-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
?>