<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'Info2180-lab7';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET['country'];
$context = $_GET['context'];

if(isset($context) && ($context==="cities")){
    
    $stmt = $conn->query("SELECT c.name as city, c.district as district, c.country_code, cs.name as
country, c.population as population FROM cities c join countries cs on
c.country_code = cs.code WHERE cs.name = '$country'");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table>";	
echo '<tr>';
echo '<th> Name</th>
      <th> District</th>
      <th> Population</th>';
echo '</tr>';
foreach ($result as $row) {
  echo '<tr>';
  echo '<td>' . $row['city']. '</td>';
  echo '<td>' . $row['district']. '</td>';
  echo '<td>' . $row['population']. '</td>';
  echo '</tr>';
}
  echo '</table>';
  
}

else{


$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
       echo '<tr>';
          echo  '<th> Name of Country</th>
            <th>Continent</th>
            <th>Independence</th>
            <th>Head Of State</th>';
      echo  '</tr>';
        
        foreach ($results as $row){
            echo '<tr>';
                echo '<td>' .$row['name']. '</td>';
                echo '<td>'.$row['continent']. '</td>';
                echo '<td>' .$row['independence_year']. '</td>';
                echo '<td>' .$row['head_of_state']. '</td>';
            echo'</tr>';}
        
 echo   '</table>';}
?>