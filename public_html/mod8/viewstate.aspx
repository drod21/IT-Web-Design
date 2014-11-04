<script runat="server">
Sub submit(sender As Object, e As EventArgs)
lbl1.Text="Hello " & txt1.Text & "!"
lbl2.Text="You have a good job as " & txt2.Text & "!"
txt1.Text=""
lbl3.Text="You are " & txt3.Text & " years old!"
lbl4.Text="You are studying " & txt4.Text & " at " & txt5.Text
txt3.Text=""
txt4.Text=""
txt5.Text="" 
End Sub
</script><html>
<body><form runat="server">
Your Name: <asp:TextBox id="txt1" runat="server" />
Your Profession: <asp:TextBox id="txt2" runat="server" />
<br>
Your Age: <asp:TextBox id="txt3" runat="server" />
<br>
Your Major: <asp:TextBox id="txt4" runat="server" />
Your University: <asp:TextBox id="txt5" runat="server" />
<asp:Button OnClick="submit" Text="Submit" runat="server" />
<p><asp:Label id="lbl1" runat="server" /></p>
<p><asp:Label id="lbl2" runat="server" /></p>
<p><asp:Label id="lbl3" runat="server" /></p>
<p><asp:Label id="lbl4" runat="server" /></p>
<p><asp:Label id="lbl5" runat="server" /></p>
</form></body>
</html>
