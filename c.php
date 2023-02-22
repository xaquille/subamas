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
$target =$_POST["sendNmap"];
$domain =$_POST["domain"];
$output = shell_exec('python nmap/exnmap.py -u  '.$target." > /dev/null 2>&1 &");
echo "<pre>url dikirimkan adalah :$target </pre>";
echo "saat ini sedang proses scanning, biasanya membutuhkan waktu paling lama 24 jam.</br>";

echo "<form action=\"http://172.20.10.2/a.php\" method=\"POST\">
  <input type=\"hidden\" name=\"selectTemplate\" value=\"".$domain.".json\" />
  <input type=\"hidden\" name=\"submit\" value=\"Submit\" />
  <input type=\"submit\" class=\"btn btn-outline-primary btn-sm\" value=\"Submit request\" />
</form>";

?>
</body>
</html>