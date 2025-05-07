try {
  const toggleButton = document.getElementById('logo');
  const app = document.querySelector('.header');
  const appMenu = document.querySelector('.left-menu');
  const appContain = document.querySelector('.head');
  
  toggleButton.addEventListener('click', () => {
    app.classList.toggle('close');
    appMenu.classList.toggle('close');
    appContain.classList.toggle('close'); 
  });
} catch (error) {
  
}

try {
  const matiereOption = document.getElementById('MatiereOption');
  const filiereOption = document.getElementById('FiliereOption');
  const matiereListe = document.querySelector('.MatiereListe');
  const filiereListe = document.querySelector('.FiliereListe');

  matiereOption.addEventListener('click', () => {
    matiereListe.classList.toggle('close');
  });

  filiereOption.addEventListener('click', () => {
    filiereListe.classList.toggle('close');
  });
} catch (error) {
  
}


try {
  const compteOption = document.getElementById('CompteOption');
  const utilisateurOption = document.getElementById('UtilisateurOption');
  const enseignantOption = document.getElementById('EnseignantOption');
  const etudiantOption = document.getElementById('EtudiantOption');

  const compteListe = document.querySelector('.CompteListe');
  const utilisateurListe = document.querySelector('.UtilisateurListe');
  const enseignantListe = document.querySelector('.EnseignantListe');
  const etudiantListe = document.querySelector('.EtudiantListe');

  compteOption.addEventListener('click', () => {
    compteListe.classList.toggle('close');
  });

  etudiantOption.addEventListener('click', () => {
    etudiantListe.classList.toggle('close');
  });

  utilisateurOption.addEventListener('click', () => {
    utilisateurListe.classList.toggle('close');
  });

  enseignantOption.addEventListener('click', () => {
    enseignantListe.classList.toggle('close');
  });
} catch (error) {
  
}

try {
  document.getElementById("optionStats").addEventListener("change", function() {
    const optionStatsID = this.value;
    const download = document.querySelector('.download');
    if (optionStatsID !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getStatistiquesBoard.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
                download.classList.add('close');
            }
        };
  
        xhr.send("optionStatsID=" + encodeURIComponent(optionStatsID));
    } else {
        document.getElementById("utilisateurListe").innerHTML = "<thead> <th></th> <th></th> <th></th></thead> <tbody><td></td><td>SELECTIONNER UNE OPTION SVP</td><td></td></tbody>";
        download.classList.remove('close');
    }
  });
} catch (error) {
  
}

try {
  function preparerfichier(){
    const contenu = document.getElementById("div-containE").outerHTML;
    const titrecontenu = document.getElementById("optionStats").value;
    document.getElementById("Contenu").value = contenu;
    document.getElementById("titreContenu").value = titrecontenu;
  }
  
  function preparerfichierBulletin(){
    const contenu = document.getElementById("div-containE").outerHTML;
    const titrecontenu = "Bulletin de note";
    document.getElementById("Contenu").value = contenu;
    document.getElementById("titreContenu").value = titrecontenu;
  }
  
} catch (error) {
  
}

try{
  const recherche = document.getElementById("recherche");
  recherche.addEventListener("click", function() {
  
    try {

      const loginActiver = document.getElementById("loginActiver").value;
      if (loginActiver !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("loginActiver=" + encodeURIComponent(loginActiver));
      }else {
        document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
      
      
    } catch (error) {
      

    }

    try {
      const login = document.getElementById("login").value;
      
      if (login !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };

        xhr.send("login=" + encodeURIComponent(login));
      }else {
        document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }
    
    try {
      const matriculeEtudiant = document.getElementById("matriculeEtudiant").value;
      if (matriculeEtudiant !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("matriculeEtudiant=" + encodeURIComponent(matriculeEtudiant));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const matriculeEtudiantSupprimer = document.getElementById("matriculeEtudiantSupprimer").value;
      if (matriculeEtudiantSupprimer !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("matriculeEtudiantSupprimer=" + encodeURIComponent(matriculeEtudiantSupprimer));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const matriculeEtudiantModifier = document.getElementById("matriculeEtudiantModifier").value;
      if (matriculeEtudiantModifier !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("matriculeEtudiantModifier=" + encodeURIComponent(matriculeEtudiantModifier));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const matriculeEnseignant = document.getElementById("matriculeEnseignant").value;
      if (matriculeEnseignant !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("matriculeEnseignant=" + encodeURIComponent(matriculeEnseignant));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const matriculeEnseignantModifier = document.getElementById("matriculeEnseignantModifier").value;
      if (matriculeEnseignantModifier !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("matriculeEnseignantModifier=" + encodeURIComponent(matriculeEnseignantModifier));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const matriculeEnseignantSupprimer = document.getElementById("matriculeEnseignantSupprimer").value;
      if (matriculeEnseignantSupprimer !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("matriculeEnseignantSupprimer=" + encodeURIComponent(matriculeEnseignantSupprimer));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const nomfiliere = document.getElementById("nomfiliere").value;
      if (nomfiliere !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("nomfiliere=" + encodeURIComponent(nomfiliere));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }
  
    try {
      const nomfiliereModifier = document.getElementById("nomfiliereModifier").value;
      if (nomfiliereModifier !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("nomfiliereModifier=" + encodeURIComponent(nomfiliereModifier));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const nomfiliereSupprimer = document.getElementById("nomfiliereSupprimer").value;
      if (nomfiliereSupprimer !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("nomfiliereSupprimer=" + encodeURIComponent(nomfiliereSupprimer));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const nommatiere = document.getElementById("nommatiere").value;
      if (nommatiere !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("nommatiere=" + encodeURIComponent(nommatiere));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const nommatiereModifier = document.getElementById("nommatiereModifier").value;
      if (nommatiereModifier !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("nommatiereModifier=" + encodeURIComponent(nommatiereModifier));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const nommatiereSupprimer = document.getElementById("nommatiereSupprimer").value;
      if (nommatiereSupprimer !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("nommatiereSupprimer=" + encodeURIComponent(nommatiereSupprimer));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

    try {
      const loginSuspendre = document.getElementById("loginSuspendre").value;
      if (loginSuspendre !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getUtilisateurRechercher.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("utilisateurListe").innerHTML = this.responseText;
            }
        };
    
        xhr.send("loginSuspendre=" + encodeURIComponent(loginSuspendre));
      }else {
          document.getElementById("utilisateurListe").innerHTML = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
      }
    } catch (error) {
      
    }

  });
}catch(error){

}
try {
  document.getElementById('reqete').addEventListener('change', function(){
    const fileinput = document.getElementById('reqete');
    const filepath = fileinput.value;
    const allowExtensions = /(\.pdf)$/i;
  
    if(!allowExtensions.exec(filepath)){
       alert('Sélectionner un fichier pdf');
       fileinput.value= '';
    }
  });
} catch (error) {
  
}






















