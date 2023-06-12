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
                  var QRText = "https://signin.beep3.com?secret=wait";
                  var qrcode = new QRCode("qrcode",QRText);
                  var secret = 0
                  var mainLoopId = setInterval(function(){
                    secret = secret + 1
                    QRText = "https://signin.beep3.com?secret=" + secret.toString();
                    document.getElementById("qrcode").innerHTML = "";
                    qrcode = new QRCode("qrcode",QRText);
                    }, 1000);
                </script>
                
                <form action="/index.php" method="post">
                    <input name="ui" type="submit" value="kiosk-wifi-QR">
                    <input name="ui" type="submit" value="kiosk-form">
                </form> 
                
                ';

        print_r($_POST);
        
        echo $htmlfooter;
    
        break;
        
    case 'kiosk-wifi-QR':
        echo $htmlheader;
        echo "UI kiosk WiFi";
        echo '<main>
              <div id="qrcode"></div>
              </main>
     
                <script>
                  var QRText = "WIFI:T:WPA;S:MyNetworkName;P:ThisIsMyPassword;H;";
                  var qrcode = new QRCode("qrcode",QRText);
                </script>
                
                <form action="/index.php" method="post">
                    <input name="ui" type="submit" value="Back">
                </form> 
                
                ';
        echo $htmlfooter;
    
        break;        
        
    case 'kiosk-form':
        echo "UI kiosk checkin or out";
        //show form for check in or out, 2 buttons (in/out)
    
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

