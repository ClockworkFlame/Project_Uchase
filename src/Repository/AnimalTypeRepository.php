<?php

namespace App\Repository;

use App\Entity\AnimalType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AnimalType>
 *
 * @method AnimalType|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimalType|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimalType[]    findAll()
 * @method AnimalType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimalType::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AnimalType $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(AnimalType $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getTypes()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a_t.name FROM App:AnimalType a_t ORDER BY a_t.name ASC'
            )
            ->getResult();
    }

    // /**
    //  * @return AnimalType[] Returns an array of AnimalType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnimalType
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
