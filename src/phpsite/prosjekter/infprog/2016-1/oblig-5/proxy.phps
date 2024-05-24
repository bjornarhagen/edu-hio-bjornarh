<?php
    function generate_json_file($filename = null, $cache = 3600*24) {
        if ($filename === null) {
            $filename = 'oppgave-4/' . mt_rand(10000, 100000) . '.json'; // Make random filename
        }

        // If JSON file doesn't exsist, or the file is older than 24 hours, make it again
        // JSON file is made by a CSV file from yr.no
        if (!file_exists($filename) || filemtime($filename) < time() - $cache) {
            $csv = file_get_contents('oppgave-4/norge.csv');
            $data = array_map("str_getcsv", explode("\n", $csv));

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

            // Write to file
            $file = fopen($filename, 'w');
            fwrite($file, json_encode($placesList));
            fclose($file);
        }

        return $filename; // Return filename
    }

    function search($query) {
        $json = json_decode(file_get_contents(generate_json_file('oppgave-4/norge.json')));
        $result = [];

        // Searches through the whole file to see if this place exsist
        foreach($json as $struct) {
            if (isset($struct->kommune)) {
                if ($query == $struct->kommune || $query == $struct->stadnamn) {
                    array_push($result, $struct);
                }
            }
        }

        if (!$result) {
            // If nothing was found, send error
            $result = new stdClass();
            $result->search_result = 0;
            $result->error = new stdClass();
            $result->error->msg = 'Klarte ikke finne stedet du søkte etter';
        }

        return $result;
    }

    if (isset($_GET['s'])) {
        header('Content-type: application/json');

        $result = json_encode(search(htmlspecialchars($_GET['s'])));
    } else if (isset($_GET['xml']) && isset($_GET['place']) && strlen($_GET['place']) != 0) {
        header('Content-type: application/xml');

        $filename = htmlspecialchars($_GET['xml']);
        $cacheFilename = 'oppgave-4/.cache/' . strToLower(urlencode(htmlspecialchars($_GET['place']))) . ".xml";
        $result = "";

        // If the cache file is present, and it's less than 1 hour old, read it
        if (file_exists($cacheFilename) && filemtime($cacheFilename) > time() - 3600) {
            $cacheFile = fopen($cacheFilename, 'r');

            while ($line = fgets($cacheFile)) {
                $result .= $line;
            }

            fclose($cacheFile);
        } else {
            // If the file is not found, get live data from Yr
            $file = fopen($filename, 'r');
            $cacheFile = fopen($cacheFilename, 'w');
            
            while ($line = fgets($file)) {
                $result .= $line;
                fwrite($cacheFile, $line); // make a cache file
            }
            
            fclose($file);
            fclose($cacheFile);
        }
    }

    echo $result;