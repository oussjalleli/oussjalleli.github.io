<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Match
 *
 * @ORM\Table(name="match_", indexes={@ORM\Index(name="fk_matchequipe1", columns={"id_equipe1"}), @ORM\Index(name="fk_matchequipe2", columns={"id_equipe2"}), @ORM\Index(name="fk_matchtournoi", columns={"id_tournoi"})})
 * @ORM\Entity
 */
class Match_
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_match", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatch;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="serveur", type="string", length=50, nullable=false)
     */
    private $serveur;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=false, options={"default"="non joué"})
     */
    private $etat = 'non joué';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score1", type="integer", nullable=true)
     */
    private $score1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score2", type="integer", nullable=true)
     */
    private $score2;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe1", referencedColumnName="id_equipe")
     * })
     */
    private $idEquipe1;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe2", referencedColumnName="id_equipe")
     * })
     */
    private $idEquipe2;

    /**
     * @var \Tournoi
     *
     * @ORM\ManyToOne(targetEntity="Tournoi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tournoi", referencedColumnName="id_tournoi")
     * })
     */
    private $idTournoi;

    public function getIdMatch(): ?int
    {
        return $this->idMatch;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getServeur(): ?string
    {
        return $this->serveur;
    }

    public function setServeur(string $serveur): self
    {
        $this->serveur = $serveur;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getScore1(): ?int
    {
        return $this->score1;
    }

    public function setScore1(?int $score1): self
    {
        $this->score1 = $score1;

        return $this;
    }

    public function getScore2(): ?int
    {
        return $this->score2;
    }

    public function setScore2(?int $score2): self
    {
        $this->score2 = $score2;

        return $this;
    }

    public function getIdEquipe1(): ?Equipe
    {
        return $this->idEquipe1;
    }

    public function setIdEquipe1(?Equipe $idEquipe1): self
    {
        $this->idEquipe1 = $idEquipe1;

        return $this;
    }

    public function getIdEquipe2(): ?Equipe
    {
        return $this->idEquipe2;
    }

    public function setIdEquipe2(?Equipe $idEquipe2): self
    {
        $this->idEquipe2 = $idEquipe2;

        return $this;
    }

    public function getIdTournoi(): ?Tournoi
    {
        return $this->idTournoi;
    }

    public function setIdTournoi(?Tournoi $idTournoi): self
    {
        $this->idTournoi = $idTournoi;

        return $this;
    }


}
