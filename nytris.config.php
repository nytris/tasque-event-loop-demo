<?php

/*
 * A simple demonstration of Tasque EventLoop.
 *
 * https://github.com/nytris/tasque-event-loop-demo/
 *
 * Released under the MIT license.
 * https://github.com/nytris/tasque-event-loop-demo/raw/main/MIT-LICENSE.txt
 */

declare(strict_types=1);

use Nytris\Boot\BootConfig;
use Nytris\Boot\PlatformConfig;
use Tasque\Core\Scheduler\ContextSwitch\NTockStrategy;
use Tasque\EventLoop\TasqueEventLoopPackage;
use Tasque\TasquePackage;

$bootConfig = new BootConfig(new PlatformConfig(__DIR__ . '/var/cache/nytris/'));

$bootConfig->installPackage(new TasquePackage(schedulerStrategy: new NTockStrategy(1)));
$bootConfig->installPackage(new TasqueEventLoopPackage());

return $bootConfig;
