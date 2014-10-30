<p>Please tell us who you are</p>
<form action="exer6_1.asp" method="post">
 
<p>Your Name : <input type="text" name="name"></input></p>
<p>Your Ages : <input type="text" name="age"></input></p>
<p>Shoe Size : <input type="text" name="size"></input></p>
<p>Your Bestest Color : <select name="color" SIZE=3>
<option selected> Red
<option> Blue
<option> Green
</select></p>
<p>Grade of Assignment 1 : <input type="text" name="assign1"></input></p>
<p>Grade of Assignment 2 : <input type="text" name="assign2"></input></p>
<p>Grade of Assignment 3 : <input type="text" name="assign3"></input></p>
<p>Grade of Mid-Term : <input type="text" name="midterm"></input></p>
<p>Grade of Final : <input type="text" name="final"></input></p>
<p>
<input type="HIDDEN" name="Message" value="True">
<input type="submit"></input></p>
</form>
<br>
<br>
<%
'Add calculations for grade weights & grade calculations'
dim grade
grade = 0
If request.form("assign1") >= 0.01 & request.form("assign1") <= 100 Then
grade = grade + request.form("assign1") * 0.10
else grade = grade + 10
End If
If request.form("assign2") >= 0.01 & request.form("assign2") <= 100 Then
grade = grade + request.form("assign2") * 0.10
else grade = grade + 10
End If
If request.form("assign3") >= 0.01 & request.form("assign3") <= 100 Then
grade = grade + request.form("assign3") * 0.10
else grade = grade + 10
End If
If request.form("midterm") >= 0.01 & request.form("midterm") <= 100 Then
grade = grade + request.form("midterm") * 0.30
else grade = grade + 30
End If
If request.form("final") >= 0.01 & request.form("final") <= 100 Then
grade = grade + request.form("final") * 0.40
else grade = grade + 40
End If
%>
<% IF request.form ("Message")="True" THEN%>
<% Response.Write "Thank You For Filling Out the Form " + Request.Form("name") %>
<p><% Response.Write "You are " + Request.Form("age") + " Years of Age" %></P>
<p><% Response.Write "Your final grade is : " & (grade)%></p>
<p><% Response.Write "Your shoe size is " + Request.Form("size") %></p>
<p>
<%
If Request.Form("size") > 12 then
Response.Write "You have big feet"
End If
%>
</p>
<p><% Response.Write "Your Bestest Color is: " + Request.Form("color") %>
<%end if %>
