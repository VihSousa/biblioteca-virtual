<?php
require 'tarefa.php';
$tarefa = new Tarefa();

header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':  // Listar todas as tarefas
        echo json_encode($tarefa->getTarefas());
        break;

    case 'POST':  // Adicionar nova tarefa
        $input = json_decode(file_get_contents('php://input'), true);
        $novaTarefa = ['titulo' => $input['titulo'], 'status' => 'pendente'];
        $tarefa->salvarTarefa($novaTarefa);
        echo json_encode(['mensagem' => 'Tarefa adicionada!']);
        break;

    case 'PUT':  // Atualizar tarefa existente
        $input = json_decode(file_get_contents('php://input'), true);
        $indice = intval($_GET['indice']);
        $tarefa->atualizarTarefa($indice, $input['titulo'], $input['status']);
        echo json_encode(['mensagem' => 'Tarefa atualizada!']);
        break;

    case 'DELETE':  // Deletar tarefa
        $indice = intval($_GET['indice']);
        $tarefa->deletarTarefa($indice);
        echo json_encode(['mensagem' => 'Tarefa deletada!']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['mensagem' => 'Método não permitido']);
        break;
}
?>
