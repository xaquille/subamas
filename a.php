<html>
<head>
  
<meta charset="utf-8">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <link rel="stylesheet" href="styles.css"> -->
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
<form method="POST" action="">
     <select type="text" name="selectTemplate" id="loadTemplate" onchange="loadTemplate(this.value)">
           <option value="" selected="selected">Select Domain</option>
                    <?php
                         foreach(glob("*.json") as $filename){
                         $filename = basename($filename);
                         $fileshow = basename($filename, ".json");
                         echo "<option value='" . $filename . "'>".$fileshow."</option>";
                      }
                    ?>
      </select>
      <input type="submit" name="submit" />
</form>
<?php
// Read the JSON file 
$url = basename($_POST["selectTemplate"],".json");
$json = file_get_contents($_POST["selectTemplate"]);


  
// Decode the JSON file
$json_data = json_decode($json,true);


  
// Display data
  //create table
  $array = $json_data;
  echo "<table class=\"center table table-hover\">";
  echo "<tr class=\"table-primary\"><th>List Domain</th><th>Domain</th><th>Addresses</th><th>Tag</th><th>sources</th><th>Exploit</th><th>Nmap Result</th><th>Run Scanner</th></tr>";
  foreach ($array as $rows => $row) 
  {
    
    foreach ($row["addresses"] as $col => $ipaddress ) 
	  {
      $ipaddress= $ipaddress["ip"];
      // var_dump($ipaddress);
	  }	
    foreach ($row["sources"] as $source => $sources ) 
    //ambil exploit dari data json di folder nmap
    $exploit = "nmap/".$row["name"].".json";
    $exploit = file_get_contents($exploit);
    // $exploit = json_decode($exploit);
    // foreach ($exploit as $exploit)
      // echo($exploit);

    // $shellcode = "nmap/".$row["name"].".json<br>";

    //data table
	  echo "<tr>";
    echo "<td><a href=\"https://".$row["name"]."\" target=\"_blank\" rel=\"noopener noreferrer\">".$row["name"]."</a></td>";
      echo "<td>".$row["domain"]."</td>";
      echo "<td>".$ipaddress."</td>";
      echo "<td>".$row["tag"]."</td>";
      echo "<td>".$sources."</td>";
      echo "<td>".$exploit."</td>";
      echo "<td><a href=\"nmap/".$row["name"].".html\" target=\"_blank\" rel=\"noopener noreferrer\">Result</a></td>";
      $url =$row["name"];
      $domain=$row["domain"];
      // var_dump($row["address"]);
    echo "<td><form name=\"nmap\" action=\"c.php\" method=\"POST\"><input type=\"hidden\" name=\"domain\" value=\"".$domain."\"><button type=\"submit\" name=\"sendNmap\" class=\"btn btn-outline-primary btn-sm\" value=\"".$url."\">Run Nmap</button></form></td>";
    echo "</tr>";
  }	
  echo "</table>";
?>
</body>
<script>
    $(document).ready(function () {

        $("#formABC").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();

            //disable the submit button
            $("#btnSubmit").attr("disabled", true);

            //disable a normal button
            $("#btnTest").attr("disabled", true);

            return true;

        });
    });
</script>
</html>

