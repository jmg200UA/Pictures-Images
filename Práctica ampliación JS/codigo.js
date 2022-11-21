function validarLogin(){
	let nombre = document.getElementById("nombre").value;
	let contraseña = document.getElementById("contraseña").value;
	
    //PILLAMOS NOMBRE
    var re= new RegExp('^[^\s]+(\s.*)?$');
	var boolean1 = re.test(nombre);

	

	//PILLAMOS CONTRASEÑA
	var re= new RegExp('^[^\s]+(\s.*)?$');
	var boolean2 = re.test(contraseña);

	

    if(boolean1==true && boolean2==true){
		alert("Login correcto");
		document.querySelector('#clickinicio').setAttribute('action', "UsuRegistrado.html");
    }
    else{
    	alert("Error. Uno de los campos está vacío o contiene solamente espacios en blanco");
    	document.querySelector('#clickinicio').setAttribute('action', "index.html");
    }

    
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

	//NOMBRE USUARIO
	var re= new RegExp('^(?![0-9])[a-zA-Z0-9]{3,15}$');
	var boolean = re.test(nombre);

	if(boolean){
		alert("Login Correcto");
	} 
	else{
		alert("Login Incorrecto");
		//document.querySelector('#clickinicio').setAttribute('action', "UsuRegistrado.html");
	} 

	//CONTRASEÑA USUARIO	
	var re= new RegExp('^[a-z]{1,}[A-Z]{1,}[0-9]{1,}[a-zA-Z0-9-_]{3,12}$');
	var boolean = re.test(contraseña);

	if(boolean){
		alert("Contraseña Correcta");
	} 
	else{
		alert("Contraseña Incorrecta");
		//document.querySelector('#clickinicio').setAttribute('action', "UsuRegistrado.html");
	}

	//REPETIR CONTRASEÑA
    if(contraseña!=repetircontraseña){
    	alert("Error. Las contraseñas no son iguales");
    }
    else{
    	alert("OK. Las contraseñas son iguales");
	}
	
	var optForm = document.forms["formulario"]["sexo"].selectedIndex;
	console.log("Valor select" + optForm);
	if( optForm == null || optForm == 0 ) {
		alert("Error. Debes seleccionar una opción en el campo 'Sexo'");
	}
	else alert("OK. valor correcto para el campo ''Sexo'");


	
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
			alert("Error. Fecha incorrecta");
		}else{
			if((dia<1 || dia>31) || (mes<1 || mes>12) || (anyo>2020)){
				alert("Error. Fecha incorrecta");
			}else{
				alert("OK. Fecha correcta");
			}
		}
	}
	else alert("Error. Introduce valor para la fecha");
		


	//CORREO Y HACER SPLIT
	//^[a-zA-Z0-9-!#$%&'+/=?^_`{|}~].*[a-zA-Z0-9-!#$%&'*+/=?^_`{|}~]{1,64}$ expresion regular parte-local
	//^[a-zA-Z0-9].*[a-zA-Z0-9]{1,63}$ expresion regular parte dominio subdom
	if(correo.length == 0 || correo.length>254){
		alert("Error. Valores para el correo incorrectos");
	}else{
		var cad = correo.split("@");
		if(cad.length == 1){
			alert("Error. Valores para el correo incorrectos");
		}else{
			//parte-local
			
			var re= new RegExp("^[a-zA-Z0-9-!#$%&'+/=?^_`{|}~].*[a-zA-Z0-9-!#$%&'*+/=?^_`{|}~]{1,64}$");
			var boolean = re.test(cad[0]);

			if(boolean){
				alert("Parte local correcta");
			} 
			else{
				alert("Parte local incorrecta");
			}

			//parte-dominio
			if(cad[1]>0 && cad[1] < 190){
				var dom = cad[1].split(".");
				for(var i=0;i<dom.length;i++){
					var re= new RegExp("^[a-zA-Z0-9].*[a-zA-Z0-9]{1,63}$");
					var boolean = re.test(dom[i]);

					if(!boolean){
						alert("Error en uno de los subdominios");
					}
				}
			}
		}
	}
}


