<?php

namespace Nip\FlashData\Tests;

use Nip\Container\Container;
use Nip\FlashData\FlashData;
use Nip\FlashData\FlashServiceProvider;

/**
 * Class FlashServiceProviderTest
 * @package Nip\Tests\FlashData
 */
class FunctionsTest extends AbstractTest
{
    public function test_flash_get()
    {
        $_SESSION[FlashData::DEFAULT_SESSION_KEY]['test'] = 'value1';

        self::assertSame('value1', \flash_get('test'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $provider = new FlashServiceProvider();
        $provider->setContainer(Container::getInstance());
        $provider->register();
    }
}
