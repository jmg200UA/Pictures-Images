function validarLogin(){
	let nombre = document.getElementById("nombre").value;
	let contraseña = document.getElementById("contraseña").value;
	let bool=1;
	let bool2=1;

	/*if(nombre != " " && nombre != "\t"){
		alert("Ok");
		window.location.href="UsuRegistrado.html";
	} 
	else{
		alert("Error");
		window.location.href="index.html";
	} */

	for (var i=0; i<nombre.length; i++){
        if(nombre[i]!=" "){
			bool=2;
			break;
        }
    }

    for (var i=0; i<contraseña.length; i++){
        if(contraseña[i]!=" "){
			bool2=2;
			break;
        }
    }

    if(bool==1 || bool2==1){
		alert("Error. Uno de los campos está vacío o contiene solamente espacios en blanco");
		document.querySelector('#clickinicio').setAttribute('action', "index.html");
    }
    else document.querySelector('#clickinicio').setAttribute('action', "UsuRegistrado.html");
}

function validarRegistro(){
	let nombre = document.getElementById("nombre").value;
	let boolnombre=1;
	let contraseña = document.getElementById("contraseña").value;
	let contramayus=1;
	let contraminus=1;
	let contranum=1;
	let repetircontraseña = document.getElementById("repetir").value;
	let correo = document.getElementById("email").value;

	if(nombre.length>2 && nombre.length<16){
		for (var i=0; i<nombre.length; i++){
	        if(nombre.charCodeAt(i)>=48 && nombre.charCodeAt(i)<=57){
	        	alert("Error.");
				break;
	        }
	        else{
	        	if((nombre.charCodeAt(i)>=65 && nombre.charCodeAt(i)<=90) || (nombre.charCodeAt(i)>=97 && nombre.charCodeAt(i)<=122) || (nombre.charCodeAt(i)>=48 && nombre.charCodeAt(i)<=57)){

	        	}
	        	else{
	        		alert("Error.");
	        		break;
	        	}
	        }
	    }
	}	
	else{
		alert("Error. Tamaño incorrecto");
	}
		

    for (var i=0; i<contraseña.length; i++){
        
        if((contraseña.charCodeAt(i)>=65 && contraseña.charCodeAt(i)<=90) || (contraseña.charCodeAt(i)>=97 && contraseña.charCodeAt(i)<=122) || (contraseña.charCodeAt(i)>=48 && contraseña.charCodeAt(i)<=57) || contraseña[i]=="_" || contraseña[i]=="-"){
        	if(contraseña.charCodeAt(i)>=65 && contraseña.charCodeAt(i)<=90) contramayus=2;
        	if(contraseña.charCodeAt(i)>=97 && contraseña.charCodeAt(i)<=122) contraminus=2;
        	if(contraseña.charCodeAt(i)>=48 && contraseña.charCodeAt(i)<=57) contranum=2;
        }
        else{
        	alert("Error. Caracter inválido");
        	break;
        }
    }
    if(contramayus==2 && contraminus==2 && contranum==2 && contraseña.length>5 && contraseña.length<16){
    	console.log("Minus: " + contraminus);
    	console.log("Mayus: "+ contramayus);
    	console.log("Num: " + contranum);
    	console.log("longitud: "+ contraseña.length);
    	alert("OK");
    }
    else{
    	console.log("Minus: " + contraminus);
    	console.log("Mayus: "+ contramayus);
    	console.log("Num: " + contranum);
    	console.log("longitud: "+ contraseña.length);
    	alert("Error. No cumple los parametros");
    }


    if(contraseña!=repetircontraseña || repetircontraseña.length<=5 || repetircontraseña.length>=16){
    	alert("Error. Las contraseñas no son iguales");
    }
    else{
    	alert("Contraseñas OK");
	}
	
	var optForm = document.forms["formulario"]["sexo"].selectedIndex;
	console.log("Valor select" + optForm);
	if( optForm == null || optForm == 0 ) {
		alert("Error. Debes seleccionar una opción en el campo 'Sexo'");
	}
	else alert("OK, valor correcto para el campo sexo");

	/*var sexo=document.getElementById("sexo");
	if(sexo!=0) alert("OK sexo");
	else alert("ERROR sexo");
	console.log("Valor sexo" + sexo);*/

	
	var input = document.getElementById("fecha").value;
	let date = new Date(input);

	let dia = date.getDate();
	let mes = date.getMonth() + 1;
	let anyo = date.getFullYear();

	console.log("Valor dia" + dia);
	console.log("Valor mes" + mes);
	console.log("Valor anyo" + anyo);


	if(input.length>0){
		if(mes==2 && dia > 28){
			alert("Error, has introducido mal la fecha");
		}else{
			if((dia<1 || dia>31) || (mes<1 || mes>12) || (anyo>2020)){
				alert("Error, has introducido mal la fecha");
			}else{
				alert("Fecha ok");
			}
		}
	}
	else alert("ERROR, introduce valor para la fecha");
		

	if(correo.length == 0 || correo.length>254){
		alert("Error, introduce los valores correctamente");
	}else{
		var cad = correo.split("@");
		if(cad.length == 1){
			alert("Error, introduce los valores correctamente");
		}else{
			//parte local
			if(cad[0]>0 && cad[0]<65){
				var long = cad[0].length;
				for(var i=0;i<long;i++){
					if(cad[i]=="." || cad[long]=="."){
						alert("Error, introduce los valores correctamente");
						break;
					}
					if(cad[i]=="." && cad[i+1]=="."){
						alert("Error, no pueden haber dos puntos seguidos");
					}
				}
			}
			if(cad[1]>0 && cad[1] < 256){
				var dom = cad[1].split(".");
				var longdom = dom[0].length;
				for(var i=0;i<longdom;i++){
					var subdom = dom[i].split(".");
					var longsub = subdom[i].length;
					if(longsub > 63){
						alert("Error, introduce los valores correctamente");
					}
					if(subdom[i]=="." || subdom[long]=="."){
						alert("Error, introduce los valores correctamente");
						break;
					}
				}
			}
		}
	}

}

	
