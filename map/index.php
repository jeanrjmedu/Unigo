<head>
	<title>Unigo</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="resources/map.css">
	<script src="resources/map.js"></script>
</head>

<body onload="obterMapaBase()">

<div id="header">
	<div id="btrotas" class="headerBaseButton">Rotas</div>
	<div id="bteventos" class="headerBaseButton">Eventos</div>

	
</div>	


<div id="menuRotas" class="containerSecondaryMenuDefault">
			<div class="containerTextoDropdowns textFieldDescriptionOnSecondaryMenuDefault">Selecione a origem: </div>
			<div class="containerDropdowns textFieldDescriptionOnSecondaryMenuDefault">
				<select id = "origem" class="dropsDimensionsDefault">
						<?php 
							$conn= mysqli_connect("localhost","root", "", "xthmap");
							$result = mysqli_query($conn, "SELECT nome FROM locais");
							$a=1;
							echo "<option value=\"".$a."\">Selecione</option>"; 
							while ($row = $result->fetch_assoc()){
								$a=$a+1;
								echo "<option value=\"".$a."\">".$row ["nome"]."</option>"; 
							} 
						?> 
					</select>
			</div>
			<div class="containerTextoDropdowns textFieldDescriptionOnSecondaryMenuDefault">Selecione o destino: </div>
			<div class="containerDropdowns textFieldDescriptionOnSecondaryMenuDefault">  
				<select id = "destino" class="dropsDimensionsDefault">
						<?php 
							$conn= mysqli_connect("localhost","root", "", "xthmap");
							$result = mysqli_query($conn, "SELECT nome FROM locais");
							$a=1;
							echo "<option value=\"".$a."\">Selecione</option>"; 
							while ($row = $result->fetch_assoc()){
								$a=$a+1;
								echo "<option value=\"".$a."\">".$row ["nome"]."</option>"; 
							} 
						?> 
					</select>
			</div>
			<div id="containerButtonRotas">
				<div id="rotasBotao" class="buttonOnSecondaryMenuDefault" onclick="obterRota()" >Traçar rota</div>
			</div>
</div>


		
<div id="maparea">
	<svg id="map" version="1.0" xmlns="http://www.w3.org/2000/svg" width="100" height="320pt"  viewBox="0 0 4004 1404" > </svg>
</div>


<div id="footer"></div>
</body>