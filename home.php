<?php
	include "header.php";
?>

<div class="container">
	<h2><b>Prakiraan Cuaca hari Ini</b></h2>
   <style> 
select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
</style>
  </div> 

<body>
<form action="" method="POST">
<input type="text" name="kota">
<input type="submit" class="button" name="submit" value="cari">
</form>

<?php
error_reporting(0);
$id = $_POST['kota'];
if(isset($id)){
	$json_string = file_get_contents("http://api.wunderground.com/api/0e4b71198dc78edf/geolookup/conditions/q/IA/$id.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'response'}->{'version'};
  $weather = $parsed_json->{'location'}->{'city'};
  $local = $parsed_json->{'current_observation'}->{'observation_time'};
  $dewpoint_string = $parsed_json->{'current_observation'}->{'dewpoint_string'};
   $arah = $parsed_json->{'current_observation'}->{'wind_string'};
  
  echo "Kelurahan : ${weather}\n";
  echo "<br>";
  echo "Waktu Pengamatan ${city} : ${local}\n";
  echo "<br>";
  echo "Suhu Udara di ${city} : ${dewpoint_string}\n";
  echo "<br>";
  echo "Arah angin di ${city} : ${arah}\n";
}
  
 
?>
</body>
