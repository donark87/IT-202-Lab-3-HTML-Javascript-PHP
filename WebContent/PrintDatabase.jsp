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
<form>
	<input type="Button" onclick="history.back()" value="Back">
</form>
<Table align="center" cellpadding="3" cellspacing="3" border="1">
	<caption><Strong>Patient Table</Strong></caption>
	<tr>
		<td>Patient_ID</td>
		<td>Patient_First_Name</td>
		<td>Patient_Last_Name</td>
		<td>Patron_Email</td>
		<td>Doctor_ID</td>
		<td>Appointment_ID</td>
		<td>Service_ID</td>
	</tr>

<%

	Statement sm1 = null;
	sm1 = con.createStatement();
	String query1;
	query1 = "SELECT * FROM Patron";	
	resultSet = sm1.executeQuery(query1);
	while (resultSet.next()) {
%>

	<tr>
		<td><%=resultSet.getString("Patron_ID")%></td>
		<td><%=resultSet.getString("Patron_First_Name")%></td>
		<td><%=resultSet.getString("Patron_Last_Name")%></td>
		<td><%=resultSet.getString("Patron_Email")%></td>
		<td><%=resultSet.getString("Doctor_ID")%></td>
		<td><%=resultSet.getString("Appointment_ID")%></td>
		<td><%=resultSet.getString("Service_ID")%></td>
				
	</tr>
<%
	}
%>
<Table align="center" cellpadding="3" cellspacing="3" border="1">
	<caption><Strong>Doctor Table</Strong></caption>
	<tr>
		<td>Doctor_ID</td>
		<td>Doctor_First_Name</td>
		<td>Doctor_Last_Name</td>
		
	</tr>

<%

	Statement sm2 = null;
	sm2 = con.createStatement();
	String query2;
	query2 = "SELECT * FROM Doctor";	
	resultSet = sm2.executeQuery(query2);
	while (resultSet.next()) {
%>

	<tr>
		<td><%=resultSet.getString("Doctor_ID")%></td>
		<td><%=resultSet.getString("Doctor_First_Name")%></td>
		<td><%=resultSet.getString("Doctor_Last_Name")%></td>
	
				
	</tr>
<%
	}
%>
<Table align="center" cellpadding="3" cellspacing="3" border="1">
	<caption><Strong>Appointment Table</Strong></caption>
	<tr>
		<td>Appointment_ID</td>
		<td>Appointment_Date</td>
		<td>Appointment_Time</td>
		
	</tr>

<%

	Statement sm3 = null;
	sm3 = con.createStatement();
	String query3;
	query3 = "SELECT * FROM Appointment";	
	resultSet = sm3.executeQuery(query3);
	while (resultSet.next()) {
%>

	<tr>
		<td><%=resultSet.getString("Appointment_ID")%></td>
		<td><%=resultSet.getString("Appointment_Date")%></td>
		<td><%=resultSet.getString("Appointment_Time")%></td>
	
				
	</tr>
<%
	}
%>
<Table align="center" cellpadding="3" cellspacing="3" border="1">
	<caption><Strong>Service Table</Strong></caption>
	<tr>
		<td>Service_ID</td>
		<td>Service_Name</td>
		
	</tr>

<%

	Statement sm4 = null;
	sm4 = con.createStatement();
	String query4;
	query4 = "SELECT * FROM Service";	
	resultSet = sm4.executeQuery(query4);
	while (resultSet.next()) {
%>

	<tr>
		<td><%=resultSet.getString("Service_ID")%></td>
		<td><%=resultSet.getString("Service_Name")%></td>
						
	</tr>
	
<%
	}
	
%>

	
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">

</head>
<body>
<form action="Assignment3.2.html" onclick="history.back()" >

</form>
</body>
</html>