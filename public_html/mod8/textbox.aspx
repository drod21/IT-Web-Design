<script runat="server">

Sub submit(sender As Object, e As EventArgs)

lbl1.Text="Your Mark for Assignment 1 is " & tb1.Text & "!"

lbl2.Text="Your Mark for Assignment 2 is " & tb2.Text & "!"

lbl3.Text="Your Mark for Assignment 3 is " & tb3.Text & "!"

lbl4.Text="Your Mark for the Mid-Term is " & tb4.Text & "!"

lbl5.Text="Your Mark for the Final Exam is " & tb5.Text & "!"

lbl6.Text="Your Weighted Total is " & ( CInt(tb1.Text)*.10 + CInt(tb2.Text)*.10 + CInt(tb3.Text)*.10 + CInt(tb4.Text)*.30 + CInt(tb5.Text)*.40 )  & "!"

End Sub

</script><html>

<body><form runat="server">

Grade 1: <asp:TextBox id="tb1"  text="100" runat="server" />
<br /><br />
Grade 2: <asp:TextBox id="tb2"  runat="server" />
<br /><br />
Grade 3: <asp:TextBox id="tb3"  runat="server" />
<br /><br />
Mid-Term: <asp:TextBox id="tb4"  runat="server" />
<br /><br />
Final: <asp:TextBox id="tb5"  runat="server" />
<br /><br />

<asp:Button OnClick="submit" Text="Submit" runat="server" />

<p><asp:Label id="lbl1" runat="server" /></p>

<p><asp:Label id="lbl2" runat="server" /></p>

<p><asp:Label id="lbl3" runat="server" /></p>
<p><asp:Label id="lbl4" runat="server" /></p>
<p><asp:Label id="lbl5" runat="server" /></p>
<p><asp:Label id="lbl6" runat="server" /></p>
</form>

</body>

</html>
