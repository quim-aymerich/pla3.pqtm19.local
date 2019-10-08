<?php 

$nom    = (isset($_POST['Nom']))?       $_POST['Nom']      :false;
$cognoms= (isset($_POST['Cognoms']))?   $_POST['Cognoms']  :false;
$datan  = (isset($_POST['DataN']))?     $_POST['DataN']    :false;
$dataStatus=true;
$avatarStatus=false;
$avatarImg="";
if (isset( $_FILES['Avatar'])){
    $uploadOk = 1;

    $target_dir    = "/JS/RegExp/img/";
    
    $imageFileType = strtolower(pathinfo($_FILES['Avatar']['name'],PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["Avatar"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
       
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["Avatar"]["size"] > 500000) {
        
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            
            $uploadOk = 0;
    }
    // Check if file already exists
    $avatarImg= $target_dir."avatar.".$imageFileType;
    if (file_exists($_SERVER['DOCUMENT_ROOT'].$avatarImg)) {
        unlink($_SERVER['DOCUMENT_ROOT'].$avatarImg);
        
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $avatarStatus=false;
    } else {
        
        if (move_uploaded_file($_FILES["Avatar"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$avatarImg)) {
            $avatarStatus=true;
        } else {
            $avatarStatus=false;
        }
    }
    
    
}

$array= array(
    'status'    =>$dataStatus,
    'data'      => array(
        'Nom'       => $nom,
        'Cognoms'   => $cognoms,
        'DataN'     => $datan,
        'Avatar'    => array(
                'status'=> $avatarStatus,
                'img'   => $avatarImg."?".time()
            )
         )
);

echo json_encode($array);

