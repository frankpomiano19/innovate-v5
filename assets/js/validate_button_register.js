function habilitar_register(){
    txtNoms      = document.getElementById("txtNom").value;
    txtApes      = document.getElementById("txtApe").value;
    txtMails     = document.getElementById("txtMail").value;
    txtClaves    = document.getElementById("txtClave").value;

        val = 0;

        if(txtNoms ==""){
            val++;
        }

         if(txtApes ==""){
            val++;
        }

         if(txtMails ==""){
            val++;
        }

         if(txtClaves ==""){
            val++;
        }


        if(val == 0){
            document.getElementById("btnRegister").disabled = false;
        }else{
            document.getElementById("btnRegister").disabled = true;
        }
}

        document.getElementById("txtNom").addEventListener("keyup", habilitar_register);
        document.getElementById("txtApe").addEventListener("keyup", habilitar_register);
        document.getElementById("txtMail").addEventListener("keyup", habilitar_register);
        document.getElementById("txtClave").addEventListener("keyup", habilitar_register);
        //document.getElementById("select").addEventListener("change", habilitar);

