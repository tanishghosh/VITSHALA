<?php
$count=0;
$con=mysqli_connect("localhost","root","","loginrecord");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT Username,Password FROM login ORDER BY Username";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    if($_POST["Username"]==$row[0] and $_POST["Password"]==$row[1])
      {
         echo "Login successful";
         echo "<br>";
         echo "Redirecting to login page";
         header("Location: http://localhost:1234/home.html");
         exit();
         $count=1;
      }

    }

    if($count==0)
    {
      echo "Login unsuccessful";
      header("Location:http://localhost:1234/invalid_credentials.html");
    }


  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>


<!DOCTYPE HTML>
      <html>
      <head>
      </head>
      <body>
         <br>
         <a href="http://localhost:1234/login.html">Go back to login page</a>
      </body>
      </html>