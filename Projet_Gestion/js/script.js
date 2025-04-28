const toggleButton = document.getElementById('logo');
const app = document.querySelector('.header');

toggleButton.addEventListener('click', () => {
  app.classList.toggle('close');
});