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
cm.commandText ="INSERT INTO Table1 (first,last,phone,gender,address,profession,age,email,interests,MB1Memo) VALUES ('" & request.form("To") & "','" & request.form("EMailAdd") & "','" & request.form("CC") & "','" & request.form("Subject") & "', 'True')" 
cm.execute
response.write("Thank you!")  
ELSE%>
<h1>Guestbook</h1>

<!--Post information to Guestbook form -->
<form name=guestbook.asp  action="guestbook.asp"  method="POST">
<p>To</p>
<p><input type="Text" name="To"></p>
<p>Email Address</p>
<p><input type="Text" name="EmailAdd"></p>
<p> CC</p>
<p><input type="Text" name="CC"></p>
<p>Subject</p>
<p><input type="Text" name="Subject"></p>
<p>Message</p>
<p><textarea name="Memo" rows=6 cols=70></textarea></p> 
<input  type="HIDDEN" name="Message" value="True">
<input type="submit" value="Submit information">
</form>
<%End if%>
</body>
</html>
