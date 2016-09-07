<?php

if ($handle = opendir(__DIR__)) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != ".." && explode('.', $entry)[1] == "sql") {
 
            $tabelFile[] = $entry;
        }
    }

    closedir($handle);
}
