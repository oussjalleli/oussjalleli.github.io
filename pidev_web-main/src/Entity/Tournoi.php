<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournoi
 *
 * @ORM\Table(name="tournoi")
 * @ORM\Entity
 */
class Tournoi
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tournoi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTournoi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_tournoi", type="string", length=50, nullable=true)
     */
    private $nomTournoi;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_max", type="integer", nullable=true)
     */
    private $nbMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=true)
     */
    private $etat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="r1", type="integer", nullable=true)
     */
    private $r1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="r2", type="integer", nullable=true)
     */
    private $r2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="r3", type="integer", nullable=true)
     */
    private $r3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="p1", type="integer", nullable=true)
     */
    private $p1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="p2", type="integer", nullable=true)
     */
    private $p2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="p3", type="integer", nullable=true)
     */
    private $p3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_tournoi", type="string", length=50, nullable=true)
     */
    private $imageTournoi;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_tournoi", type="date", nullable=true)
     */
    private $dateTournoi;

    /**
     * @var int|null
     *
     * @ORM\Column(name="heure", type="integer", nullable=true)
     */
    private $heure;

    public function getIdTournoi(): ?int
    {
        return $this->idTournoi;
    }

    public function getNomTournoi(): ?string
    {
        return $this->nomTournoi;
    }

    public function setNomTournoi(?string $nomTournoi): self
    {
        $this->nomTournoi = $nomTournoi;

        return $this;
    }

    public function getNbMax(): ?int
    {
        return $this->nbMax;
    }

    public function setNbMax(?int $nbMax): self
    {
        $this->nbMax = $nbMax;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getR1(): ?int
    {
        return $this->r1;
    }

    public function setR1(?int $r1): self
    {
        $this->r1 = $r1;

        return $this;
    }

    public function getR2(): ?int
    {
        return $this->r2;
    }

    public function setR2(?int $r2): self
    {
        $this->r2 = $r2;

        return $this;
    }

    public function getR3(): ?int
    {
        return $this->r3;
    }

    public function setR3(?int $r3): self
    {
        $this->r3 = $r3;

        return $this;
    }

    public function getP1(): ?int
    {
        return $this->p1;
    }

    public function setP1(?int $p1): self
    {
        $this->p1 = $p1;

        return $this;
    }

    public function getP2(): ?int
    {
        return $this->p2;
    }

    public function setP2(?int $p2): self
    {
        $this->p2 = $p2;

        return $this;
    }

    public function getP3(): ?int
    {
        return $this->p3;
    }

    public function setP3(?int $p3): self
    {
        $this->p3 = $p3;

        return $this;
    }

    public function getImageTournoi(): ?string
    {
        return $this->imageTournoi;
    }

    public function setImageTournoi(?string $imageTournoi): self
    {
        $this->imageTournoi = $imageTournoi;

        return $this;
    }

    public function getDateTournoi(): ?\DateTimeInterface
    {
        return $this->dateTournoi;
    }

    public function setDateTournoi(?\DateTimeInterface $dateTournoi): self
    {
        $this->dateTournoi = $dateTournoi;

        return $this;
    }

    public function getHeure(): ?int
    {
        return $this->heure;
    }

    public function setHeure(?int $heure): self
    {
        $this->heure = $heure;

        return $this;
    }


}
