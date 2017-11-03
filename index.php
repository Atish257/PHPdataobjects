<?php
$servername = "sql2.njit.edu";
$username = "an478";
$password = "8QD1YLZg";

try {
    $conn = new PDO("mysql:host=$servername;dbname=an478", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "SQL Database connected successfully<br><hr><br>"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed. Try connecting once again !" . $e->getMessage();
    }


function exeQuery($query) 
{
 	global $conn;
    try 
    {
 	  $q = $conn->prepare($query);//prepare the query for execution
 	  $q->execute();//execute
 	  $answers = $q->fetchAll(PDO::FETCH_ASSOC);//fecth the results of execution
 	  $q->closeCursor();
 	  return $answers;	
    }
    catch (PDOException $e) 
    {
 	echo "Check for internal server error" . $e->getMessage();
    }	  
 }


 $query = "select * from accounts where id<6";
 $result = exeQuery($query);
 
 //print_r($result);

 echo "The number of records in Accounts are: ";
 print_r(count($result));
 echo "<br><hr><br>";

  if(count($result) > 0)
 {
 	echo "<table border=\"1\"><tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>birthday</th><th>Gender</th><th>Password</th></tr>";
 	foreach ($result as $row) 
 	{
 		echo "<tr>";
 		foreach ($row as $bow) 
 		{
 		 	echo "<td>".$bow."</td>";
 		}
 		echo "</tr>";
    }
 	
 }
 else
 {
     echo '0 results';
 }

 $conn = null; 
 ?>

