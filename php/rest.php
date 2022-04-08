<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
        $_SESSION["TIME_ACCESSED"] = time();
        $_SESSION["ARTICLE_INFO"] = fetchInfo("https://thelasallian.com/wp-json/wp/v2/posts?tags=2180&?_fields=date,guid,title,excerpt,authors");
        $bearer = file_get_contents("config.json");
        if($bearer == false){
            print_r("NO BEARER");
            exit(); // Exits the script and no longer executes anything else.
        } else {
            $json_bearer = json_decode($bearer, true);
            $authHeaderPrepare = "Authorization: Bearer ".$json_bearer["Bearer"];
            $_SESSION["TWITTER_INFO"] = twitterFetch($authHeaderPrepare);
        }

    } else if(session_status() == PHP_SESSION_ACTIVE){
        $dateInitiallyAccessed = new DateTime($_SESSION["TIME_ACCESSED"]);
        $dateNow = new DateTime(time());
        $difference = date_diff($dateInitiallyAccessed, $dateNow);
        $eval = $difference->format('%h');

        // Refresh the time_accessed and article info after 10 hours
        if($eval == "5 Hours"){
            $_SESSION["TIME_ACCESSED"] = time();
            $_SESSION["ARTICLE_INFO"] = fetchInfo("https://thelasallian.com/wp-json/wp/v2/posts?tags=2180&?_fields=date,guid,title,excerpt,authors");   
        }
    }
?>

<?php 

/**
 * 
 * 
 * @param string URL of the request 
 * @param string Request required. Defaults to GET.
 * @return assoc_array Returns a JSON santiized associative array of the API.
 */
function fetchInfo($url, $httpReq = 'GET'){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $httpReq,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
}

/**
 * 
 * Pass bearer token to authenticate. 
 * 
 */
function twitterFetch($bearer){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.twitter.com/2/tweets/search/recent?query=%22%23Halalan2022%22%20from%3ATheLaSallian&user.fields=username,url&tweet.fields=id,created_at,text,author_id',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        $bearer,
        'Cookie: guest_id=v1%3A164844581155944229; guest_id_ads=v1%3A164844581155944229; guest_id_marketing=v1%3A164844581155944229; personalization_id="v1_9t8SGdqKDxjQ2Y7XbTPgCg=="'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
}

?>
