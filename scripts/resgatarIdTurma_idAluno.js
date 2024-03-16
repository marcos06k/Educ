function pegarIdTurma_aluno(botao) {
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    let linha = botao.closest('tr')
    // Encontra o elemento <td> com o ID 'linha_id_turma' dentro da mesma linha
    let tdIdTurma = linha.querySelector('#linha_id_turma')
    // Pega o texto dentro do elemento <td> encontrado
    let textoIdTurma = tdIdTurma.innerText.trim()
    console.log("id Turma adc. aln:" + textoIdTurma)
    // Pega o id do botao que será clicado para adicionar o aluno
    let button = document.getElementById('botao_id_aluno_turma')

    // Quando clicar no botão para adc. aluno, faz o evento
    button.addEventListener('click', function (event) {
        event.preventDefault();
        console.log("Cliquei no botao do alubo");
        // Obtenha o elemento do botão que foi clicado
        const buttonElement = event.target;
        // Acessa o elemento <tr> (linha) que contém o botão clicado
        let linha = buttonElement.closest('tr')
        // Encontra o elemento <td> com o ID 'linha_id_aluno' dentro da mesma linha
        let tdIdAluno = linha.querySelector('#linha_id_aluno')
        // Pega o texto dentro do elemento <td> encontrado
        let textoIdAluno = tdIdAluno.innerText.trim()
        console.log("id Aluno adc. aln:"+textoIdAluno)

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