<?php
$file = "data.txt";
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    if (isset($lines[$id])) {
        unset($lines[$id]);
        file_put_contents($file, implode("\n", $lines) . "\n");
    }
}
header("Location: index.html");
