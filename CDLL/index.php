<?php
include('../libs/db.php');
include('admin/libs/stringSeguro.php');


$query_concursos_ensayo = "SELECT id_concurso, nombre FROM Concursos WHERE id_categoria = 1 AND publicado = 1 ORDER BY id_concurso ASC";
$concursos_ensayo = mysql_query($query_concursos_ensayo, $con);
$totalRows_concursos_ensayo = mysql_num_rows($concursos_ensayo);


$query_concursos_jovenes = "SELECT id_concurso, nombre FROM Concursos WHERE id_categoria = 2 AND publicado = 1 ORDER BY id_concurso ASC";
$concursos_jovenes = mysql_query($query_concursos_jovenes,$con);
$totalRows_concursos_jovenes = mysql_num_rows($concursos_jovenes);


$query_concursos_otros = "SELECT id_concurso, nombre FROM Concursos WHERE (id_categoria <> 1) AND (id_categoria <> 2) AND publicado = 1 ORDER BY id_concurso ASC";
$concursos_otros = mysql_query($query_concursos_otros, $con);
$totalRows_concursos_otros = mysql_num_rows($concursos_otros);


$query_convocatoria_index = "SELECT * FROM Convocatorias WHERE abierta = 1 ORDER BY RAND() LIMIT 1";
$convocatoria_index = mysql_query($query_convocatoria_index, $con);
$row_convocatoria_index = mysql_fetch_assoc($convocatoria_index);
$totalRows_convocatoria_index = mysql_num_rows($convocatoria_index);


$query_convocatoria_c_ensayo_abierta = "SELECT * FROM Convocatorias WHERE id_categoria = 1 AND abierta = 1 ORDER BY RAND() LIMIT 1";
$convocatoria_c_ensayo_abierta = mysql_query($query_convocatoria_c_ensayo_abierta, $con);
$row_convocatoria_c_ensayo_abierta = mysql_fetch_assoc($convocatoria_c_ensayo_abierta);
$totalRows_convocatoria_c_ensayo_abierta = mysql_num_rows($convocatoria_c_ensayo_abierta);

/* Query para obtener aleatoriamente una convocatoria abierta del Concurso de Jóvenes y ponerla como liga en el menu "Concurso Jóvenes" */
$query_convocatoria_c_jovenes_abierta = "SELECT * FROM Convocatorias WHERE id_categoria = 2 AND abierta = 1 ORDER BY RAND() LIMIT 1";
$convocatoria_c_jovenes_abierta = mysql_query($query_convocatoria_c_jovenes_abierta, $con);
$row_convocatoria_c_jovenes_abierta = mysql_fetch_assoc($convocatoria_c_jovenes_abierta);
$totalRows_convocatoria_c_jovenes_abierta = mysql_num_rows($convocatoria_c_jovenes_abierta);

/* Query para obtener aleatoriamente una convocatoria abierta de Otros Concurso y ponerla como liga en el menu "Otros Concursos" */
$query_convocatoria_c_otros_abierta = "SELECT * FROM Convocatorias WHERE (id_categoria <> 1) AND (id_categoria <> 2) AND abierta = 1 ORDER BY RAND() LIMIT 1";
$convocatoria_c_otros_abierta = mysql_query($query_convocatoria_c_otros_abierta, $con);
$row_convocatoria_c_otros_abierta = mysql_fetch_assoc($convocatoria_c_otros_abierta);
$totalRows_convocatoria_c_otros_abierta = mysql_num_rows($convocatoria_c_otros_abierta);

$query_banner = "SELECT * FROM Banners WHERE banner_visible_home = 1";
$banner = mysql_query($query_banner, $con);
$row_banner = mysql_fetch_assoc($banner);
$totalRows_banner = mysql_num_rows($banner);


$query_seccion = "SELECT * FROM Categorias_actividades ORDER BY id_act_categoria ASC";
$seccion = mysql_query($query_seccion, $con);
$row_seccion = mysql_fetch_assoc($seccion);
$totalRows_seccion = mysql_num_rows($seccion);


$query_eventos = "SELECT * FROM Actividades WHERE act_fecha < CURDATE() ORDER BY act_fecha DESC LIMIT 4";
$eventos = mysql_query($query_eventos, $con);
$row_eventos = mysql_fetch_assoc($eventos);
$totalRows_eventos = mysql_num_rows($eventos);


