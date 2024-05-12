<?php
    //Arquivos necessários
    require_once "Tarefa.php";
    class Reparticao{
        //Atributos
        private string $nome;
        private array $tarefas;

        //Métodos acessores

        /**
         * Atribuí o conteúdo informado para o atributo privado $nome
         */
        public function setNome(string $nome):void{
            $this->nome = $nome;
        }

        /**
         * Retorna o valor do atributo privado $nome
         */
        public function getNome():string{
            return $this->nome;
        }

        /**
         * Insere no array privado $tarefas a tarefa informada como parâmetro
         */
        public function setTarefa(Tarefa $tarefa):void{
            $this->tarefas []= $tarefa;
        }

        /**
         * Retorna o array de tarefas armazenado no atributo privado $tarefas
         */
        public function getTarefa():array{
            return $this->tarefas;
        }
    }
?>