<?php

declare(strict_types=1);

class Guestbook
{
  protected $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function getLastTwentyPosts()
  {
    $handle = $this->pdo->prepare('SELECT * FROM posts ORDER BY id DESC LIMIT 20');
    $handle->execute();
    $rows = $handle->fetchAll();
    return $rows;
  }

  public function addAPostToGuestbook($title, $date, $content, $name)
  {
    $stmt = $this->pdo->prepare("INSERT INTO posts (title, date, content, name) VALUES (:title, :date, :content, :name)");
    $stmt->bindParam(':title', $title); // Binding the values
    $stmt->bindParam(':date', $date); // Binding the values
    $stmt->bindParam(':content', $content); // Binding the values
    $stmt->bindParam(':name', $name); // Binding the values
    $stmt->execute();
  }

  public function deletePost($id) {
    $dlt = $this->pdo->prepare('DELETE FROM posts WHERE ID = :id');
    $dlt->bindValue(':id', $id);
    $dlt->execute();
  }
}
