<?php

namespace App\Repository;

use App\Entity\Pets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\AnimalType;

/**
 * @extends ServiceEntityRepository<Pets>
 *
 * @method Pets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pets[]    findAll()
 * @method Pets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pets::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Pets $entity, bool $flush = true): void
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
    public function remove(Pets $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * For use on the search page.
     * @return Pets[] Returns an array of Pets objects
     */
    public function forSearchForm(string $name = null, AnimalType $animaltype = null): array
    {
        $where = [];
        $params = [];
        if($name !== null) {
            $where[] = 'p.name = :name';
            $params['name'] = $name;
        }
        if($animaltype !== null) {
            $where[] = 'p.animalType = :animalType';
            $params['animalType'] = $animaltype;
        }

        if(empty($params)) {
            return [];
        }

        $query = $this->_em->createQuery('SELECT p 
            FROM App\Entity\Pets p 
            WHERE ' . implode(' AND ', $where) . '
            ORDER BY p.created DESC
        ');
        $query->setParameters($params);
        $results = $query->getResult();

        return $results;
    }

    /*
    public function findOneBySomeField($value): ?Pets
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
