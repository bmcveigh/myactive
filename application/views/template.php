<!DOCTYPE html>
<html>
<head>
  <title><?php print $title; ?></title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'themes/bootstrap/css/bootstrap.min.css' ?>" />
</head>
<body>
  <div class="container">
    <?php print $content; ?>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?php echo base_url() . 'themes/bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>
</html>
