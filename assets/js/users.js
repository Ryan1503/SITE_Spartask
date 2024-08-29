document.addEventListener('DOMContentLoaded', function () {
    const addUserForm = document.getElementById('addUserForm');
    const editUserForm = document.getElementById('editUserForm');
    const editButtons = document.querySelectorAll('.edit-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Manipular a adição de novo usuário
    addUserForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(addUserForm);

        fetch('crud.php?action=inserir', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            $('#addUserModal').modal('hide');
            location.reload(); // Atualiza a lista de usuários
        })
        .catch(error => console.error('Erro:', error));
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
        event.preventDefault();
        const formData = new FormData(editUserForm);

        fetch('crud.php?action=atualizar', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            $('#editUserModal').modal('hide');
            location.reload(); // Atualiza a lista de usuários
        })
        .catch(error => console.error('Erro:', error));
    });

    // Configurar botões de exclusão
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = button.getAttribute('data-id');
            if (confirm('Tem certeza de que deseja excluir este usuário?')) {
                fetch('crud.php?action=deletar&id=' + id, {
                    method: 'GET'
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload(); // Atualiza a lista de usuários
                })
                .catch(error => console.error('Erro:', error));
            }
        });
    });
});