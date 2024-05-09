<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User  implements PasswordAuthenticatedUserInterface, UserInterface
{
	const STATUS_DISABLED = 0;
	const STATUS_ACTIVE = 1;

	const ROLE_GUEST = 'ROLE_GUEST';
	const ROLE_USER = 'ROLE_USER';
	const ROLE_ADMIN = 'ROLE_ADMIN';

	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: Types::INTEGER)]
	private int $idUser;

	#[ORM\Column(length: 50)]
	private string $name;

	#[ORM\Column(type: 'string', length: 50, unique: true)]
	private string $login;

	#[ORM\Column(type: 'string', length: 180, unique: true)]
	private string $email;

	#[ORM\Column]
	private string $password;

	#[ORM\Column(type: 'json')]
	private array $roles = [];

	#[ORM\Column(type: Types::SMALLINT, options: ['default' => 0])]
	private int $status = 0;

	public function __construct(
		string $login = '',
		string $password = '',
		int $status = self::STATUS_DISABLED)
	{
		$this->login = $login;
		$this->changePassword($password);
		$this->status = $status;
	}

	public function getIdUser(): int
	{
		return $this->idUser;
	}

	public function getLogin(): string
	{
		return $this->login;
	}

	public function setLogin(string $login): void
	{
		$this->login = $login;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

	public function changePassword(string $password): void
	{
		$this->password = $password;
	}

	public function getStatus(): int
	{
		return $this->status;
	}

	public function setStatus(int $status): void
	{
		$this->status = $status;
	}
	public function setRoles(array $roles): static
	{
		$this->roles = $roles;
		return $this;
	}


	public function addRole(string $role): static
	{
		$this->roles[] = $role;
		return $this;
	}

	public function getRoles(): array
	{
		$roles = $this->roles;
		$roles[] = static::ROLE_USER;

		return array_unique($roles);
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): static
	{
		$this->name = $name;

		return $this;
	}

	public function eraseCredentials(): void
	{
		// TODO: Implement eraseCredentials() method.
	}

	public function getUserIdentifier(): string
	{
		return $this->email;
	}
}
