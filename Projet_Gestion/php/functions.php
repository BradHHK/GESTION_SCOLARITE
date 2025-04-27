
<?php

    function genererPassword($taille = 8) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@&#_';
        $chaine = '';
        $max = strlen($caracteres) - 1;

        for ($i = 0; $i < $taille; $i++) {
            $chaine .= $caracteres[random_int(0, $max)];
        }

        return $chaine;
    }   

    function displayInfoRecuperation($message){
        echo"<link rel='stylesheet' href='../css/bootstrap/bootstrap.css'>
            <link rel='stylesheet' href='../css/infomessage.css'>
            <div id='_message_login'>
           
            <div id='_message_title'>

                <span id='_imglogo'><img src='../images/logo.png' alt='Logo' id='_logoMessage' class='logo'></span>
                
                        
                <a href='../recuperationCompte.html'><button type='button' id='_boutonClose'>X</button></a>
               
            </div>
            
            <hr>
                    
            <div class='message_corp'>
                <span>$message</span>
            </div>
                    
            
            </div>
        ";
    }

    function displayInfoLogin($message){
        echo"<link rel='stylesheet' href='../css/bootstrap/bootstrap.css'>
            <link rel='stylesheet' href='../css/infomessage.css'>
            <div id='_message_login'>
           
            <div id='_message_title'>

                <span id='_imglogo'><img src='../images/logo.png' alt='Logo' id='_logoMessage' class='logo'></span>
                
                        
                <a href='../login.html'><button type='button' id='_boutonClose'>X</button></a>
               
            </div>
            
            <hr>
                    
            <div class='message_corp'>
                <span>$message</span>
            </div>
                    
            
            </div>
        ";
    }
    
 ?>