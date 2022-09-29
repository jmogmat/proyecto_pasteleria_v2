
/*Esta función comprueba que el caracter introducido en el cuadro de texto para seleccionar una cantidad
 * del producto deseado, no sea texto, sino solamente numeros. El valor de salida es el número introducido.*/
function checkInputAmount(string){
    
    
    var out = '';
    var filtro = '1234567890';
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++){
        
       if (filtro.indexOf(string.charAt(i)) != -1){
            //Se añaden a la salida los caracteres validos
	     out += string.charAt(i);
       } 
            
    }
    //Retornar valor filtrado
    return out;
} 


