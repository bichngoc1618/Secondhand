const navLinks = document.querySelectorAll('.navbar li a');

window.addEventListener('scroll', function () {
  if (window.scrollY > 0) {
    navLinks.forEach(function (link) {
      link.style.color = '#0a422c';
      link.style.fontWeight = 'bold'; // Reset font weight
    });
  } else {
    navLinks.forEach(function (link) {
      link.style.color = '#000';
    });
  }
});
