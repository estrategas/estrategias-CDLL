<?php
include('../../libs/db.php');
include('libs/session.php');
include('libs/stringSeguro.php');
include('classes/SimpleImage.php');

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	

	$DOC_FILE1 = $_FILES['banner_ind_img']['tmp_name'];
	$DOC_FILE_NAME1 = $_FILES['banner_ind_img']['name'];
	
	if($DOC_FILE_NAME1 != NULL){
		$photos_download_dir = "../uploads/banners_carrusel/";
		// create the new directory if it doesn't exist.
		if(!file_exists($photos_download_dir)){
			mkdir($photos_download_dir, 0777, true);
		}
		// change spaces to underscores in filename 
		$photo_name = str_replace(" ", "_", $DOC_FILE_NAME1);
		$photo_big = new SimpleImage();
		$photo_big->load($DOC_FILE1);
		
		if (($photo_big->getWidth() > 605) || ($photo_big->getHeight() > 222)) 
		{
			if($photo_big->getWidth() > 605){
				
				$photo_big->resizeToWidth(605);
			}
			
			if($photo_big->getHeight() > 222){
				
				$photo_big->resizeToHeight(222);
			}
		}
		// save the photo into the videogallery directory.
		$photo_big->save($photos_download_dir . $photo_name);
	//END CODE TO RESAMPLE AND UPLOAD PHOTO FILE.
	/********************************************************************************************/
		$thumbs_dir = "../uploads/banners_carrusel/thumbs/";
		// create the new directory if it doesn't exist.
		if(!file_exists($thumbs_dir)){
			mkdir($thumbs_dir, 0777, true);
		}
		// change spaces to underscores in filename 
		$thumbs_file_name = str_replace(" ", "_", $DOC_FILE_NAME1);
		/**** RESIZE IMAGE (if needed) AND SAVE IT TO CORRESPONDING DIRECTORY ****/ 
		$thumb = new SimpleImage();
		$thumb->load($DOC_FILE1);
		
		if (($thumb->getWidth() > 151) || ($thumb->getHeight() > 68)) 
		{
			if($thumb->getWidth() > 151){
				
				$thumb->resizeToWidth(151);
			}
			
			if($thumb->getHeight() > 68){
				
				$thumb->resizeToHeight(68);
			}
		}
		// save the photo into the videogallery directory.
		$thumb->save($thumbs_dir . $thumbs_file_name);
	//END CODE TO RESAMPLE AND UPLOAD PHOTO FILE.
	
	// delete the temporary uploaded file.
    unlink($DOC_FILE1);
	}
	else
	{
		$DOC_FILE_NAME1 = $_POST['banner_ind_img_2'];
	}
	

	$posicion = stringSeguro($_POST['posicion']);
	
	$updateSQL_U = sprintf('UPDATE Banners_index SET banner_ind_lugar=0 WHERE banner_ind_lugar="%s"',
    mysql_real_escape_string($posicion, $con));
    $Result_U = mysql_query($updateSQL_U, $con);
	
	
	
	$banner_ind_url = stringSeguro($_POST['banner_ind_url']);
	$descripcion = stringSeguro($_POST['descripcion']);
	$posicion = stringSeguro($_POST['posicion']);
	$id_banner = stringSeguro($_POST['id_banner']);
	
	
  	$updateSQL = sprintf('UPDATE Banners_index SET banner_ind_img="%s", banner_ind_url="%s", banner_ind_desc="%s", banner_ind_lugar="%s" WHERE id_banner_ind="%s"',
    mysql_real_escape_string($DOC_FILE_NAME1, $con),
    mysql_real_escape_string($banner_ind_url, $con),
	mysql_real_escape_string($descripcion, $con),
	mysql_real_escape_string($posicion, $con),
    mysql_real_escape_string($id_banner, $con));

  $Result1 = mysql_query($updateSQL, $con);
  
  $updateGoTo = "banners_index_home.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&amp;" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", stringBack($updateGoTo)));
}

$colname_banners = "-1";
if (isset($_POST['id_banner'])) {
  $colname_banners = stringSeguro($_POST['id_banner']);
}

$query_banners = sprintf('SELECT * FROM Banners_index WHERE id_banner_ind = "%s"', mysql_real_escape_string($colname_banners, $con));
$banners = mysql_query($query_banners, $con);
$row_banners = mysql_fetch_assoc($banners);
$totalRows_banners = mysql_num_rows($banners);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/cam_lib_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Caminos de la Libertad</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="JavaScript">
function check_it(inputId) {
	if(document.getElementById("banner_ind_img").value!=""){
		var funcion_res = checkfileType(inputId);
		//alert("function result: "+funcion_res);
		if(funcion_res == false){
			//alert("imagen regresa false");
			return false;
		}
	}
}
//Para validar la extensi&oacute;n de los archivos que el usuario quiere subir
function getfileextension(inputId) 
{ 
	var fileinput = document.getElementById(inputId); 
	if(!fileinput ) return ""; 

	var filename = fileinput.value; 
	if( filename.length == 0 ) return ""; 

	var dot = filename.lastIndexOf(".");
	if( dot == -1 ) return ""; 

	var extension = filename.substr(dot,filename.length); 
	return extension; 
} 

