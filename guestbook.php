<?php

declare(strict_types=1);

class Guestbook
{
  protected $listOfPosts = [];

  public function __construct()
  {
    if (filesize('guestbook.txt')) {
      $this->listOfPosts = unserialize(file_get_contents("guestbook.txt"));
    }
  }

  //GETTER
  public function getListOfPosts()
  {
    return $this->listOfPosts;
  }

  public function addPost($title, $date, $content, $name)
  {
    $post = new Post($title, $date, $content, $name);

    array_push($this->listOfPosts, $post);
    file_put_contents("guestbook.txt", serialize($this->listOfPosts));
  }

  /* function printPost()
  {
    foreach ($this->listOfPosts as $post) {
      echo '<div><p class="title">' . $post->getTitle() . '</p><br>';
      echo '<p class="date">' . $post->getDate() . '</p><br>';
      echo '<p class="content">' . $post->getContent() . '</p><br>';
      echo '<p class="name">' . $post->getName() . '</p><br></div>';
      echo '<br>';
    }
  } */
}
