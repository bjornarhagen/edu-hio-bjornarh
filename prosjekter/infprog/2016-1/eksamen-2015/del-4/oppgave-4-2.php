<?php
	$data = [];

	// Escape input data og lagre i ny variabel
	foreach($_POST as $key => $value) {
		$data[$key] = htmlspecialcharacters($value);
	}

	$file = fopen(date('n') . '.' . date('Y) . '.csv', 'a') or die('Kunne ikke åpne filen, noe gikk galt...');
	fwrite($file, date('j') . ';' . $data['frw-type'] . ';' . $data['frw-wind-direction'] . ';' . $data['frw-wind-strength'] . ';' . $data['frw-temperature']);
	$fclose($file);

// Lukker ikke PHP taggen fordi det kan faktisk skape en del hodebry.
// Kan ikke akkurat stackoverflow liken i hodet, men google "stackoverflow PHP why to not close tag".