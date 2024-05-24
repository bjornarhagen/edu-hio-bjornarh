<?php
    if ($_POST == NULL) {
        die("Ingen data ble motatt, noe gikk galt.");
    }

    $data = $_POST;

    // Escape post data
    foreach($data as $name => $value) {
        $data[$name] = htmlspecialchars($value);
    }

    // Get old date
    $post = "unique_id=" . $data["unique_id"];
    $url = "https://bjornarhagen.no/_/skole/hio/infprog/2016-01/oblig-4/old-time.php";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $old_date = curl_exec($ch);
    curl_close($ch);

    $old = date_create($old_date);
    $new = date_create(date("Y-m-d h:i:s a"));
    $diff = date_diff($old, $new);

    if ($diff->s <= 10 && $data["score"] >= 70) {
        echo "<h1>Fusk er ikke greit.</h1>";
        die();
    } else if ($data["score"] >= 300) {
        echo "<h1>Fusk er ikke greit.</h1>";
        die();
    }

    $post = $data;
    $url = "https://bjornarhagen.no/_/skole/hio/infprog/2016-01/oblig-4/submit.php";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;