<?php ////////////////////////////////////////////////////////////////////////////////////DEMARCAÇÕES PADRÃO NO MAPA <PHP/JS>
$conn= mysqli_connect("localhost","root", "", "xthmap");
$result = mysqli_query($conn, "SELECT nome, cordX, cordY FROM locais");

$d=0;
echo "{ \"locaisxy\" : [";

	while ($row = $result->fetch_assoc())
	{
		if ($d>0) {echo",";}
	echo "{\"x\":".$row ["cordX"].",\"y\":".$row ["cordY"]."}";
	$d+=1;
	}
echo "], ";

$l=0;
echo "\"locaisnomes\": [";
$result = mysqli_query($conn, "SELECT nome, cordX, cordY FROM locais");
while ($row = $result->fetch_assoc()){
	if ($l>0) {echo",";}
	 echo "{\"nome\":\"". $row ["nome"]."\"}"; 
	$l+=1;
	}
echo "]} ";



mysqli_close ($conn);
?>
