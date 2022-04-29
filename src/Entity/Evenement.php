<?php

namespace App\Entity;

use Cassandra\Date;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Mapping\ClassMetadata;


/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id_evenement;

    /**
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     * * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(name="nbmax_participants", type="integer", nullable=true)
     */
    private $nbmax_participants;

    /**
     * @ORM\Column(name="date_evenement", type="string", nullable=true)
     * @Assert\Date
     * @var string A "Y-m-d" formatted value
     */
    private $dateEvenement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="image_event", type="string", length=100, nullable=false)
     * * @Assert\Image
     */
    private $imageEvent;

    /**
     * @ORM\ManyToOne(targetEntity=Sponsor::class, inversedBy="evenement")
     * @ORM\JoinColumn(name="id_sponsor", referencedColumnName="id_sponsor")
     */
    private $sponsor;


    public function getid_evenement(): ?int
    {
        return $this->id_evenement;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


    public function getnbmax_participants()
    {
        return $this->nbmax_participants;
    }


    public function setnbmax_participants($nbmax_participants): void
    {
        $this->nbmax_participants = $nbmax_participants;
    }
    public function getNbmaxParticipants(): ?int
    {
        return $this->nbmax_participants;
    }

    public function setNbmaxParticipants(?int $nbmax_participants): self
    {
        $this->nbmax_participants = $nbmax_participants;

        return $this;
    }

    /**
     * @return string|null
     */

    public function getDateEvenement(): ?string
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(?string $dateEvenement): self
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getlocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getImageEvent(): ?string
    {
        return $this->imageEvent;
    }

    public function setImageEvent(File $file=null): self
    {
        $this->imageEvent = $file;

        return $this;
    }

    public function getSponsor(): ?Sponsor
    {
        return $this->sponsor;
    }

    public function setSponsor(?sponsor $sponsor): self
    {
        $this->sponsor = $sponsor;

        return $this;
    }
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('nom', new Assert\Regex([

            'pattern' => '/\d/',
            'match' => false,
            'message' => 'Your name cannot contain a number',
        ]));
        $metadata->addPropertyConstraint('dateEvenement', new Assert\Date());
    }

    public function getIdEvenement(): ?int
    {
        return $this->id_evenement;
    }

    public function setAllDay($allDay)
    {
        $allDay= true;
        echo $allDay;
    }

    public function setBackgroundColor($backgroundColor)
    {

    }

    public function setBorderColor($borderColor)
    {
    }


}
