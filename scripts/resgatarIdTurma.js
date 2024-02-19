function pegarIdTurma(botao) {
    console.log("teste Um");
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    var linha = botao.closest('tr');

    // Encontra o elemento <td> com o ID 'linha_id_turma' dentro da mesma linha
    var tdIdTurma = linha.querySelector('#linha_id_turma');
    console.log("seletor:" + tdIdTurma);

    // Pega o texto dentro do elemento <td> encontrado
    var textoIdTurma = tdIdTurma.innerText.trim();
    console.log(textoIdTurma);



    $.ajax({

        url: '../../backend/administrador/adm_listar_turmas.php',
        type: 'POST',
        data: {
            /* adiciona a variavel com o número a requisicao*/
            textoTurma: textoIdTurma
        },
        dataType: 'json',
        success: function (data) {
            alert('Resultado a: ' + data);
        },
        error: function (request, error) {
            alert("Resultado b: " + JSON.stringify(request));
        }
    });
}
