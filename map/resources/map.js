
function obterMapaBase(){
	desenharTracado();
	desenharMarcadores();
}

function desenharMarcadores(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = ()=>{
		if (this.readyState == 4 && this.status == 200) {

			locais = JSON.parse (this.responseText);
			var i=1; 
			var f; 

			for (f = 0; f < locais.locaisxy.length; f++) { 
				
				var myrect = document.getElementById('map');
				var newLine = document.createElementNS('http://www.w3.org/2000/svg','circle');
				newLine.setAttribute('id','line2'+f);
				newLine.setAttribute('cx', locais.locaisxy[f].x);
				newLine.setAttribute('cy', locais.locaisxy[f].y);
				newLine.setAttribute('r', 3);
				newLine.setAttribute('style','stroke:rgba(83,194,219,1);stroke-width:2;fill:rgb(83,194,219,1)');
				myrect.append(newLine);
				
				var myrect = document.getElementById('map');
				var newLine = document.createElementNS('http://www.w3.org/2000/svg','line');
				newLine.setAttribute('id','line2'+i);
				newLine.setAttribute('x1', locais.locaisxy[f].x);
				newLine.setAttribute('y1',locais.locaisxy[f].y);
				newLine.setAttribute('x2',locais.locaisxy[f].x-30);
				newLine.setAttribute('y2',locais.locaisxy[f].y+40);
				newLine.setAttribute('style','stroke:rgba(83,194,219,1);stroke-width:3;fill:rgb(52,229,126)');
				myrect.append(newLine);

				var newText = document.createElementNS('http://www.w3.org/2000/svg',"text");
				newText.setAttributeNS(null,"x",locais.locaisxy[f].x-45);     
				newText.setAttributeNS(null,"y",locais.locaisxy[f].y+49); 
				newText.setAttributeNS(null,"font-size","12");
				newText.setAttributeNS(null,"style","fill:rgba(1,1,1,1)");
				var textNode = document.createTextNode(locais.locaisnomes[f].nome);
				newText.appendChild(textNode);
				myrect.append(newText);

			}
		}
	};
	xmlhttp.open("GET", "../api/getmarkers.php", false);
	xmlhttp.send();
}
 

function desenharTracado(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = ()=>{
		if (this.readyState == 4 && this.status == 200) {

			document.getElementById('maparea').innerHTML= this.responseText;
					
		}
	};
	xmlhttp.open("GET", "../api/getbasemap.php", false);
	xmlhttp.send();
}

function obterRota(){
	var orig = document.getElementById("origem");
	var valor1 = orig.options[orig.selectedIndex].text;
	var dest = document.getElementById("destino");
	var valor2 = dest.options[dest.selectedIndex].text;
	desenharTracado();

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = ()=>{
		if (this.readyState == 4 && this.status == 200) {

			arestas = JSON.parse (this.responseText);
					
			//DESENHA CIRCULOS DOS VERTICES
			var c; 
			for (c = 1; c < arestas.path.length-1; c++) { 
			var myrect = document.getElementById('map');
			var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
			newLine.setAttribute('id','line2'+c);
			newLine.setAttribute('cx', arestas.path[c].x);
			newLine.setAttribute('cy', arestas.path[c].y);
			newLine.setAttribute('r', 7);
			newLine.setAttribute('style','stroke:rgba(52,229,126,6);stroke-width:15;fill:rgb(52,229,126)');
			myrect.append(newLine);

			}


			//DESENHA LINHASDO CAMINHO
			var i; 
			for (i = 0; i < arestas.path.length-1; i++) { 

			var myrect = document.getElementById('map');
			var newLine =document.createElementNS('http://www.w3.org/2000/svg','line');
			newLine.setAttribute('id','line2'+i);
			newLine.setAttribute('x1', arestas.path[i].x);
			newLine.setAttribute('y1', arestas.path[i].y);
			newLine.setAttribute('x2', arestas.path[i+1].x);
			newLine.setAttribute('y2', arestas.path[i+1].y);
			newLine.setAttribute('style','stroke:rgb(52,229,126);stroke-width:29');
			myrect.append(newLine);
			}


			//DESENHA CIRCULO DESTINO

			var myrect = document.getElementById('map');
			var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
			newLine.setAttribute('id','line2');
			newLine.setAttribute('cx', arestas.path[arestas.path.length-1].x);
			newLine.setAttribute('cy',arestas.path[arestas.path.length-1].y);
			newLine.setAttribute('r', 15);
			newLine.setAttribute('style','stroke:rgba(52,229,126,1);stroke-width:25;fill:rgba(52,229,126,1)');
			myrect.append(newLine);


			//DESENHA CIRCULO ORIGEM		
			var myrect = document.getElementById('map');
			var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
			newLine.setAttribute('id','line2');
			newLine.setAttribute('cx', arestas.path[0].x);
			newLine.setAttribute('cy',arestas.path[0].y);
			newLine.setAttribute('r', 15);
			newLine.setAttribute('style','stroke:rgba(44,193,106, 1);stroke-width:25;fill:rgba(44,193,106, 1)');
			myrect.append(newLine);

			desenharMarcadores();
							
		}
	};
	xmlhttp.open("GET", "../api/getpath.php?op=2&org="+valor1+"&dst="+valor2, true);
	xmlhttp.send();
}
