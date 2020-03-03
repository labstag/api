<?php

namespace Labstag\Resolver\Query\Post;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;
use Labstag\Repository\PostRepository;

final class EnableResolver implements QueryCollectionResolverInterface
{
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(iterable $collection, array $context): iterable
    {
        $query      = $this->repository->findAllActive();
        $dql        = $query->getDQL();
        $parameters = $query->getParameters();
        unset($context);
        $query = $collection->getQuery();
        $query->setDQL($dql);
        $query->setParameters($parameters);

        return $collection;
    }
}
