<?
function printAnio($a){
	if ($a){$anio=$a;}else{$anio=date("Y");}
	
	for($i=10;$i>-10;$i--){
		if ($i==0){$select='selected="selected"';}else{$select="";}
		echo '<option value="'.($anio+$i).'" '.$select.'>'.($anio+$i).'</option>';
	}
}

function printMes($m){
	if ($m){$mes=$m-1;}else{$mes  = date("m")-1;}
	$mest = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
	for($i=0;$i<12;$i++){
		if ($i==$mes){$select='selected="selected"';}else{$select="";}
		echo '<option value="'.(1+$i).'" '.$select.'>'.$mest[$i].'</option>';
	}
}

function printDia($d){
	if ($d){$dia=$d;}else{$dia  = date("j");}
	for($i=0;$i<31;$i++){
		if ($i==$dia-1){$select='selected="selected"';}else{$select="";}
		echo '<option value="'.(1+$i).'" '.$select.'>'.(1+$i).'</option>';
	}
}

function subirImgLocal ($name_media_field,$destination_dir,$tabla,$relid) {
	$tmp_name = $_FILES[$name_media_field]['tmp_name'];
	
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
	{
		$img_type  = $_FILES[$name_media_field]['type'];
		$img_file  = $name_media_field.time().'.'.str_replace("image/","",$img_type);
	
		if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg") ){
			if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
				
				$imageDim=getimagesize($destination_dir.$img_file);
				$imageRel=$imageDim[0]/$imageDim[1];

				print_r($imgeDim);
				$maxSizes=array(
					loc => array ( 
						w => 800,
						h => 350
						)
				);
				if (mysql_query("UPDATE `".$tabla."` SET `img` ='".$img_file."' WHERE `".$tabla."id`='".$relid."'")){
					foreach ($maxSizes as $key => $val) {
						
						// crea el directiorio si no existe
						if (!is_dir($destination_dir.$key)){mkdir($destination_dir.$key,0777);}
						
						$newImgRel=$val["w"]/$val["h"];
						$image_p = imagecreatetruecolor($val["w"], $val["h"]);
						$image = imagecreatefromjpeg($destination_dir.$img_file);
						
						if ($imageRel>$newImgRel){
							// dimensiones
							$H  = $val["h"];
							$W 	= $imageDim[0]*$val["h"]/$imageDim[1];
							// offsets
							$oX=-($W-$val["w"])/2;
							$oY=0;
						}else{
							// dimensiones
							$W  = $val["w"];
							$H 	= $imageDim[1]*$val["w"]/$imageDim[0];
							//ofesets
							$oY=-($H-$val["h"])/2;
							$oX=0;
						}
						
						imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,90);
						
					}
					echo '<p><img src="../include/img/content/loc/'.$img_file.'" /></p>';
				}else{'<p>no se pudo cargar la imagen</p>';}
			}
		}
	}
	
}


