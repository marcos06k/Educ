function pegarTexto(botao) {
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    var linha = botao.closest('tr');

    // Encontra o elemento <td> com o ID 'linha_id_turma' dentro da mesma linha
    var tdIdTurma = linha.querySelector('#linha_id_turma');

    // Pega o texto dentro do elemento <td> encontrado
    var textoIdTurma = tdIdTurma.innerText.trim();


    var xhr = new XMLHttpRequest(); // Objeto XMLHttpRequest para fazer a solicitação AJAX
    xhr.open("POST", "../src/backend/administrador/adm_listar_turmas.php", true); // Abrindo uma conexão com seu script PHP
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Configurando o cabeçalho da solicitação
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Exibindo a resposta do servidor no console do navegador
        }
    };
    xhr.send("meuValor=" + textoIdTurma); // Enviando o valor para o PHP
}