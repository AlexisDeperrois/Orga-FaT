<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $contactDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sendingDocDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comments = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbMetres = 0;

    #[ORM\Column]
    private ?bool $hasPortant = false;

    #[ORM\Column]
    private ?bool $FCPEMember = false;

    #[ORM\Column(nullable: true)]
    private ?int $priceMetrage = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbMerguez = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbSaucisse = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPaniniDinde = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPaniniFromage = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPaniniJambon = null;

    #[ORM\Column(nullable: true)]
    private ?int $priceFood = null;

    #[ORM\Column]
    private ?bool $assuranceRecu = false;

    #[ORM\Column]
    private ?bool $carteIdRecu = false;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $inscriptionCheckedDate = null;

    #[ORM\Column]
    private ?bool $Payed = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $moyenPaiement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getContactDate(): ?\DateTimeInterface
    {
        return $this->contactDate;
    }

    public function setContactDate(?\DateTimeInterface $contactDate): static
    {
        $this->contactDate = $contactDate;

        return $this;
    }

    public function getSendingDocDate(): ?\DateTimeInterface
    {
        return $this->sendingDocDate;
    }

    public function setSendingDocDate(?\DateTimeInterface $sendingDocDate): static
    {
        $this->sendingDocDate = $sendingDocDate;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): static
    {
        $this->comments = $comments;

        return $this;
    }

    public function getNbMetres(): ?int
    {
        return $this->nbMetres;
    }

    public function setNbMetres(?int $nbMetres): static
    {
        $this->nbMetres = $nbMetres;

        return $this;
    }

    public function hasPortant(): ?bool
    {
        return $this->hasPortant;
    }

    public function setHasPortant(bool $hasPortant): static
    {
        $this->hasPortant = $hasPortant;

        return $this;
    }

    public function isFCPEMember(): ?bool
    {
        return $this->FCPEMember;
    }

    public function setFCPEMember(bool $FCPEMember): static
    {
        $this->FCPEMember = $FCPEMember;

        return $this;
    }

    //calcul prix de l'emplacement
    public function getPriceMetrage(): ?int
    {
        return $this->nbMetres*3;
    }

    public function getNbMerguez(): ?int
    {
        return $this->nbMerguez;
    }

    public function setNbMerguez(?int $nbMerguez): static
    {
        $this->nbMerguez = $nbMerguez;

        return $this;
    }

    public function getNbSaucisse(): ?int
    {
        return $this->nbSaucisse;
    }

    public function setNbSaucisse(?int $nbSaucisse): static
    {
        $this->nbSaucisse = $nbSaucisse;

        return $this;
    }

    public function getNbPaniniDinde(): ?int
    {
        return $this->nbPaniniDinde;
    }

    public function setNbPaniniDinde(?int $nbPaniniDinde): static
    {
        $this->nbPaniniDinde = $nbPaniniDinde;

        return $this;
    }

    public function getNbPaniniFromage(): ?int
    {
        return $this->nbPaniniFromage;
    }

    public function setNbPaniniFromage(?int $nbPaniniFromage): static
    {
        $this->nbPaniniFromage = $nbPaniniFromage;

        return $this;
    }

    public function getNbPaniniJambon(): ?int
    {
        return $this->nbPaniniJambon;
    }

    public function setNbPaniniJambon(?int $nbPaniniJambon): static
    {
        $this->nbPaniniJambon = $nbPaniniJambon;

        return $this;
    }

    //calcul prix repas ( formules saucisse/merguez = 7€ , paninis =5€)
    public function getPriceFood(): ?int
    {   
        $price = ($this->nbMerguez+$this->nbSaucisse)*7 + ($this->nbPaniniDinde +$this->nbPaniniFromage+$this->nbPaniniJambon)*5;
        return $price;
    }


    public function isAssuranceRecu(): ?bool
    {
        return $this->assuranceRecu;
    }

    public function setAssuranceRecu(bool $assuranceRecu): static
    {
        $this->assuranceRecu = $assuranceRecu;

        return $this;
    }

    public function isCarteIdRecu(): ?bool
    {
        return $this->carteIdRecu;
    }

    public function setCarteIdRecu(bool $carteIdRecu): static
    {
        $this->carteIdRecu = $carteIdRecu;

        return $this;
    }

    public function getInscriptionCheckedDate(): ?\DateTimeInterface
    {
        return $this->inscriptionCheckedDate;
    }

    public function setInscriptionCheckedDate(?\DateTimeInterface $inscriptionCheckedDate): static
    {
        $this->inscriptionCheckedDate = $inscriptionCheckedDate;

        return $this;
    }

    public function Payed(): ?bool
    {
        return $this->Payed;
    }

    public function setPayed(bool $Payed): static
    {
        $this->Payed = $Payed;

        return $this;
    }

    public function getMoyenPaiement(): ?string
    {
        return $this->moyenPaiement;
    }

    public function setMoyenPaiement(?string $moyenPaiement): static
    {
        $this->moyenPaiement = $moyenPaiement;

        return $this;
    }
}
