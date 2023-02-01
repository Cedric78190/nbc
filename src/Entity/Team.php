<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $poster = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'opponents')]
    private Collection $opponents;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Championship $championship = null;

    #[ORM\ManyToMany(targetEntity: Game::class, mappedBy: 'teams')]
    private Collection $games;

    public function __construct()
    {
        $this->opponents = new ArrayCollection();
        $this->games = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getOpponents(): Collection
    {
        return $this->opponents;
    }

    public function addOpponent(self $opponent): self
    {
        if (!$this->opponents->contains($opponent)) {
            $this->opponents->add($opponent);
        }

        return $this;
    }

    public function removeOpponent(self $opponent): self
    {
        $this->opponents->removeElement($opponent);

        return $this;
    }

    public function getChampionship(): ?Championship
    {
        return $this->championship;
    }

    public function setChampionship(?Championship $championship): self
    {
        $this->championship = $championship;

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games->add($game);
            $game->addTeam($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            $game->removeTeam($this);
        }

        return $this;
    }
}