function checkfileType(inputId) 
{ 
	var ext = getfileextension(inputId);
	//alert(document.getElementById("password").value);
	if((ext == ".jpg") || (ext == ".jpeg") || (ext == ".gif") || (ext == ".png") || (ext == ".JPG") || (ext == ".JPEG") || (ext == ".GIF") || (ext == ".PNG")){ 
		return true;
	}
	else{ 
		alert("Por favor seleccione una imagen con alguna de las siguientes extensiones: .jpg .jpeg .gif .png");
		return false;
	}
}
//-->
</script>
<style type="text/css" media="screen">
	@import url("../css/h_menu.css");
	@import url("../css/admin_tpl.css");
</style>
<!-- InstanceEndEditable -->
</head>

<body>

<div id="main_div">
    <div id="header_top">
        <table align="center" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td background="../images/header_1.png" style="background-repeat:no-repeat; background-position:center" width="1020px" height="267px">
                    <div id="top_menu">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="white_border">
                            <tr>
                                <?php switch($_SESSION['loggedin_id_access']){
                                case 1: 
                                    echo "<td><a href='usuarios_home.php'>Usuarios</a></td>";
                                break;
                                } ?>
                                <td><a href="banners_home.php">Banners</a> </td>
                                <td><a href="banners_index_home.php">Banners Carrusel</a> </td>
                                <td><a href="otras_act_home.php">Otras actividades</a></td>
                                <td><a href="recomendaciones_home.php">Recomendaciones</a></td>
                                <td><a href="noticias_home.php">Noticias</a></td>
                                <td><a href="reflexiones_home.php">Reflexiones</a></td> 
                            </tr>
                        </table>
                        <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                                <td><a href="protagonistas_home.php">Protagonistas Libertad</a></td>
                                <td><a href="concursos_home.php">Concursos</a></td>
                                <td><a href="registro_concurso_teatro_home.php">Registro Concurso de Teatro</a></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div><!-- close header_top -->
    
    <div id="content_bottom">
        <table align="center" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="940" height="200px" align="center">
                <table bgcolor="#FFFFFF" width="940px">
                    <tr>
                        <td height="200px"><p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p></td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center" style="width:1020px">
                        <table align="center" style="background-color:#FFF;" width="940px" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table align="center" width="100%" border="0" cellpadding="0" cellspacing="10">
                                        <tr>
                                            <td width="34%" align="left">Bienvenido<strong> <?php echo stringBack($_SESSION['loggedin_username']); ?></strong></td>
                                            <td width="66%" align="right"><strong><a href="cuenta_editar.php">Configuraci&oacute;n
                                            de cuenta</a><a href="<?php echo stringBack($logoutAction); ?>"> / Cerrar
                                            sesi&oacute;n</a></strong></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td valign="top" align="center">
                                        <!--td valign="top" align="center" style="border-left:thin; border-left-style:solid; border-color:#666; border-right:thin; border-right-style:solid; border-color:#666"-->
                                        <!-- InstanceBeginEditable name="body_centro" -->
<form onsubmit="return check_it('banner_ind_img');"  method="post" name="form1" id="form1" enctype="multipart/form-data">
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td height="20" colspan="3" align="center" valign="middle" nowrap="nowrap" class="listas_headers"><strong>EDITAR BANNER</strong></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td rowspan="2" align="right" valign="top" nowrap="nowrap">Banner actual:</td>
      <td colspan="2">
      <img name="" src="../uploads/banners_carrusel/thumbs/<?php echo stringBack($row_banners['banner_ind_img']); ?>" width="150" height="105" alt="" />
       </td>
    </tr>
    <tr valign="baseline">
      <td colspan="2"><?php echo stringBack($row_banners['banner_ind_img']); ?></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Nuevo banner (605x222
      px):</td>
      <td colspan="2"><input type="file" name="banner_ind_img" id="banner_ind_img" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Descripci&oacute;n de noticia:</td>
      <td colspan="2"><input type="text" name="descripcion" id="descripcion" value="<?php echo stringBack($row_banners['banner_ind_desc']); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">URL:</td>
      <td colspan="2"><input type="text" name="banner_ind_url" id="banner_ind_url" value="<?php echo stringBack($row_banners['banner_ind_url']); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Liga externa:</td>
      <td colspan="2">
      <select name="posicion" id="posicion" >
        
        <option value="0" <?php if($row_banners['banner_ind_lugar'] == NULL){ ?> selected="selected"<? } ?>>ninguno</option>
        <option value="1" <?php if($row_banners['banner_ind_lugar'] == 1){ ?> selected="selected"<? } ?>>1 - convocatoria</option>
        <option value="2" <?php if($row_banners['banner_ind_lugar'] == 2){ ?> selected="selected"<? } ?>>2 - destacado</option>
        <option value="3" <?php if($row_banners['banner_ind_lugar'] == 3){ ?> selected="selected"<? } ?>>3 - noticia</option>

      </select>
      </td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td align="center"><input type="button" value="Cancelar" onclick="javascript:history.back();" /></td>
      <td align="center"><input type="submit" value="Actualizar" /></td>
    </tr>
  </table>
  <input type="hidden" name="id_banner" value="<?php echo stringBack($row_banners['id_banner_ind']); ?>" />
  <input type="hidden" name="banner_ind_img_2" value="<?php echo stringBack($row_banners['banner_ind_img']);?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_banner" value="<?php echo stringBack($row_banners['id_banner_ind']); ?>" />
</form>
<p>&nbsp;</p>
<!-- InstanceEndEditable --></td>
                                    </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                                <td background="../images/footer_1.png" height="132" >&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div><!-- close content_bottom -->
</div><!-- close main_div -->

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($banners);
?>
