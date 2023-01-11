<?php

namespace App\Repository;

use App\Entity\PostsUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostsUsers>
 *
 * @method PostsUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostsUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostsUsers[]    findAll()
 * @method PostsUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostsUsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostsUsers::class);
    }

    public function add(PostsUsers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PostsUsers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
