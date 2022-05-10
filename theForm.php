

<!DOCTYPE html>

<html>

<body>
  <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
  </style>

<?php
$conn=mysqli_connect('localhost','root','','test') or die("Error in connection". mysqli_connect_error());
 

  $url = "https://api.coingecko.com/api/v3/coins";
  $ch_session = curl_init();
  curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch_session, CURLOPT_URL, $url);
  $result_url = curl_exec($ch_session);
  $testt = json_decode($result_url);
  // print_r($testt);

foreach ($testt as $value) {
   echo $value->id .'<br/>'.$value->name;
 $coin_id = $value->id;
 $name = $value->name;
  $q="insert into testt(coin_id,name) values('$coin_id','$name') ";

mysqli_query($conn,$q) or die("Error in query" .mysqli_error($conn));


$count=mysqli_affected_rows($conn);
if($count==1)
{
    print "success";
  }
  else
  {
    print "failure";
  }
}

mysqli_close($conn);
  


?>


</body>

</html>