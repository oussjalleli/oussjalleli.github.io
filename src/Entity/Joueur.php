<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity
 */
class Joueur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_joueur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJoueur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ingame_name", type="string", length=50, nullable=true)
     */
    private $ingameName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nationalite", type="string", length=50, nullable=true)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_equipe", type="string", length=255, nullable=false)
     */
    private $nomEquipe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="niveau", type="string", length=50, nullable=true)
     */
    private $niveau;

    /**
     * @var string|null
     *
     * @ORM\Column(name="evaluation", type="string", length=50, nullable=true)
     */
    private $evaluation;

    public function getIdJoueur(): ?int
    {
        return $this->idJoueur;
    }

    public function getIngameName(): ?string
    {
        return $this->ingameName;
    }

    public function setIngameName(?string $ingameName): self
    {
        $this->ingameName = $ingameName;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getNomEquipe(): ?string
    {
        return $this->nomEquipe;
    }

    public function setNomEquipe(string $nomEquipe): self
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEvaluation(): ?string
    {
        return $this->evaluation;
    }

    public function setEvaluation(?string $evaluation): self
    {
        $this->evaluation = $evaluation;

        return $this;
    }


}
