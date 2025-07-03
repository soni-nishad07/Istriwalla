



  function toggleForm(form) {
    document.getElementById('loginForm').classList.remove('active');
    document.getElementById('registerForm').classList.remove('active');
    document.getElementById(form + 'Form').classList.add('active');
  }