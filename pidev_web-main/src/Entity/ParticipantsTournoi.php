<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipantsTournoi
 *
 * @ORM\Table(name="participants_tournoi", indexes={@ORM\Index(name="fk_tournoi", columns={"id_equipe"}), @ORM\Index(name="fk_tournoi2", columns={"id_tournoi"})})
 * @ORM\Entity
 */
class ParticipantsTournoi
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
     * @var int
     *
     * @ORM\Column(name="id_equipe", type="integer", nullable=false)
     */
    private $idEquipe;

    public function getIdTournoi(): ?int
    {
        return $this->idTournoi;
    }

    public function getIdEquipe(): ?int
    {
        return $this->idEquipe;
    }

    public function setIdEquipe(int $idEquipe): self
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }


}