function resultadobus(){
	let arrayfotos=new Array(3);
	let html1= '';
	let html2= '';
	let html3= '';


	html1 += '<div>';
    html1 += '<a href="DetalleFoto.html"><img src="imagenes/imagen1.jpg" alt="atardecer"></a>';
    html1 += '<p><span class="icon-pencil"></span><strong>Título</strong> : Atardecer</p>';     
    html1 += '<p><span class="icon-calendar-empty"></span><strong>Fecha</strong> : 27-9-2020</p>';    
    html1 += '<p><span class="icon-eyedropper"></span><strong>País</strong> : España</p>';     
    html1 += '</div>';
    html2 += '<div>'; 
    html2 += '<a href="DetalleFoto.html"><img src="imagenes/Arbol.jpg" alt="arbol"></a>';      
    html2 += '<p><span class="icon-pencil"></span><strong>Título</strong> : Atardecer de campo</p>';       
    html2 += '<p><span class="icon-calendar-empty"></span><strong>Fecha</strong> : 20-2-2018</p>';      
    html2 += '<p><span class="icon-eyedropper"></span><strong>País</strong> : Francia</p>';    
    html2 += '</div>'; 
    html2 += '<div>'   
    html3 += '<a href="DetalleFoto.html"><img src="imagenes/playa.jpg" alt="playa"></a>';       
    html3 += '<p><span class="icon-pencil"></span><strong>Título</strong> : Atardecer en la playa</p>';       
    html3 += '<p><span class="icon-calendar-empty"></span><strong>Fecha</strong> : 4-3-2019</p>'      
    html3 += '<p><span class="icon-eyedropper"></span><strong>País</strong> : Italia</p>';      
    html3 += '</div>';

    arrayfotos[0]=html1;
    arrayfotos[1]=html2;
    arrayfotos[2]=html3;

    document.querySelector('#cajas').innerHTML=arrayfotos;
}

