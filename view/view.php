<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>PHP guestbook</title>
</head>

<body>
  <header>
    <h1>WELCOME TO OUR GUESTBOOK</h1>
  </header>
  <div class="grid-container">
    <div class="container-form grid-item">
      <h2>Write something in our guestbook</h2>
      <form method="post">
        <label for="title">Title: </label>
        <input type="text" name="title" value="<?= $title ?>">
        <span class="error">* <?= $titleErr; ?> </span>
        <br><br>
        <label for="date">Date: </label>
        <input type="date" name="date" value="<?= $date ?>">
        <span class="error">* <?php echo $dateErr; ?> </span>
        <br><br>
        <label for="content">Content: </label>
        <textarea name="content" rows="5" cols="40"><?= $content ?></textarea>
        <span class="error">* <?php echo $contentErr; ?> </span>
        <br><br>
        <label for="name">Name: </label>
        <input type="text" name="name" value="<?= $name ?>">
        <span class="error">* <?php echo $nameErr; ?> </span>
        <br><br>
        <input class="big-button" type="submit" name="submit" value="Submit" style="visibility:<?= $submitButtonVisible ?>;">
        <button class="big-button" type="submit" name="updateAgain" value="<?= $id ?>" style="visibility:<?= $updateButtonVisible ?>;">Update</button>

      </form>
    </div>

    <div class="container-posts grid-item">
      <h2>Previous posts</h2>
      <?php foreach ($guestbook->getLastTwentyPosts() as $row) {
        echo '<div class="previous-post">' ?>

        <p class="title"> <?= $row['title'] ?></p>
        <p class="date"> <?= $row['date'] ?></p>
        <p class="content"> <?= $row['content'] ?></p>
        <p class="name"> written by <?= $row['name'] ?></p>
        <form method="post">
          <button class="small-button" type="submit" name="delete" value="<?= $row['id'] ?>">Delete</button>
          <button class="small-button" type="submit" name="update" value="<?= $row['id'] ?>">Update</button>
        </form>

      <?php echo '</div>';
      } ?>

    </div>
  </div>

</body>

</html>