<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@ page import="java.sql.*" %>
<%@page import="java.sql.ResultSet"%>

<%
    
    Connection con = null;
    String url = "jdbc:mysql://sql2.njit.edu:3306/dp663?serverTimezone=UTC";
    String username = "dp663";
    String password = "rlxqcbSd";
    ResultSet resultSet = null;
    
    
    
    try{
        Class.forName("com.mysql.jdbc.Driver");
        con = DriverManager.getConnection(url,username,password);
    }
    catch(Exception e){
        out.println(e.toString());
    }
    
%>
<Table align="center" cellpadding="5" cellspacing="5" border="1">

	<tr>
		<td>Patient_ID</td>
		<td>Patient_First_Name</td>
		<td>Patient_Last_Name</td>
		<td>Patient_Email</td>
		<td>Doctor_First_Name</td>
		<td>Doctor_Last_Name</td>
		<td>Appointment_Date</td>
		<td>Appointment_Time</td>
		<td>Service_Name</td>
	</tr>


<%

	String PatID = request.getParameter("PatientID");
	
	Statement sm1 = null;
	sm1 = con.createStatement();
	
	String query1;
	query1 = "SELECT Patron.Patron_ID, Patron.Patron_First_Name, Patron.Patron_Last_Name, Patron.Patron_Email, Doctor.Doctor_First_Name, Doctor.Doctor_Last_Name, Appointment.Appointment_Date, Appointment.Appointment_Time, Service.Service_Name FROM Patron JOIN Doctor on Patron.Doctor_ID = Doctor.Doctor_ID JOIN Appointment on Patron.Appointment_ID = Appointment.Appointment_ID JOIN Service on Patron.Service_ID = Service.Service_ID WHERE Patron.Patron_ID = " + PatID ;	
	resultSet = sm1.executeQuery(query1);
	while (resultSet.next()) {
%>

	<tr>
		<td><%=resultSet.getString("Patron_ID")%></td>
		<td><%=resultSet.getString("Patron_First_Name")%></td>
		<td><%=resultSet.getString("Patron_Last_Name")%></td>
		<td><%=resultSet.getString("Patron_Email")%></td>
		<td><%=resultSet.getString("Doctor_First_Name")%></td>
		<td><%=resultSet.getString("Doctor_Last_Name")%></td>
		<td><%=resultSet.getString("Appointment_Date")%></td>
		<td><%=resultSet.getString("Appointment_Time")%></td>
		<td><%=resultSet.getString("Service_Name")%></td>
				
	</tr>
<%
	}
%>	
<!-- Turn on VPN -->

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<script type="text/javascript" src="DonarkPatelAssignment3.js"></script>
</head>
<body>
 <h3>Enter patient's ID number to search the record</h3>
<form action="DonarkPatelAssignment3.jsp" onsubmit="return validate()" method="POST">
<label>Patient ID: <input type="text" name="PatientID" id="PatientID"></label>
<input type="submit" onclick="return validate()" name="submitForm" value="Continue" class="submit">
<br>
<br>
<br>

        

</form>
</body>
</html>
<!-- Turn on VPN -->