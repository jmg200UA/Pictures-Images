function $(id) {

    return document.getElementById(id);
}

function metodo2() {
    var numfotos=3;

    var tabla = document.createElement("table");
    var titulo = document.createElement("caption");
    titulo.textContent = "Tabla de ejemplo";

    tabla.appendChild(titulo);
    for(f = 1; f < 18; f++) {
        var fila = document.createElement("tr");
        for(c = 1; c < 7; c++) {
            var celda = document.createElement("td");
            if(c==3 && f==1){
                celda.textContent = "Blanco y negro"
            }
            if(c==4 && f==1){
                celda.textContent = "Blanco y negro"
            }
            if(c==5 && f==1){
                celda.textContent = "Color"
            }
            if(c==6 && f==1){
                celda.textContent = "Color"
            }
            
            if(c==1 && f==2){
                celda.textContent = "Número de paginas";
            }
            if(c==2 && f==2){
                celda.textContent = "Número de fotos";
            }
            if(c==3 && f==2){
                celda.textContent = "150-300 dpi";
            }
            if(c==4 && f==2){
                celda.textContent = "450-900 dpi";
            }
            if(c==5 && f==2){
                celda.textContent = "150-300 dpi";
            }
            if(c==6 && f==2){
                celda.textContent = "450-900 dpi";
            }

            if(c==1){
                if(f!=1 && f!=2){
                    celda.textContent = f-2;
                }
            }

            if(c==2){
                if(f!=1 && f!=2){
                    celda.textContent = numfotos;
                    numfotos=numfotos+3;
                }         
            }

            if(c==3){
                if(f!=1 && f!=2){
                    if(f<7){
                        celda.textContent = ((f-2) * 0.10).toFixed(2);
                    }
                    if(f>6 && f < 14){
                        celda.textContent = (0.40 + (f-6) * 0.08).toFixed(2);
                    }
                    if(f>13 && f < 18){
                        celda.textContent = (0.40 + 0.56 + (f-13) * 0.07).toFixed(2);
                    }
                }       
            }

            if(c==4){
                if(f!=1 && f!=2){
                    if(f<7){
                        celda.textContent = ((f-2) * 0.16).toFixed(2);
                    }
                    if(f>6 && f < 14){
                        celda.textContent = (0.64 + (f-6) * 0.14).toFixed(2);
                    }
                    if(f>13 && f < 18){
                        celda.textContent = (0.64 + 0.98 + (f-13) * 0.13).toFixed(2);
                    }
                }

            }

            if(c==5){
                if(f!=1 && f!=2){
                    if(f<7){
                        celda.textContent = ((f-2) * 0.25).toFixed(2);
                    }
                    if(f>6 && f < 14){
                        celda.textContent = (1 + (f-6) * 0.23).toFixed(2);
                    }
                    if(f>13 && f < 18){
                        celda.textContent = (1 + 1.61 + (f-13) * 0.22).toFixed(2);
                    }
                }
            }

            if(c==6){
                if(f!=1 && f!=2){
                    if(f<7){
                        celda.textContent = ((f-2) * 0.31).toFixed(2);
                    }
                    if(f>6 && f < 14){
                        celda.textContent = (1.24 + (f-6) * 0.29).toFixed(2);
                    }
                    if(f>13 && f < 18){
                        celda.textContent = (1.24 + 2.03 + (f-13) * 0.28).toFixed(2);
                    }
                }
            }
            fila.appendChild(celda);
            
        }
        tabla.appendChild(fila);
    }
    document.getElementById("table").appendChild(tabla);
}

function load() {

    $("metodo2").addEventListener("click", metodo2);
}

document.addEventListener("DOMContentLoaded", load, false);
