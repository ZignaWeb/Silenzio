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
						w => 400,
						h => 244
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
							$oY=0;
							$oX=0;
						}
						
						imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,75);
						
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
							$oY=0; // $oY=-($H-$val["h"]); center
							$oX=0;
						}
						
						imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,90);
						
					}
					echo '<p><img src="../include/img/content/sma/'.$img_file.'" /></p>';
				}else{'<p>no se pudo cargar la imagen</p>';}
			}
		}
	}
	
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
				}else{'<p>no se pudo cargar la imagen</p>';}
			}
		}
	}
	
}

?>