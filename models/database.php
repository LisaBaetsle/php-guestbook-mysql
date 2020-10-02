<?php

declare(strict_types=1);

function openConnection(): PDO
{
  // Try to figure out what these should be for you
  $dbhost    = "localhost"; // probably "localhost"
  $dbuser    = "becode"; // probably "becode"
  $dbpass    = "becode"; // the password you chose
  $db        = "guestbook"; // You probably have to use a database manager to create a new database for this exercise

  $driverOptions = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ];

  // Try to understand what happens here
  $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);

  // Why we do this here
  return $pdo;
}
