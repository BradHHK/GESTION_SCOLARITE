const toggleButton = document.getElementById('logo');
const app = document.querySelector('.header');
const appMenu = document.querySelector('.left-menu');
const appContain = document.querySelector('.head');



toggleButton.addEventListener('click', () => {
  app.classList.toggle('close');
  appMenu.classList.toggle('close');
  appContain.classList.toggle('close'); 
});

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