<?php
// Send the headers
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');

$tabla="musica";
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

echo '<musicbox>
<song>
		<name>Audio 9</name>
		<file>http://www.silenzio.com.ar/nueva/include/mp3/9.mp3</file>
	</song>
	<song>
		<name>Audio 6</name>
		<file>http://www.silenzio.com.ar/nueva/include/mp3/6.mp3</file>
	</song>
</musicbox>';

?>