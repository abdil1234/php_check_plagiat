<?php
require_once 'upload.php';
class validation {
	
	public function check_name_length($object) {
		
		if (mb_strlen($object->file['original_filename']) > 100) {
			
			$object->set_error('File name is too long.');
			
		}
	}
	
}
if (!empty($_FILES['test'])) {
	
	$upload = Upload::factory('upload/important/banding');
	$upload->file($_FILES['test']);
	
	$validation = new validation;
	$old_file = dirname(__FILE__)."/important/banding/file_banding.txt";
    $upload->callbacks($validation, array('check_name_length'));
    
	if(unlink($old_file)){
        $results = $upload->upload('file_banding.txt');
    }else{
		die("Gagal hapus");
	}
	
    var_dump($results);
    echo "<a href='index.php'> Kembali</a>";
	
}
?>


<form action="" method="post" enctype="multipart/form-data">
	
	<input type="file" name="test" /> 
	
	<input type="submit" value="Submit me" />
	
</form>