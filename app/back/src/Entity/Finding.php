<?php

namespace App\Entity;

use App\Repository\FindingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FindingRepository::class)]
class Finding
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $user_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $chat_id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fio = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $place_of_study = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $subject = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $subject_eng = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $keywords = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $keywords_eng = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $source_types = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $source_years = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reason = null;

    #[ORM\Column(nullable: true)]
    private ?bool $cancelled = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $cancelled_reason = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?string
    {
        return $this->user_id;
    }

    public function setUserId(string $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getChatId(): ?string
    {
        return $this->chat_id;
    }

    public function setChatId(string $chat_id): static
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getFio(): ?string
    {
        return $this->fio;
    }

    public function setFio(?string $fio): static
    {
        $this->fio = $fio;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getPlaceOfStudy(): ?string
    {
        return $this->place_of_study;
    }

    public function setPlaceOfStudy(?string $place_of_study): static
    {
        $this->place_of_study = $place_of_study;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getSubjectEng(): ?string
    {
        return $this->subject_eng;
    }

    public function setSubjectEng(?string $subject_eng): static
    {
        $this->subject_eng = $subject_eng;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): static
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getKeywordsEng(): ?string
    {
        return $this->keywords_eng;
    }

    public function setKeywordsEng(?string $keywords_eng): static
    {
        $this->keywords_eng = $keywords_eng;

        return $this;
    }

    public function getSourceTypes(): ?string
    {
        return $this->source_types;
    }

    public function setSourceTypes(?string $source_types): static
    {
        $this->source_types = $source_types;

        return $this;
    }

    public function getSourceYears(): ?string
    {
        return $this->source_years;
    }

    public function setSourceYears(?string $source_years): static
    {
        $this->source_years = $source_years;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function isCancelled(): ?bool
    {
        return $this->cancelled;
    }

    public function setCancelled(?bool $cancelled): static
    {
        $this->cancelled = $cancelled;

        return $this;
    }

    public function getCancelledReason(): ?string
    {
        return $this->cancelled_reason;
    }

    public function setCancelledReason(?string $cancelled_reason): static
    {
        $this->cancelled_reason = $cancelled_reason;

        return $this;
    }
}
