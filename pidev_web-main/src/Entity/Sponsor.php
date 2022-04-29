<?php

namespace App\Entity;


use Symfony\Component\Validator\Constraint;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity
 */
class Sponsor
{
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id_sponsor;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nom;

    /**
     * @var string|null
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $email;

    /**
     * @var int|null
     * @ORM\Column(name="num_contact", type="integer", nullable=false)
     */
    private $numContact;

    /**
     * @var string|null
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     * @Assert\Type("string")
     */
    private $type;
    /**
     * @ORM\OneToMany(targetEntity=Evenement::class, mappedBy="sponsor")
     */
    private $evenement;

    public function __construct()
    {
        $this->evenement = new ArrayCollection();
    }

    public function getid_sponsor(): ?int
    {
        return $this->id_sponsor;
    }
    public function getIdSponsor(): ?int
    {
        return $this->id_sponsor;
    }

    public function setid_sponsor(int $id_sponsor): void
    {
        $this->id_sponsor = $id_sponsor;
    }
    public function setIdSponsor(int $id_sponsor): void
    {
        $this->id_sponsor = $id_sponsor;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function getNumContact(): ?int
    {
        return $this->numContact;
    }


    public function setNumContact(?int $num_contact): void
    {
        $this->numContact = $num_contact;
    }


    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenement(): Collection
    {
        return $this->evenement;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenement->contains($evenement)) {
            $this->evenement[] = $evenement;
            $evenement->setSponsor($this);
        }

        return $this;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {

        $metadata->addPropertyConstraint('nom', new Assert\Regex([
            'pattern' => '/\d/',
            'match' => false,
            'message' => 'Your name cannot contain a number',
        ]));
        $metadata->addPropertyConstraint('nom', new Assert\Length([
            'min' => 2,
            'max' => 50,
            'minMessage' => 'Your first name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
        ]));
        $metadata->addPropertyConstraint('email', new Assert\Email([
            'message' => 'The email "{{ value }}" is not a valid email.',
        ]));
        $metadata->addPropertyConstraint('type', new Assert\Type('string'));
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenement->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getSponsor() === $this) {
                $evenement->setSponsor(null);
            }
        }

        return $this;
    }
}
