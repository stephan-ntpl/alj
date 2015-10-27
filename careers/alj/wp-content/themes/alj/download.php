<?php

    $filename = $_SERVER['DOCUMENT_ROOT'].'career/alj/wp-content/themes/alj/pdf/'.$_GET['filename'];

    $fileinfo = pathinfo($filename);
    $sendname = $fileinfo['filename'] . '.' . strtoupper($fileinfo['extension']);

    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment; filename=\"$sendname\"");
    header('Content-Length: ' . filesize($filename));
    readfile($filename);

?>
