$(document).ready(function() {
    // Inicialmente, esconder os campos do formulário de cadastro
    $('.field').hide();

    // Função para mostrar campos de cadastro gradualmente
    function showNextField(currentField, nextField) {
        $(currentField).on('input', function() {
            if ($(this).val().trim() !== '') {
                $(nextField).fadeIn();
            }
        });
    }

    // Configura a exibição gradual dos campos
    showNextField('#registerName', '#emailGroup');
    showNextField('#registerEmail', '#phoneGroup');
    showNextField('#registerPhone', '#addressGroup');
    showNextField('#registerAddress', '#passwordGroup');

    // Alternar entre login e cadastro
    $('#switchToRegister').on('click', function(e) {
        e.preventDefault();
        $('#loginCard').fadeOut(function() {
            $('#registerCard').fadeIn();
        });
    });

    $('#switchToLogin').on('click', function(e) {
        e.preventDefault();
        $('#registerCard').fadeOut(function() {
            $('#loginCard').fadeIn();
        });
    });

    // Envio do formulário de cadastro via AJAX
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '../assets/php/insert_usuarios.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: response,
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Erro ao enviar os dados: ' + error,
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    // Envio do formulário de login via AJAX
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '../assets/php/session_login.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: response,
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Erro ao enviar os dados: ' + error,
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
