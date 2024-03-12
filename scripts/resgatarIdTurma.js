function pegarIdTurma(botao) {
    // Acessa o elemento <tr> (linha) que contém o botão clicado
    var linha = botao.closest('tr')

    // Encontra o elemento <td> com o ID 'linha_id_turma' dentro da mesma linha
    var tdIdTurma = linha.querySelector('#linha_id_turma')
    console.log("seletor:" + tdIdTurma)

    // Pega o texto dentro do elemento <td> encontrado
    var textoIdTurma = tdIdTurma.innerText.trim()
    console.log("id:" + textoIdTurma)
    

    var form = document.getElementById('form_editar_turma')

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        $.ajax({

            url: '../../backend/administrador/adm_editar_dados_turma.php',
            type: 'POST',
            data: {
                /* adiciona a variavel com o número a requisicao*/
                'textoIdTurma': textoIdTurma,
                'turno': document.getElementById("turno").value,
                'curso':  document.getElementById("curso").value,
                'data_inicio': document.getElementById("editar_data_inicio").value,
                'data_termino': document.getElementById("editar_data_termino").value, 
                'id_professor': document.getElementById("id_professor").value
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