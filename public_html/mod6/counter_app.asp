<%@ LANGUAGE = VBScript %>
<% Option Explicit %>
<%
'Ensure that this page is not cached.
Response.Expires = 0
%>
<HTML>
<HEAD>
<TITLE>Using Session Variables</TITLE>
</HEAD>
<BODY BGCOLOR="White" TOPMARGIN="10" LEFTMARGIN="10">
<!-- Display header. -->
<FONT SIZE="4" FACE="ARIAL, HELVETICA">
<B>Using Session Variables</B></FONT><BR>
<HR SIZE="1" COLOR="#000000">
<%
'Adds the digit path for easier logic'
Dim DigitPath
DigitPath = "digits/"

'If this is the first time a user has visited
'the page, initialize Session Value.
If (Session("SessionCountVB") = "") Then
Session("SessionCountVB") = 0
End If
'Increment the SessionCountVB by one.
'Note that this SessionCountVB value is only
'for this user's individual session.
 
Session("SessionCountVB") = Session("SessionCountVB") + 1
%>
<!-- Output the Session Page Counter Value. -->
<%
'Note that this only works for a counter up to two digits
Dim digit2, digit1, counter
'Pad size, digit count, zeros to add'
Dim FixedPadCount
Dim DigitCountLength
Dim ZerosToAdd
Dim ZeroCount
Dim ShowDigits
Dim DigitCount
counter = Session("SessionCountVB")
digit1 = counter MOD 10
counter = counter \ 10
digit2 = counter MOD 10 
DigitCountLength = Len(counter)
FixedPadCount = 7
If DigitCountLength < FixedPadCount Then
        ZerosToAdd = FixedPadCount - DigitCountLength
        ZeroCount = 1
        For ZeroCount = ZeroCount to ZerosToAdd
              ShowDigits = ShowDigits & "<img src=""" & DigitPath & "/0.gif"" Alt =""" & counter & " Visitors"" >"
        Next
End If
counter = 1
For counter = counter to DigitCountLength
	ShowDigits = ShowDigits & "<img src=""" & DigitPath & "/" & Mid(counter,DigitCount,1) & ".gif"" Alt =""" & counter & " Visitors"">"
Next
%>
<% =ShowDigits %><br>
 
You have personally visited this page
<img src="digit/<%=digit2%>.gif"><img src="digit/<%=digit1%>.gif"> times!
 
<!-- Provide a link to revisit the page. -->
<br><P><A HREF="Session_cter.asp">Click here to visit it again</A>
</BODY>
