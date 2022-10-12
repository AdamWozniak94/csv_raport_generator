<?php

namespace App\Repository;

use App\Entity\Data;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @extends ServiceEntityRepository<Data>
 *
 * @method Data|null find($id, $lockMode = null, $lockVersion = null)
 * @method Data|null findOneBy(array $criteria, array $orderBy = null)
 * @method Data[]    findAll()
 * @method Data[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Data::class);
    }

    public function save(Data $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Data $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Imports data from .csv file into database. Returns true on success, false otherwise.
     *
     * @param UploadedFile $csvFile
     * @return bool
     * @throws Exception
     */
    public function importFromCsv(UploadedFile $csvFile): bool
    {
        $em = $this->getEntityManager();

        if (($handle = fopen($csvFile->getPathname(), "r")) !== false) {
            $count = 0;
            $batchSize = 200;

            fgetcsv($handle, 0, ";");
            $connection = $em->getConnection();
            $connection->beginTransaction();
            try {
                while (($data = fgetcsv($handle, 0, ";")) !== false) {
                    $count++;
                    $dataEntity = new Data();
                    $dataEntity
                        ->setReportDate(\DateTime::createFromFormat("Y-m-d", $data[0]))
                        ->setOrderId($data[1])
                        ->setOrderNumber($data[2])
                        ->setOrderDate(\DateTime::createFromFormat("Y-m-d",$data[3]))
                        ->setUpgradeFromOrder($data[4] ? (int) $data[4] : null)
                        ->setUpgradeToOrder($data[5] ? (int) $data[5] : null)
                        ->setOfferId($data[6])
                        ->setOfferUpgradeFrom($data[7] ? (int) $data[7] : null)
                        ->setOfferUpgradeFromFrom($data[8] ? (int) $data[8] : null)
                        ->setFirstName($data[9])
                        ->setLastName($data[10])
                        ->setEmail($data[11])
                        ->setOfferType($data[12])
                        ->setSortCode($data[13])
                        ->setOfferName($data[14])
                        ->setPeriod($data[15])
                        ->setSubscriptionActivationDate($data[16] ? \DateTime::createFromFormat("Y-m-d",$data[16]) : null)
                        ->setSubscriptionStartDate(\DateTime::createFromFormat("Y-m-d",$data[17]))
                        ->setPlannedSubscriptionEndDate($data[18] ? \DateTime::createFromFormat("Y-m-d",$data[18]) : null)
                        ->setSubscriptionEndDate($data[19] ? \DateTime::createFromFormat("Y-m-d",$data[19]) : null)
                        ->setSubscriptionTerminationDate($data[20] ? \DateTime::createFromFormat("Y-m-d",$data[20]) : null)
                        ->setOrderStatus($data[21])
                        ->setOfferPrice(str_replace(',', '.', $data[22]))
                        ->setEmployer(str_replace(',', '.', $data[23]))
                        ->setDeductPension(str_replace(',', '.', $data[24]))
                        ->setDeductOther(str_replace(',', '.', $data[25]))
                        ->setDeductOther2(str_replace(',', '.', $data[26]))
                        ->setZfss(str_replace(',', '.', $data[27]))
                        ->setPersonal(str_replace(',', '.', $data[28]))
                        ->setSpecialEmployer(str_replace(',', '.', $data[29]))
                        ->setSpecialMotivizer(str_replace(',', '.', $data[30]))
                        ->setPayu(str_replace(',', '.', $data[31]))
                        ->setSubscriptionPoints(str_replace(',', '.', $data[32]))
                        ->setDeductB2B(str_replace(',', '.', $data[33]))
                        ->setSupplier($data[34])
                        ->setCompanyName($data[35])
                        ->setIncomeBranch($data[36] ?? null)
                        ->setUpgradeSameOffer($data[37])
                        ->setAfterUpgradeSameOffer($data[38])
                        ->setUpgradeSameConfigurable($data[39])
                        ->setAfterUpgradeSameConfigurable($data[40])
                        ->setUpgradeDifferentOffers($data[41])
                        ->setAfterUpgradeDifferentOffers($data[42])
                        ->setAccessionsStartedThisMonth($data[43])
                        ->setAccessionsAvailableThisMonth($data[44])
                        ->setAccessionsStartingNextMonth($data[45])
                        ->setAccessionsAvailableNextMonth($data[46])
                        ->setEndedInPreviousMonth($data[47])
                        ->setEndedAtEndOfThisMonth($data[48])
                        ->setUserdataEmployeeId($data[49]);

                    $em->persist($dataEntity);

                    if (($count % $batchSize) === 0 )
                    {
                        $em->flush();
                        $em->clear();
                    }
                }
                fclose($handle);
                $em->flush();
                $em->clear();
                $connection->commit();
                return true;
            } catch (\Exception $e) {
                $connection->rollBack();
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Executes query that returns results for Raport1.
     *
     * @param string $dateString
     * @return array
     * @throws Exception
     */
    public function getRaport1Data(string $dateString): array
    {
        $connection = $this->getEntityManager()->getConnection();
        $date = \DateTime::createFromFormat("Y-m-d", $dateString);

        $sql = "
            SELECT `sort_code`, CONCAT(`first_name`, ' ', `last_name`) AS Name, `order_status`, COUNT(*), SUM(`offer_price`), GROUP_CONCAT(DISTINCT `offer_name` SEPARATOR ' | ') FROM `data`
            WHERE `order_date` BETWEEN :dateFrom AND :dateTo
            GROUP BY `sort_code`, `order_status`
        ";
        $stmt = $connection->prepare($sql);
        return $stmt->executeQuery(['dateFrom' => $date->format("Y-m-01"), 'dateTo' => $date->format("Y-m-t")])->fetchAllAssociative();
    }

    /**
     * Executes query that returns results for Raport2.
     *
     * @param string $dateString
     * @return array
     * @throws Exception
     */
    public function getRaport2Data(string $dateString): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT MONTH(`order_date`) as month, IF(`upgrade_from_order` IS NOT NULL, 'tak', 'nie') as from_upgrade, `offer_name`, COUNT(*) FROM `data` 
            WHERE `order_date` > :raportDate
            GROUP BY month, from_upgrade, `offer_name`
        ";
        $stmt = $connection->prepare($sql);
        return $stmt->executeQuery(['raportDate' => $dateString])->fetchAllAssociative();
    }

//    /**
//     * @return Data[] Returns an array of Data objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Data
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
