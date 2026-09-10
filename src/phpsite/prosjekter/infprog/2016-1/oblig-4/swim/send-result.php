<?php
    if (empty($_POST)) {
        die("Ingen data ble motatt, noe gikk galt.");
    }

    $name  = trim((string)($_POST["name"]  ?? ""));
    $score = (int)    ($_POST["score"] ?? 0);

    if ($name === "") {
        die("Navn mangler.");
    }

    // Rough client-side sanity check. The old server-timed anti-cheat is gone.
    if ($score < 0 || $score >= 300) {
        echo "<h1>Fusk er ikke greit.</h1>";
        die();
    }

    $scoresFile = __DIR__ . "/scores.json";

    $scores = [];
    if (is_file($scoresFile)) {
        $decoded = json_decode((string)file_get_contents($scoresFile), true);
        if (is_array($decoded)) {
            $scores = $decoded;
        }
    }

    $scores[] = [
        "name"  => mb_substr($name, 0, 32),
        "score" => $score,
        "date"  => date("Y-m-d H:i:s"),
    ];

    usort($scores, fn($a, $b) => ($b["score"] ?? 0) <=> ($a["score"] ?? 0));
    $scores = array_slice($scores, 0, 50);

    file_put_contents($scoresFile, json_encode($scores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "<h1>Høyeste poengsummer</h1>";
    echo "<ol class='high-scores'>";
    foreach (array_slice($scores, 0, 10) as $entry) {
        $n = htmlspecialchars((string)($entry["name"]  ?? ""), ENT_QUOTES, "UTF-8");
        $s = (int)($entry["score"] ?? 0);
        echo "<li><span>{$n}</span> <span>{$s}</span></li>";
    }
    echo "</ol>";
