<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_news", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNews;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=true)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_admin", type="string", length=50, nullable=false)
     */
    private $nomAdmin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_pub", type="date", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datePub = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="nb_commentaire", type="integer", nullable=false)
     */
    private $nbCommentaire = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nb_likes", type="integer", nullable=false)
     */
    private $nbLikes = '0';

    public function getIdNews(): ?int
    {
        return $this->idNews;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getNomAdmin(): ?string
    {
        return $this->nomAdmin;
    }

    public function setNomAdmin(string $nomAdmin): self
    {
        $this->nomAdmin = $nomAdmin;

        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->datePub;
    }

    public function setDatePub(?\DateTimeInterface $datePub): self
    {
        $this->datePub = $datePub;

        return $this;
    }

    public function getNbCommentaire(): ?int
    {
        return $this->nbCommentaire;
    }

    public function setNbCommentaire(int $nbCommentaire): self
    {
        $this->nbCommentaire = $nbCommentaire;

        return $this;
    }

    public function getNbLikes(): ?int
    {
        return $this->nbLikes;
    }

    public function setNbLikes(int $nbLikes): self
    {
        $this->nbLikes = $nbLikes;

        return $this;
    }


}
