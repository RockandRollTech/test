<?php

$htmlheader = '
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
         content="width=device-width,
                        initial-scale=1.0" />
    <title>Check In or Check Out</title>
    
    <style>
        h1, h3 {
          color: green;
        }
        body, header {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }
    </style>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
    </script>
</head><body><center>';

$htmlfooter = '</center></body></html>';

switch ($_POST['ui']) {
    default: //Kiosk Home - show QR code + button for checkin/checkout without mobile + button for "I don't have reception here"
        echo $htmlheader;
        echo "UI kiosk home<br>";
        echo '<main>
              <div id="qrcode"></div>
              </main>
     
                <script>
                    var qrcode = new QRCode("qrcode",
                    "https://www.geeksforgeeks.org");
                </script>';
        echo $htmlfooter;
    
        break;
        
    case 'kiosk-form':
        echo "UI kiosk checkin or out";
        //show form for check in or out, 2 buttons (in/out)
    
        break;
        
    case 'kiosk-wifi-QR':
        echo "UI kiosk checkout";
        //show QR code for kiosk WiFi
    
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



