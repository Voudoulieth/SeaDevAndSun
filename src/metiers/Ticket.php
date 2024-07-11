<?php 
declare(strict_types=1);
namespace seadevandsun\metier;


class Ticket {
    
    private int $idTicket;
    private string $pj;
    private string $demande;
    private string $raison;
    private string $status;

    public function __construct(int $idTicket, string $pj, string $demande, string $raison, string $status)
    {
        $this->idTicket     = $idTicket;
        $this->pj           = $pj;
        $this->demande      = $demande;
        $this->raison       = $raison;
        $this->status       = $status;
    }

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

    /**
     * Get the value of pj
     *
     * @return string
     */
    public function getPj(): string {
        return $this->pj;
    }

    /**
     * Set the value of pj
     *
     * @param string $pj
     *
     * @return self
     */
    public function setPj(string $pj): self {
        $this->pj = $pj;
        return $this;
    }

    /**
     * Get the value of demande
     *
     * @return string
     */
    public function getDemande(): string {
        return $this->demande;
    }

    /**
     * Set the value of demande
     *
     * @param string $demande
     *
     * @return self
     */
    public function setDemande(string $demande): self {
        $this->demande = $demande;
        return $this;
    }

    /**
     * Get the value of raison
     *
     * @return string
     */
    public function getRaison(): string {
        return $this->raison;
    }

    /**
     * Set the value of raison
     *
     * @param string $raison
     *
     * @return self
     */
    public function setRaison(string $raison): self {
        $this->raison = $raison;
        return $this;
    }

    /**
     * Get the value of status
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status): self {
        $this->status = $status;
        return $this;
    }

    public function __toString()
    {
        return '[Ticket : ' . $this->idTicket . ',' . $this->pj . ',' . $this->demande . ',' . $this->raison . ',' . $this->status . ']';
    }
}