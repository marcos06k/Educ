function pegarIdTurma(botao) {
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    var linha = botao.closest('tr')

    // Encontra o elemento <td> com o ID 'linha_id_turma' dentro da mesma linha
    var tdIdTurma = linha.querySelector('#linha_id_turma')
    console.log("seletor:" + tdIdTurma)

    // Pega o texto dentro do elemento <td> encontrado
    var textoIdTurma = tdIdTurma.innerText.trim()
    console.log(textoIdTurma)

    var form = document.getElementById('form_editar_turma')

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        $.ajax({

            url: '../../backend/administrador/adm_editar_dados_turma.php',
            type: 'POST',
            data: {
                /* adiciona a variavel com o número a requisicao*/
                'textoIdTurma': textoIdTurma
            },
            dataType: 'json',
            success: function (data) {
                alert('Resultado Sucesso: ' + data);
                enviarDados()
                atualizarRedirecionarPagina()
            },
            error: function (request, error) {
                alert("Resultado: " + JSON.stringify(request));
            }
            
        });

       

        function enviarDados() {
            // Obtenha os dados do formulário
            var formData = new FormData(document.getElementById('form_editar_turma'));

            // Use a função fetch para enviar os dados para o script PHP
            fetch('../../backend/administrador/adm_editar_dados_turma.php', {
                method: 'post',
                body: formData
            })
        }

        function atualizarRedirecionarPagina() {
            location.href = location.href;
            window.location.href = 'gerenciar_turmas.php';
        }
    })
  
}