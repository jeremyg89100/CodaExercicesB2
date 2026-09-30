<?php

class Mailer
{
    public function send(string $email, string $message): void
    {
        echo "MAIL {$email}: {$message}" . PHP_EOL;
    }
}
