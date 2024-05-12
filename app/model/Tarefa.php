<?php
    //Arquivos necessários
    require_once 'Prioridade.php';
    class Tarefa{
        //Atributos
        private string $descricao;
        private DateTime $prazo;
        private $duracao;
        private Prioridade $prioridade;

        //Métodos acessores

        /**
         * Atribuí o valor informado para o atributo privado $descricao
         */
        public function setDescricao(string $descricao):void{
            $this->descricao = $descricao;
        }

        /**
         * Retorna o valor do atributo privado $descricao
         */
        public function getDescricao():string{
            return $this->descricao;
        }

        /**
         * Atribuí o valor informado para o atributo privado $prazo
         */
        public function setPrazo(DateTime $prazo):void{
            $this->prazo = $prazo;
        }

        /**
         * Retorna o valor do atributo privado $prazo
         */
        public function getPrazo():DateTime{
            return $this->prazo;
        }

        /**
         * Atribuí o valor informado para o atributo privado $duracao
         */
        public function setDuracao($duracao):void{
            $this->duracao = $duracao;
        }

        /**
         * Retorna o valor do atributo privado $duracao
         */
        public function getDuracao(){
            return $this->duracao;
        }

        /**
         * Atribuí o valor informado para o atributo privado $prioridade
         */
        public function setPrioridade(Prioridade $prioridade):void{
            $this->prioridade = $prioridade;
        }

        /**
         * Retorna o valor do atributo privado $prioridade
         */
        public function getPrioridade():Prioridade{
            return $this->prioridade;
        }
    }
?>