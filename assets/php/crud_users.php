<?php
require('config.php');

function limpar_entrada($dados)
{
    return array_map('trim', $dados);
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Ação de inserir um novo registro
    if ($action == 'inserir') {
        $dados = limpar_entrada($_POST);
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];

        $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, telefone, endereco) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $email, $senha, $telefone, $endereco);

        if ($stmt->execute()) {
            echo "Registro inserido com sucesso.";
        } else {
            echo "Erro ao inserir registro: " . $conexao->error;
        }
        $stmt->close();
    }

    // Ação de atualizar um registro existente
    elseif ($action == 'atualizar') {
        $dados = limpar_entrada($_POST);
        $id = $dados['id'];
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];

        $stmt = $conexao->prepare("UPDATE usuarios SET nome=?, email=?, senha=?, telefone=?, endereco=? WHERE id=?");
        $stmt->bind_param("sssssi", $nome, $email, $senha, $telefone, $endereco, $id);

        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar registro: " . $conexao->error;
        }
        $stmt->close();
    }

    // Ação de deletar um registro
    elseif ($action == 'deletar') {
        $id = intval($_GET['id']);

        $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Registro deletado com sucesso.";
        } else {
            echo "Erro ao deletar registro: " . $conexao->error;
        }
        $stmt->close();
    }
}
?>
