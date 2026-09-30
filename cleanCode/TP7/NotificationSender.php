<?php

require_once 'SmtpMailer.php';
require_once 'FakeNotificationSender.php';

abstract class NotificationSender {
    public function send(string $email) : void {
        $message = "Mail has been sent to {$email}";
        $this->writeMail($message);
    }

    abstract public function writeMail(string $message) : void;
}
