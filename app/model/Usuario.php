<?php
//Arquivos necessários
require_once 'Reparticao.php';
class Usuario
{
    //Atributos
    private string $id;
    private string $nome;
    private string $email;
    private string $senha;
    private array $reparticoes;

    public function __construct($nome, $email, $senha)
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    //Métodos da lógica da aplicação

    public static function passwordHash(string $senha){
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    //Métodos acessores

    /**
     * Atribuí o conteúdo passado para o atributo privado $nome
     * @return void
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * Retorna o conteúdo do atributo privado $nome
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Atribuí o conteúdo passado para o atributo privado $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Retorna o conteúdo do atributo privado $email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Atribuí o conteúdo passado para o atributo privado $senha
     */
    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    /**
     * Retorna o conteúdo do atributo $senha
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * Adiciona a reparticao passada para o array privado de $reparticoes
     */
    public function setReparticao(Reparticao $reparticao): void
    {
        $this->reparticoes[] = $reparticao;
    }

    /**
     * Retorna o array do atributo $repaticoes
     */
    public function getReparticao(): array
    {
        return $this->reparticoes;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
