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
     
    $stmt = $conn->prepare('SELECT DISTINCT departments.dept_no, departments.dept_name,
											dept_manager.emp_no, salaries.salary
											employees,first_name, employees.last_name
							FROM departments, dept_manager, salaries, employees
							WHERE departments.dept_no = dept_manager.dept_no
							AND employees.emp_no = dept_manager.emp_no
							AND dept_manager.emp_no = salaries.emp_no
							AND dept_manager.to_date = \'9999-01-01\'
							ORDER BY salary DESC
							LIMIT 1;');
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