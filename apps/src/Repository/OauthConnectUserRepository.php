<?php

namespace Labstag\Repository;

use Doctrine\Common\Persistence\ManagerRegistry;
use Labstag\Entity\OauthConnectUser;
use Labstag\Entity\User;
use Labstag\Lib\ServiceEntityRepositoryLib;

/**
 * @method OauthConnectUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method OauthConnectUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method OauthConnectUser[]    findAll()
 * @method OauthConnectUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OauthConnectUserRepository extends ServiceEntityRepositoryLib
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OauthConnectUser::class);
    }

    /**
     * @return OauthConnectUser|void
     */
    public function findOauthNotUser(?User $user, ?string $identity, ?string $client)
    {
        if (is_null($identity) || is_null($user) || is_null($client)) {
            return;
        }

        $dql = $this->createQueryBuilder('p');
        $dql->where('p.refuser! = :iduser');
        $dql->andWhere('p.identity = :identity');
        $dql->andWhere('p.name = :name');
        $dql->setParameters(
            [
                'iduser'   => $user->getId(),
                'name'     => $client,
                'identity' => $identity,
            ]
        );

        return $dql->getQuery()->getOneOrNullResult();
    }

    /**
     * @return OauthConnectUser|void
     */
    public function findOneOauthByUser(?string $oauthCode, ?User $user)
    {
        if (is_null($oauthCode) || is_null($user)) {
            return;
        }

        $dql = $this->createQueryBuilder('p');
        $dql->where('p.name = :name');
        $dql->andWhere('p.refuser = :iduser');
        $dql->setParameters(
            [
                'iduser' => (string) $user->getId(),
                'name'   => $oauthCode,
            ]
        );

        return $dql->getQuery()->getOneOrNullResult();
    }

    /**
     * @return OauthConnectUser|void
     */
    public function login(?string $identity, ?string $oauth)
    {
        if (is_null($identity) || is_null($oauth)) {
            return;
        }

        $dql = $this->createQueryBuilder('u');
        $dql->where('u.name = :name');
        $dql->andWhere('u.identity = :identity');
        $dql->setParameters(
            [
                'name'     => $oauth,
                'identity' => $identity,
            ]
        );

        return $dql->getQuery()->getOneOrNullResult();
    }

    public function findDistinctAllOauth(): array
    {
        $builder = $this->createQueryBuilder('u');
        $builder->select('u.name');
        $builder->distinct();
        $builder->orderBy('u.name', 'ASC');

        return $builder->getQuery()->getResult();
    }
}
