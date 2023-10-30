# Tasque EventLoop Demo

A demo of using [Tasque][1] [EventLoop][2] to run PHP background [green threads][3] concurrently.

## Usage
Install with Composer:

```shell
$ composer install
```

and execute the test script, for example via the CLI SAPI:

```shell
php index.php
```

The output should then demonstrate pre-emptive context switches between threads,
including the thread that is processing the [ReactPHP][4] event loop:

```
$ php index.php
App\MyMainThreadLogic::getFirst
!!! Timer elapsed !!!
App\MyMainThreadLogic::getSecond
!!! Timer elapsed !!!
App\MyBackgroundThreadLogic::getFirst (thread #1)
App\MyBackgroundThreadLogic::getFirst (thread #2)
App\MyMainThreadLogic::getThird
!!! Timer elapsed !!!
App\MyBackgroundThreadLogic::getSecond (thread #1)
App\MyBackgroundThreadLogic::getSecond (thread #2)
!!! Timer elapsed !!!
App\MyBackgroundThreadLogic::getThird (thread #1)
App\MyBackgroundThreadLogic::getThird (thread #2)
Main thread result: "first from main thread second from main thread third from main thread"
Background thread #1 result: "first from background thread #1 second from background thread #1 third from background thread #1"
Background thread #2 result: "first from background thread #2 second from background thread #2 third from background thread #2"
```

[1]: https://github.com/nytris/tasque
[2]: https://github.com/nytris/tasque-event-loop
[3]: https://en.wikipedia.org/wiki/Green_thread
[4]: https://reactphp.org/
