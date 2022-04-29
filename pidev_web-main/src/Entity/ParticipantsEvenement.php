<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipantsEvenement
 *
 * @ORM\Table(name="participants_evenement", indexes={@ORM\Index(name="fk_event1", columns={"id_evenement"}), @ORM\Index(name="fk_event2", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class ParticipantsEvenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_evenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenement;

    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     */
    private $idUtilisateur;

    public function getIdEvenement(): ?int
    {
        return $this->idEvenement;
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


}
