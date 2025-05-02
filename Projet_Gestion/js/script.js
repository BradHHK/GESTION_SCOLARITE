const toggleButton = document.getElementById('logo');
const app = document.querySelector('.header');
const appMenu = document.querySelector('.left-menu');
const appContain = document.querySelector('.head');

const nom_etudiantContain = document.querySelector('.Nom');
const matiereContain = document.querySelector('.matiere');
const Nom_etudiantButton = document.getElementById('etudiantbouton');
const matiereButton = document.getElementById('matierebouton');

toggleButton.addEventListener('click', () => {
  app.classList.toggle('close');
  appMenu.classList.toggle('close');
  appContain.classList.toggle('close'); 
});

matiereButton.addEventListener('click', () => {
  nom_etudiantContain.classList.toggle('open');
  matiereContain.addEventListener("mousedown", function(e) {
    e.preventDefault(); // empêche le clic d'ouvrir la liste
  });

  matiereContain.addEventListener("keydown", function(e) {
    e.preventDefault(); // empêche clavier (flèches, tab, etc.)
  });
  matiereButton.disabled = true;
});
