<html>
<body>
<form runat="server">
Enter a number from 6 to 36:
<asp:TextBox id="tbox1" runat="server" />
<br /><br />
<asp:Button Text="Submit" runat="server" />
<br />
<asp:RangeValidator
ControlToValidate="tbox1"
MinimumValue="6"
MaximumValue="36"
Type="Integer"
EnableClientScript="false"
Text="The value must be from 6 to 36!"
runat="server" />
</form>
</body>
</html>
