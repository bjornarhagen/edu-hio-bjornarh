<?php
    // If JSON file doesn't exsist, or the file is older than 24 hours, make it again
    // JSON file is made by a CSV file from yr.no
    if (!file_exists('oppgave-4/norge.json') || filemtime('oppgave-4/norge.json') < time() - (3600*24)) {
        $csv = file_get_contents('oppgave-4/norge.csv');
        $data = array_map("str_getcsv", explode(PHP_EOL, $csv));

        $placesList = [];
        $headers = explode("\t", $data[0][0]);

        // Turn each CSV line into an object
        foreach ($data as $place_id => $places) {
            $places = explode("\t", $places[0]);

            if (count($places) > 1) {
                $current_place = new stdClass();

                foreach ($places as $header_number => $place) {
                    if (strlen($headers[$header_number])) {
                        $current_place->{strtolower($headers[$header_number])} = $place;
                    }
                }

                $placesList[$place_id] = $current_place;
            }
        }

        unset($placesList[0]); // Remove the headers
        $file = fopen('oppgave-4/norge.json', 'w');
        fwrite($file, json_encode($placesList));
        fclose($file);
    }


    $search = $_GET['s'];
    $json = json_decode(file_get_contents('oppgave-4/norge.json'));

    var_dump($search);

    $item = null;
    foreach($json as $struct) {
        if ($search == $struct->kommune && $search == $struct->stadnamn) {
            $item = $struct;
            break;
        }
    }

    echo "<pre>";
    var_dump($item);
    echo "</pre>";
