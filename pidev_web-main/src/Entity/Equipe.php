<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity
 */
class Equipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_equipe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_equipe", type="string", length=50, nullable=false)
     */
    private $nomEquipe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sponsor", type="string", length=50, nullable=true)
     */
    private $sponsor;

    /**
     * @var int
     *
     * @ORM\Column(name="total_winnings", type="integer", nullable=false)
     */
    private $totalWinnings = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false, options={"default"="open league"})
     */
    private $type = 'open league';

    /**
     * @var int|null
     *
     * @ORM\Column(name="classement", type="integer", nullable=true)
     */
    private $classement;

    public function getIdEquipe(): ?int
    {
        return $this->idEquipe;
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

    public function getSponsor(): ?string
    {
        return $this->sponsor;
    }

    public function setSponsor(?string $sponsor): self
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    public function getTotalWinnings(): ?int
    {
        return $this->totalWinnings;
    }

    public function setTotalWinnings(int $totalWinnings): self
    {
        $this->totalWinnings = $totalWinnings;

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

    public function getClassement(): ?int
    {
        return $this->classement;
    }

    public function setClassement(?int $classement): self
    {
        $this->classement = $classement;

        return $this;
    }


}
