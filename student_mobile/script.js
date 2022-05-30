const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active');
  if (navbarLinks.classList.contains('active')) {
    document.getElementById('book-form').style.display = 'none';
  }
  else {
    document.getElementById('book-form').style.display = 'block';
  }
})

// if (navbarLinks.classList.contains('active')) {
//   let form = document.getElementsByClassName('navbar-form');
//   form.style.display = "none";

// }