<?php
/**
 * Входной скрипт index:
 *
 *   @category YupeScript
 *   @package  YupeCMS
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/

// подробнее про index.php http://www.yiiframework.ru/doc/guide/ru/basics.entry
if (!ini_get('date.timezone')) {
    date_default_timezone_set('UTC');
}

// Комментируем перед выпуском в продакшен:
define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
// путь к фреймворку Yii
$yii = dirname(__FILE__) . '/../vendor/framework/yii.php';

$base = require dirname(__FILE__) . '/../protected/config/test.php';

$userspace = dirname(__FILE__) . '/../protected/config/userspace.php';
$userspace = file_exists($userspace) ? (require $userspace) : array();

require $yii;

Yii::setPathOfAlias('application', dirname(__FILE__) . '/../protected/');
Yii::setPathOfAlias('yii', dirname(__FILE__) . '/../framework/');

$confManager = new application\modules\yupe\components\ConfigManager();
$config = $confManager->merge($base, $userspace);

Yii::createWebApplication($config)->run();