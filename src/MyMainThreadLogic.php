<?php

/*
 * A simple demonstration of Tasque EventLoop.
 *
 * https://github.com/nytris/tasque-event-loop-demo/
 *
 * Released under the MIT license.
 * https://github.com/nytris/tasque-event-loop-demo/raw/main/MIT-LICENSE.txt
 */

namespace App;

use React\EventLoop\Loop;

class MyMainThreadLogic
{
    public function getFirst(): string
    {
        print __METHOD__ . PHP_EOL;

        return 'first from main thread';
    }

    public function getSecond(): string
    {
        print __METHOD__ . PHP_EOL;

        return 'second from main thread';
    }

    public function getThird(): string
    {
        print __METHOD__ . PHP_EOL;

        return 'third from main thread';
    }

    public function startTimer(): void
    {
        Loop::addPeriodicTimer(0.0000001, function () {
            print '!!! Timer elapsed !!!' . PHP_EOL;
        });
    }
}
