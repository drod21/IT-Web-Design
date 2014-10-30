<% @Language=VBScript %>
<html dir=ltr>
<head>
<title>View Employee Records</title>
</head>

<script language="JavaScript" type="text/javascript">
//  Published at: scripts.tropicalpcsolutions.com
var reloaded = false;
var loc=""+document.location;
loc = loc.indexOf("?reloaded=")!=-1?loc.substring(loc.indexOf("?reloaded=")+10,loc.length):"";
loc = loc.indexOf("&")!=-1?loc.substring(0,loc.indexOf("&")):loc;
reloaded = loc!=""?(loc=="true"):reloaded;

function reloadOnceOnly() {
    if (!reloaded) 
        window.location.replace(window.location+"?reloaded=true");
}
</script>


<body bgcolor="#FFFFFF" text="#000000" reloadOnceOnly()>
<%
'This section makes it possible for visitors to sort the data in the columns in ascending order.
if request.form("sort")<> "" THEN
StrSort=request.form("sort")
ELSE
StrSort="TB2 ASC"
END IF

strQuery="SELECT * FROM Table1 ORDER BY " &StrSort
mdbfile=Server.MapPath("db\U37516832.mdb")
strProvider = "Driver=Microsoft Access Driver (*.mdb); DBQ=" & mdbfile & ";"
set objConn = server.createobject("ADODB.Connection")

IF Request("ID") <> "" THEN
strIDNum=Request("ID")


'Opens the connection to the data store
objConn.Open strProvider
set cm = Server.CreateObject("ADODB.Command")
cm.ActiveConnection = objConn

'Define SQL query
cm.CommandText = "DELETE FROM Table1 WHERE ID = " &strIDNum
cm.Execute
END IF

Set rst = Server.CreateObject("ADODB.recordset")
rst.Open strQuery, strProvider
%>

<h1>Employee</h1>
<form name=view_guest.asp action=view_guest.asp method=post>
<table border=1 cellspacing=3 cellpadding=3 rules=box>
<%
ON ERROR RESUME NEXT
IF rst.EOF THEN
Response.Write "There are no entries in the database."
ELSE%>

<tr>
<%
'Deletes rows from the database, this cannot be undone
Response.Write "<td width=200><center>Delete Record</center></td>"
FOR i = 1 to rst.Fields.Count -1
Response.Write "<td width=200><input name=sort value=" & rst(i).Name & " type=submit></td>"
NEXT
WHILE NOT rst.EOF %>

<tr>
<%
Response.Write "<td bgcolor=?ffffff?><a href=view_guest.asp?ID=" & rst(0) & ">Delete</a></td>"
FOR i = 1 to rst.fields.count - 1
Response.Write "<td bgcolor=?ffffff?>" & rst(i) &"</td>"
NEXT
rst.MoveNext
WEND
END IF
%>
</table>
</form>
</body>
</html>