$query_actualidad1 = "SELECT * FROM Recomendaciones WHERE rec_home = 1";
$actualidad1 = mysql_query($query_actualidad1, $con);
$row_actualidad1 = mysql_fetch_assoc($actualidad1);
$totalRows_actualidad1 = mysql_num_rows($actualidad1);
if($totalRows_actualidad1==0){

	$query_actualidad1 = "SELECT * FROM Recomendaciones ORDER BY id_recomendacion DESC, rec_fecha DESC";
	$actualidad1 = mysql_query($query_actualidad1, $con);
	$row_actualidad1 = mysql_fetch_assoc($actualidad1);
	$totalRows_actualidad1 = mysql_num_rows($actualidad1);
}


$query_actualidad2 = "SELECT * FROM Reflexiones WHERE ref_home = 1";
$actualidad2 = mysql_query($query_actualidad2, $con);
$row_actualidad2 = mysql_fetch_assoc($actualidad2);
$totalRows_actualidad2 = mysql_num_rows($actualidad2);
if($totalRows_actualidad2==0){

	$query_actualidad2 = "SELECT * FROM Reflexiones ORDER BY id_reflexion DESC, ref_fecha DESC";
	$actualidad2 = mysql_query($query_actualidad2, $con);
	$row_actualidad2 = mysql_fetch_assoc($actualidad2);
	$totalRows_actualidad2 = mysql_num_rows($actualidad2);
}


$query_actualidad3 = "SELECT * FROM Noticias ORDER BY id_noticia DESC, not_fecha DESC LIMIT 5";
$actualidad3 = mysql_query($query_actualidad3, $con);
$row_actualidad3 = mysql_fetch_assoc($actualidad3);
$totalRows_actualidad3 = mysql_num_rows($actualidad3);
if($totalRows_actualidad3==0){

	$query_actualidad3 = "SELECT * FROM Noticias ORDER BY id_noticia DESC, not_fecha DESC LIMIT 5";
	$actualidad3 = mysql_query($query_actualidad3, $con);
	$row_actualidad3 = mysql_fetch_assoc($actualidad3);
	$totalRows_actualidad3 = mysql_num_rows($actualidad3);
}

//Banner 1

$query_banner_1 = "SELECT * FROM Banners_index WHERE banner_ind_lugar = 1";
$banner_1 = mysql_query($query_banner_1, $con);
$row_banner_1 = mysql_fetch_assoc($banner_1);
$totalRows_banner_1 = mysql_num_rows($banner_1);

//Banner 2
$query_banner_2 = "SELECT * FROM Banners_index WHERE banner_ind_lugar = 2";
$banner_2 = mysql_query($query_banner_2, $con);
$row_banner_2 = mysql_fetch_assoc($banner_2);
$totalRows_banner_2 = mysql_num_rows($banner_2);

//Banner 3
$query_banner_3 = "SELECT * FROM Banners_index WHERE banner_ind_lugar = 3";
$banner_3 = mysql_query($query_banner_3, $con);
$row_banner_3 = mysql_fetch_assoc($banner_3);
$totalRows_banner_3 = mysql_num_rows($banner_3);

//CODIGO PARA QUE ASIGNE FORMATO LOCAL A LAS FECHAS
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
//++++++++++++++++++++

