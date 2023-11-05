<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id = null;

    /**
     * @ORM\Column(type="string")
     */
    private $paymentId = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $payerId = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $payerEmail = null;

    /**
     * @ORM\Column
     */
    private ?float $amount = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $currency = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $purchasedAt = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $paymentStatus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    public function setPaymentId(string $paymentId): self
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    public function getPayerId(): ?string
    {
        return $this->payerId;
    }

    public function setPayerId(string $payerId): self
    {
        $this->payerId = $payerId;

        return $this;
    }

    public function getPayerEmail(): ?string
    {
        return $this->payerEmail;
    }

    public function setPayerEmail(string $payerEmail): self
    {
        $this->payerEmail = $payerEmail;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPurchasedAt(): ?\DateTimeInterface
    {
        return $this->purchasedAt;
    }

    public function setPurchasedAt(\DateTimeInterface $purchasedAt): self
    {
        $this->purchasedAt = $purchasedAt;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }
}
