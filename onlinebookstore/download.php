<?php
    include 'config.php';
    if(isset($_GET['pdf']))
    {
        $filename=basename($_GET['pdf']);
        $filepath='pdf/'.$_GET['pdf'];
        if(file_exists($filepath))
        {
            header("Cache-Control: public");
            header("Content-Description: FIle Transfer");
            header("Content-Disposition: attachment");
            header("Content-Type: pdf");
            header("Content-Transfer-Encoding:binary");

            readfile($filepath);
            exit;
        }
        else
        {
            echo "This file does not exist";
        }
    }
?>