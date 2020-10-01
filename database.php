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

// Connecting to the database
$pdo = openConnection();

// For inserting the posts
$stmt = $pdo->prepare("INSERT INTO posts (title, date, content, name) VALUES (:title, :date, :content, :name)");
$stmt->bindParam(':title', $title); // Binding the values
$stmt->bindParam(':date', $date); // Binding the values
$stmt->bindParam(':content', $content); // Binding the values
$stmt->bindParam(':name', $name); // Binding the values

// For viewing the posts
$handle = $pdo->prepare('SELECT * FROM posts WHERE id < :id');
$handle->bindValue(':id', 20); // Binding the values
$handle->execute();
$rows = $handle->fetchAll();
$reversedRows = array_reverse($rows);
