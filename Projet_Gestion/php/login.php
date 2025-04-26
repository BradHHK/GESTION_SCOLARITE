<?php
    require_once "db_connect.php";
    if(isset($_POST["Login"]) && isset($_POST["Password"]) && isset($_POST["role"]) ){
        session_start();
        // $_SESSION["Login"]=
        
    }else{
        echo"<link rel='stylesheet' href='../css/bootstrap/bootstrap.css'>
            <link rel='stylesheet' href='../css/infomessage.css'>
            <div id='_message_login'>
               
                <div id='_message_title'>

                    <span id='_imglogo'><img src='../images/logo.png' alt='Logo' id='_logoMessage' class='logo'></span>
                    
                            
                    <a href='../login.html'><button type='button' id='_boutonClose'>X</button></a>
                   
                </div>
                
                <hr>
                        
                <div class='message_corp'>
                    <span>Veiller remplir tout les champs</span>
                </div>
                        
                
            </div>
        ";
    }
?>