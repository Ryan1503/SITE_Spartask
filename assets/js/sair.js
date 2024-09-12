document.getElementById('log_out').addEventListener('click', function () {
    Swal.fire({
        title: 'Tem certeza que deseja sair?',
        text: "Você será desconectado da sua conta.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, sair',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log('Confirmado, enviando requisição AJAX...'); // Log para depuração
            // Realiza a chamada AJAX para sair.php
            $.ajax({
                url: '../../assets/php/sair.php', // Caminho atualizado para o arquivo sair.php
                type: 'GET',
                success: function () {
                    console.log('Requisição AJAX bem-sucedida'); // Log para depuração
                    Swal.fire(
                        'Desconectado!',
                        'Você foi desconectado com sucesso.',
                        'success'
                    ).then(() => {
                        // Redireciona o usuário após a confirmação
                        window.location.href = '../../index.php';
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Erro AJAX:', status, error); // Log para depuração
                    Swal.fire(
                        'Erro!',
                        'Ocorreu um erro ao tentar desconectar. Tente novamente.',
                        'error'
                    );
                }
            });
        }
    });
});
