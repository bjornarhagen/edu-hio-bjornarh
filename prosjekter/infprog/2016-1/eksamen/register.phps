<?php
    $error = false;

    if (!isset($_POST)) {
        echo '<p>Feilkode 1: Noe gikk galt, ingen resultater ble motatt. Prøv på nytt</p>';
        $error = true;
    } else {
        if ($_POST['o3_2-f-number'] < 1) {
            echo '<p>Feilkode 2: Deltakernummer må være et tall større enn 0.</p>';
            $error = true;
        }
        
        if (strLen($_POST['o3_2-f-name_first']) === 0 || strLen($_POST['o3_2-f-name_last']) === 0) {
            echo '<p>Feilkode 3: Navn og etternavn må være fylt ut.</p>';
            $error = true;
        }
        
        if ($_POST['o3_2-f-number'] < 1) {
            echo '<p>Feilkode 4: Deltakernummer må være et tall større enn 0.</p>';
            $error = true;
        }
    }
    
    if ($error) {
        echo '<p>Ser ut til at noe gikk galt. <a href="mailto:webadmin@example.com">Kontakt webadmin</a> og rapporter feilkodene.</p>';
    } else {
        $data = [];
        
        foreach ($_POST as $key => $value) {
            $data[$key] = htmlspecialchars($value); // Escape user data
        }
        
        $filename = 'resultater.dat';
        $file = fopen($filename, 'a') or die('Feilmelding 5: Noe gikk galt, kunne ikke åpne filen');
        fwrite($file, implode(';', $data) . PHP_EOL); // Implode array and write new-line.
        fclose($file);
        
        echo '<p>Resultatene ble registrert.</p>';
    }

# No closing PHP tag, because it can cause some issues...
# Google: "stackoverflow PHP why to not close tag" (should be top result)
