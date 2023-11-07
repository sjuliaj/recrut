<!DOCTYPE html>
<html>
<head>
    <title>Alert com Botão Agendar</title>
    <style>
        /* Estilize o modal (popup) */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
        }
        
        /* Estilize o conteúdo do modal */
        .modal-content {
            background-color: #fff;
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
        }
        
        /* Estilize o botão Agendar */
        #agendar-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Botão para abrir o modal -->
<button onclick="abrirModal()">Clique para Agendar</button>

<!-- O modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <p>Tem certeza de que deseja agendar?</p>
        <button id="agendar-button">Agendar</button>
    </div>
</div>

<script>
// Obtém uma referência para o modal
var modal = document.getElementById('myModal');

// Obtém uma referência para o botão que abre o modal
var btn = document.querySelector('button');

// Obtém uma referência para o botão "Agendar" dentro do modal
var agendarButton = document.getElementById('agendar-button');

// Quando o usuário clicar no botão, abre o modal
btn.onclick = function() {
    modal.style.display = 'block';
}

// Quando o usuário clicar no botão "Agendar" dentro do modal, você pode adicionar a ação desejada
agendarButton.onclick = function() {
    // Aqui, você pode adicionar o código para agendar algo
    alert('Ação de agendamento realizada!');
    // Fecha o modal
    modal.style.display = 'none';
}

// Quando o usuário clicar em qualquer lugar fora do modal, fecha o modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

</body>
</html>