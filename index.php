<?php

include 'vars.php';

switch ($_GET['p']) {
    default: //Kiosk Home - show QR code + button for checkin/checkout without mobile + button for "I don't have reception here"
        echo $htmlheader;
        //echo "Kiosk Home<br>";
        echo '
        
        <div id="qrContainer"></div>
        var qrContainer = document.createElement("div");
        document.body.appendChild(qrContainer);
        
        // Function to fetch the string and generate the QR code
        function fetchAndDisplayQRCode() {
          // Make an HTTP request to fetch the string
          fetch("https://signin.beep3.com?p=secret")
            .then(function(response) {
              // Check if the request was successful
              if (response.ok) {
                // Extract the string from the response
                return response.text();
              } else {
                throw new Error("HTTP request failed");
              }
            })
            .then(function(qrdata) {
              // Clear the previous QR code if any
              qrContainer.innerHTML = "";
        
              // Create a new QR code instance
              var qrcode = new QRCode(qrContainer, {
                text: qrdata,
                width: 128,
                height: 128,
              });
        
              // Display the QR code
              qrContainer.style.display = "block";
            })
            .catch(function(error) {
              console.error(error);
            });
        }

        // Call the function initially
        fetchAndDisplayQRCode();
        
        // Fetch and display the QR code every 10 seconds
        setInterval(fetchAndDisplayQRCode, 10000);
        
        ';

        //print_r($_POST);
        
        echo $htmlfooter;
    
        break;
        
        case 'secret':
            echo "test1234";

        
            break;
            
        case 'kiosk-wifi-QR':
            echo $htmlheader;
            echo "Scan to connect to WiFi";
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

        
    case 'form':
        echo "UI mobile home";
        
        echo '                <form action="/index.php" method="post">
                    <button type="submit" name="ui" value="arrive">Arriving</button>
                    <button type="submit" name="ui" value="leave">Leaving</button>
                </form>';
        
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

