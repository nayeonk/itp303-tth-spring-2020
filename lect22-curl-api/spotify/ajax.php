<?php
    require("header.php");

    $url = "https://api.spotify.com/v1/me/playlists";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $_SESSION['access_token']
        )
    ));

    // $base_url = "https://api.spotify.com/v1/me/top/tracks";

    // $data = array(
    //     "limit" => 50,
    //     "time_range" => "long_term"
    // );

    // $base_url = $base_url . "?" . http_build_query($data);

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => $base_url,
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_HTTPHEADER => array(
    //         "Authorization: Bearer " . $_SESSION['access_token']
    //     )
    // ));

    $response = curl_exec($curl);
    echo $response;