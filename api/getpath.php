<?php //NAVIGATION PATH

class vertice {

    var $nome;
    var $x;
	var $y;
	var $corredores;
	
    function vertice($nome, $x, $y, $corredor1, $corredor2)
    {
        $this->nome = $nome;
        $this->x = $x;
		$this->y = $y;
		$this->corredores = array($corredor1, $corredor2);
    }
}


function chegou ($v, $coredorDestino) 
{

	
	for ($a=0; $a<2; $a++)
	{
		
	if ($v->corredores[$a]==$coredorDestino)
	{
		
		return true;
		
	}
	}
	return false;
}

function Heuristica ($destinox, $destinoy, $v) 
{
	$disX = $destinox-$v->x;
		$disY = $destinoy-$v->y;
		if ($disX < 0)
		{
			$disX = $disX*-1;
		}
		if ($disY < 0)
		{
			$disY = $disY*-1;
		}
		return $disY+$disX;
}

function VerticeToIndex ($v, $arr)
{ //	converte o index vertices[] para o index correspondente da estrutura de controle []
	for ($j = 0; $j< count($arr); $j++)
	{
		if ($arr[$j] == $v)
		{
			return $j;
		}
	}
	return null;
}

function ja_adicionado ($v, $arr)
{
	for ($j = 0; $j< count($arr); $j++)
	{
		//echo "<br>".$arr[$j]."=".$v;
		if ($arr[$j] == $v)
		{
			return true;
		}
	}
	return false;
}




//GRAPH VERTICES (VERICE NAME, X, Y, INTERSCT1, INTERSECT2) <-ONLY USED ON DRAWING
$vertices = array (
new vertice ("B1L1-ENT", 182, 1142, "B1L1", "ENT"), 
new vertice ("B1L1-B1B4L1", 1707, 1142, "B1L1", "B1B4L1"), 
new vertice ("B1B4L1-B4L1", 1707, 697, "B4L1", "B1B4L1"), 
new vertice ("B4L1-B4L2", 1794, 697, "B4L1", "B4L2"), 
new vertice ("B4L1-B4B5L1", 1584,697, "B4L1", "B4B5L1"), 
new vertice ("B4B5L1-B4B5L1B", 1584,476, "B4B5L1B", "B4B5L1"), 
new vertice ("B4B5L1-B5L1", 1584,28, "B5L1", "B4B5L1"), 
new vertice ("B5L1-B5B3L1", 1387,28, "B5L1", "B5B3L1"), 
new vertice ("B5L1-B5BBTL1", 3920,28, "B5L1", "B5BBTL1"));

//GRAPH NEIGHBORS (WHERE -1 IS NOT AN NEIGHBOR) <- USED ON PATHFINDING
$grafo = array (
array (-1,1525,-1,-1,-1,-1,-1,-1,-1),
array (1525,-1,445,-1,-1,-1,-1,-1,-1),
array (-1,445,-1,85,123,-1,-1,-1,-1),
array (-1,-1,85,-1,-1,-1,-1,-1,-1),
array (-1,-1,123,-1,-1,221,-1,-1,-1),
array (-1,-1,-1,-1,221,-1,448,-1,-1),
array (-1,-1,-1,-1,-1,448,-1,197,2336),
array (-1,-1,-1,-1,-1,-1,197,-1,-1),
array (-1,-1,-1,-1,-1,-1,2336,-1,-1)
);


//REQUEST PARAMETERS
$origem = $_GET["org"];
$destino = $_GET["dst"];

$conn= mysqli_connect("localhost","root", "", "xthmap");
///GET ORIGEM PROPERTIES FROM DB
$result = mysqli_query($conn, "SELECT vertic, cordX, cordY, bloco FROM locais WHERE nome = '$origem'");
$row = mysqli_fetch_row ($result); 
$origemVertice = intval($row[0]);
$origemx = $row [1];
$origemy = $row [2];
$origemcorredor = $row [3];

///GET DESTINO PROPERTIES FROM DB
$result = mysqli_query($conn, "SELECT bloco, cordX, cordY FROM locais WHERE nome = '$destino'");
$row = mysqli_fetch_row ($result); 
$destinox = $row [1];
$destinoy = $row [2];
$destinocorredor = $row [0];
mysqli_close ($conn);


//DECLARE NAVIGATION STRUCTURE FOR A*
$vert = array();  
$aberto = array (true);
$anterior = array (null);
$anteriorIndex = array (-666);
$distancia = array (0);
$distanciaG = array (999999);

