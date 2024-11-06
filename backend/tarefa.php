<?php
class Tarefa {
    private $file = 'tarefas.json';

    public function getTarefas() {
        return json_decode(file_get_contents($this->file), true) ?: [];
    }

    public function salvarTarefa($novaTarefa) {
        $tarefas = $this->getTarefas();
        $tarefas[] = $novaTarefa;
        file_put_contents($this->file, json_encode($tarefas));
    }

    public function atualizarTarefa($indice, $titulo, $status) {
        $tarefas = $this->getTarefas();
        if (isset($tarefas[$indice])) {
            $tarefas[$indice]['titulo'] = $titulo;
            $tarefas[$indice]['status'] = $status;
            file_put_contents($this->file, json_encode($tarefas));
        }
    }

    public function deletarTarefa($indice) {
        $tarefas = $this->getTarefas();
        if (isset($tarefas[$indice])) {
            unset($tarefas[$indice]);
            file_put_contents($this->file, json_encode(array_values($tarefas)));
        }
    }
}
?>
