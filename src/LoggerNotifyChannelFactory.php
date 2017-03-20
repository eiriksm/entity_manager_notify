<?php

namespace Drupal\logger_notify;

use Drupal\Core\Logger\LoggerChannelFactory;

class LoggerNotifyChannelFactory extends LoggerChannelFactory {

  /**
   * {@inheritdoc}
   */
  public function get($channel) {
    if (!isset($this->channels[$channel])) {
      $instance = new LoggerNotifyChannel($channel);

      // If we have a container set the request_stack and current_user services
      // on the channel. It is up to the channel to determine if there is a
      // current request.
      if ($this->container) {
        $instance->setRequestStack($this->container->get('request_stack'));
        $instance->setCurrentUser($this->container->get('current_user'));
      }

      // Pass the loggers to the channel.
      $instance->setLoggers($this->loggers);
      $this->channels[$channel] = $instance;
    }

    return $this->channels[$channel];
  }

}