function subirImg ($name_media_field,$destination_dir,$tabla,$relid) {
	$tmp_name = $_FILES[$name_media_field]['tmp_name'];
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
	{
		$img_type  = $_FILES[$name_media_field]['type'];
		$img_file  = $name_media_field.time().'.'.str_replace("image/","",$img_type);
		if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg") || strpos($img_type,"gif") || strpos($img_type,"png") ){
			if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
				
				$imageDim=getimagesize($destination_dir.'/'.$img_file);
				$imageRel=$imageDim[0]/$imageDim[1];
				$maxH=600;
				$maxW=900;
				$maxSizes=array(
					big => array ( 
						w => 1300,
						h => "auto"
						),
					box => array ( 
						w => 400,
						h => "auto"
						),
					sma => array ( 
						w => 220,
						h => 250
						),
					tny => array ( 
						w => 70,
						h => 70
						),
					pmo => array ( 
						w => 820,
						h => 600
						)
				);

				if (mysql_query("UPDATE `$tabla` SET `$name_media_field` ='$img_file' WHERE `".$tabla."id`='$relid'")){
					
					foreach ($maxSizes as $key => $val) {
						
						if ($val["w"]!="auto" && $val["h"]!="auto") {
							$newImgRel=$val["w"]/$val["h"];
							$image_p = imagecreatetruecolor($val["w"], $val["h"]);
							if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
								$image = imagecreatefromjpeg($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "gif")){
								$image = imagecreatefromgif($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "png")){
								imagesavealpha($image_p, true); 
								$color = imagecolorallocatealpha($image_p,0x00,0x00,0x00,127); 
								imagefill($image_p, 0, 0, $color); 
								$image = imagecreatefrompng($destination_dir.'/'.$img_file);
							}
							if ($imageRel>$newImgRel){
								// dimensiones
								$H  = $val["h"];
								$W  = $imageDim[0]*$val["h"]/$imageDim[1];
								// offsets
								$oX =-($W-$val["w"])/2;
								$oY =0;
							}else{
								// dimensiones
								$W  = $val["w"];
								$H  = $imageDim[1]*$val["w"]/$imageDim[0];
								//ofesets
								$oY=0; // $oY=-($H-$val["h"]); center
								$oX=0;
							}
						}elseif($val["h"]=="auto" && $val["w"]=="auto"){
							$newImgRel=$imageRel;
							if ($imageRel<$maxW/$maxH){
								// dimensiones
								$W  = $imageDim[0]*$maxH/$imageDim[1];
								$H  = $maxH;
							}else{
								// dimensiones
								$W  = $maxW;
								$H  = $imageDim[0]*$maxW/$imageDim[1];
							}
							
							$image_p = imagecreatetruecolor($W, $H);
							if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
								$image = imagecreatefromjpeg($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "gif")){
								$image = imagecreatefromgif($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "png")){
								imagesavealpha($image_p, true); 
								$color = imagecolorallocatealpha($image_p,0x00,0x00,0x00,127); 
								imagefill($image_p, 0, 0, $color); 
								$image = imagecreatefrompng($destination_dir.'/'.$img_file);
							}
							
						}else{
							
							if ($val["h"]=="auto"){
								// dimensiones
								$W  = $val["w"];
								$H  = $imageDim[1]*$val["w"]/$imageDim[0];
							}elseif ($val["w"]=="auto"){
								// dimensiones
								$W  = $imageDim[0]*$val["h"]/$imageDim[1];
								$H  = $val["h"];
							}
							
							$image_p = imagecreatetruecolor($W, $H);
							if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
								$image = imagecreatefromjpeg($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "gif")){
								$image = imagecreatefromgif($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "png")){
								imagesavealpha($image_p, true); 
								$color = imagecolorallocatealpha($image_p,0x00,0x00,0x00,127); 
								imagefill($image_p, 0, 0, $color); 
								$image = imagecreatefrompng($destination_dir.'/'.$img_file);
							}
							$oY=0;
							$oX=0;
						}
						//imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagecopyresampled($image_p, $image, 0, 0, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
							imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,90);
						}elseif ( strpos($img_type, "gif")){
							imagegif( $image_p, $destination_dir.'/'.$key.'/'.$img_file);
						}elseif ( strpos($img_type, "png")){
							imagepng( $image_p, $destination_dir.'/'.$key.'/'.$img_file);
						}
						
					}
					if ($_GET["do"]=="push clase") {
						echo '<p><img src="../Includes/imgs/upoloads/aside/'.$img_file.'" /></p>';
					}elseif ($_GET["do"]=="push foto") {
						echo '<p><img src="../Includes/imgs/upoloads/thum/'.$img_file.'" /></p>';
					}
					
				}else{echo '<p>no se pudo cargar la imagen</p>';}
			}else{echo '<p>no se pudo copiar la imagen (moveUpload)</p>';}
		}else{echo '<p>No es un formato de imagen compatible (jpeg, jpg, gif, png)</p>';}
	}else{echo "<p>El directorio ($destination_dir) no existe o no se subio un archivo</p>";}
}


function subirImg1 ($name_media_field,$destination_dir,$tabla,$relid) {
	
	$tmp_name = $_FILES[$name_media_field]['tmp_name'];
	
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
	{
		$img_type  = $_FILES[$name_media_field]['type'];
		$img_file  = $name_media_field.time().'.'.str_replace("image/","",$img_type);
	
		if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg") ){
			if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
				
				$imageDim=getimagesize($destination_dir.$img_file);
				$imageRel=$imageDim[0]/$imageDim[1];

				print_r($imgeDim);
				$maxSizes=array(
					big => array ( 
						w => 1300,
						h => $imageDim[1]*1300/$imageDim[0]
						),
					box => array ( 
						w => 400,
						h => 477
						),
					sma => array ( 
						w => 220,
						h => 250
						),
					tny => array ( 
						w => 70,
						h => 70
						)
				);
				if (mysql_query("UPDATE `prenda` SET `img` ='".$img_file."' WHERE `prendaid`='".$relid."'")){
					foreach ($maxSizes as $key => $val) {
						
						// crea el directiorio si no existe
						if (!is_dir($destination_dir.$key)){mkdir($destination_dir.$key,0777);}
						
						$newImgRel=$val["w"]/$val["h"];
						$image_p = imagecreatetruecolor($val["w"], $val["h"]);
						$image = imagecreatefromjpeg($destination_dir.$img_file);
						
						if ($imageRel>$newImgRel){
							// dimensiones
							$H  = $val["h"];
							$W 	= $imageDim[0]*$val["h"]/$imageDim[1];
							// offsets
							$oX=-($W-$val["w"])/2;
							$oY=0;
						}else{
							// dimensiones
							$W  = $val["w"];
							$H 	= $imageDim[1]*$val["w"]/$imageDim[0];
							//ofesets
							$oY=0; // $oY=-($H-$val["h"]); center
							$oX=0;
						}
						
						imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,90);
						
					}
					echo '<p><img src="../include/img/content/sma/'.$img_file.'" /></p>';
				}else{echo '<p>no se pudo cargar la imagen</p>';}
			}else{echo '<p>no se pudo copiar la imagen (moveUpload)</p>';}
		}else{echo '<p>No es un formato de imagen compatible (jpeg, jpg, gif, png)</p>';}
	}else{echo "<p>El directorio ($destination_dir) no existe o no se subio un archivo</p>";}
}

