<?php

/*
 * This file is part of the Legato package.
 *
 * (c) Osayawe Ogbemudia Terry <terry@devscreencast.com>
 *
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 */

namespace Legato\Framework\Console;

class Create
{
    private $defaultCommands = [
        \Legato\Framework\Console\CreateController::class,
        \Legato\Framework\Console\CreatePhpUnitTest::class,
        \Legato\Framework\Console\CreateBasicConsoleCommand::class,
        \Legato\Framework\Console\WelcomeCommand::class,
        \Legato\Framework\Console\CreateModel::class,
        \Legato\Framework\Console\StartPhpInbuiltServer::class,
    ];

    public $app;

    public function __construct()
    {
        $this->app = new Legato();
        $this->app->registerCommands(array_merge($this->defaultCommands, $this->getCommands()));
    }

    public function getCommands()
    {
        if (file_exists(realpath(__DIR__.'/../../../../../app/commands/register.php'))) {
            return require_once realpath(__DIR__.'/../../../../../app/commands/register.php');
        }

        return [];
    }
}
