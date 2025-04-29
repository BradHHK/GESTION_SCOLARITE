
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

    function genererMatricule($taille = 7) {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chiffres = '0123456789';
        $chaine = '';
        $max1 = strlen($caracteres) - 1;
        $max2 = strlen($chiffres) - 1;
        $date = date('Y');
        $chaine .=$date[2];
        $chaine .=$date[3];
        $chaine .= $caracteres[random_int(0, $max1)];

        for ($i = 0; $i < 4; $i++) {
            $chaine .= $chiffres[random_int(0, $max2)];
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

    function displayInfo($message, $link){
        echo"<link rel='stylesheet' href='../css/bootstrap/bootstrap.css'>
            <link rel='stylesheet' href='../css/infomessage.css'>
            <div id='_message_login'>
           
            <div id='_message_title'>

                <span id='_imglogo'><img src='../images/logo.png' alt='Logo' id='_logoMessage' class='logo'></span>
                
                        
                <a href='$link'><button type='button' id='_boutonClose'>X</button></a>
               
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