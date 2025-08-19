<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GuestRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UlidType;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: GuestRepository::class)]
class Guest
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(type: UlidType::NAME, unique: true)]
    private Ulid $id;

    #[ORM\Column(length: 255)]
    private string $name;

    public function __construct(string $name)
    {
        $this->id = new Ulid();
        $this->name = $name;
    }

    public function getId(): Ulid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
