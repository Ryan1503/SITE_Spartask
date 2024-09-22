<?php
session_start();
include 'config.php'; // Arquivo de conexão com o banco de dados

// Simulação de Login - Defina manualmente para testes (troque por seu sistema de login real)
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['usuario_id'] = 21; // ID do usuário logado para teste
    $_SESSION['nome'] = 'John Pork'; // Nome do usuário logado para teste
}

// Função para enviar mensagem
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mensagem'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $mensagem = htmlspecialchars($_POST['mensagem']);
    $destinatario_id = !empty($_POST['destinatario_id']) ? intval($_POST['destinatario_id']) : NULL;

    $sql = "INSERT INTO mensagens (usuario_id, mensagem, destinatario_id) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("isi", $usuario_id, $mensagem, $destinatario_id);

    if ($stmt->execute()) {
        echo "Mensagem enviada com sucesso.";
    } else {
        echo "Erro ao enviar mensagem.";
    }

    $stmt->close();
    exit;
}

// Função para carregar mensagens
function carregarMensagens($conexao) {
    $usuario_id = $_SESSION['usuario_id'];

    $sql = "SELECT m.mensagem, m.timestamp, u.nome
            FROM mensagens m
            JOIN usuarios u ON m.usuario_id = u.id
            WHERE m.destinatario_id IS NULL
            OR m.usuario_id = ?
            OR m.destinatario_id = ?
            ORDER BY m.timestamp DESC";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>{$row['nome']}:</strong> {$row['mensagem']} <small>({$row['timestamp']})</small></p>";
    }

    $stmt->close();
}

// Função para carregar usuários
function carregarUsuarios($conexao) {
    $sql = "SELECT id, nome FROM usuarios";
    $result = $conexao->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Privado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }
        #chat-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        #chat-box {
            height: 400px;
            overflow-y: scroll;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        #chat-box p {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 10px;
            font-size: 14px;
        }
        #chat-box p strong {
            color: #007bff;
        }
        #chat-form {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #f1f1f1;
            border-top: 1px solid #ddd;
        }
        #chat-form input, #chat-form select {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #chat-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #chat-form button:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div id="chat-container">
    <div id="chat-box">
        <?php carregarMensagens($conexao); ?>
    </div>

    <form id="chat-form" method="POST" action="chat.php">
        <input type="text" id="mensagem" name="mensagem" placeholder="Sua mensagem" required>
        <select id="destinatario" name="destinatario_id">
            <option value="">Mensagem Pública</option>
            <?php carregarUsuarios($conexao); ?>
        </select>
        <button type="submit">Enviar</button>
    </form>
</div>

<script>
    // Atualiza as mensagens a cada 2 segundos
    function atualizarMensagens() {
        $.ajax({
            url: 'chat.php',
            method: 'GET',
            success: function (data) {
                $('#chat-box').html($(data).find('#chat-box').html());
            }
        });
    }

    // Envia a mensagem sem recarregar a página
    $('#chat-form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'chat.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function () {
                $('#mensagem').val('');
                atualizarMensagens();
            }
        });
    });

    setInterval(atualizarMensagens, 2000);
</script>

</body>
</html>
