<?php 

$data = json_decode ( file_get_contents ( "php://input" ) );

echo json_encode(array('status'=>true,'data'=>$data));
