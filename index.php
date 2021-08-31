<?php
if (isset($_POST["download"])) {
  $imgUrl = $_POST['imgUrl'];
  $ch = curl_init($imgUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $download = curl_exec($ch);
  curl_close($ch);

  header('Content-type: image/jpg');
  header('Content-Disposition: attachment; filename="thumbnail.jpg"');
  echo $download;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Youtube Tumbnail Downloader</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

  <header> Download YouTube Thumbnail </header>

      <div class="url-input">
        <span class="title">Paste Video URL</span>
        <div class="field">
          <input type="text" placeholder="https://www.youtube.com/watch?v=" required>
          <input class="hidden-input" type="hidden" name="imgUrl">
        </div>
      </div>

      <div class="preview-area">
        <img class="thumbnail" src="" alt="thumbnail">
        <i class="fas fa-cloud-download-alt icon"></i>
        <span>Paste video url to see the preview</span>
      </div>

      <button class="d_btn" type="submit" name="download">Download</button>
  </form> 
  
  <script src="app.js"></script>
</body>
</html>