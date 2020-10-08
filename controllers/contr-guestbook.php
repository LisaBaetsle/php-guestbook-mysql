<?php

declare(strict_types=1);

// Connecting to the database
$pdo = openConnection();

// Create an instance
$guestbook = new Guestbook($pdo);

// Variables
$titleErr = $dateErr = $contentErr = $nameErr = "";
$title = $date = $content = $name = "";
$isFormValid;

if (isset($_POST['delete'])) {
  $id = $_POST['delete'];
  $guestbook->deletePost($id);
} else if (isset($_POST['update'])) {
  $id = $_POST['update'];
  echo $id;
  foreach ($guestbook->getSpecificPost($id) as $specificPost) {
    $title = $specificPost['title'];
    $date = $specificPost['date'];
    $content = $specificPost['content'];
    $name = $specificPost['name'];
    $id = $specificPost['id'];
  }
  if (!empty($_POST['updateAgain'])) {
    echo 'the id is: ' . $id;
    $guestbook->updatePost($id, $title, $date, $_POST["content"], $name);
  }
}

// Validate and check requirements form
else if (!empty($_POST)) {

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
    $guestbook->addAPostToGuestbook($title, $date, $content, $name);
  };
};


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};

var_dump($_POST);
