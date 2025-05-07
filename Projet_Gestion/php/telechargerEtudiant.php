<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    require_once "db_connect.php"; 
    require_once "functions.php";  
    require_once __DIR__ . '/vendor/autoload.php';

    try {
        if (isset($_POST["Contenu"]) && isset($_POST["titreContenu"])) {

            $contenu = $_POST["Contenu"];
            $titre = $_POST["titreContenu"];
            $pdf = new \Mpdf\Mpdf(['margin_top' => 60, 'margin_bottom' => 20 ]);

            $pdf->SetHTMLHeader('
                <div style="border-bottom: 2px solid #003366; padding-bottom: 10px; font-family: sans-serif;">
                    <table width="100%" style="font-size: 12px !important;" style="border: none !important;">
                        <tr style="border: none !important;">
                            <td width="20%" style="border: none !important;">
                                <img src="../images/logo.png" style="height: 60px;" alt="Logo">
                            </td>
                            <td width="60%" align="center" style="border: none !important;">
                                <h2 style="margin: 0; color: #003366;">ETUSOFT - Plateforme Universitaire</h2>
                                <small style="color: #777;">'.$titre.'</small>
                            </td>
                            <td width="20%" align="right" style="color: #999;" style="border: none !important;">
                                {DATE j-m-Y}
                            </td>
                        </tr>
                    </table>
                </div>
            ');
            
            
            $pdf->SetHTMLFooter('
            <div style="border-bottom: 2px solid #003366; font-size: 10px; font-family: sans-serif; padding-top: 8px; display: flex; justify-content: space-between;">
                <div style="text-align: left; color: #003366;">
                    <span>&copy; '.date('Y').' ETUSOFT - Tous droits réservés</span>
                </div>
            </div>
            ');

            $pdf->AddPage();
            
            $contenuFichier = '
                <style>
                    .pdf-content {
                        border: 2px solid #003366;
                        border-radius: 10px;
                        padding: 20px;
                        font-family: sans-serif;
                        font-size: 12pt;
                        background-color: #fdfdfd;
                    }
                
                    h1 {
                        color: #003366;
                        text-align: center;
                        margin-top: 0;
                    }
                
                    p {
                        text-align: justify;
                    }
                
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }
                
                    th, td {
                        border: 1px solid #999;
                        padding: 8px;
                        text-align: center;
                    }
                
                    th {
                        background-color: #003366;
                        color: white;
                    }
                </style>
                
                <div class="pdf-content">
                    <h1>'.$titre.'</h1>
                    ' . $contenu . '
                </div>
            ';
            $pdf->writeHTML($contenuFichier);
            $output = $titre.".pdf";
            $pdf->Output($output, 'D');
          
        }
    }catch (Exception $ex) {
        $message = "Erreur ".$ex->getMessage();
        $link = "statistiquesAdmin.php";
        displayInfo($message, $link);
    }
?>

