//########################### habilitar buttton - login ###############################//
function habilitar_login(){
    user_name           = document.getElementById("user_name").value;
    user_password       = document.getElementById("user_password").value;

    val = 0;

     if(user_name ==""){
            val++;
        }

    if(user_password ==""){
            val++;
        }

    if(val == 0){
            document.getElementById("btnLogin").disabled = false;
        }else{
            document.getElementById("btnLogin").disabled = true;
        }        
}

        document.getElementById("user_name").addEventListener("keyup", habilitar_login);
        document.getElementById("user_password").addEventListener("keyup", habilitar_login);