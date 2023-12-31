<?php

namespace App\Entity;

use App\Repository\MessageMappingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageMappingRepository::class)]
class MessageMapping
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $user_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $chat_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $message_id = null;

    #[ORM\Column(length: 255)]
    private ?string $target = null;

    #[ORM\Column(length: 255)]
    private ?string $property = null;

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

    public function getMessageId(): ?string
    {
        return $this->message_id;
    }

    public function setMessageId(string $message_id): static
    {
        $this->message_id = $message_id;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(string $target): static
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
}
