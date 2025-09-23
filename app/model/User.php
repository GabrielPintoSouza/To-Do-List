<?php
//Required files
require_once 'Reparticao.php';
class User
{
    //Atributes
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private array $folders;

    public function __construct($name, $email, $password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    //Application logic methods

    public static function passwordHash(string $password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    //Access methods

    /**
     * Assigned the content passed to the private attribute $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the content of the private attribute $name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Assigned the content passed to the private attribute $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Returns the content of the private attribute $email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Assigned the content passed to the private attribute $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Returns the content of the private attribute $password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Assigned the content passed to the private attribute $folders
     */
    public function setReparticao(Reparticao $reparticao): void
    {
        $this->folders[] = $reparticao;
    }

    /**
     * Returns the content of the private attribute $folders
     */
    public function getReparticao(): array
    {
        return $this->folders;
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
