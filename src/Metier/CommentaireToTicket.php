<?php
declare(strict_types=1);
namespace Seadev\Metier;


class CommentaireToTicket {

    private int $idCom;
    private int $idTicket;

    public function __construct( int $idCom, int $idTicket)
    {
        $this->idCom    = $idCom;
        $this->idTicket = $idTicket;
    }

    /**
     * Get the value of idCom
     *
     * @return int
     */
    public function getIdCom(): int {
        return $this->idCom;
    }

    // /**
    //  * Set the value of idCom
    //  *
    //  * @param int $idCom
    //  *
    //  * @return self
    //  */
    // public function setIdCom(int $idCom): self {
    //     $this->idCom = $idCom;
    //     return $this;
    // }

    /**
     * Get the value of idTicket
     *
     * @return int
     */
    public function getIdTicket(): int {
        return $this->idTicket;
    }

    // /**
    //  * Set the value of idTicket
    //  *
    //  * @param int $idTicket
    //  *
    //  * @return self
    //  */
    // public function setIdTicket(int $idTicket): self {
    //     $this->idTicket = $idTicket;
    //     return $this;
    // }

    public function __toString()
    {
        return '[Commentaire To Ticket :' . $this->idCom . ',' . $this->idTicket . ']';
    }
}