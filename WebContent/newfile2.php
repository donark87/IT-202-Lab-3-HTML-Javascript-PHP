
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Patient's Database</title>
<script type="text/javascript" src="DonarkPatelAssignment3.js"></script>

</head>
<body>
<h3>Enter patient's ID number to search the record</h3>
<form action="newfile1.php" onsubmit="return validate()" method="POST">
<label>Patient ID:   <input type="text" name="PatientID" id="PatientID"></label>
    
<input type="submit" onclick="return validate()" name="submitForm" value="Continue" class="submit">
<br>
</form >
<br>
<br>
<form action="newfile2.php" method="POST">
    
<input type="submit" onclick="newfile2.php" value="Print entire database" class="submit">
<br>
</form >
    
</body>
</html>
<?php


$servername = "sql2.njit.edu";    
$database = "dp663";
$username = "dp663";
$password = "rlxqcbSd";

// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Patient";
$result = mysqli_query($conn, $sql);
echo "<br>Table: Patient <br>";
echo"<Table border='1' class='Table'>";

echo "<tr><td>Patient_ID</td><td>Patient_First_Name</td><td>Patient_Last_Name</td><td>Patient_Email</td><td>Doctor_ID</td><td>Appointment_ID</td><td>Service_ID</td></tr>";
while($row = mysqli_fetch_array($result)){
    echo "<tr><td>{$row["Patient_ID"]}</td><td>{$row["Patient_First_Name"]}</td><td>{$row["Patient_Last_Name"]}</td><td>{$row["Patient_Email"]}</td><td>{$row["Doctor_ID"]}</td><td>{$row["Appointment_ID"]}</td><td>{$row["Service_ID"]}</td></tr>";
    
}

echo"</table>";


$sql1 = "SELECT * FROM Doctor";
$result = mysqli_query($conn, $sql1);
echo "<br>Table: Doctor <br>";
echo"<Table border='1' class='Table'>";

echo "<tr><td>Doctor_ID</td><td>Doctor_First_Name</td><td>Doctor_Last_Name</td></tr>";
while($row = mysqli_fetch_array($result)){
    echo "<tr><td>{$row["Doctor_ID"]}</td><td>{$row["Doctor_First_Name"]}</td><td>{$row["Doctor_Last_Name"]}</td></tr>";
    
}

echo"</table>";

$sql2 = "SELECT * FROM Service";
$result = mysqli_query($conn, $sql2);
echo "<br>Table: Service <br>";
echo"<Table border='1' class='Table'>";

echo "<tr><td>Service_ID</td><td>Service_Name</td></tr>";
while($row = mysqli_fetch_array($result)){
    echo "<tr><td>{$row["Service_ID"]}</td><td>{$row["Service_Name"]}</td></tr>";
    
}

echo"</table>";

echo"</table>";

$sql3 = "SELECT * FROM Appointment";
$result = mysqli_query($conn, $sql3);
echo "<br>Table: Appointment <br>";
echo"<Table border='1' class='Table'>";

echo "<tr><td>Appointment_ID</td><td>Appointment_Date</td><td>Appointment_Time</td></tr>";
while($row = mysqli_fetch_array($result)){
    echo "<tr><td>{$row["Appointment_ID"]}</td><td>{$row["Appointment_Date"]}</td><td>{$row["Appointment_Time"]}</td></tr>";
    
}

echo"</table>";






















?>
