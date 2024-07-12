<?php

namespace App\DTO;

use App\Models\Contact;

class ListFilterDTO
{
    private ?string $model = null;
    private ?string $orderName = null;
    private ?string $orderPriority = null;

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): static
    {
        $this->model = $model;
        return $this;
    }

    public function getOrderName(): ?string
    {
        return $this->orderName;
    }

    public function setOrderName(?string $orderName): static
    {
        if ($orderName !== null) {
            $orderName = ($orderName === 'desc') ? 'desc' : 'asc';
        }

        $this->orderName = $orderName;
        return $this;
    }

    public function getOrderPriority(): ?string
    {
        return $this->orderPriority;
    }

    public function setOrderPriority(?string $orderPriority): static
    {
        if ($orderPriority !== null) {
            $orderPriority = ($orderPriority === 'desc') ? 'desc' : 'asc';
        }

        $this->orderPriority = $orderPriority;
        return $this;
    }
}