function cambiaorden(orden){
	//Parte para almacenar el codigo html en variables

	let arrayfotos=new Array(3);
	let htmlfoto1= '';
	let htmlfoto2= '';
	let htmlfoto3= '';


	htmlfoto1 += '<div>';
    htmlfoto1 += '<a href="DetalleFoto.html"><img src="imagenes/imagen1.jpg" alt="atardecer"></a>';
    htmlfoto1 += '<p><span class="icon-pencil"></span><strong>Título</strong> : Atardecer</p>';     
    htmlfoto1 += '<p><span class="icon-calendar-empty"></span><strong>Fecha</strong> : 27-9-2020</p>';    
    htmlfoto1 += '<p><span class="icon-eyedropper"></span><strong>País</strong> : España</p>';     
    htmlfoto1 += '</div>';
    htmlfoto2 += '<div>'; 
    htmlfoto2 += '<a href="DetalleFoto.html"><img src="imagenes/Arbol.jpg" alt="arbol"></a>';      
    htmlfoto2 += '<p><span class="icon-pencil"></span><strong>Título</strong> : Atardecer de campo</p>';       
    htmlfoto2 += '<p><span class="icon-calendar-empty"></span><strong>Fecha</strong> : 20-2-2018</p>';      
    htmlfoto2 += '<p><span class="icon-eyedropper"></span><strong>País</strong> : Francia</p>';    
    htmlfoto2 += '</div>'; 
    htmlfoto2 += '<div>'   
    htmlfoto3 += '<a href="DetalleFoto.html"><img src="imagenes/playa.jpg" alt="playa"></a>';       
    htmlfoto3 += '<p><span class="icon-pencil"></span><strong>Título</strong> : Atardecer en la playa</p>';       
    htmlfoto3 += '<p><span class="icon-calendar-empty"></span><strong>Fecha</strong> : 4-3-2019</p>'      
    htmlfoto3 += '<p><span class="icon-eyedropper"></span><strong>País</strong> : Italia</p>';      
    htmlfoto3 += '</div>';

    arrayfotos[0]=htmlfoto1;
    arrayfotos[1]=htmlfoto2;
    arrayfotos[2]=htmlfoto3;

    //Parte para guardar en variables y estas variables en array para ordenar

    let array=new Array(3);

	let foto1=["Atardecer","27-9-2020","España"];
	let foto2=["Atardecer de campo","20-2-2018","Francia"];
	let foto3=["Atardecer en la playa","4-3-2019","Italia"];

	array[0]=foto1;
	array[1]=foto2;
	array[2]=foto3;



	console.log("Array 1: "+ array[0]);
	console.log("Array 2: "+ array[1]);
	console.log("Array 3: "+ array[2]);

	//segun el orden indicado
	if(orden=="titulo1"){
		var ord = [array[0][0],array[1][0],array[2][0]];
		console.log("ORD: "+ ord);
		var res=ord.sort();
		console.log("Resultado de orden: "+ res);
	}
	else if(orden=="titulo2"){

	}
	else if(orden=="fecha1"){
		
	}
	else if(orden=="fecha2"){
		
	}
	else if(orden=="pais1"){
		
	}
	else if(orden=="pais2"){
		
	}
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(c_name) {
if(document.cookie.length > 0) {
c_start = document.cookie.indexOf(c_name + "=");
if(c_start != -1) {
c_start = c_start + c_name.length + 1;
c_end = document.cookie.indexOf(";", c_start);
if(c_end == -1)
c_end = document.cookie.length;
return unescape(document.cookie.substring(c_start, c_end));
}
}
return "";
}

function checkCookie(cname) {
  var resul = false;
  var username = getCookie(cname);
  if (username != "") {
    resul = true;
  }
  return resul;
}

function cambiaestilo(){
	var valor= document.forms["clickinicio"]["estilos"].selectedIndex;
	console.log(valor);
	//document.cookie='estilo'+"="+'Estilo principal'+";expires="+45;
	if(valor == 0){
		setCookie('estilo','Estilo principal', 45);
		console.log("valor:" + valor);
	}
	if(valor == 1){
		setCookie('estilo','Modo dia', 45);
		console.log("valor:" + valor);
	}
	if(valor == 2){
		setCookie('estilo','Modo alto contraste', 45);
		console.log("valor:" + valor);
	}
	if(valor == 3){
		setCookie('estilo','Modo letras grandes', 45);
		console.log("valor:" + valor);
	}
	if(valor == 4){
		setCookie('estilo','Alto contraste y letras grandes', 45);
		console.log("valor:" + valor);
	}

		var estilo = getCookie('estilo');
		console.log(estilo);
	
	
	meteEstilo();
}

function meteEstilo(){
	var estilo = getCookie('estilo');
	console.log(estilo);

	if(estilo == null || estilo == "" || estilo == 'Estilo principal'){
		let html='';
		document.querySelector('head').innerHTML=html;
		html += '<meta charset="utf-8">';
		html += '<title>Pictures & images - Página principal</title>';
		html += '<link rel="stylesheet" type="text/css" href="estilo.css" title="Estilo principal">';
		html += '<link rel="stylesheet" href="css/fontello.css">';
		html += '<script src="codigo.js"></script>';
		document.querySelector('head').innerHTML=html;
	}
	else if(estilo == 'Modo dia'){
		console.log("Entro aqui");
		let html='';
		document.querySelector('head').innerHTML=html;
		html += '<meta charset="utf-8">';
		html += '<title>Pictures & images - Página principal</title>';
		html += '<link rel="stylesheet" type="text/css" href="dia.css" title="Modo dia">';
		html += '<link rel="stylesheet" href="css/fontello.css">';
		html += '<script src="codigo.js"></script>';
		document.querySelector('head').innerHTML=html;

	}
	else if(estilo == 'Modo alto contraste'){
		console.log("Entro aqui");
		let html='';
		document.querySelector('head').innerHTML=html;
		html += '<meta charset="utf-8">';
		html += '<title>Pictures & images - Página principal</title>';
		html += '<link rel="stylesheet" href="contraste.css" title="Modo alto contraste">';
		html += '<link rel="stylesheet" href="css/fontello.css">';
		html += '<script src="codigo.js"></script>';
		document.querySelector('head').innerHTML=html;

	}
	else if(estilo == 'Modo letras grandes'){
		console.log("Entro aqui");
		let html='';
		document.querySelector('head').innerHTML=html;
		html += '<meta charset="utf-8">';
		html += '<title>Pictures & images - Página principal</title>';
		html += '<link rel="stylesheet" href="letragrande.css" title="Modo letras grandes">';
		html += '<link rel="stylesheet" href="css/fontello.css">';
		html += '<script src="codigo.js"></script>';
		document.querySelector('head').innerHTML=html;

	}
	else if(estilo == 'Alto contraste y letras grandes'){
		console.log("Entro aqui");
		let html='';
		document.querySelector('head').innerHTML=html;
		html += '<meta charset="utf-8">';
		html += '<title>Pictures & images - Página principal</title>';
		html += '<link rel="stylesheet" href="contrasteyletra.css" title="Alto contraste y letras grandes">';
		html += '<link rel="stylesheet" href="css/fontello.css">';
		html += '<script src="codigo.js"></script>';
		document.querySelector('head').innerHTML=html;

	}

}

	
