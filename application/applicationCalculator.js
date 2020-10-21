
let operation = "";
let result ="";
let url = window.location.href;
let tabOperation= "";

function selectedValue (button){ 
    
    if(operation.length<"25"){   
    operation = operation + button.value;
    document.getElementById("calculated").innerHTML = operation;
   }
    console.log(operation.length); 
}

function resultOperation (){
    result = eval(operation)
    document.getElementById("result").innerHTML = result;
}

function reset(button){
    operation = "";
    result ="";
    document.getElementById("calculated").innerHTML = "";
    document.getElementById("result").innerHTML = "";
}
function deletesLast(button){

    tabOperation = operation.split("");
    tabOperation.pop();
    operation = tabOperation.join("");
    /*operation = operation.replace(operation.slice(-1),"");*/
    document.getElementById("calculated").innerHTML = operation;
}

function saveHistory(button){

    if (operation && result ){

        tabOperation = operation.split('');
        for ( let i= 0; i<tabOperation.length; i++ ){
            if (tabOperation[i]== '\+' ){
                tabOperation.splice([i],1,'%2B');
            }
        }
        operationCode = tabOperation.join("");
        result = eval(operation);
        window.location.href = "?operation=" + operationCode + "&result=" + result;
    }else if  (operation && result== 0){
        tabOperation = operation.split('');
        for ( let i= 0; i<tabOperation.length; i++ ){
            if (tabOperation[i]== '\+' ){
                tabOperation.splice([i],1,'%2B');
            }
        }
        operationCode = tabOperation.join("");
        result = eval(operation);
        window.location.href = "?operation=" + operationCode + "&result=" + result; 
    }

}

function history(button){

    tabUrl = url.split('?');
    history = tabUrl[1];

    if(!history){
        window.location.href = "?history"
    }else{
        window.location.href = "?" ;
    }   

}




window.addEventListener('error',(e)=> {
    alert (' Erreur dans votre calcul');
    document.getElementById("calculated").innerHTML = "";
});
