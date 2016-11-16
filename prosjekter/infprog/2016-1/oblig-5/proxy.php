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
        $result = null;

        // Searches through the whole file to see if this place exsist
        foreach($json as $struct) {
            if (isset($struct->kommune)) {
                if ($query == $struct->stadnamn) {
                    $result = $struct;
                    break; // Stop searching
                }
            }
        }

        if (!$result) {
            // If nothing was found, send error
            $result = new stdClass();
            $result->search_result = 0;
            $result->error = new stdClass();
            $result->error->msg = 'Klarte ikke finne ' . $query;
        } else {
            $result->search_result = 1;
            $result->error = null;
        }

        return $result;
    }

    if (isset($_GET['s'])) {                                                // Search
        header('Content-type: application/json');

        $result = json_encode(search(htmlspecialchars($_GET['s'])));
    } else if (isset($_GET['xml']) && isset($_GET['place'])) {             // XML data
        header('Content-type: application/xml');

        $filename = htmlspecialchars($_GET['xml']);
        $cacheFilename = 'oppgave-4/.cache/' . $_GET['place'] . ".xml";

        // If the cache file is present, and it's less than 1 hour old, read it
        if (file_exists($cacheFilename) && filemtime($cacheFilename) > time() - 3600) {
            $cacheFile = fopen($cacheFilename, 'r');
            $result = fread($cacheFile, 8192);
            fclose($cacheFile);
        } else {
            // If the file is not found, get live data from Yr
            $file = fopen($filename, 'r');
            $result = fread($file, 8192);
            fclose($file);

            // and make a cache file
            $cacheFile = fopen($cacheFilename, 'w');
            fwrite($cacheFile, '<!-- Cached data (from oppgave-4/.cache/location_name.xml) -->');
            fwrite($cacheFile, $result);
            fclose($cacheFile);
        }
    }

    echo $result;