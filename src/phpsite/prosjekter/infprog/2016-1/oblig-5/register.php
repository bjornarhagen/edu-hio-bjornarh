<?php
    if (!isset($_GET) || !count($_GET)) {
        echo "En feil oppsto, beklager :/";
        die();
    }


    $filename = 'oppgave-1-2-3-materiale/paameldinger.dat';
    $fileData = '';
    
    // format data to CSV structure with ¤ (implode). Also replace user data ¤ with HTML decimal entity (str_replace)
    $data = implode('¤', str_replace('¤','&#164;', $_GET));

    // Convert file content into array on newline (PHP_EOL for cross-platform)
    foreach (explode(PHP_EOL, htmlspecialchars_decode(file_get_contents($filename))) as $lineData) {
        // Make sure line has content (This will also remove empty lines :D)
        if (strlen($lineData)) {
            // If line already exsist in file, asume user is already signed up
            if ($data == $lineData) {
                echo "Du er allerede påmeldt denne presentasjonen :)";
                die();
            }

            $fileData .= $lineData . PHP_EOL;
        }
    }

    // Escape user data
    $fileData .= htmlspecialchars($data);

    $file = fopen($filename, 'w') or die('Kunne ikke åpne filen :/');
    fwrite($file, $fileData);
    fclose($file);

    echo "Takk for din påmelding :)";

    // No closing PHP tag to avoid headaches
    // Read more here: http://stackoverflow.com/questions/4410704/why-would-one-omit-the-close-tag