<?php

declare(strict_types=1);

class Post
{
  private $title;
  private $date;
  private $content;
  private $name;

  // constructor
  public function __construct($title, $date, $content, $name)
  {
    $this->title = $title;
    $this->date = $date;
    $this->content = $content;
    $this->name = $name;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function getName()
  {
    return $this->name;
  }
}
