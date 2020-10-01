<?php

declare(strict_types=1);

// Requires
require 'database.php';

// Variables
$titleErr = $dateErr = $contentErr = $nameErr = "";
$title = $date = $content = $name = "";
$isFormValid;

// $guestbook = new Guestbook;

// Validate and check requirements form
if (!empty($_POST)) {

  //title
  if (empty($_POST["title"])) {
    $titleErr = "Title is required";
    $isFormValid = false;
  } else {
    $title = test_input($_POST["title"]);
    $isFormValid = true;
  }

  //date
  if (empty($_POST["date"])) {
    $dateErr = "Date is required";
    $isFormValid = false;
  } else {
    $date = test_input($_POST["date"]);
    $isFormValid = true;
  }

  //content
  if (empty($_POST["content"])) {
    $contentErr = "Message is required";
    $isFormValid = false;
  } else {
    $content = test_input($_POST["content"]);
    $isFormValid = true;
  }

  //name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $isFormValid = false;
  } else {
    $name = test_input($_POST["name"]);
    $isFormValid = true;
  }

  // The form is valid
  if ($isFormValid == true) {
    $stmt->execute();
  };
};


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};


require 'view.php';
