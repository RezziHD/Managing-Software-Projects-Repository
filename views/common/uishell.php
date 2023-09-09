<!DOCTYPE html>
<html>
<head>
  <title> My Web Page </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <header>
    <?php include("header.php");  ?>
  </header>

  <nav>
    <?php include("navbar.php"); ?>
  </nav>

  <main>
    <!-- This is where the specific view's content will be injected -->
    <?php echo $content; ?>
  <footer>
    <?php include("footer.php"); ?>
  </footer>
</body>
</html>