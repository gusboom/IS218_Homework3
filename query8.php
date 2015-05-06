<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Query #1 Results</title>
</head>

<body>

<?php
#mysql_connect('localhost:8080', 'root', 'sql52321') or die('Could not connect: ' . mysql_error());
$id = 5;
#$username = 'root';
#$password = 'sql52321';
 $hostname_localhost ="localhost";  
    $database_localhost ="employees";  
    $username_localhost ="root";  
    $password_localhost ="sql52321";  
    #$user = $_GET['user'];  
    #$pass = $_GET['pass'];


try {
    $conn = new PDO("mysql:host=$hostname_localhost;port=1234;dbname=$database_localhost",$username_localhost,$password_localhost);
	echo "Connected to Database: $database_localhost <br>";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     
    $stmt = $conn->prepare('SELECT dept_no, count(first_name) as countemp 
							FROM employees
							INNER JOIN dept_emp 
							ON employees.emp_no = dept_emp.emp_no
							GROUP BY dept_no
							ORDER BY countemp DESC;');
    $stmt->execute(array('id' => $id));
 
    while($row = $stmt->fetch()) {
        print_r($row) . "<br>";
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
<p><FORM METHOD="LINK" ACTION="http://localhost:8080/homework3.html">
        <INPUT TYPE="submit" VALUE="Go Back">
          </FORM></p>
</body>
</html>