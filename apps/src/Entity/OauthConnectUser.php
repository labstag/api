<?php

namespace Labstag\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "name": "partial"
 * })
 * @ApiFilter(OrderFilter::class, properties={"id", "name"}, arguments={"orderParameterName": "order"})
<<<<<<< HEAD
 * @ApiResource(attributes={"access_control": "is_granted('ROLE_SUPER_ADMIN')"})
=======
 * @ApiResource(attributes={"access_control": "is_granted('ROLE_ADMIN')"})
>>>>>>> 70eef9d9de7dd17df3a3addf58c7c49623b0f58b
 * @ORM\Entity(repositoryClass="Labstag\Repository\OauthConnectUserRepository")
 */
class OauthConnectUser
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid", unique=true)
     * @ApiProperty(iri="https://schema.org/identifier")
     *
     * @var string
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="array")
     *
     * @var array
     */
    private $data = [];

    /**
     * @ORM\ManyToOne(targetEntity="Labstag\Entity\User", inversedBy="oauthConnectUsers")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var User
     */
    private $refuser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $identity;

    public function getId(): ?string
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

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getRefuser(): ?User
    {
        return $this->refuser;
    }

    public function setRefuser(User $refuser): self
    {
        $this->refuser = $refuser;

        return $this;
    }

    public function getIdentity(): ?string
    {
        return $this->identity;
    }

    public function setIdentity(string $identity): self
    {
        $this->identity = $identity;

        return $this;
    }
}
