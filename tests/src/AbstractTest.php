<?php

namespace Nip\FlashData\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 */
abstract class AbstractTest extends TestCase
{
    protected $object;

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function setUp(): void
    {
        parent::setUp();

        \Nip\Container\Container::setInstance(new \Nip\Container\Container());
    }
}
