<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamesRepository::class)]
class Games
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;


    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $game_url;

    #[ORM\Column(type: 'string', length: 255)]
    private $platform;

    #[ORM\Column(type: 'string', length: 255)]
    private $freetogame_profile_url;

    #[ORM\Column(type: 'string', length: 255)]
    private $thumbnail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getString(): ?string
    {
        return $this->string;
    }

    public function setString(?string $string): self
    {
        $this->string = $string;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGameUrl(): ?string
    {
        return $this->game_url;
    }

    public function setGameUrl(string $game_url): self
    {
        $this->game_url = $game_url;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getFreetogameProfileUrl(): ?string
    {
        return $this->freetogame_profile_url;
    }

    public function setFreetogameProfileUrl(string $freetogame_profile_url): self
    {
        $this->freetogame_profile_url = $freetogame_profile_url;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
