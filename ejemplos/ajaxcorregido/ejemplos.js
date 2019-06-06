function grabar () {
//objeto nuevo al que cargamos los datos que el usuario puso en los inputs a los que identificamos por su ID
	var obj = {};
	obj.nombre = document.getElementById('nombre_usuario').value;
	obj.apellido = document.getElementById('ape_usuario').value;

// convertimos el objeto a formato JSON
	var parametros = JSON.stringify(obj);

// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo grabar en el servidor. OJO que se ejecuta DESPUES de grabar 
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('nombre_usuario').value = '';
			document.getElementById('ape_usuario').value = '';
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
	while(tabla.rows.length>0) tabla.deleteRow(0);
// creamos un objeto XMLRequest
	var xmlhttp = new XMLHttpRequest();

// Una funcion para ejecutar SI TODO SALIO BIEN, es decir, si se pudo leer del servidor. OJO que se ejecuta DESPUES de leer 
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
// Se supone que recibo un array de objetos donde cada item tiene dos campos. 
			for (var i = 0; i < myObj.length; i++) {
				registro = tabla.insertRow();
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].apellido;
				campo = registro.insertCell(-1);
				campo.innerHTML = myObj[i].nombre;
			}
		}
	};
	xmlhttp.open("GET", 'traer.php', true);
	xmlhttp.send();
}
