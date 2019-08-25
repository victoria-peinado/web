
function grabar () {
//objeto nuevo al que cargamos los datos que el usuario puso en los inputs a los que identificamos por su ID
	var obj = {};
	obj.nombre = document.getElementById('nombre_elemento').value;
	obj.estado= document.getElementById('estado').value;
	obj.tipo = document.getElementById('tipo').value;

// convertimos el objeto a formato JSON
	var parametros = JSON.stringify(obj);

// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo grabar en el servidor. OJO que se ejecuta DESPUES de grabar 
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('nombre_elemento').value = '';
			document.getElementById('estado').value = 'Finalizado';
			document.getElementById('tipo').value = 'Anime';
			leer();
		}
	};
// Que hacer el usuario manda a grabar
	xmlhttp.open("POST", "grabar.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + parametros); 
}



function leer () {
//Esta funcion va a leer todo lo que este almacenado en la base de datos y lo coloca en una tabla
	var tabla = document.getElementById('mostrar');
//vaciamos la tabla
	while(tabla.rows.length>1) tabla.deleteRow(1);
	

				
    var nombre = document.getElementById("search").value;
    var tipo = document.getElementById("stipo").value;
	var estado = document.getElementById("sestado").value;
    var orden = document.getElementById("orden").value;	
    var vars = "nombre="+nombre+"&tipo="+tipo+"&orden="+orden+"&estado="+estado;
	

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
				campo.innerHTML = myObj[i].nombre;
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].estado;
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].tipo;
				//muestro el id
				//campo = registro.insertCell(-1);
				//campo.innerHTML = myObj[i].id;
				//creo imagen para editar
				campo = registro.insertCell(-1);
				var imagen = document.createElement("img");
				imagen.src="imagenes/edit.png";
				imagen.addEventListener ("click", function() {
				alert("funcion editar pendiente");
				});
				imagen.height="15";
				imagen.style.paddingRight  ="10px";
				campo.appendChild(imagen);
				//var espacio = document.createElement("div");
				//espacio.height="15";
				//campo.appendChild(espacio);
				var imagen2 = document.createElement("img");
				imagen2.src="imagenes/delete.png";
				imagen2.addEventListener ("click", function() {
				alert("funcion eliminar pendiente ");
				});
				imagen2.height="15";
				imagen2.style.paddingRight  ="10px";
				campo.appendChild(imagen2);
				
				var imagen3 = document.createElement("img");
				imagen3.src="imagenes/save.png";
				imagen3.addEventListener ("click", function() {
				alert("funcion agregar a lista pendiente");
				});
				imagen3.height="15";
				campo.appendChild(imagen3);
				
				/*//creo un boton
				var button = document.createElement("button");
				button.innerHTML = "Editar";
				
				campo = registro.insertCell(-1);
				campo.appendChild(button);

				// 3. Add event handler
				button.addEventListener ("click", function() {
				//alert("did something");
				});*/
				
			}
		}
	};
	xmlhttp.open("POST", "traer.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp.send( vars );
}
