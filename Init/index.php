<?php


$conn= mysqli_connect("localhost","root", "");

$sql = "CREATE DATABASE IF NOT EXISTS xthmap;";
if (mysqli_query($conn, $sql)){ echo "Sucesso";}else {echo "Deu ruim";} 

$sql = "use xthmap;";
if (mysqli_query($conn, $sql)){ echo "Sucesso";}else {echo "Deu ruim";} 

$sql = "CREATE TABLE IF NOT EXISTS locais (id int(255) NOT NULL AUTO_INCREMENT, nome varchar(255) NOT NULL, bloco varchar(255) NOT NULL, vertic int(255) NOT NULL, cordX int(255) NOT NULL, cordY int(255) NOT NULL, PRIMARY KEY (id))";
if (mysqli_query($conn, $sql)){ echo "locais sucesso";}else {echo "locais ruim";} 

///B1L1
$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 101', 'B1L1', 0 , 202, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 102', 'B1L1', 0, 449, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 1NA', 'B1L1', 0, 640, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 103', 'B1L1', 0, 886, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 104', 'B1L1', 0, 1127, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 105', 'B1L1', 0, 1374, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 106', 'B1L1', 0, 1416, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 1NA2', 'B1L1', 0, 1620, 1142)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

//B1B4L1
$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 107', 'B1B4L1', 2, 1707, 976)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 110', 'B1B4L1', 2, 1707, 900)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 111', 'B1B4L1', 2, 1707, 1164)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

//B4L1
$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 101', 'B4L1', 2, 1680, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 102', 'B4L1', 2, 1878, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 109', 'B4L1', 2, 1926, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 103', 'B4L1', 2, 2121, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 104', 'B4L1', 2, 2367, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 105', 'B4L1', 2, 2604, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 106', 'B4L1', 2, 2848, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 107', 'B4L1', 2, 3104, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 108', 'B4L1', 2, 3172, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4 1NA', 'B4L1', 2, 3630, 697)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

//B4B5L1

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B1 108', 'B4B5L1', 4, 1584, 732)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4B5 1NA', 'B4B5L1', 4, 1584, 732)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

//B4B5L1B
$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4B5L1B BWCM', 'B4B5L1B', 3, 1204, 476)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B4B5L1B BWCF', 'B4B5L1B', 3, 1408, 476)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

//B5L1
$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 101', 'B5L1', 7, 1431, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B2 105', 'B5L1', 7, 1458, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 102', 'B5L1', 7, 1878, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 103', 'B5L1',7 , 2118, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 104', 'B5L1', 7, 2361, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 105', 'B5L1', 7, 2600, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 106', 'B5L1',7 , 2856, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 107', 'B5L1', 7, 3093, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 108', 'B5L1', 7, 3327, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 109', 'B5L1', 7, 3565, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO locais (nome, bloco, vertic, cordX, cordY) VALUES ('B5 110', 'B5L1', 7, 3800, 28)";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 



//////////////////////////////EVENTOS
$sql = "CREATE TABLE IF NOT EXISTS eventos (id int(255) NOT NULL AUTO_INCREMENT, nome varchar(255) NOT NULL, sala varchar(255) NOT NULL, data varchar(255) NOT NULL, hora varchar(255) NOT NULL, passou varchar(255) NOT NULL,PRIMARY KEY (id))";
if (mysqli_query($conn, $sql)){ echo "eventos sucesso";}else {echo "eventos ruim";} 

$sql = "INSERT INTO eventos (nome, sala, data, hora, passou) VALUES ('Palestra sobre crise do software', 'B5 109', '29/07/2019', '20:00', 'false')";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

$sql = "INSERT INTO eventos (nome, sala, data, hora, passou) VALUES ('Fabricio apresenta: Pipeline', 'B5 109', '12/09/2019', '19:00', 'false')";
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 

/////////////////////////////////SUGESTAO
$sql = "CREATE TABLE IF NOT EXISTS sugestao (id int(255) NOT NULL AUTO_INCREMENT, nome varchar(255) NOT NULL, sala varchar(255) NOT NULL, data varchar(255) NOT NULL, hora varchar(255) NOT NULL, PRIMARY KEY (id))";
if (mysqli_query($conn, $sql)){ echo "sugestao sucesso";}else {echo "sugestao ruim";} 

mysqli_close ($conn);


?>