//DECLARE NAVIGATION VARIABLES FOR A*			
$atual = $origemVertice;
$atualIndex =0;
$tam = count ($grafo);
$encontrou = false;


//A* START

if ($origemcorredor==$destinocorredor) //detectando se elementos ficam no mesmo corredor. 
{
			$encontrou = true;

}else {
  			array_push($vert, $origemVertice); //senão declara primeiro elemento do $vert
}
//detecta se corrdor origem e corrdor destino são conectados pelo mesmo vertice, o que torna inutil fazer o A*
if ($vertices[$origemVertice]->corredores[0]==$destinocorredor or $vertices[$origemVertice]->corredores[1]==$destinocorredor){
	 $encontrou = true;
}

while (!$encontrou)
{ 
	for ($i=0; $i< $tam; $i++)
	{
		
		
		if ($grafo[$atual][$i] != -1)
		{
			
			
		if (!ja_adicionado($i, $vert))
		{
			array_push($vert, $i);
			array_push($aberto, true);
			array_push($anterior, $atual);
			array_push($anteriorIndex, $atualIndex);
			
			array_push($distancia, $grafo[$atual][$i]+$distancia[$atualIndex]);
			
			array_push($distanciaG, $distancia[VerticeToIndex($i, $vert)]+Heuristica ($destinox, $destinoy, $vertices[$i]));
		
		} else if (ja_adicionado($i, $vert) && $aberto[VerticeToIndex($i, $vert)]) //se ja existe e esta aberto
		{
			$novoDistancia = $grafo[$atual][$i]+$distancia[$atualIndex];
			$novoDistanciaG = $novoDistancia + Heuristica ($destinox, $destinoy, $vertices[$i]);
			$indexCtrl = VerticeToIndex($i, $vert);
			
			if ($novoDistanciaG < $distanciaG[$indexCtrl])
			{
				$distancia [$indexCtrl] = $novoDistancia;
				$distanciaG [$indexCtrl] = $novoDistanciaG;
				$anterior [$indexCtrl] = $atual;
				$anteriorIndex [$indexCtrl] = $atualIndex;
			}
		}
	
	if (chegou($vertices[$i], $destinocorredor))
		{
			$encontrou = true;
			break;
			
		} 
		}
		
	}
	
	if (!$encontrou)
	{

	$aberto [$atualIndex] = false;
	$menorG = PHP_INT_MAX;
	$menorIndex = 0;
	for ($k=0; $k<count($vert); $k++)
	{
		if ($distanciaG[$k]<$menorG and $aberto[$k]==true)
		{
			$menorG= $distanciaG[$k];
			$menorIndex= $k;
		}	
	}
	$atual = $vert[$menorIndex];
	$atualIndex = $menorIndex;
	}
}

//CRIA ARRAY ORDENADO
//Se destino e origem são no mesmo corredor (definido antes do A*) não existe $caminhada pois não e necessario adicionar vertices conectores
//Se existir conectados por um unico vertice(o de saida) este ja vai ter sido adicionado a estrutura  
if (!empty($vert)) { 
	$caminhada = array ($vert[count($vert)-1]); 
	$atualr = $anteriorIndex[count($vert)-1];

	while ($atualr !=-666)
	{
		array_push($caminhada, $vert[$atualr]);
		$atualr = $anteriorIndex[$atualr];
	}
} 



//////////////////CRIA JSON
echo " { \"path\": [";
echo "{\"x\":".$destinox.",\"y\":".$destinoy."}"; //marca xy do destino para desenho

//Se destino e origem são no mesmo corredor (definido antes do A*) não existe $caminhada pois não e necessario adicionar vertices conectores    
if (!empty($vert)){ 
	$g=0;
	while (true)
	{
		echo ",{\"x\":".$vertices[$caminhada[$g]]->x.", \"y\":".$vertices[$caminhada[$g]]->y."}"; //marca xy dos vertices conectando para desenho
		
		//desenhou até o corredor destino e não passou duas vezes por ele
		if ($vertices[$caminhada[$g]]->corredores[0]==$origemcorredor or $vertices[$caminhada[$g]]->corredores[1]==$origemcorredor) 
		{	
				break;
		} 
		$g+=1;
	}
}
echo ",{\"x\":".$origemx.", \"y\":".$origemy."}"; //marca xy da origem para desenho
echo "]} ";

?>