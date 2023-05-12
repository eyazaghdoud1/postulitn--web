<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\CandidaturesRepository;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CandidaturesRepository::class)]
class Candidatures
{
    /*
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'id', type:'integer',nullable:false)]
    #[Groups(["candidatures", "entretiens"])]
    private ?int $id = null;

    /*
    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=100, nullable=false)
     */
    #[ORM\Column(length:100, nullable:false)]
    #[Assert\NotBlank(message:"Vous devez insérer votre CV.")]
    #[Groups(["candidatures", "entretiens"])]
    private ?string $cv = null;

    /*
    /**
     * @var string
     *
     * @ORM\Column(name="lettre", type="string", length=100, nullable=false)
     */
    #[ORM\Column(length:100, nullable:false)]
    #[Assert\NotBlank(message:"Vous devez insérer votre lettre de motivation.")]
    #[Groups(["candidatures", "entretiens"])]
    private ?string $lettre = null;

    /*
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    #[ORM\Column(nullable:true)]
    #[Groups(["candidatures", "entretiens"])]
    private ?DateTime $date = null;

    /*
    /**
     * @var string|null
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=true)
     */
    #[ORM\Column(length:50, nullable:true)]
    #[Groups(["candidatures", "entretiens"])]
    private ?string $etat = null;

    /*
    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCandidat", referencedColumnName="id")
     * })
     */

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'idCandidat', referencedColumnName: 'id')]
    #[Groups(["candidatures", "entretiens"])]
    private ?Utilisateur $idcandidat = null;

    /*
    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOffre", referencedColumnName="idOffre")
     * })
     */
    #[ORM\ManyToOne(targetEntity: Offre::class)]
    #[ORM\JoinColumn(name: 'idOffre', referencedColumnName: 'idOffre')]
    #[Groups(["candidatures", "entretiens"])]
    private ?Offre $idoffre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getLettre(): ?string
    {
        return $this->lettre;
    }

    public function setLettre(string $lettre): self
    {
        $this->lettre = $lettre;

        return $this;
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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdcandidat(): ?Utilisateur
    {
        return $this->idcandidat;
    }

    public function setIdcandidat(?Utilisateur $idcandidat): self
    {
        $this->idcandidat = $idcandidat;

        return $this;
    }

    public function getIdoffre(): ?Offre
    {
        return $this->idoffre;
    }

    public function setIdoffre(?Offre $idoffre): self
    {
        $this->idoffre = $idoffre;

        return $this;
    }


}
