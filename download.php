<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }

    include 'config.php';
    if (isset($_GET['pdf']) && is_string($_GET['pdf']))
    {
        $filename = basename($_GET['pdf']);
        $filepath = __DIR__ . DIRECTORY_SEPARATOR . 'pdf' . DIRECTORY_SEPARATOR . $filename;
        $pdfDirectory = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'pdf');
        $resolvedFile = realpath($filepath);
        if ($filename !== '' && $pdfDirectory !== false && $resolvedFile !== false
            && strpos($resolvedFile, $pdfDirectory . DIRECTORY_SEPARATOR) === 0
            && is_file($resolvedFile))
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="' . rawurlencode($filename) . '"');
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");

            readfile($resolvedFile);
            exit;
        }
        else
        {
            echo "This file does not exist";
        }
    }
?>
