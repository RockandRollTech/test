<?php

include 'vars.php';

switch ($_POST['ui']) {
    default: //Kiosk Home - show QR code + button for checkin/checkout without mobile + button for "I don't have reception here"
        echo $htmlheader;
        echo "Kiosk Home<br>";
        echo '<main>
              <div id="qrcode"></div>
              </main>
     
                <script>
                  var qrcode = new QRCode("qrcode","wait");
                  var mainLoopId = setInterval(function(){
                    var secret = secret + 1
                    var QRText = "https://signin.beep3.com?secret=" + secret.toString();
                    document.getElementById("qrcode").innerHTML = "";
                    qrcode = new QRCode("qrcode",QRText);
                    }, 1000);
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

?>

