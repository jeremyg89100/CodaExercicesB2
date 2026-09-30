<?php

class Customer
{
    public function __construct(
        public string $email,
        public bool $vip = false
    ) {
    }

    public function verifyEmail(string $email) : void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email invalide');
        } 
    }

    public function changeVIPStatus() {
        $this->vip = !$this->vip;

        $status = $this->vip ? "true" : "false";
        echo "Statut VIP : {$status}" . PHP_EOL;
    }
}

