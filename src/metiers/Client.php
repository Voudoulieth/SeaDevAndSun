<?php
declare(strict_types=1);
namespace seadevandsun\metier;

class Client {

    private int $idClient;
    private string $nom;
    private string $prenom;
    private string $email;

    public function __construct( int $idClient, string $nom, string $prenom, string $email)
    {
        $this->idClient = $idClient;
        $this->nom      = $nom;
        $this->prenom   = $prenom;
        $this->email    = $email;
    }


    /**
     * Get the value of idClient
     *
     * @return int
     */
    public function getIdClient(): int {
        return $this->idClient;
    }

    // /**
    //  * Set the value of idClient
    //  *
    //  * @param int $idClient
    //  *
    //  * @return self
    //  */
    // public function setIdClient(int $idClient): self {
    //     $this->idClient = $idClient;
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

    public function __toString()
    {
        return '[Client : ' . $this->idClient . ',' . $this->nom . ',' . $this->prenom . ',' . $this->email . ']';
    }
}