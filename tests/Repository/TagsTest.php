<?php

namespace Labstag\Tests\Repository;

use Doctrine\ORM\QueryBuilder;
use Labstag\Entity\Tags;
use Labstag\Lib\RepositoryTestLib;
use Labstag\Repository\TagsRepository;

/**
 * @internal
 * @coversNothing
 */
class TagsTest extends RepositoryTestLib
{

    /**
     * @var TagsRepository
     */
    private $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->entityManager->getRepository(
            Tags::class
        );
    }

    public function testFindAll(): void
    {
        $all = $this->repository->findAll();
        $this->assertTrue(is_array($all));
    }

    public function testfindOneRandom(): void
    {
        $all = $this->repository->findAll();
        if (0 != count($all)) {
            $random = $this->repository->findOneRandom();
            $this->assertSame(get_class($random), Tags::class);

            return;
        }

        $this->assertTrue(true);
    }

    public function testfindTagsByTypeNotTemporary(): void
    {
        $empty = $this->repository->findTagsByTypeNotTemporary(null);
        $this->AssertNull($empty);
        $tags = $this->repository->findTagsByTypeNotTemporary('');
        $this->assertSame(get_class($tags), QueryBuilder::class);
        $random = $this->repository->findOneRandom();
        $tags   = $this->repository->findTagsByTypeNotTemporary(
            $random->getType()
        );
        $this->assertSame(get_class($tags), QueryBuilder::class);
    }

    public function testfindTagsByType(): void
    {
        $empty = $this->repository->findTagsByType(null);
        $this->AssertNull($empty);
        $tags = $this->repository->findTagsByType('');
        $this->assertSame(get_class($tags), QueryBuilder::class);
        $random = $this->repository->findOneRandom();
        $tags   = $this->repository->findTagsByType($random->getType());
        $this->assertSame(get_class($tags), QueryBuilder::class);
    }
}
