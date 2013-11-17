<?php

// Define a destination
$targetFolder = __DIR__.'/uploads/user_submitted'; // Relative to the root

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_POST['time'].'_'.$_FILES['Filedata']['name'];

	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		$success = move_uploaded_file($tempFile,$targetFile);
		echo $tempFile.' -- '.$targetFile;
	} else {
		echo 'Invalid file type.';
	}
}
?>