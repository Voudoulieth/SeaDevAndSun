<?php
declare(strict_types=1);
namespace seadevandsun\metier;


class Utilisateur {

    private int     $idUser;
    private string  $nom;
    private string  $prenom;
    private string  $email;
    private string  $passWord;
    private bool    $isAdmin;

    public function __construct(int $idUser, string $nom, string $prenom, string $email, string $passWord, bool $isAdmin = false)
    {
        $this->idUser   = $idUser;
        $this->nom      = $nom;
        $this->prenom   = $prenom;
        $this->email    = $email;
        $this->passWord = $passWord;
        $this->isAdmin  = $isAdmin;
    }

/**
     * Get the value of idUser
     *
     * @return int
     */
    public function getIdUser(): int {
        return $this->idUser;
    }

    // /**
    //  * Set the value of idUser
    //  *
    //  * @param int $idUser
    //  *
    //  * @return self
    //  */
    // public function setIdUser(int $idUser): self {
    //     $this->idUser = $idUser;
    //     return $this;
    // }

    /**
     * Get the value of nom
     *
     * @return string
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param string $nom
     *
     * @return self
     */
    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return string
     */
    public function getPrenom(): string {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param string $prenom
     *
     * @return self
     */
    public function setPrenom(string $prenom): self {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of passWord
     *
     * @return string
     */
    public function getPassWord(): string {
        return $this->passWord;
    }

    /**
     * Set the value of passWord
     *
     * @param string $passWord
     *
     * @return self
     */
    public function setPassWord(string $passWord): self {
        $this->passWord = $passWord;
        return $this;
    }

    
    public function isAdmin(): bool {
        return $this->isAdmin;
    }

    public function __toString():string
    {
        return '[Utilisateur :'. $this->idUser . ',' . $this->nom . ','. $this->prenom . ','. $this->email . ',' . $this->passWord . ',' . ' isAdmin: ' . ($this->isAdmin ? 'true' : 'false'). ']';
    }
}





