<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MatchPari
 *
 * @ORM\Table(name="match_pari", indexes={@ORM\Index(name="fk_matchpari", columns={"id_match"})})
 * @ORM\Entity
 */
class MatchPari
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_MP", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMp;

    /**
     * @var int|null
     *
     * @ORM\Column(name="montant_t", type="integer", nullable=true)
     */
    private $montantT;

    /**
     * @var int|null
     *
     * @ORM\Column(name="valide", type="integer", nullable=true)
     */
    private $valide = '0';

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_match", referencedColumnName="id_equipe")
     * })
     */
    private $idMatch;

    public function getIdMp(): ?int
    {
        return $this->idMp;
    }

    public function getMontantT(): ?int
    {
        return $this->montantT;
    }

    public function setMontantT(?int $montantT): self
    {
        $this->montantT = $montantT;

        return $this;
    }

    public function getValide(): ?int
    {
        return $this->valide;
    }

    public function setValide(?int $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    public function getIdMatch(): ?Equipe
    {
        return $this->idMatch;
    }

    public function setIdMatch(?Equipe $idMatch): self
    {
        $this->idMatch = $idMatch;

        return $this;
    }


}
