<?php
/**
 * Created by PhpStorm.
 * User: eirikmorland
 * Date: 20/03/2017
 * Time: 07:58
 */
namespace Drupal\logger_notify;

interface LoggerNotifyChannelInterface {
  public function log($level, $message, array $context = array());
}
