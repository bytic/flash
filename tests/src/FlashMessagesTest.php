<?php

namespace Nip\FlashData\Tests;

use Nip\FlashData\FlashMessages;

/**
 * Class FlashMessagesTest
 * @package Nip\FlashData\Tests
 */
class FlashMessagesTest extends AbstractTest
{
    public function test_add()
    {
        $messages = new FlashMessages();
        $messages->add('controller', 'success', 'message');

        self::assertSame($_SESSION['flash-messages'], ['controller' => ['success' => ['message']]]);
    }
}
