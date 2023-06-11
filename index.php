<?php

switch ($_GET['ui']) {
    case 'kiosk-home':
        echo "UI kiosk home";
    

    
        break;
    
    case 'mobile-home':
        echo "UI mobile home";
        $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
        $txt = "Donald Duck\n";
        fwrite($myfile, $txt);
        $txt = "Goofy Goof\n";
        fwrite($myfile, $txt);
        fclose($myfile); 
        break;
    
    case 'report-home':
        echo "UI report home";
        $myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
        $contents = fread($myfile, filesize("newfile.txt"));
        fclose($handle);
        echo $contents;
    break;
}



