<?php

namespace Labstag\Entity;

<<<<<<< HEAD
=======
use Labstag\CollectionResolver\TrashCollectionResolver;
>>>>>>> 70eef9d9de7dd17df3a3addf58c7c49623b0f58b
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Labstag\Controller\Api\FormbuilderApi;

/**
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "name": "partial",
 *     "enable": "exact",
 *     "slug": "partial"
 * })
 * @ApiFilter(OrderFilter::class, properties={"id", "name"}, arguments={"orderParameterName": "order"})
<<<<<<< HEAD
 * @ApiResource(
 *     itemOperations={
 *         "get",
 *         "put",
 *         "delete",
 *         "api_formbuildertrash": {
 *             "method": "GET",
 *             "path": "/formbuilders/trash",
 *             "access_control": "is_granted('ROLE_SUPER_ADMIN')",
=======
 * @ApiResource(attributes={"access_control": "is_granted('ROLE_ADMIN')"})
 * @ApiResource(
 *     graphql={
 *       "trashCollection"={
 *            "collection_query"=TrashCollectionResolver::class
 *       }
 *     },
 *     itemOperations={
 *         "get": {
 *             "access_control": "is_granted('ROLE_ADMIN')"
 *          },
 *         "put": {
 *             "access_control": "is_granted('ROLE_ADMIN')"
 *          },
 *         "delete": {
 *             "access_control": "is_granted('ROLE_ADMIN')"
 *          },
 *         "api_formbuildertrash": {
 *             "method": "GET",
 *             "path": "/formbuilders/trash",
>>>>>>> 70eef9d9de7dd17df3a3addf58c7c49623b0f58b
 *             "controller": FormbuilderApi::class,
 *             "read": false,
 *             "swagger_context": {
 *                 "summary": "Corbeille",
 *                 "parameters": {}
 *             }
 *         },
 *         "api_formbuildertrashdelete": {
 *             "method": "DELETE",
 *             "path": "/formbuilders/trash",
<<<<<<< HEAD
 *             "access_control": "is_granted('ROLE_SUPER_ADMIN')",
=======
>>>>>>> 70eef9d9de7dd17df3a3addf58c7c49623b0f58b
 *             "controller": FormbuilderApi::class,
 *             "read": false,
 *             "swagger_context": {
 *                 "summary": "Remove",
 *                 "parameters": {}
 *             }
 *         },
 *         "api_formbuilderrestore": {
 *             "method": "POST",
 *             "path": "/formbuilders/restore",
<<<<<<< HEAD
 *             "access_control": "is_granted('ROLE_SUPER_ADMIN')",
=======
>>>>>>> 70eef9d9de7dd17df3a3addf58c7c49623b0f58b
 *             "controller": FormbuilderApi::class,
 *             "read": false,
 *             "swagger_context": {
 *                 "summary": "Restore",
 *                 "parameters": {}
 *             }
 *         },
 *         "api_formbuilderempty": {
 *             "method": "POST",
 *             "path": "/formbuilders/empty",
<<<<<<< HEAD
 *             "access_control": "is_granted('ROLE_SUPER_ADMIN')",
=======
>>>>>>> 70eef9d9de7dd17df3a3addf58c7c49623b0f58b
 *             "controller": FormbuilderApi::class,
 *             "read": false,
 *             "swagger_context": {
 *                 "summary": "Empty",
 *                 "parameters": {}
 *             }
 *         }
 *     }
 * )
 * @ORM\Entity(repositoryClass="Labstag\Repository\FormbuilderRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @Gedmo\Loggable
 */
class Formbuilder
{
    use BlameableEntity;
    use SoftDeleteableEntity;
    use TimestampableEntity;

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
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @var string
     */
    private $name;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="text")
     *
     * @var string
     */
    private $formbuilder;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $enable;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", length=255)
     *
     * @var string|null
     */
    private $slug;

    public function __construct()
    {
        $this->formbuilder = (string) json_encode([]);
    }

    public function __toString(): string
    {
        return (string) $this->getName();
    }

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

    public function getFormbuilder(): string
    {
        return $this->formbuilder;
    }

    public function setFormbuilder(string $formbuilder): self
    {
        $this->formbuilder = $formbuilder;

        return $this;
    }

    public function isEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
