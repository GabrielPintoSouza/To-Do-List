<?php
    class Prioridade{
        //Atributos
        private string $descricao;
        private int $peso;

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
         * Atribuí o valor informado para o atributo privado $peso
         */
        public function setPeso(int $peso):void{
            $this->peso = $peso;
        }

        /**
         * Retorna o valor do atributo privado $peso
         */
        public function getPeso():int{
            return $this->peso;
        }
    }
?>