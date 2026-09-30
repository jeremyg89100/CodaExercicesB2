<?php

class SmtpMailer extends NotificationSender
{
    public function writeMail(string $message): void
    {
        echo "SMTP: {$message}" . PHP_EOL;
    }
}
