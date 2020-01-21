
<?php
$servername = "sql2.njit.edu:3306/dp663?serverTimezone=UTC";    //sql2.njit.edu:3306 AFS
$database = "dp663";
$username = "dp663";
$password = "rlxqcbSd";

// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

echo 'Connected successfully <br>';


?>

<?php



$sql = "SELECT Patron.Patron_ID, Patron.Patron_First_Name, Patron.Patron_Last_Name, Patron.Patron_Email, Doctor.Doctor_First_Name, Doctor.Doctor_Last_Name, Appointment.Appointment_Date, Appointment.Appointment_Time, Service.Service_Name FROM Patron JOIN Doctor on Patron.Doctor_ID = Doctor.Doctor_ID JOIN Appointment on Patron.Appointment_ID = Appointment.Appointment_ID JOIN Service on Patron.Service_ID = Service.Service_ID WHERE Patron.Patron_ID = 11813566";
$result = mysqli_query($conn, $sql);

echo"<Table border='1'>";
echo"<tr><td>Patient_ID</td><td>Patient_First_name</td><td>Patient_Last_Name</td><td>Patient_Email</td><td>Doctor_First_name</td><td>Doctor_Last_name</td><td>Appointment_Date</td><td>Appointment_Time</td><td>Service</td></tr>";

while($row = mysqli_fetch_array($result)){
        echo "<tr><td>{$row["Patron_ID"]}</td><td>{$row["Patron_First_Name"]}</td><td>{$row["Patron_Last_Name"]}</td><td>{$row["Patron_Email"]}</td><td>{$row["Doctor_First_Name"]}</td><td>{$row["Doctor_Last_Name"]}</td><td>{$row["Appointment_Date"]}</td><td>{$row["Appointment_Time"]}</td><td>{$row["Service_Name"]}</td></tr>";
             
    } 
    
echo"</table>";
//fix the table

?>