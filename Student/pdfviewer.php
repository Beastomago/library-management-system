<?php
$file = "../Admin/pdf/" . $_POST['pdff'];
// Add header to load pdf file
header('Content-type: application/pdf'); 
header("Content-Disposition: inline; filename='{$file}'"); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
@readfile($file);  
?>
