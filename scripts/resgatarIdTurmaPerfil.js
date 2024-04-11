function pegarIdTurmaPerfil(idTurma) {  
    const idTurmaPerfil = 1;

    if (idTurmaPerfil != null) {
        console.log("ok");
        $.ajax({
            
            url: '../../backend/professor/prof_turma.php',
            type: 'POST',
            data: {
                'idTurmaPerfil': idTurmaPerfil
            },
            dataType: 'json',
            success: function (data) {
                alert('Resultado Sucesso: ' + data);
            },
            error: function (request, error) {
                alert("Resultado: " + JSON.stringify(request));
            }
            
        });
    } else {
        console.log("null");
    }
    }
  
