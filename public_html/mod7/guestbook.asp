<% @Language=VBScript %>
<html dir=ltr>
<head>
<TITLE>Guest Book</TITLE>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<% 
IF request.form ("Message")="True" THEN

'Connects to the Access driver and Access database in the pbao
'directory where the database is saved
'Creates an instance of an Active Server component
set objConn = server.createobject("ADODB.Connection")
'Opens the connection to the data store
mdbfile=Server.MapPath("db/U37516832.mdb")
objConn.Open "Driver={Microsoft Access Driver (*.mdb)}; DBQ=" & mdbfile & ";"
'Instantiate Command object and use ActiveConnection property to
'attach connection to Command object
set cm = Server.CreateObject("ADODB.Command")
cm.ActiveConnection = objConn
'Define SQL query
cm.commandText ="INSERT INTO Table1 (first,last,email,phone,gender,address,profession,age,interests,MB1Memo) VALUES ('" & request.form("First") & "','" & request.form("Last") & "','" & request.form("EMailAdd") & "','" & request.form("Phone") & "','" & request.form("Gender") & "','" & request.form("Address") & "','" & request.form("Profession") & "','" & request.form("Age") & "','" & request.form("Interests") & "', 'True')" 
cm.execute
response.write("Thank you!")  
ELSE%>
<h1>Guestbook</h1>

<!--Post information to Guestbook form -->
<form name=guestbook.asp  action="guestbook.asp"  method="POST">
<p>First Name</p>
<p><input type="Text" name="First"></p>
<p>Last Name</p>
<p><input type="Text" name="Last"></p>
<p>Email Address</p>
<p><input type="Text" name="EmailAdd"></p>
<p>Phone Number</p>
<p><input type="Text" name="Phone"></p>
<p>Gender</p>
<p><input type="Text" name="Gender"></p>
<p>Address</p>
<p><input type="Text" name="Address"></p>
<p>Profession</p>
<p><input type="Text" name="Profession"></p>
<p>Age</p>
<p><input type="Text" name="Age"></p>
<p>Interests</p>
<p><input type="Text" name="Interests"></p>
<p><textarea name="Memo" rows=6 cols=70></textarea></p> 
<input  type="HIDDEN" name="Message" value="True">
<input type="submit" value="Submit information">
</form>
<%End if%>
</body>
</html>
