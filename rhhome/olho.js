// olho.js

function MostrarSenha() {
  var senhaInput = document.getElementById('senha');
  var confirmarSenhaInput = document.getElementById('Confirmar-senha');
  var olhoIcon = document.getElementById('btn-Confirmar-senha');

  if (senhaInput.type === 'password') {
    senhaInput.type = 'text';
    confirmarSenhaInput.type = 'text';
    olhoIcon.classList.remove('bi-eye-fill'); // Remover o ícone de olho
    olhoIcon.classList.add('bi-eye-slash-fill'); // Adicionar o ícone de olho cortado
  } else {
    senhaInput.type = 'password';
    confirmarSenhaInput.type = 'password';
    olhoIcon.classList.remove('bi-eye-slash-fill'); // Remover o ícone de olho cortado
    olhoIcon.classList.add('bi-eye-fill'); // Adicionar o ícone de olho
  }
}