function WordLimiter($text,$limit){
	$explode = explode(' ',$text);
	$string  = '';
	$dots = '...';
	if(count($explode) <= $limit){
		$dots = '';
		}
	for($i=0;$i<$limit;$i++){
		$string .= $explode[$i]." ";
	}
	if ($dots) {
		$string = substr($string, 0, strlen($string));
		}
	return $string.$dots;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Caminos de la Libertad</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="images/favicon.ico" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="carrusel/carousel.css">
    
	<style type="text/css" media="screen">
        @import url("css/h_menu.css");
        @import url("css/index.css");
    </style>
    <script type="text/javascript" src="js/h_menu.js"></script>
    
    <!-- Google Analytics -->
    <script type="text/javascript">
    
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-21946191-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();
    
    </script>
    <!-- End Google Analytics Tracking Tag -->
</head>

<body>
  <div id="main_div">
        <div id="header_top">
            <table align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td background="images/header_1.png" style="background-repeat:no-repeat; background-position:center" width="1020px" height="267px">
                    <br />
                    	<!-- //////////////////////////////////////// TOP MENU /////////////////////////////////////////// -->
                        <div align="right" id="header_contenedor">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0" background="images/menu/menu_bg.jpg">
                              <tr>
                                <td id="icono_home">
                                  <a href="#">
                                    <img src="images/index/inicio.png" border="0" />
                                  </a>
                                </td>
                                <td>
                                  <ul id="sddm">
                                      <li>
                                          <a href="quienes_somos.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">
                                              Qui&eacute;nes<br />Somos
                                          </a>
                                          <div id="m1" 
                                              onmouseover="mcancelclosetime()" 
                                              onmouseout="mclosetime()">
                                          </div>
                                      </li>
                                      <li>
                                      		<?php if($totalRows_convocatoria_c_ensayo_abierta > 0){ ?>
                                      			<a href="convocatorias/convocatorias.php?id_convocatoria=<?php

												$convocatoria_abierta = stringSeguro($row_convocatoria_c_ensayo_abierta['id_convocatoria']);
												echo stringBack($convocatoria_abierta);
												
												?>" onmouseover="mopen('m2')" onmouseout="mclosetime()">
                                          <?php } else { ?>  
                                          	<a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">
                                          <?php } ?>
                                              Concurso<br />Ensayo
                                          </a>
                                          <div id="m2" 
                                              onmouseover="mcancelclosetime()" 
                                              onmouseout="mclosetime()">
                                              <?php while($row_concursos_ensayo = mysql_fetch_assoc($concursos_ensayo)){ ?>
                                                  <form method="post" id="link_concurso_<?php 
												  $row_concursos_ensayo1 = stringSeguro($row_concursos_ensayo['id_concurso']);
												  echo stringBack($row_concursos_ensayo1);  ?>" name="link_concurso_<?php
												  
													$row_concursos_ensayo2 = stringSeguro($row_concursos_ensayo['id_concurso']);
												  echo stringBack($row_concursos_ensayo2);?>" action="concurso_ensayos/general.php">
                                                    <input type="hidden" id="id_concurso" name="id_concurso" value="<?php

													$row_concursos_ensayo3 = stringSeguro($row_concursos_ensayo['id_concurso']);
													echo stringBack($row_concursos_ensayo3); ?>" />
                                                    <a onclick="document.getElementById('link_concurso_<?php 
													$row_concursos_ensayo4 = stringSeguro($row_concursos_ensayo['id_concurso']);
													echo stringBack($row_concursos_ensayo4);?>').submit();"><?php
													$row_concursos_ensayo5 = stringSeguro($row_concursos_ensayo['nombre']);
													echo stringBack($row_concursos_ensayo5);
													?></a>
                                                  </form>
                                              <?php	} ?>
                                          </div>
                                      </li>
                                      <li>
                                      		<?php if($totalRows_convocatoria_c_jovenes_abierta > 0){ ?>
                                      			<a href="convocatorias/convocatorias.php?id_convocatoria=<?php echo stringBack($row_convocatoria_c_jovenes_abierta['id_convocatoria'])?>" onmouseover="mopen('m3')" onmouseout="mclosetime()">
                                          <?php } else { ?>  
                                          	<a href="concurso_jovenes/index.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">
                                          <?php } ?>
                                          <!--a href="concurso_jovenes/index.php" onmouseover="mopen('m3')" onmouseout="mclosetime()"-->
                                              Concurso<br />J&oacute;venes
                                          </a>
                                          <div id="m3" 
                                              onmouseover="mcancelclosetime()" 
                                              onmouseout="mclosetime()">
                                              <?php while($row_concursos_jovenes = mysql_fetch_assoc($concursos_jovenes)){ ?>
                                                  <form method="post" id="link_concurso_<?php echo stringBack($row_concursos_jovenes['id_concurso']); ?>" name="link_concurso_<?php echo stringBack($row_concursos_jovenes['id_concurso']); ?>" action="concurso_jovenes/categoria.php">
                                                    <input type="hidden" id="id_concurso" name="id_concurso" value="<?php echo stringBack($row_concursos_jovenes['id_concurso']); ?>" />
                                                    <a onclick="document.getElementById('link_concurso_<?php echo stringBack($row_concursos_jovenes['id_concurso']); ?>').submit();"><?php echo stringBack($row_concursos_jovenes['nombre']); ?></a>
                                                  </form>
                                              <?php	} ?>
                                          </div>	
                                      </li>
                                      <li>
                                      		<?php if($totalRows_convocatoria_c_otros_abierta > 0){ ?>
                                      			<a href="convocatorias/convocatorias.php?id_convocatoria=<?php echo stringBack($row_convocatoria_c_otros_abierta['id_convocatoria'])?>" onmouseover="mopen('m6')" onmouseout="mclosetime()">
                                          <?php } else { ?>  
                                          	<a href="#" onmouseover="mopen('m6')" onmouseout="mclosetime()">
                                          <?php } ?>
                                          <!--a href="#" onmouseover="mopen('m6')" onmouseout="mclosetime()"-->
                                              Otros<br />Concursos
                                          </a>
                                          <div id="m6" 
                                              onmouseover="mcancelclosetime()" 
                                              onmouseout="mclosetime()">
                                              <?php  while($row_concursos_otros = mysql_fetch_assoc($concursos_otros)){ ?>
                                                  <form method="post" id="link_concurso_<?php echo stringBack($row_concursos_otros['id_concurso']); ?>" name="link_concurso_<?php echo stringBack($row_concursos_otros['id_concurso']); ?>" action="concurso_generico/categoria.php">
                                                    <input type="hidden" id="id_concurso" name="id_concurso" value="<?php echo stringBack($row_concursos_otros['id_concurso']); ?>" />
                                                    <a onclick="document.getElementById('link_concurso_<?php echo stringBack($row_concursos_otros['id_concurso']); ?>').submit();"><?php echo stringBack($row_concursos_otros['nombre']); ?></a>
                                                  </form>
                                              <?php	} ?>
                                          </div>	
                                      </li>
                                      <li>
                                          <a href="#" onmouseover="mopen('m4')" onmouseout="mclosetime();">
                                              Otras<br />Actividades
                                          </a>
                                          <div id="m4" 
                                              onmouseover="mcancelclosetime()" 
                                              onmouseout="mclosetime()">
                                              <a href="convocatorias/convocatorias.php?id_convocatoria=<?php echo stringBack($row_convocatoria_index['id_convocatoria']) ?>">
                                              Convocatorias
                                              </a>
                                              <?php do { ?>
                                                  <a href="otras_act.php?id_act_categoria=<?php echo stringBack($row_seccion['id_act_categoria']); ?>"><?php echo stringBack($row_seccion['act_categoria']); ?></a>
                                              <?php } while ($row_seccion = mysql_fetch_assoc($seccion)); ?>
                                          </div>
                                      </li>
                                      <li>
                                          <a href="#" onmouseover="mopen('m5')" onmouseout="mclosetime()">
                                              Actualidad
                                          </a>
                                          <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                                              <a href="recomendaciones.php">Recomendaciones [libros]</a>
                                              <a href="sitios_interes.php">Sitios de inter&eacute;s</a>
                                              <a href="reflexiones.php">Reflexiones</a>
                                              <a href="noticias.php">Noticias</a>
                                              <a href="prot_lib/index.php">Protagonistas Libertad</a>
                                          </div>
                                      </li>
                                  </ul>
                              </td>
                            </tr>
                          </table>
                        </div>
                    	<!-- //////////////////////////////////////// TERMINA TOP MENU /////////////////////////////////////////// -->
                    </td>
                </tr>
            </table>
        </div>
        <div id="content_bottom">
          <table id="content" width="940" align="center" border="0" cellpadding="0" cellspacing="0" >
            <tr>
              <td height="200px" align="center">
              	<!-- ///// SECCION BIENVENIDA-CARRUSEL //// -->
                <table width="100%">
                    <tr>
                        <td valign="top" height="90"></td>
                    </tr>
                    <tr>
                        <td valign="top" height="300" style="background-image:url(images/head_index4.jpg); background-position:bottom; background-repeat:no-repeat; width:927px; height:220px; float:middle">
                        	<!-- /////////////////////////// BIENVENIDA //////////////////////////// -->
                            <table border="0" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
                                <tr>
                                    <td colspan="2" height="10px">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="188">&nbsp;</td>
                                    <td valign="top">
                                    <br />
                                    <h2 style="color:#900" align="left">Bienvenida</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="188">&nbsp;</td>
                                    <td width="739" valign="top">
                                        <div id="intro_txt" align="left">
                                        La Libertad es uno de los bienes m&aacute;s importantes con los que contamos los seres humanos. Tiene sin duda una enorme utilidad pr&aacute;ctica. A una mayor seguridad y una mayor prosperidad. La capacidad de tomar decisiones permite a los individuos probar nuevos caminos y buscar constantemente una mejor&iacute;a.
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right">
                                        <table width="99" border="0" align="right" cellpadding="0" cellspacing="0" style="margin-right:95px; margin-top: 3px;">
                                          <tr>
                                            <td width="99" height="19" class="button_1">
                                            <a href="quienes_somos.php">Ver m&aacute;s</a>
                                            </td>
                                          </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- /////////////////////////// TERMINA BIENVENIDA //////////////////////////// -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <!-- ////////////////////////////////////////////// CARRUSEL ///////////////////////////////////////////////////////-->
                          <div id="news_rotator"> 
                          <div id="slide_holder">
                              <!-- loader -->
                              <img class="loading" src="images/ajax_loader.gif" alt="">
                              <!-- Links de los banners -->
                              <div id="banner_1">
                              <a href="<?php echo stringBack($row_banner_1['banner_ind_url'])?>" target="_self">
                              <img src="uploads/banners_carrusel/thumbs/<?php echo stringBack($row_banner_1['banner_ind_img']) ?>" width="151px" height="68px" alt="">
                              </a>
                              </div>
                              <div id="banner_2">
                              <a href="<?php echo stringBack($row_banner_2['banner_ind_url']) ?>" target="_self">
                              <img src="uploads/banners_carrusel/thumbs/<?php echo stringBack($row_banner_2['banner_ind_img']) ?>" width="151px" height="68px" alt="">
                              </a>
                              </div>
                              <div id="banner_3">
                              <a href="<?php echo stringBack($row_banner_3['banner_ind_url']) ?>" target="_self">
                              <img src="uploads/banners_carrusel/thumbs/<?php echo stringBack($row_banner_3['banner_ind_img']) ?>" width="151px" height="68px" alt="" />
                              </a>
                          	  </div>
                          </div>
                          
                          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
							<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.2/jquery-ui.min.js"></script>
                            <script src="carrusel/carousel_behavior_min.js"></script>
                            <script>
                            $('#slide_holder').agile_carousel({
                                alt_attributes: "",
                                continue_timer_after_click: "no",
                                custom_data: "custom_data/custom_data_agile_carousel3.php",
                                first_slide_is_intro: "no",
                                first_last_buttons: "no",
                                hover_next_prev_buttons: "no",
                                intro_timer_length: "5000",
                                intro_transtion: "fade",
                                next_prev_buttons: "no",
                                php_doc_location: "carrusel/make_slides.php",
                                pause_button: "no",
                                remove_content: "no",
                                slide_buttons: "yes",
                                slide_doctype: "xhtml",
                                slide_number_display: "no",
                                stop_rotate_on_hover: "yes",
                                target_attributes: "_blank,_blank,_blank",
                                timer_length: "5000",
                                transition_duration: 2000,
                                transition_easing: "swing",
                                transition_type: "fade",
                                water_mark: "no"
                            });
                            </script>
                            
                          </div>
                          <!-- ////////////////////////////////////////// TERMINA CARRUSEL //////////////////////////////////////////////////-->
                        </td>
                    </tr>
                </table>
                <!-- ///// TERMINA SECCION BIENVENIDA-CARRUSEL //// -->
              </td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                  <!-- //////////////////////////////// SECCION ACTUALIDAD-EVENTOS-BANNERS-FOOTER ///////////////////////////////// -->
                  <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="background:url(images/footer_1.png); background-position:bottom; background-repeat:no-repeat;">
                                    <tr>
                                        <td colspan="2" align="center" valign="top">
                                        	<!-- //////////////////// ACTUALIDAD-EVENTOS-BANNERS //////////////////// -->
                                            <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="57" align="center" valign="top">&nbsp;</td>
                                                  <td width="575" colspan="3" align="center" valign="top">
                                                  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td><img src="images/index/noticias.jpg" width="570" height="73" /></td>
                                                    </tr>
                                                    <tr>
                                                      <td>
                                                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <?php do{ ?>
                                                        <tr>
                                                          <td width="11%">&nbsp;</td>
                                                          <td width="13%" style="border-right:solid 1px #000; color:#F00; line-height:22px;"><?php echo strftime("%d-%m-%y", strtotime($row_actualidad3['not_fecha']));?></td>
                                                          <td width="76%" style="padding-left:15px"><a href="noticias_detalle.php?id_noticia=<?php echo stringBack($row_actualidad3['id_noticia']); ?>" style="text-decoration:none"><?php echo stringBack($row_actualidad3['not_titulo']); ?></a></td>
                                                        </tr>
                                                        <?php } while($row_actualidad3 = mysql_fetch_assoc($actualidad3));?>
                                                      </table></td>
                                                    </tr>
                                                  </table>
                                                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td><img src="images/index/recomendado.jpg" width="275" height="76" /></td>
                                                      <td><img src="images/index/reflexiones.jpg" width="275" height="76" /></td>
                                                    </tr>
                                                    <tr>
                                                      <td><table width="108%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td width="33%" rowspan="2" align="left" valign="top" style="padding-left:30px">
                                                          <img src="uploads/recomendaciones/<?php echo stringBack($row_actualidad1['rec_img']); ?>" width="65" height="95" /></td>
                                                          <td width="67%" valign="top" style="padding-right:30px"><a href="recomendaciones_detalle.php?id_recomendacion=<?php echo stringBack($row_actualidad1['id_recomendacion']); ?>" style="text-decoration:none; color:#E1002D"><?php echo stringBack($row_actualidad1['rec_titulo']); ?></a></td>
                                                        </tr>
                                                        <tr>
                                                          <td valign="top" style="padding-right:30px">
														  <span style="font-size:12px">
														  	<?php echo WordLimiter($row_actualidad1['rec_desc_corta'],17); ?>
                                                          </span>
                                                          <br />
                                                          <span style="font-size:10px">
                                                          	<a href="recomendaciones_detalle.php?id_recomendacion=<?php echo stringBack($row_actualidad1['id_recomendacion']); ?>" style="text-decoration:none; color:#E1002D">> Ver mas</a>
                                                          </span>
                                                          </td>
                                                        </tr>
                                                      </table></td>
                                                      <td valign="top" style="padding-left:50px">
                                                      <a href="reflexiones_detalle.php?id_reflexion=<?php echo stringBack($row_actualidad2['id_reflexion']); ?>" style="text-decoration:none; color:#E1002D"><?php echo stringBack($row_actualidad2['ref_titulo']); ?><br /><?php echo stringBack($row_actualidad2['ref_autor']); ?></a>
                                                      <span style="font-size:12px"><?php echo stringBack($row_actualidad2['ref_desc_corta']);?></span>
                                                      <br />
                                                      <span style="font-size:10px">
                                                          	<a href="reflexiones_detalle.php?id_reflexion=<?php echo stringBack($row_actualidad2['id_reflexion']); ?>" style="text-decoration:none; color:#E1002D">> Ver mas</a>
                                                      </span>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                  </td>
                                                  <td width="13">&nbsp;</td>
                                                  <td width="295" height="360" valign="top" style="padding-right:30px">
                                                  <!-- /////////// CONTENIDO DE LA SECCION BANNERS /////////// -->
                                                        <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                        	<tr>
                                                            	<td height="30px"></td>
                                                            </tr>
                                                            <?php do{ ?>
                                                                <tr>
                                                                    <td class="banners" align="center">
                                                                        <? 
                                                                        echo "<a href='" . stringBack($row_banner['banner_liga']) . "'>";
                                                                        echo "<img border='0' src='uploads/banners/" . stringBack($row_banner['banner_img']) . "'>";
                                                                        echo "</a>";
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            <? }while($row_banner = mysql_fetch_assoc($banner)); ?>
                                                        </table>
                                                        <!-- //////// TERMINA CONTENIDO DE LA SECCION BANNERS ////-->
                                                  </td>
                                                </tr>
                                            </table>
                                            <!-- ////////////////// TERMINA ACTUALIDAD-EVENTOS-BANNERS ////////////// -->
                                        </td>
                                    </tr>
                                    <tr>
                                      <td height="1" colspan="2" align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="2" colspan="2" align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="5" colspan="2" align="center" valign="top">
                                          <!-- //////////// SECCION CONTACTO-FACEBOOK-TWITTER //////////// -->
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="90">&nbsp;</td>
                                              <td width="311" style="background:url(images/index/contactanos.jpg); background-repeat:no-repeat; color:#666; font-size:12px; padding-left:20px;">
                                                <p>
                                                <br />
                                                <br />
                                                Perif&eacute;rico
                                                Sur #4121, Col. Fuentes del<br />Pedregal,
                                                C.P 14141, M&eacute;xico D.F.<br />
                                                T. +52 (55) 17201313 ext.36032<br />
                                                caminosdelalibertad@tvazteca.com.mx
                                                </p>
                                              </td>
                                              <td width="237" align="left" style="background:url(images/index/siguenos.jpg); background-repeat:no-repeat;"><br /><br />
                                              	<table width="100%" border="0">
  <tr>
    <td width="15%">&nbsp;</td>
    <td width="22%"><a href="http://twitter.com/cam_lib" target="_blank" style="margin-left:30px"><img src="images/index/twitter_logo.jpg" width="49" height="82" border="0" /></a></td>
    <td width="63%"><a href="http://www.facebook.com/home.php#!/pages/Caminos-de-la-Libertad/161352867228525" target="_blank"><img src="images/index/fb_logo.jpg" width="49" height="82" border="0" /></a></td>
  </tr>
</table></td>
                                              <td width="302">&nbsp;</td>
                                            </tr>
                                          </table>
                                          <!-- //////////// TERMINA SECCION CONTACTO-FACEBOOK-TWITTER //////////// -->
                                      </td>
                                    </tr>
                                   
                                    <tr>
                                      <td style="text-align: center;" valign="top">&nbsp;</td>
                                      <td align="center" valign="bottom">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <!-- ////////////////////// FOOTER ////////////////// -->
                                      <td width="160" style="text-align: center;" valign="top"><a href="http://www.gruposalinas.com" target="_blank"><img src="images/index/gpo_salinas.png" width="84" height="45" border="0" style="margin-bottom:7px;" /></a></td>
                                      <td width="777" align="center" valign="bottom">
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="52%" height="35" align="right" valign="middle">
                                                  	<a href="http://www.fomentoculturalgruposalinas.com.mx/" target="_blank">
                                                    <img src="images/fomento-cultural-GS.png" height="35" border="0" style="margin-bottom:5px; margin-left:20px" />
                                                    </a>
                                                    <a href="http://www.fundacionazteca.org/" target="_blank">
                                                    <img src="images/logo-fundacion-2011.png" height="45" border="0" style="margin-bottom:5px; margin-left:20px" />
                                                	</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="http://www.aztecanoticias.com.mx/" target="_blank">
                                                    <img src="images/azteca-noticias.png" height="45" border="0" style="margin-bottom:2px;" />
                                       	  </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                  <td width="13%" align="center" valign="middle">
                                                  &nbsp;&nbsp;&nbsp;
                                                    <a href="mapa_sitio.php" style="color:#FFF; font-family:Helvetica, Arial, 'Gill Sans'; font-size:10px;">Mapa del sitio</a></td>
                                                  <td width="12%">&nbsp;</td>
                                              <td width="22%">
                                                  <div style="position:absolute; bottom:10px; width:200px; height:95px; vertical-align:bottom;">
                                                  <a href="http://www.ricardosalinas.com/blog" target="_blank">
                                                    <img src="images/menu/salinas_site.png" align="left" border="0" />
                                                  </a>
                                                  </div>
                                              </td>
                                            </tr>
                                          </table>
                                      </td>
                                      <!-- ////////////////////// TERMINA FOOTER ////////////////// -->
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- //////////////////////////////// TERMINA SECCION ACTIVIDADES-EVENTOS-BANNERS-FOOTER ///////////////////////////////// -->
                </td>
            </tr>
          </table>
        </div>
    </div>
</body>
</html>