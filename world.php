<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


function getData($conn){

  $country=filter_var($_GET['country'], FILTER_SANITIZE_STRING);
  $city=filter_var($_GET['context'], FILTER_SANITIZE_STRING);

  if($city==="cities"){

    $stmt= $conn->query("SELECT cities.name, cities.district,cities.population 
                          FROM cities JOIN countries ON cities.country_code = countries.code 
                          WHERE countries.name LIKE '%$country%'");
                          
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $tHeading="";
      $tHeading.="<tr style='background-colour:#ffffff;'>";
      $tHeading.="<th style='padding:10px; width:150px; border: 1px solid #dddddd;'><h3>Name</h3></th>";
      $tHeading.="<th style='padding:10px; width:150px; border: 1px solid #dddddd;'><h3>District</h3></th>";
      $tHeading.="<th style='padding:10px; width:150px; border: 1px solid #dddddd;'><h3>Population</h3></th>";
      $tHeading.="</tr>";
 
      foreach ($results as $row){
        $tElements="";
        $tElements.="<tbody>";
        $tElements.="<tr style='background-color:#5680E9;'>";
        $tElements.="<td style='padding:10px; width:150px;text-align:center; border: 1px solid #dddddd;'>".$row['name']."</td>";
        $tElements.="<td style='padding:10px;width:150px; text-align:center; border: 1px solid #dddddd;'>".$row['district']. "</td>";
        $tElements.="<td style='padding:10px; width:150px; text-align:center; border: 1px solid #dddddd;'>". $row['population']."</td>";
        $tElements.="</tr>";
        $tElements.=" </tbody>";
       
      }


      echo "<table style='border: 1px solid #dddddd;'>";
      echo $tHeading. " ". $tElements;
      echo "</table>";

    }
    
  else{
        $stmt = $conn->query("SELECT name, continent, independence_year, head_of_state FROM countries WHERE name LIKE '%$country%'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tHeading="";
        $tHeading.="<tr>";
        $tHeading.="<th style='padding:10px; width:150px; border: 1px solid #dddddd;'><h3>Country Name</h3></th>";
        $tHeading.="<th style='padding:10px; width:150px; border: 1px solid #dddddd;'><h3> Continent</h3></th>";
        $tHeading.="<th style='padding:10px; width:150px; border: 1px solid #dddddd;'><h3>Independence Year</h3></th>";
        $tHeading.="<th style='padding:10px; width:150px; border: 1px solid #dddddd;'><h3>Head of State </h3></th>";
        $tHeading.="</tr>";
  
        foreach ($results as $row){
          $tElements="";
          $tElements.="<tbody>";
          $tElements.="<tr style='background-color:#5680E9;'>";
          $tElements.="<td style='padding:10px; width:150px; text-align:center; border: 1px solid #dddddd;'>".$row['name']."</td>";
          $tElements.="<td style='padding:10px; width:150px; text-align:center; border: 1px solid #dddddd;'>".$row['continent']. "</td>";
          $tElements.="<td style='padding:10px; width:150px; text-align:center; border: 1px solid #dddddd;'>". $row['independence_year']."</td>";
          $tElements.= "<td style='padding:10px; width:150px; text-align:center; border: 1px solid #dddddd;'>". $row['head_of_state']."</td>";
          $tElements.="</tr>";
          $tElements.=" </tbody>";
        
        }

          echo "<table style='border: 1px solid #dddddd;'>";
          echo $tHeading. " ". $tElements;
          echo "</table>";
          } 

   }

getData($conn);

?>