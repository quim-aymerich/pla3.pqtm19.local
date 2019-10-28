<?php 
 /* Establim connexió amb el servidor de BD(host,usuari,contrasenya*/
$conn = mysqli_connect('localhost', 'root', '','test');
	if (!$conn) {exit("Connection Failed: " . $conn);
}

/* Identifiquem la base de dades que volem utilitzar */
mysqli_select_db($conn,'test' );

/* especifiquem el mapa de caracters de la connexío */
$charset = mysqli_query($conn,"SET NAMES 'utf8'");

$id_areas = (isset($_REQUEST['id_areas']))? $_REQUEST['id_areas'] : 0 ;

/* Establim la comanda SQL que volem executar consultem els noms de les comunitats */
$sql = " SELECT tbl_cursos.*,tbl_areas.nombre as area FROM tbl_cursos ";
$sql .= " INNER JOIN tbl_areas ON tbl_areas.id=tbl_cursos.id_areas ";
if($id_areas!=0){
	$sql .= " WHERE tbl_cursos.id_areas=".$id_areas;
}

$rs = mysqli_query($conn,$sql);
$arrCursos=array();
while ($arr_result = mysqli_fetch_array($rs, 1)) {
	$arrCursos[]= $arr_result;
}
mysqli_close($conn);
echo json_encode($arrCursos);
?>