function subirImg2 ($name_media_field,$destination_dir,$tabla,$relid) {
	
	$tmp_name = $_FILES[$name_media_field]['tmp_name'];
	
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
	{
		$img_type  = $_FILES[$name_media_field]['type'];
		$img_file  = $name_media_field.time().'.'.str_replace("image/","",$img_type);
	
		if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg") ){
			if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
				
				$imageDim=getimagesize($destination_dir.$img_file);
				$imageRel=$imageDim[0]/$imageDim[1];

				print_r($imgeDim);
				$maxSizes=array(
					big => array ( 
						w => 1300,
						h => $imageDim[1]*1300/$imageDim[0]
						),
					box => array ( 
						w => 400,
						h => 477
						),
					sma => array ( 
						w => 220,
						h => 250
						),
					tny => array ( 
						w => 70,
						h => 70
						)
				);
				if (mysql_query("UPDATE `".$tabla."` SET `img2` ='".$img_file."' WHERE `".$tabla."id`='".$relid."'")){
					foreach ($maxSizes as $key => $val) {
						
						// crea el directiorio si no existe
						if (!is_dir($destination_dir.$key)){mkdir($destination_dir.$key,0777);}
						
						$newImgRel=$val["w"]/$val["h"];
						$image_p = imagecreatetruecolor($val["w"], $val["h"]);
						$image = imagecreatefromjpeg($destination_dir.$img_file);
						
						if ($imageRel>$newImgRel){
							// dimensiones
							$H  = $val["h"];
							$W 	= $imageDim[0]*$val["h"]/$imageDim[1];
							// offsets
							$oX=-($W-$val["w"])/2;
							$oY=0;
						}else{
							// dimensiones
							$W  = $val["w"];
							$H 	= $imageDim[1]*$val["w"]/$imageDim[0];
							//ofesets
							$oY=0; // $oY=-($H-$val["h"]); center
							$oX=0;
						}
						
						imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,90);
						
					}
					echo '<p><img src="../include/img/content/sma/'.$img_file.'" /></p>';
				}else{echo '<p>no se pudo cargar la imagen</p>';}
			}else{echo '<p>no se pudo copiar la imagen (moveUpload)</p>';}
		}else{echo '<p>No es un formato de imagen compatible (jpeg, jpg, gif, png)</p>';}
	}else{echo "<p>El directorio ($destination_dir) no existe o no se subio un archivo</p>";}
}


function subirImgFav ($name_media_field,$destination_dir,$tabla,$relid) {
	
	$tmp_name = $_FILES[$name_media_field]['tmp_name'];
	
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
	{
		$img_type  = $_FILES[$name_media_field]['type'];
		$img_file  = $name_media_field.time().'.'.str_replace("image/","",$img_type);
	
		if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg") || strpos($img_type,"gif") || strpos($img_type,"png") ){
			if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
				
				$imageDim=getimagesize($destination_dir.$img_file);
				$imageRel=$imageDim[0]/$imageDim[1];

				print_r($imgeDim);
				$maxSizes=array(
					fav => array ( 
						w => 1000, //1020
						h => 800 // 610
						)
				);
				if (mysql_query("UPDATE `".$tabla."` SET `img` ='".$img_file."' WHERE `".$tabla."id`='".$relid."'")){
					foreach ($maxSizes as $key => $val) {
						
						// crea el directiorio si no existe
						if (!is_dir($destination_dir.$key)){mkdir($destination_dir.$key,0777);}
						
						$newImgRel=$val["w"]/$val["h"];
						$image_p = imagecreatetruecolor($val["w"], $val["h"]);
						if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
							$image = imagecreatefromjpeg($destination_dir.'/'.$img_file);
						}elseif ( strpos($img_type, "gif")){
							$image = imagecreatefromgif($destination_dir.'/'.$img_file);
						}elseif ( strpos($img_type, "png")){
							imagesavealpha($image_p, true); 
							$color = imagecolorallocatealpha($image_p,0x00,0x00,0x00,127); 
							imagefill($image_p, 0, 0, $color); 
							$image = imagecreatefrompng($destination_dir.'/'.$img_file);
						}
						
						if ($imageRel>$newImgRel){
							// dimensiones
							$H  = $val["h"];
							$W 	= $imageDim[0]*$val["h"]/$imageDim[1];
							// offsets
							$oX=-($W-$val["w"])/2;
							$oY=0;
						}else{
							// dimensiones
							$W  = $val["w"];
							$H 	= $imageDim[1]*$val["w"]/$imageDim[0];
							//ofesets
							$oY=0; // $oY=-($H-$val["h"]); center
							$oX=0;
						}
						
						imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,95);
						
					}
					echo '<p><img class="favimg" src="../include/img/content/fav/'.$img_file.'" /></p>';
				}else{'<p>no se pudo cargar la imagen</p>';}
			}else{'<p>No se pudo mover la imagen al servidor</p>';}
		}else{'<p>El archivo debe ser jpg o jpeg.</p>';}
	}else{'<p>No existe el directorio de destino o el archivo no se pudo enviar correctamente.</p>';}
	
}

?>