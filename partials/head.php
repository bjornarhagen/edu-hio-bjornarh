<?php
  $_project_name = 'Bjørnar Hagen';
  $_project_path = "/~bjornarh";
  $_project_path = "http://localhost:8080"; // TODO: remove in prod
  $_fingerprint = ' ‌﻿​﻿​﻿‌﻿‌﻿‌﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿‌﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿​﻿​﻿​﻿‍﻿‌﻿​﻿​﻿​﻿‌﻿‌﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿​﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿‌﻿‌﻿‌﻿​﻿‍﻿‌﻿​﻿​﻿​﻿‌﻿‌﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿‌﻿‌﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿‌﻿‌﻿‌﻿​﻿‍﻿‌﻿​﻿​﻿‌﻿‌﻿​﻿​﻿​﻿‍﻿‌﻿​﻿​﻿‌﻿‌﻿​﻿‌﻿​﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿​﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿‌﻿​﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿‌﻿‌﻿​﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿​﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿‌﻿​﻿​﻿​﻿‍﻿‌﻿​﻿​﻿‌﻿‌﻿​﻿‌﻿​﻿‍﻿‌﻿​﻿​﻿​﻿‌﻿‌﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿​﻿‌﻿‌﻿‌﻿‌﻿‍﻿‌﻿​﻿​﻿​﻿‌﻿‌﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿‌﻿‌﻿​﻿‍﻿‌﻿​﻿​﻿‌﻿​﻿​﻿​﻿‌﻿‍﻿‌﻿​﻿​﻿​﻿‌﻿​﻿‌﻿‌';

  $body_attributes = '';
  $body_classes_default = '';

  if (isset($body_id)) {
    $body_attributes .= ' id="'.$body_id.'"';
  }

  if (isset($body_classes)) {
    $body_classes = $body_classes_default . ' ' . $body_classes;
  } else {
    $body_classes = $body_classes_default;
  }

  if (strlen($body_classes) > 0) {
    $body_attributes .= ' class="'.$body_classes.'"';
  }
?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1 width=device-width, height=device-height">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $_project_name ?></title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= $_project_path ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="<?= $_project_path ?>/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?= $_project_path ?>/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="<?= $_project_path ?>/manifest.json">
  <link rel="mask-icon" href="<?= $_project_path ?>/safari-pinned-tab.svg" color="#ff9514">
  <meta name="theme-color" content="#ff9514">
  <link rel="stylesheet" href="<?= $_project_path ?>/css/global.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300:400:700" rel="stylesheet">
</head>
<body<?= $body_attributes ?>>
