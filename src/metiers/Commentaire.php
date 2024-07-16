<?php
declare(strict_types=1);
namespace seadev\metier;



class Commentaire {

    private int $idCom;
    private string $cText;
    private string $cPj;


    public function __construct(int $idCom, string $Ctext, string $cPj )
    {
        $this->idCom = $idCom;
        $this->cText = $Ctext;
        $this->cPj   = $cPj;
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
     * Get the value of cText
     *
     * @return string
     */
    public function getCText(): string {
        return $this->cText;
    }

    /**
     * Set the value of cText
     *
     * @param string $cText
     *
     * @return self
     */
    public function setCText(string $cText): self {
        $this->cText = $cText;
        return $this;
    }

    /**
     * Get the value of cPj
     *
     * @return string
     */
    public function getCPj(): string {
        return $this->cPj;
    }

    /**
     * Set the value of cPj
     *
     * @param string $cPj
     *
     * @return self
     */
    public function setCPj(string $cPj): self {
        $this->cPj = $cPj;
        return $this;
    }

    public function __toString()
    {
        return '[Commentaire : ' . $this->idCom . ',' . $this->cText  . ',' . $this->cPj . ']';
    }
}

