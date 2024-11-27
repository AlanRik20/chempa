function sololetras(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();
    letras=" abcdefghijklmnñopqrstuvwxyz";
    especiales="8-37-38-46-164";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;break;
        }
    }
    
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
    }
    
    function solonumeros(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        numeros="0123456789";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        
        if(numeros.indexOf(teclado)==-1 && !teclado_especial){
            return false;
        }
    }
    function soloarroba(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key).toLowerCase();
            letras="abcdefghijklmnñopqrstuvwxyz@.123456789";
            especiales="8-37-38-46-164";
            teclado_especial=false;
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;break;
                }
            }
            
            if(letras.indexOf(teclado)==-1 && !teclado_especial){
                return false;
        }
    }
    
    function usuario(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        letras="abcdefghijklmnñopqrstuvwxyz123456789_";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
    }
    }
    
    function direccion(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" abcdefghijklmnñopqrstuvwxyz123456789";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
    }
    }
    
    function mostrarContrasena(){
        var tipo = document.getElementById("password");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
    
    function validarContra(){
        var p1 = document.getElementById("contra1").value;
        var p2 = document.getElementById("contra2").value;
        var espacios = false;
        var cont = 0;
    
        while (!espacios && (cont < p1.length)) {
        if (p1.charAt(cont) == " ")
        espacios = true;
        cont++;
        }
       
        if (espacios) {
            alert ("La contraseña no puede contener espacios en blanco");
        return false;
        }
        if (p1.length == 0 || p2.length == 0) {
            alert("Los campos de la password no pueden quedar vacios");
            return false;
        }
    
        if (p1 != p2) {
            alert("Las passwords deben de coincidir");
            return false;
          }
    }

    function showContent() {
        element = document.getElementById("pai");
        check = document.getElementById("check");
        button = document.getElementById("continuar");
        if (check.checked) {
            element.style.display='block';
            button.style.display='none';
        }
        else {
            element.style.display='none';
            button.style.display='block';

        }
    }

    function ocultarDiv(){
        var select=document.getElementById("opciones");
        var div1=document.getElementById("miDiv1");
        var div2=document.getElementById("miDiv2");
        var div3=document.getElementById("miDiv3");
        if(select.value=="1"){
            div1.style.display="block";
            document.getElementById('miDiv1').disabled=false;
            div2.style.display="none";
            document.getElementById('miDiv2').disabled=true;
            div3.style.display="none";
            document.getElementById('miDiv3').disabled=true;
            document.getElementById('manzana').disabled=true;
            document.getElementById('casa').disabled=false;
            document.getElementById('calle').disabled=true;
            document.getElementById('altura').disabled=true;
            document.getElementById('edificio').disabled=true;
            document.getElementById('piso').disabled=false;
            document.getElementById('depto').disabled=false;




        }else if(select.value=="2"){
            div1.style.display="none";
            document.getElementById('miDiv1').disabled=false;
            div2.style.display="block";
            document.getElementById('miDiv2').disabled=true;
            div3.style.display="none";
            document.getElementById('miDiv3').disabled=false;
        }else if(select.value=="3"){
            div1.style.display="none";
            document.getElementById('miDiv1').disabled=false;
            div2.style.display="none";
            document.getElementById('miDiv2').disabled=false;
            div3.style.display="block";
            document.getElementById('miDiv3').disabled=true;

        }else if(select.value=="0"){
            div1.style.display="none";
            document.getElementById('miDiv1').disabled=false;
            div2.style.display="none";
            document.getElementById('miDiv2').disabled=false;
            div3.style.display="none";
            document.getElementById('miDiv3').disabled=false;
        }
    }

    // function mayores(e){
    //     key=e.keyCode || e.which;
    //     teclado=String.fromCharCode(key).toLowerCase();
    //     tiempo="31-12-2004";
    //     especiales="8-37-38-46-164";
    //     teclado_especial=false;
    //     for(var i in tiempo){
    //         if(key==especiales[i]){
    //             teclado_especial=true;break;
    //         }
    //     }
        
    //     if(tiempo.indexOf(teclado)==-1 && !teclado_especial){
    //         return false;
    // }
    // }