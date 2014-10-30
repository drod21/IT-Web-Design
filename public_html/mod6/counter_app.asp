<%@ LANGUAGE = VBScript %>
<% Option Explicit %>
<%
'Ensure that this page is not cached.
Response.Expires = 0
%>
<HTML>
<HEAD>
<TITLE>ASP Counter</TITLE>
</HEAD>
<BODY BGCOLOR="White" TOPMARGIN="10" LEFTMARGIN="10">
<!-- Display header. -->
<FONT SIZE="4" FACE="ARIAL, HELVETICA">
<B>Using Session Variables</B></FONT><BR>
<HR SIZE="1" COLOR="#000000">
<%
Dim ObjCounterFile, ReadCounterFile, WriteCounterFile
Dim CounterFile
Dim CounterHits
'Pad size, digit count, zeros to add'
Dim PadCount
Dim DigLen
Dim AddZeros
Dim ZeroCount
Dim ShowDigits
Dim DigCount
Dim DigitPath
PadCount = 7
DigitPath = "digit/"
CounterHits = Session("SessionCountVB")

On Error Resume Next
Set ObjCounterFile = Server.CreateObject("Scripting.FileSystemObject")
	
	CounterFile = Server.MapPath ("counter.txt")
	
	Set ReadCounterFile= ObjCounterFile.OpenTextFile (CounterFile, 1, True)
	
		If Not ReadCounterFile.AtEndOfStream Then
			CounterHits = Trim(ReadCounterFile.ReadLine)
			If CounterHits = "" Then CounterHits = 0
		Else
			CounterHits = 0
		End If
	
	ReadCounterFile.Close
	Set ReadCounterFile = Nothing
	
	CounterHits = CounterHits + 1
	
	Set WriteCounterFile= ObjCounterFile.CreateTextFile (CounterFile, True)
		WriteCounterFile.WriteLine(CounterHits)
	WriteCounterFile.Close
	Set WriteCounterFile = Nothing
	
Set ObjCounterFile = Nothing

DigLen = Len(CounterHits)


If DigLen < PadCount Then
        AddZeros = PadCount - DigLen
        ZeroCount = 1
        For ZeroCount = ZeroCount to AddZeros
              ShowDigits = ShowDigits & "<img src=""" & DigitPath & "/0.gif"" Alt =""" & CounterHits & " Visitors"" >"
        Next
End If

DigCount = 1
For DigCount = DigCount to DigLen
	ShowDigits = ShowDigits & "<img src=""" & DigitPath & "/" & Mid(CounterHits,DigCount,1) & ".gif"" Alt =""" & CounterHits & " Visitors"">"
Next
%>
<% =ShowDigits %><br>

<!-- Provide a link to revisit the page. -->
<br><P><A HREF="counter_app.asp">Click here to visit it again</A>
</BODY>
</html>
