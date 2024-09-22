<?php
require('config.php');

// Função para limpar dados de entrada
function limpar_entrada($dados) {
    return array_map('trim', $dados);
}

$response = array('status' => 'error', 'message' => 'Ocorreu um erro.');

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'inserir') {
        $dados = limpar_entrada($_POST);
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];

        $sql = "INSERT INTO usuarios (nome, email, senha, telefone, endereco) VALUES ('$nome', '$email', '$senha', '$telefone', '$endereco')";
        if ($conexao->query($sql)) {
            $response['status'] = 'success';
            $response['message'] = 'Registro inserido com sucesso.';
        } else {
            $response['message'] = 'Erro ao inserir registro: ' . $conexao->error;
        }
    } elseif ($action == 'atualizar') {
        $dados = limpar_entrada($_POST);
        $id = $dados['id'];
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];

        $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', telefone='$telefone', endereco='$endereco' WHERE id=$id";
        if ($conexao->query($sql)) {
            $response['status'] = 'success';
            $response['message'] = 'Registro atualizado com sucesso.';
        } else {
            $response['message'] = 'Erro ao atualizar registro: ' . $conexao->error;
        }
    } elseif ($action == 'deletar') {
        $id = $_GET['id'];
        $sql = "DELETE FROM usuarios WHERE id=$id";
        if ($conexao->query($sql)) {
            $response['status'] = 'success';
            $response['message'] = 'Registro deletado com sucesso.';
        } else {
            $response['message'] = 'Erro ao deletar registro: ' . $conexao->error;
        }
    }
}

// Define o cabeçalho como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
