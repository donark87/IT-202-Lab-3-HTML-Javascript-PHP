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

<input type="submit" onclick="PrintDatabase.jsp" name="submitForm" value="Print entire database" class="submit">
<br>
</form >

</body>
</html>

<?php

$servername = "sql2.njit.edu";    //sql2.njit.edu:3306 AFS
$database = "dp663";
$username = "dp663";
$password = "rlxqcbSd";

// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}




?>

<?php
 

$PatientID = $_POST['PatientID'];

$sql = "SELECT Patient.Patient_ID, Patient.Patient_First_Name, Patient.Patient_Last_Name, Patient.Patient_Email, Doctor.Doctor_First_Name, Doctor.Doctor_Last_Name, Appointment.Appointment_Date, Appointment.Appointment_Time, Service.Service_Name FROM Patient JOIN Doctor on Patient.Doctor_ID = Doctor.Doctor_ID JOIN Appointment on Patient.Appointment_ID = Appointment.Appointment_ID JOIN Service on Patient.Service_ID = Service.Service_ID WHERE Patient.Patient_ID = $PatientID";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0)
{
    echo "Patient not found, Please, enter correct patient ID number";
}
else {
echo"<Table border='1' class='Table'>";
echo"<tr><td>Patient_ID</td><td>Patient_First_name</td><td>Patient_Last_Name</td><td>Patient_Email</td><td>Doctor_First_name</td><td>Doctor_Last_name</td><td>Appointment_Date</td><td>Appointment_Time</td><td>Service</td></tr>";

while($row = mysqli_fetch_array($result)){
        echo "<tr><td>{$row["Patient_ID"]}</td><td>{$row["Patient_First_Name"]}</td><td>{$row["Patient_Last_Name"]}</td><td>{$row["Patient_Email"]}</td><td>{$row["Doctor_First_Name"]}</td><td>{$row["Doctor_Last_Name"]}</td><td>{$row["Appointment_Date"]}</td><td>{$row["Appointment_Time"]}</td><td>{$row["Service_Name"]}</td></tr>";
             
    } 
    
echo"</table>";

}
?>