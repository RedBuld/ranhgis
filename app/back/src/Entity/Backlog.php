<?php

namespace App\Entity;

use App\Repository\BacklogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BacklogRepository::class)]
class Backlog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $user_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $chat_id = null;

    #[ORM\Column(length: 255)]
    private ?string $target = null;

    #[ORM\Column(length: 255)]
    private ?string $property = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $old_value = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $new_value = null;

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

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getProperty(): ?string
    {
        return $this->property;
    }

    public function setProperty(?string $property): static
    {
        $this->property = $property;

        return $this;
    }

    public function getOldValue(): ?string
    {
        return $this->old_value;
    }

    public function setOldValue(?string $old_value): static
    {
        $this->old_value = $old_value;

        return $this;
    }

    public function getNewValue(): ?string
    {
        return $this->new_value;
    }

    public function setNewValue(?string $new_value): static
    {
        $this->new_value = $new_value;

        return $this;
    }
}
