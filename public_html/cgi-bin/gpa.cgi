#!/usr/bin/perl -w
 
##############################################################
#gpa.cgi
# Test program demonstrates connecting HTML form to CGI program
 
##############################################################
 
use CGI (':standard');
 
$a=param(A);
 
$b=param(B);
 
$c=param(C);
 
$d=param(D);
 
$f=param(F);
 
$t_c=$a+$b+$c+$d+$f;
 
$gpa=($a*4+$b*3+$c*2+$d)/$t_c;
 
# Create the "virtual" web page complete with partial HTTP header
 
print "Content-type: text/html\n\n";
 
print "<HTML><HEAD>\n";
 
print "<TITLE>Testing input parameter processing</TITLE>\n";
 
print "</HEAD><BODY>\n";
 
print "<H1>Testing input parameter processing in form</H1>\n";
 
print "<P>\n";
 
print "<p>Your GPA is $gpa\n";
 
print "</BODY>\n";
 
print "</HTML>\n";
 
exit(0);
