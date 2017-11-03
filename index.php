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
 	  $answers = $q->fetchAll();//fecth the results of execution
 	  $q->closeCursor();
 	  return $answers;	
    }
    catch (PDOException $e) 
    {
 	echo "Check for internal server error" . $e->getMessage();
    }	  
 }


 $query2 = "select * from accounts where id<6";
 $result2 = exeQuery($query2);

 echo "The number of records in Accounts are: ";
 print_r(count($result2));
 echo "<br><hr><br>";


 $conn = null;
 ?>

