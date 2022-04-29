<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pari
 *
 * @ORM\Table(name="pari", indexes={@ORM\Index(name="fk_pariuser", columns={"id_utilisateur"}), @ORM\Index(name="fk_parimatch", columns={"id_MP"})})
 * @ORM\Entity
 */
class Pari
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pari", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPari;

    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     */
    private $idUtilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="id_MP", type="integer", nullable=false)
     */
    private $idMp;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=false)
     */
    private $montant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reponse", type="string", length=50, nullable=true)
     */
    private $reponse;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_supp", type="string", length=300, nullable=false)
     */
    private $reponseSupp;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    public function getIdPari(): ?int
    {
        return $this->idPari;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getIdMp(): ?int
    {
        return $this->idMp;
    }

    public function setIdMp(int $idMp): self
    {
        $this->idMp = $idMp;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(?string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getReponseSupp(): ?string
    {
        return $this->reponseSupp;
    }

    public function setReponseSupp(string $reponseSupp): self
    {
        $this->reponseSupp = $reponseSupp;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }


}
