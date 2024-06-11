document.querySelector('form').addEventListener('submit', function(event) {
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    if (nombre === '' || email === '' || password === '') {
      alert('Por favor, completa todos los campos.');
      event.preventDefault(); // Evita que el formulario se envíe si hay campos vacíos
    }
  });
  