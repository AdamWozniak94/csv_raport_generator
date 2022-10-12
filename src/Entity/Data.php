<?php

namespace App\Entity;

use App\Repository\DataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataRepository::class)]
class Data
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $reportDate = null;

    #[ORM\Column]
    private ?int $orderId = null;

    #[ORM\Column]
    private ?int $orderNumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $orderDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $upgradeFromOrder = null;

    #[ORM\Column(nullable: true)]
    private ?int $upgradeToOrder = null;

    #[ORM\Column]
    private ?int $offerId = null;

    #[ORM\Column(nullable: true)]
    private ?int $offerUpgradeFrom = null;

    #[ORM\Column(nullable: true)]
    private ?int $offerUpgradeFromFrom = null;

    #[ORM\Column(length: 63)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $offerType = null;

    #[ORM\Column]
    private ?int $sortCode = null;

    #[ORM\Column(length: 255)]
    private ?string $offerName = null;

    #[ORM\Column(length: 255)]
    private ?string $period = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $subscriptionActivationDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $subscriptionStartDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $plannedSubscriptionEndDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $subscriptionEndDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $subscriptionTerminationDate = null;

    #[ORM\Column(length: 255)]
    private ?string $orderStatus = null;

    #[ORM\Column]
    private ?float $offerPrice = null;

    #[ORM\Column]
    private ?float $employer = null;

    #[ORM\Column]
    private ?float $deductPension = null;

    #[ORM\Column]
    private ?float $deductOther = null;

    #[ORM\Column]
    private ?float $deductOther2 = null;

    #[ORM\Column]
    private ?float $zfss = null;

    #[ORM\Column]
    private ?float $personal = null;

    #[ORM\Column]
    private ?float $specialEmployer = null;

    #[ORM\Column]
    private ?float $specialMotivizer = null;

    #[ORM\Column]
    private ?float $payu = null;

    #[ORM\Column]
    private ?float $subscriptionPoints = null;

    #[ORM\Column]
    private ?float $deductB2B = null;

    #[ORM\Column(length: 255)]
    private ?string $supplier = null;

    #[ORM\Column(length: 255)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $incomeBranch = null;

    #[ORM\Column]
    private ?bool $upgradeSameOffer = null;

    #[ORM\Column]
    private ?bool $afterUpgradeSameOffer = null;

    #[ORM\Column]
    private ?bool $upgradeSameConfigurable = null;

    #[ORM\Column]
    private ?bool $afterUpgradeSameConfigurable = null;

    #[ORM\Column]
    private ?bool $upgradeDifferentOffers = null;

    #[ORM\Column]
    private ?bool $afterUpgradeDifferentOffers = null;

    #[ORM\Column]
    private ?bool $accessionsStartedThisMonth = null;

    #[ORM\Column]
    private ?bool $accessionsAvailableThisMonth = null;

    #[ORM\Column]
    private ?bool $accessionsStartingNextMonth = null;

    #[ORM\Column]
    private ?bool $accessionsAvailableNextMonth = null;

    #[ORM\Column]
    private ?bool $endedInPreviousMonth = null;

    #[ORM\Column]
    private ?bool $endedAtEndOfThisMonth = null;

    #[ORM\Column]
    private ?int $userdataEmployeeId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReportDate(): ?\DateTimeInterface
    {
        return $this->reportDate;
    }

    public function setReportDate(\DateTimeInterface $reportDate): self
    {
        $this->reportDate = $reportDate;

        return $this;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrderNumber(): ?int
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(int $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getUpgradeFromOrder(): ?int
    {
        return $this->upgradeFromOrder;
    }

    public function setUpgradeFromOrder(?int $upgradeFromOrder): self
    {
        $this->upgradeFromOrder = $upgradeFromOrder;

        return $this;
    }

    public function getUpgradeToOrder(): ?int
    {
        return $this->upgradeToOrder;
    }

    public function setUpgradeToOrder(?int $upgradeToOrder): self
    {
        $this->upgradeToOrder = $upgradeToOrder;

        return $this;
    }

    public function getOfferId(): ?int
    {
        return $this->offerId;
    }

    public function setOfferId(int $offerId): self
    {
        $this->offerId = $offerId;

        return $this;
    }

    public function getOfferUpgradeFrom(): ?int
    {
        return $this->offerUpgradeFrom;
    }

    public function setOfferUpgradeFrom(?int $offerUpgradeFrom): self
    {
        $this->offerUpgradeFrom = $offerUpgradeFrom;

        return $this;
    }

    public function getOfferUpgradeFromFrom(): ?int
    {
        return $this->offerUpgradeFromFrom;
    }

    public function setOfferUpgradeFromFrom(?int $offerUpgradeFromFrom): self
    {
        $this->offerUpgradeFromFrom = $offerUpgradeFromFrom;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getOfferType(): ?string
    {
        return $this->offerType;
    }

    public function setOfferType(string $offerType): self
    {
        $this->offerType = $offerType;

        return $this;
    }

    public function getSortCode(): ?int
    {
        return $this->sortCode;
    }

    public function setSortCode(int $sortCode): self
    {
        $this->sortCode = $sortCode;

        return $this;
    }

    public function getOfferName(): ?string
    {
        return $this->offerName;
    }

    public function setOfferName(string $offerName): self
    {
        $this->offerName = $offerName;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getSubscriptionActivationDate(): ?\DateTimeInterface
    {
        return $this->subscriptionActivationDate;
    }

    public function setSubscriptionActivationDate(?\DateTimeInterface $subscriptionActivationDate): self
    {
        $this->subscriptionActivationDate = $subscriptionActivationDate;

        return $this;
    }

    public function getSubscriptionStartDate(): ?\DateTimeInterface
    {
        return $this->subscriptionStartDate;
    }

    public function setSubscriptionStartDate(\DateTimeInterface $subscriptionStartDate): self
    {
        $this->subscriptionStartDate = $subscriptionStartDate;

        return $this;
    }

    public function getPlannedSubscriptionEndDate(): ?\DateTimeInterface
    {
        return $this->plannedSubscriptionEndDate;
    }

    public function setPlannedSubscriptionEndDate(?\DateTimeInterface $plannedSubscriptionEndDate): self
    {
        $this->plannedSubscriptionEndDate = $plannedSubscriptionEndDate;

        return $this;
    }

    public function getSubscriptionEndDate(): ?\DateTimeInterface
    {
        return $this->subscriptionEndDate;
    }

    public function setSubscriptionEndDate(?\DateTimeInterface $subscriptionEndDate): self
    {
        $this->subscriptionEndDate = $subscriptionEndDate;

        return $this;
    }

    public function getSubscriptionTerminationDate(): ?\DateTimeInterface
    {
        return $this->subscriptionTerminationDate;
    }

    public function setSubscriptionTerminationDate(?\DateTimeInterface $subscriptionTerminationDate): self
    {
        $this->subscriptionTerminationDate = $subscriptionTerminationDate;

        return $this;
    }

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(string $orderStatus): self
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    public function getOfferPrice(): ?float
    {
        return $this->offerPrice;
    }

    public function setOfferPrice(float $offerPrice): self
    {
        $this->offerPrice = $offerPrice;

        return $this;
    }

    public function getEmployer(): ?float
    {
        return $this->employer;
    }

    public function setEmployer(float $employer): self
    {
        $this->employer = $employer;

        return $this;
    }

    public function getDeductPension(): ?float
    {
        return $this->deductPension;
    }

    public function setDeductPension(float $deductPension): self
    {
        $this->deductPension = $deductPension;

        return $this;
    }

    public function getDeductOther(): ?float
    {
        return $this->deductOther;
    }

    public function setDeductOther(float $deductOther): self
    {
        $this->deductOther = $deductOther;

        return $this;
    }

    public function getDeductOther2(): ?float
    {
        return $this->deductOther2;
    }

    public function setDeductOther2(float $deductOther2): self
    {
        $this->deductOther2 = $deductOther2;

        return $this;
    }

    public function getZfss(): ?float
    {
        return $this->zfss;
    }

    public function setZfss(float $zfss): self
    {
        $this->zfss = $zfss;

        return $this;
    }

    public function getPersonal(): ?float
    {
        return $this->personal;
    }

    public function setPersonal(float $personal): self
    {
        $this->personal = $personal;

        return $this;
    }

    public function getSpecialEmployer(): ?float
    {
        return $this->specialEmployer;
    }

    public function setSpecialEmployer(float $specialEmployer): self
    {
        $this->specialEmployer = $specialEmployer;

        return $this;
    }

    public function getSpecialMotivizer(): ?float
    {
        return $this->specialMotivizer;
    }

    public function setSpecialMotivizer(float $specialMotivizer): self
    {
        $this->specialMotivizer = $specialMotivizer;

        return $this;
    }

    public function getPayu(): ?float
    {
        return $this->payu;
    }

    public function setPayu(float $payu): self
    {
        $this->payu = $payu;

        return $this;
    }

    public function getSubscriptionPoints(): ?float
    {
        return $this->subscriptionPoints;
    }

    public function setSubscriptionPoints(float $subscriptionPoints): self
    {
        $this->subscriptionPoints = $subscriptionPoints;

        return $this;
    }

    public function getDeductB2B(): ?float
    {
        return $this->deductB2B;
    }

    public function setDeductB2B(float $deductB2B): self
    {
        $this->deductB2B = $deductB2B;

        return $this;
    }

    public function getSupplier(): ?string
    {
        return $this->supplier;
    }

    public function setSupplier(string $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getIncomeBranch(): ?string
    {
        return $this->incomeBranch;
    }

    public function setIncomeBranch(?string $incomeBranch): self
    {
        $this->incomeBranch = $incomeBranch;

        return $this;
    }

    public function isUpgradeSameOffer(): ?bool
    {
        return $this->upgradeSameOffer;
    }

    public function setUpgradeSameOffer(bool $upgradeSameOffer): self
    {
        $this->upgradeSameOffer = $upgradeSameOffer;

        return $this;
    }

    public function isAfterUpgradeSameOffer(): ?bool
    {
        return $this->afterUpgradeSameOffer;
    }

    public function setAfterUpgradeSameOffer(bool $afterUpgradeSameOffer): self
    {
        $this->afterUpgradeSameOffer = $afterUpgradeSameOffer;

        return $this;
    }

    public function isUpgradeSameConfigurable(): ?bool
    {
        return $this->upgradeSameConfigurable;
    }

    public function setUpgradeSameConfigurable(bool $upgradeSameConfigurable): self
    {
        $this->upgradeSameConfigurable = $upgradeSameConfigurable;

        return $this;
    }

    public function isAfterUpgradeSameConfigurable(): ?bool
    {
        return $this->afterUpgradeSameConfigurable;
    }

    public function setAfterUpgradeSameConfigurable(bool $afterUpgradeSameConfigurable): self
    {
        $this->afterUpgradeSameConfigurable = $afterUpgradeSameConfigurable;

        return $this;
    }

    public function isUpgradeDifferentOffers(): ?bool
    {
        return $this->upgradeDifferentOffers;
    }

    public function setUpgradeDifferentOffers(bool $upgradeDifferentOffers): self
    {
        $this->upgradeDifferentOffers = $upgradeDifferentOffers;

        return $this;
    }

    public function isAfterUpgradeDifferentOffers(): ?bool
    {
        return $this->afterUpgradeDifferentOffers;
    }

    public function setAfterUpgradeDifferentOffers(bool $afterUpgradeDifferentOffers): self
    {
        $this->afterUpgradeDifferentOffers = $afterUpgradeDifferentOffers;

        return $this;
    }

    public function isAccessionsStartedThisMonth(): ?bool
    {
        return $this->accessionsStartedThisMonth;
    }

    public function setAccessionsStartedThisMonth(bool $accessionsStartedThisMonth): self
    {
        $this->accessionsStartedThisMonth = $accessionsStartedThisMonth;

        return $this;
    }

    public function isAccessionsAvailableThisMonth(): ?bool
    {
        return $this->accessionsAvailableThisMonth;
    }

    public function setAccessionsAvailableThisMonth(bool $accessionsAvailableThisMonth): self
    {
        $this->accessionsAvailableThisMonth = $accessionsAvailableThisMonth;

        return $this;
    }

    public function isAccessionsStartingNextMonth(): ?bool
    {
        return $this->accessionsStartingNextMonth;
    }

    public function setAccessionsStartingNextMonth(bool $accessionsStartingNextMonth): self
    {
        $this->accessionsStartingNextMonth = $accessionsStartingNextMonth;

        return $this;
    }

    public function isAccessionsAvailableNextMonth(): ?bool
    {
        return $this->accessionsAvailableNextMonth;
    }

    public function setAccessionsAvailableNextMonth(bool $accessionsAvailableNextMonth): self
    {
        $this->accessionsAvailableNextMonth = $accessionsAvailableNextMonth;

        return $this;
    }

    public function isEndedInPreviousMonth(): ?bool
    {
        return $this->endedInPreviousMonth;
    }

    public function setEndedInPreviousMonth(bool $endedInPreviousMonth): self
    {
        $this->endedInPreviousMonth = $endedInPreviousMonth;

        return $this;
    }

    public function isEndedAtEndOfThisMonth(): ?bool
    {
        return $this->endedAtEndOfThisMonth;
    }

    public function setEndedAtEndOfThisMonth(bool $endedAtEndOfThisMonth): self
    {
        $this->endedAtEndOfThisMonth = $endedAtEndOfThisMonth;

        return $this;
    }

    public function getUserdataEmployeeId(): ?int
    {
        return $this->userdataEmployeeId;
    }

    public function setUserdataEmployeeId(int $userdataEmployeeId): self
    {
        $this->userdataEmployeeId = $userdataEmployeeId;

        return $this;
    }
}
