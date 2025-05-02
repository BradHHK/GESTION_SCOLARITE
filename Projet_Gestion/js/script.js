const toggleButton = document.getElementById('logo');
const app = document.querySelector('.header');
const appMenu = document.querySelector('.left-menu');
const appContain = document.querySelector('.head');

toggleButton.addEventListener('click', () => {
  app.classList.toggle('close');
  appMenu.classList.toggle('close');
  appContain.classList.toggle('close'); 
});