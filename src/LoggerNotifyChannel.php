<?php

namespace Drupal\logger_notify;

use Drupal\Core\Logger\LoggerChannel;
use Joli\JoliNotif\Notification;
use Joli\JoliNotif\NotifierFactory;

class LoggerNotifyChannel extends LoggerChannel implements LoggerNotifyChannelInterface {
  public function log($level, $message, array $context = array()) {
    $notifier = NotifierFactory::create();
    $notification =
      (new Notification())
        ->setTitle('Log ' . $this->channel)
        ->setBody($message)
        ->setIcon(DRUPAL_ROOT . '/core/misc/druplicon.png');
    $notifier->send($notification);
    return parent::log($level, $message, $context);
  }

}
