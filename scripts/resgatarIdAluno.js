function pegarIdAluno(botao) {
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    var linha = botao.closest('tr')

    // Encontra o elemento <td> com o ID 'linha_id_Aluno' dentro da mesma linha
    var tdIdAluno = linha.querySelector('#linha_id_aluno')
    console.log("seletor:" + tdIdAluno)

    // Pega o texto dentro do elemento <td> encontrado
    var textoIdAluno = tdIdAluno.innerText.trim()
    console.log("id:" + textoIdAluno)
    

    var form = document.getElementById('form_editar_aluno')

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        $.ajax({

            url: '../../backend/administrador/adm_editar_dados_usuarios.php',
            type: 'POST',
            data: {
                /* adiciona a variavel com o número a requisicao*/
                'textoIdAluno': textoIdAluno,
                'tipo_usuario': document.getElementById("tipo_usuario").value,
                'novo_nome':  document.getElementById("novo_nome").value,
                'novo_sobrenome': document.getElementById("novo_sobrenome").value,
                'novo_cpf': document.getElementById("novo_cpf").value, 
                'novo_telefone': document.getElementById("novo_telefone").value,
                'nova_data_nascimento': document.getElementById("nova_data_nascimento").value,
                'novo_email': document.getElementById("novo_email").value,
                'nova_senha': document.getElementById("nova_senha").value
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