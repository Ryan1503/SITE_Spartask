document.addEventListener('DOMContentLoaded', function () {
    const addUserForm = document.getElementById('addUserForm');
    const editUserForm = document.getElementById('editUserForm');
    const editButtons = document.querySelectorAll('.edit-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Manipular a adição de novo usuário
    addUserForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Previne o comportamento padrão do formulário
        const formData = new FormData(addUserForm);

        fetch('crud.php?action=inserir', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            Swal.fire({
                icon: data.status,
                title: data.status === 'success' ? 'Sucesso!' : 'Erro!',
                text: data.message,
                confirmButtonText: 'OK'
            }).then(() => {
                $('#addUserModal').modal('hide'); // Fecha o modal
                location.reload(); // Atualiza a lista de usuários
            });
        })
        .catch(error => {
            console.error('Erro:', error);
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Ocorreu um erro ao adicionar o usuário.'
            });
        });
    });

    // Configurar botões de edição
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = button.getAttribute('data-id');
            const nome = button.getAttribute('data-nome');
            const email = button.getAttribute('data-email');
            const senha = button.getAttribute('data-senha');
            const telefone = button.getAttribute('data-telefone');
            const endereco = button.getAttribute('data-endereco');

            // Preenche o formulário de edição com os valores dos atributos
            document.getElementById('editUserId').value = id;
            document.getElementById('editNome').value = nome;
            document.getElementById('editEmail').value = email;
            document.getElementById('editSenha').value = senha;
            document.getElementById('editTelefone').value = telefone;
            document.getElementById('editEndereco').value = endereco;
        });
    });

    // Manipular a edição de usuário
    editUserForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Previne o comportamento padrão do formulário
        const formData = new FormData(editUserForm);

        fetch('crud.php?action=atualizar', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            Swal.fire({
                icon: data.status,
                title: data.status === 'success' ? 'Sucesso!' : 'Erro!',
                text: data.message,
                confirmButtonText: 'OK'
            }).then(() => {
                $('#editUserModal').modal('hide'); // Fecha o modal
                location.reload(); // Atualiza a lista de usuários
            });
        })
        .catch(error => {
            console.error('Erro:', error);
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Ocorreu um erro ao atualizar o usuário.'
            });
        });
    });

    // Configurar botões de exclusão
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = button.getAttribute('data-id');
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter esta ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('crud.php?action=deletar&id=' + id, {
                        method: 'GET'
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            icon: data.status,
                            title: data.status === 'success' ? 'Excluído!' : 'Erro!',
                            text: data.message,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload(); // Atualiza a lista de usuários
                        });
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao excluir o usuário.'
                        });
                    });
                }
            });
        });
    });
});
