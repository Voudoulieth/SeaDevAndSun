<?php
declare(strict_types=1);
namespace seadevandsun\metier;


class Utilisateur {

    private int $idUser;
    private string $userName;
    private string $passWord;

    public function __construct(int $idUser, string $userName, string $passWord)
    {
        $this->idUser = $idUser;
        $this->userName = $userName;
        $this->passWord = $passWord;
    }

    





    /**
     * Get the value of idUser
     *
     * @return int
     */
    public function getIdUser(): int {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
    //  * @param int $idUser
    //  *
    //  * @return self
    //  */
    // public function setIdUser(int $idUser): self {
    //     $this->idUser = $idUser;
    //     return $this;
    // }

    /**
     * Get the value of userName
     *
     * @return string
     */
    public function getUserName(): string {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @param string $userName
     *
     * @return self
     */
    public function setUserName(string $userName): self {
        $this->userName = $userName;
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

    // /**
    //  * Set the value of passWord
    //  *
    //  * @param string $passWord
    //  *
    //  * @return self
    //  */
    // public function setPassWord(string $passWord): self {
    //     $this->passWord = $passWord;
    //     return $this;
    // }

    public function __toString()
    {
        return '[Utilisateur :'. $this->idUser . ',' . $this->userName . ',' . $this->passWord . ']';
    }
}





