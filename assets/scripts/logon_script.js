document.querySelector('.next-button').addEventListener('click', function() {
  var name = document.querySelector('.text-field').value;
  document.querySelector('.greeting').innerText = 'Greetings, ' + name;
  document.querySelector('.container').style.transform = 'translate(-100%, -50%)';
  setTimeout(function() {
    document.querySelector('.question').style.display = 'none';
    document.querySelector('.text-field').style.display = 'none';
    document.querySelector('.next-button').style.display = 'none';
    document.querySelector('.greeting').style.display = 'block';
    document.querySelector('.password-field').style.display = 'block';
  }, 500); // Transition duration
});


function showPasswordField() {
  const passwordField = document.getElementById('passwordField');
  const nextButton = document.querySelector('.next-button');
  const loginButton = document.querySelector('.login-button');
  
  
  passwordField.classList.add('active');
  nextButton.classList.add('moved');
  loginButton.classList.remove('hidden');

  
  }



function validateCredentials() {
  var username = document.querySelector('.text-field').value;
  var password = document.querySelector('.password-field input').value;

  if (username === 'admin' && password === 'admin') {
    window.location.href = 'mainMenu.html'; // replace with your next page URL
  } else {
    alert('Invalid username or password');
}
}
