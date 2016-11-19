
<?php

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$getcountry =$_GET['country'];
$all =$_GET['all'];
if($all =='true') 
{
	$stmt = $conn->query("SELECT * FROM countries");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else 
{
	$stmt =$conn->query("SELECT * FROM countries WHERE name LIKE '%$getcountry%'");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
echo '<ul>';
foreach ($results as $row) 
{
  echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] .$all.'</li>';
}
echo '</ul>';