<html>
<head>
<title>Exercise 4.2</title>
</head>
   <body>
    <?php 
    $digits = 6;
    $dir = "digit/*.gif";
    $filelocation="entercounter.txt";
           
    if (!file_exists($filelocation)) {
    $newfile = fopen($filelocation,"w+");
    $content=1;
     fwrite($newfile, $content);
     fclose($newfile);
    }
    $newfile = fopen($filelocation,"r");
    $content = fread($newfile, filesize($filelocation));
     fclose($newfile);
    $newfile = fopen($filelocation,"w+");
          
    $content++;
     fwrite($newfile, $content);
     fclose($newfile);

    echo "".sprintf ("%0"."$digits"."d",$content)."";

    $cdisp = $content;
    $divisor = 10;
    $digitarray = array(); 

    do {$digits = ($cdisp % $divisor); 
     $cdisp = ($cdisp / $divisor);
     array_push($digitarray,$digits);
    } 
    while($cdisp >=1);

   $digitarray = array_reverse($digitarray); 

    while (list ($key, $val) = each ($digitarray)) {
    echo "<img src='digit/$val.gif'>"; 
    }
           ?>
</body>
</html>
