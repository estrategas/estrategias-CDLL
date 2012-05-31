<?
session_start();
include('libs/session.php');

if(!$_SESSION['auth'] || $_SESSION['juez']==''){
	header("Location:login.php");
}
	
$dbc=mysql_connect("localhost", "ibero1_formPost","P0STUL4C10N") or die('Cannot connect to the database because: '.mysql_error());
mysql_select_db("ibero1_formPostulacion");

$query="SELECT * FROM Puntuacion WHERE id_juez = ".$_SESSION['juez']."";
$rows = mysql_query($query) or die('<h1>'.mysql_error().'</h1');

if(mysql_num_rows($rows)){
	header("Location:CaliPost_ins.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR4/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calificación de Postulados</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	
function mostrar(actual, index){
	var $y = 0;
	$.each($('tbody').find('tr'),function(){
		
		var $tdAct = $($(this).find('.resp').get(actual - 1));
		var $td = $($(this).find('.resp').get(actual - 1 + index));
		var $thAct = $($('thead').find('tr').find('th').get(actual));
		var $th = $($('thead').find('tr').find('th').get(actual + index));
		
		if( $tdAct != $td ){
			$tdAct.hide();
		}
		if( $thAct != $th ){
			$thAct.hide();
		}
		
		$td.show();
		$th.show();
		
		if($td.html()==''){
			switch($y){
				case 0:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy buenos</option>'));
					$select.append($('<option value="4">Buenos</option>'));
					$select.append($('<option value="3">Regulares</option>'));
					$select.append($('<option value="2">Malos</option>'));
					$select.append($('<option value="1">Muy malos</option>'));
					break;
				case 1:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy buenas</option>'));
					$select.append($('<option value="4">Buenas</option>'));
					$select.append($('<option value="3">Regulares</option>'));
					$select.append($('<option value="2">Malas</option>'));
					$select.append($('<option value="1">Muy malas</option>'));
					break;
				case 2:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy alto</option>'));
					$select.append($('<option value="4">Alto</option>'));
					$select.append($('<option value="3">Regular</option>'));
					$select.append($('<option value="2">Bajo</option>'));
					$select.append($('<option value="1">Muy bajo</option>'));
					break;
				case 3:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy bueno</option>'));
					$select.append($('<option value="4">Bueno</option>'));
					$select.append($('<option value="3">Regular</option>'));
					$select.append($('<option value="2">Malo</option>'));
					$select.append($('<option value="1">Muy malo</option>'));
					break;
				case 4:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy alto</option>'));
					$select.append($('<option value="4">Alto</option>'));
					$select.append($('<option value="3">Regular</option>'));
					$select.append($('<option value="2">Bajo</option>'));
					$select.append($('<option value="1">Muy bajo</option>'));
					break;
				case 5:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy alta</option>'));
					$select.append($('<option value="4">Alta</option>'));
					$select.append($('<option value="3">Regular</option>'));
					$select.append($('<option value="2">Baja</option>'));
					$select.append($('<option value="1">Muy baja</option>'));
					break;
				case 6:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy importante</option>'));
					$select.append($('<option value="4">Importante</option>'));
					$select.append($('<option value="3">Regular</option>'));
					$select.append($('<option value="2">No tan importante</option>'));
					$select.append($('<option value="1">Nada importante</option>'));
					break;
				case 7:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy bueno</option>'));
					$select.append($('<option value="4">Bueno</option>'));
					$select.append($('<option value="3">Regular</option>'));
					$select.append($('<option value="2">Malo</option>'));
					$select.append($('<option value="1">Muy malo</option>'));
					break;
				default:
					$select = $('<select>');
					$select.append($('<option value=""></option>'));
					$select.append($('<option value="5">Muy bueno</option>'));
					$select.append($('<option value="4">Bueno</option>'));
					$select.append($('<option value="3">Regular</option>'));
					$select.append($('<option value="2">Malo</option>'));
					$select.append($('<option value="1">Muy malo</option>'));
					break;
			}
			
			$td.append($select.attr('name','resp_'+ $y +'_'+ (actual+index)).addClass('pregunta-'+(actual+index)));
			
			$select.bind('change',function(){
				var selects = $(this).attr('class');
				var resultado = selects.replace("pregunta","resultado");
				var boton = selects.replace("pregunta","boton");
				var valor = 0;
				
				$("."+boton).removeAttr("disabled");
				
				$.each($("."+selects),function(){
					valor += Number($(this).val());
					if($(this).val() == ""){
						$("."+boton).attr("disabled",true);
					}
				});
				$("."+resultado).text("("+valor+")");
			});
		}
		
		$y++;
	});
}

$(document).ready(function(){	
	mostrar(1,0);
});
</script>
<style type="text/css">
body, html {
	padding:0;
	margin:0;
	width:100%;
	height:100%;
	font-family:Calibri;
}
table {
	font-size:14px;
	width:100%;
	margin:0;
	padding:0;
}
table th {
	padding:10px;
	display:none;
	background-color:#EFEFEF;
}
table thead th, table tr.botones th, table tr.botones td {
	background-color:#222222;
	color:#F0F0F0;
}
table th.juez {
	font-size:2em;
}
table th.postulado {
	font-size:1.5em;
	font-weight:bold;
	text-align:left;
	padding-left:50px;
	color:#FFF;
}
table th.postulado span {
	color:#CCC;
	font-size:1.5em;
	margin:5px;
}
table .pregunta {
	font-weight:bold;
	text-align:left;
	display:table-cell;
	width:50%;
}
table tbody tr td {
	font-weight:bold;
	display:none;
	width:auto;
	text-align:center;
}
table tbody tr td select {
	font-size:1.2em;
	width:90%;
}
table tbody tr td.resp {
	width:50%;
}
table tfoot tr th{
	text-align:center;
	font-weight:normal;
}
form {
	padding:0;
	margin:0;
}
</style>
</head>
<body>
<img src="img/of head-pics2011_2.png" width="354" height="111" />
<div style="background-color:#C41524; width:100%; height:20px; line-height:20px; font-size:20px; color:#FFF; padding:5px 0; text-align:center;"><? echo $_GET["msg"] ?></div>
<form action="CaliPost_ins.php" method="post">
<table cellpadding="0" cellspacing="0" border="1">
	<thead>
    	<tr>
            <th class="pregunta juez"><? echo $_SESSION['usuario']; ?></th>
            <th class="postulado">1. Alberto Irezabal Vilaclara <span class="resultado-1">(0)</span></th>
            <th class="postulado">2. Christopher Anthony Gebara Rahal <span class="resultado-2">(0)</span></th>
            <th class="postulado">3. Martha Gloria García Macías <span class="resultado-3">(0)</span></th>
            <th class="postulado">4. Dora María Ruiz-Galindo Terrazas <span class="resultado-4">(0)</span></th>
            <th class="postulado">5. Valente Hipólito Parraguirre Sánchez <span class="resultado-5">(0)</span></th>
            <th class="postulado">6. Mariana Baños Reynaud <span class="resultado-6">(0)</span></th>
            <th class="postulado">7. José Ramírez Mijares <span class="resultado-7">(0)</span></th>
            <th class="postulado">8. Pedro Reyes Álvarez <span class="resultado-8">(0)</span></th>
            <th class="postulado">9. María Dolores Palencia Gómez <span class="resultado-9">(0)</span></th>
		</tr>
    </thead>
    <tbody>
    	<tr>
        	<th class="pregunta">1. Capacidad emprendedora y liderazgo de la persona postulada</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr>
        	<th class="pregunta">2. Constancia y organización de la persona postulada</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr>
        	<th class="pregunta">3. Compromiso de la persona postulada</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr>
        	<th class="pregunta">4. Fomento de la solidaridad y el servicio</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr>
        	<th class="pregunta">5. Impacto positivo logrado por los proyectos del postulado</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr>
        	<th class="pregunta">6. La creatividad de las soluciones que aporta</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr>
        	<th class="pregunta">7. Solución a un problema social prioritario</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr>
        	<th class="pregunta">8. Efecto multiplicador de las acciones del postulado</th>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
            <td class="resp"></td>
        </tr>
    	<tr class="botones">
        	<th class="pregunta"></th>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(1,0);" disabled="disabled" />
            	<input type="button" class="next boton-1" value="Siguiente Candidato >>" onclick="mostrar(1,1);" disabled="disabled" />
			</td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(2,-1);" />
                <input type="button" class="next boton-2" value="Siguiente Candidato >>" onclick="mostrar(2,1);" disabled="disabled" />
            </td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(3,-1);" />
                <input type="button" class="next boton-3" value="Siguiente Candidato >>" onclick="mostrar(3,1);" disabled="disabled" />
            </td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(4,-1);" />
                <input type="button" class="next boton-4" value="Siguiente Candidato >>" onclick="mostrar(4,1);" disabled="disabled" />
            </td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(5,-1);" />
                <input type="button" class="next boton-5" value="Siguiente Candidato >>" onclick="mostrar(5,1);" disabled="disabled" />
            </td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(6,-1);" />
                <input type="button" class="next boton-6" value="Siguiente Candidato >>" onclick="mostrar(6,1);" disabled="disabled" />
            </td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(7,-1);" />
                <input type="button" class="next boton-7" value="Siguiente Candidato >>" onclick="mostrar(7,1);" disabled="disabled" />
            </td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(8,-1);" />
                <input type="button" class="next boton-8" value="Siguiente Candidato >>" onclick="mostrar(8,1);" disabled="disabled" />
            </td>
            <td class="resp">
            	<input type="button" class="prev" value="<< Candidato Anterior" onclick="mostrar(9,-1);" />
            	<input type="submit" class="next boton-9" value="Enviar Calificaciones >>" name="enviar" disabled="disabled" />
			</td>
        </tr>
    </tbody>
</table>
</form>
</body>
</html>