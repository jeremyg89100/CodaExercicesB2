<?php 

class FakeNotificationSender extends NotificationSender
{
    public function writeMail(string $message): void
    {
        echo "Fake Notification Message: {$message}" . PHP_EOL;
    }
}
