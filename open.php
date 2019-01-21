<?php
    $old_file = dirname(__FILE__)."/important/banding/file_banding.txt";
    $myfile = file_get_contents($old_file);
    echo "<h5> Isi File : </h5>". $myfile;

?>