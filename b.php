<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active fw-bold" href="a.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active fw-bold" href="b.php">Enumeration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active fw-bold" href="c.php">Sampah Testing</a>
      </li>
    </ul>
  </div>
</nav>

<?php
$output = shell_exec('ping bukalapak.com -c 3');
echo "<pre>$output</pre>";
?>


</body>
</html>