<?php
    $old_file = dirname(__FILE__)."/important/files/file_pembanding.txt";
    $myfile = file_get_contents($old_file);
    echo "<h5> Isi File : </h5>". $myfile;

?>