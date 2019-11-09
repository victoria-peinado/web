
function grabar () {
//objeto nuevo al que cargamos los datos que el usuario puso en los inputs a los que identificamos por su ID
	var obj = {};
	obj.nombre = document.getElementById('nombre_lista').value;
	obj.uid= document.getElementById('uid').value;
	

// convertimos el objeto a formato JSON
	var parametros = JSON.stringify(obj);
	

// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo grabar en el servidor. OJO que se ejecuta DESPUES de grabar 
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('nombre_lista').value = '';
			
			leerlistas();
		}
	};
// Que hacer el usuario manda a grabar
	xmlhttp.open("POST", "grabarlista.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + parametros); 
}
/** 
function eliminar (a)
{
	var obj=a.id;
	
	// convertimos el objeto a formato JSON
	var parametros = JSON.stringify(obj);
	

// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo grabar en el servidor. OJO que se ejecuta DESPUES de grabar 
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			leer();
			
		}
	};
// Que hacer el usuario manda a eliminar
	xmlhttp.open("POST", "eliminar_elemento.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + parametros);
	
	
}
function editar (a)
{	
  
	var obj=a.id;
	
var queryString = "?id=" + obj;	
window.location.href = "../biblioteca/editar/editando.php" + queryString;

	
	
}
*/

function leerlistas () {
	var tabla = document.getElementById('mostrar_listas');
	while(tabla.rows.length>1) tabla.deleteRow(1);
	// creamos un objeto XMLRequest
	
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo leer del servidor. OJO que se ejecuta DESPUES de leer 
	xmlhttp.onreadystatechange = function() {

		
		if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
				// Se supone que recibo un array de objetos donde cada item tiene tres campos. 
			for (var i = 0; i < myObj.length; i++) {
				registro = tabla.insertRow();

				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].nombre; //celda con el nombre
							
				//campo = registro.insertCell(-1);
				//campo.innerHTML = myObj[i].usuario_id;//celda con el uid
				//muestro el id
				//campo = registro.insertCell(-1);
				//campo.innerHTML = myObj[i].id;
							
			}
		}
	};
	xmlhttp.open("POST", "traer.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	
}
function leer () {
leerlistas();



//Esta funcion va a leer todo lo que este almacenado en la base de datos y lo coloca en una tabla
var tabla = document.getElementById('mostrar');
//vaciamos la tabla
	while(tabla.rows.length>1) tabla.deleteRow(1);
	

	//valores de los filtros 			
    var nombre = document.getElementById("search").value;
    var tipo = document.getElementById("stipo").value;
	var uid = document.getElementById("suid").value;
    var orden = document.getElementById("orden").value;	
    var vars = "nombre="+nombre+"&tipo="+tipo+"&orden="+orden+"&uid="+uid;
	

// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo leer del servidor. OJO que se ejecuta DESPUES de leer 
	xmlhttp.onreadystatechange = function() {

		
		if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
// Se supone que recibo un array de objetos donde cada item tiene tres campos. 
			for (var i = 0; i < myObj.length; i++) {
				registro = tabla.insertRow();
			
			
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].nombre; //celda con el nombre
				
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].uid;//celda con el uid
				
			
				
				//muestro el id
				//campo = registro.insertCell(-1);
				//campo.innerHTML = myObj[i].id;
				
				
				campo = registro.insertCell(-1); //creo una columna en la que meto tres imagenes que llaman funciones
				campo.id=myObj[i].id;
				var imagen = document.createElement("img",myObj[i].id); //imagen que llama a la funcion editar
				imagen.src="imagenes/edit.png";
				
				imagen.addEventListener ("click", function() {editar(this.parentNode);},false);
				imagen.height="15";
				imagen.style.paddingRight  ="10px";
				campo.appendChild(imagen);
				

				var imagen2 = document.createElement("img",{name: myObj[i].id});// imagen que llama a la funcion eliminar
				imagen2.src="imagenes/delete.png";
				//imagen2.name =myObj[i].id;
				imagen2.addEventListener ("click",  function(){eliminar(this.parentNode)},false);
				imagen2.height="15";
				imagen2.style.paddingRight  ="10px";
				campo.appendChild(imagen2);
				
				var imagen3 = document.createElement("img");//imagen que llama a la funcion agregara a lista
				imagen3.src="imagenes/save.png";
				imagen3.addEventListener ("click", function() {alert(this.parentNode.id);});
				imagen3.height="15";
				campo.appendChild(imagen3);
				

				
			}
		}
	};
	xmlhttp.open("POST", "traer.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp.send( vars );
}