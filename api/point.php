<?php //MARKING

$f = $_GET["org"];
	$conn= mysqli_connect("localhost","root", "", "xthmap");
	$result = mysqli_query($conn, "SELECT cordX, cordY FROM locais WHERE nome = '$f'");
	$row = mysqli_fetch_row ($result); 
	$xm = $row [0];
	$ym= $row [1];
?>
 <script type="text/javascript">
	xm = <?php echo $xm;?>;
	ym = <?php echo $ym;?>;
	</script>