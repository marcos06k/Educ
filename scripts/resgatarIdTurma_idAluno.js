function pegarIdTurma_aluno(botao) {
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    let linha = botao.closest('tr')
    // Encontra o elemento <td> com o ID 'linha_id_turma' dentro da mesma linha
    let tdIdTurma = linha.querySelector('#linha_id_turma')
    console.log("seletor:" + tdIdTurma)
    // Pega o texto dentro do elemento <td> encontrado
    let textoIdTurma = tdIdTurma.innerText.trim()
    console.log("id Turma adc. aln:" + textoIdTurma)
    // Pega o id do botao que será clicado para adicionar o aluno
    let button = document.getElementById('btn-executar')

    // Quando clicar no botão para adc. aluno, faz o evento
    button.addEventListener('click', function (event) {
        event.preventDefault();

        // Acessa o elemento <tr> (linha) que contém o botão clicado
        let linha = button.closest('tr')
        // Encontra o elemento <td> com o ID 'linha_id_aluno' dentro da mesma linha
        let tdIdAluno = linha.querySelector('#linha_id_aluno')
        console.log("seletor:" + tdIdAluno)
        // Pega o texto dentro do elemento <td> encontrado
        let textoIdAluno = tdIdAluno.innerText.trim()
        console.log("id Aluno adc. aln:"+textoIdAluno)
        // Pega o id do botao que será clicado para adicionar o aluno
        let button = document.getElementById('btn-executar')

        $.ajax({

            url: '../../backend/administrador/adm_adicionar_aluno_turma.php',
            type: 'POST',
            data: {
                /* adiciona a variavel com o número a requisicao*/
                'textoIdTurma': textoIdTurma,
                'textoIdTurmaAluno': textoIdAluno
            },
            dataType: 'json',
            success: function (data) {
                alert('Resultado Sucesso: ' + data);
            },
            error: function (request, error) {
                alert("Resultado: " + JSON.stringify(request));
            }

        });
    })

}