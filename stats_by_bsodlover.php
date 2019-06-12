 <?php
 /*
PHP COUNT WEBSITES VISITS Script,
Made by @bsodlover, https://bsodlover.dynu.net
Please, run the setup.sql and enter the database information below.
 */
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql  = "SELECT MAX(id) FROM ip";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Visitantes únicos:" . $row["MAX(id)"]. " -  " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}



//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
$sql = "SELECT * FROM ip WHERE ip = '$ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {

$ipaddress = $_SERVER['REMOTE_ADDR'];
$ipaddress = ip2long($ipaddress);
//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
$sql = "INSERT INTO ip(ip, date) VALUES('$ip', CURRENT_DATE())";
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
// BIGip

$sql = "INSERT INTO bigip (date)
VALUES (now())";

if ($conn->query($sql) !== TRUE)  {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT MAX(bigip) FROM bigip";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Visitantes totales:" . $row["MAX(bigip)"]. " -  " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
