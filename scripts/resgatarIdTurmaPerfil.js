function pegarIdTurmaPerfil(idTurma) {  
    console.log(idTurma);
        $.ajax({
            
            url: '../../backend/professor/prof_turma.php',
            type: 'POST',
            data: {
                'idTurmaPerfil': idTurma
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
  
