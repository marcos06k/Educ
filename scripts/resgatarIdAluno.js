function pegarIdAluno(botao) {
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    var linha = botao.closest('tr');

    // Encontra o elemento <td> com o ID 'linha_id_turma' dentro da mesma linha
    var tdIdAluno = linha.querySelector('#linha_id_aluno');

    // Pega o texto dentro do elemento <td> encontrado
    var textoIdAluno = tdIdAluno.innerText.trim();
    console.log(textoIdAluno);



    $.ajax({

        url: '../../backend/administrador/adm_listar_turmas.php',
        type: 'POST',
        data: {
            /* adiciona a variavel com o número a requisicao*/
            'textoAluno': textoIdAluno
        },
        dataType: 'json',
        success: function (data) {
            alert('Resultado: ' + data);
        },
        error: function (request, error) {
            alert("Resultado: " + JSON.stringify(request));
        }
    });
}