<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('dbconnection.php');

if ( mysqli_num_rows(mysqli_query($conn, "SHOW TABLES LIKE 'users'")) == 1 ) {
    exit;
}

$sql_users_table = "CREATE TABLE users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(255) NOT NULL,
	mobile VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	ref VARCHAR(255) NOT NULL,
	did VARCHAR(255) NOT NULL,
	token VARCHAR(255) NOT NULL,
	balance INTEGER DEFAULT 0,
	i_click INTEGER DEFAULT 0,
	d_bonus INTEGER DEFAULT 0,
	t_ref INTEGER DEFAULT 0,
	pending INTEGER DEFAULT 0,
	today_task INTEGER DEFAULT 0,
	task_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	today_task1 INTEGER DEFAULT 0,
	task_time1 TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	today_task2 INTEGER DEFAULT 0,
	task_time2 TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	today_task3 INTEGER DEFAULT 0,
	task_time3 TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	today_task4 INTEGER DEFAULT 0,
	task_time4 TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_users_table) === TRUE) {
	echo "✔️ USERS TABLE CREATED SUCCESSFULLY <br/>";
} else {
	die( "❌ Error: " . $conn->error . "<br/>" );
}
  
$sql_payments_table = "CREATE TABLE payments (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	mnumber VARCHAR(255) NOT NULL,
	number VARCHAR(255) NOT NULL,
	amount INTEGER DEFAULT 0,
	method VARCHAR(255) NOT NULL,
	status VARCHAR(255) NOT NULL DEFAULT 'Pending',
	date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_payments_table) === TRUE) {
	echo "✔️ PAYMENTS TABLE CREATED SUCCESSFULLY <br/>";
} else {
    echo "❌ Error: " . $conn->error . "<br/>";
}

$sql_admins_table = "CREATE TABLE admins (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_admins_table) === TRUE) {
	echo "✔️ ADMIN TABLE CREATED SUCCESSFULLY <br/>";
	
	$sql_admin1 =  "INSERT INTO admins (username, password)
VALUES ('infinity', '".md5('edufast')."'),('infinity', '".md5('edufast@admin')."')";
    if ($conn->query($sql_admin1) === TRUE) {
	echo "✔️ ADMIN CREATED SUCCESSFULLY";
    } else {
    echo "❌ Error: " . $conn->error . "<br/>";
     }
} else {
    echo "❌ Error: " . $conn->error . "<br/>";
}

$sql_methods_table = "CREATE TABLE methods (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	amount INTEGER DEFAULT 0,
	type VARCHAR(255) NOT NULL,
	hint VARCHAR(255) NOT NULL
)";

if ($conn->query($sql_methods_table) === TRUE) {
	echo "✔️ METHODS TABLE CREATED SUCCESSFULLY <br/>";
	
      
} else {
    echo "❌ Error: " . $conn->error . "<br/>";
}
$sql_admin4 =  "INSERT INTO methods (name, amount, type, hint)
  	        VALUES ('Recharge', '1000', 'number', 'Enter Recharge Number'),('Bkash', '5000', 'number', 'Enter Bkash Number')";
  	        
if ($conn->query($sql_admin4) === TRUE) {
	echo "✔️ METHODS  CREATED SUCCESSFULLY <br/>";
	
      
} else {
    echo "❌ Error: " . $conn->error . "<br/>";
}
//$token = MD5('1234');
$token = sha1('1234');

$sql_admin =  "INSERT INTO users (fname, mobile, password, ref, did, token)
  	        VALUES ('Admin', '1234', '".md5('12345678@a')."', 'Rakibul', 'ff28ba36e8e11718', '$token')";
if ($conn->query($sql_admin) === TRUE) {
	echo "✔️ ADMIN CREATED SUCCESSFULLY";
} else {
    echo "❌ Error: " . $conn->error . "<br/>";
}