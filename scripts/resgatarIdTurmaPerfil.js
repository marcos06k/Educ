function pegarIdTurmaPerfil(idTurma) {
    console.log("id_turma " + idTurma);

    // transformando a string em objeto pra mandar no json
    var jsonData = JSON.stringify(idTurma);
    $.ajax({

        url: 'teste.php',
        type: 'POST',
        data: {
            'idTurma': jsonData
        },
        dataType: 'json',
        success: function (data) {
            alert('Resultado Sucesso: ' + data);
            window.location.href = "teste.php"
        },
        error: function (request, error) {
            alert("Resultado: " + JSON.stringify(request));
            window.location.href = "teste.php"
        }

    });
}

