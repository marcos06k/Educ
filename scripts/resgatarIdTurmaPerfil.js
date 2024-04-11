function pegarIdTurmaPerfil(idTurma) {  
        console.log("id_turma " + idTurma);

        // transformando a string em objeto pra mandar no json
        var jsonData = JSON.stringify(idTurma);
        $.ajax({
            
            url: '../../backend/professor/prof_turma.php',
            type: 'POST',
            data: {
                'idTurma': jsonData
            },
            dataType: 'json',
            success: function (data) {
                alert('Resultado Sucesso: ' + data);
            },
            error: function (request, error) {
                alert("Resultado: " + JSON.stringify(request));
            }
            
        });
    } 
  
