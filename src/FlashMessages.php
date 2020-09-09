<?php

namespace Nip\FlashData;

/**
 * Class FlashMessages
 * @package Nip\FlashData
 */
class FlashMessages extends FlashData
{
    protected $sessionKey = 'flash-messages';

    /**
     * @inheritDoc
     */
    public function add($var, $type, $value = false)
    {
        $valueNext = isset($this->next[$var]) ? $this->next[$var] : [];

        if (!isset($valueNext[$type]) || !is_array($valueNext[$type])) {
            $valueNext[$type] = [$value];
        } else {
            if (is_array($value)) {
                $valueNext[$type] = [$valueNext[$type], $value];
            } else {
                $valueNext[$type][] = $value;
            }
        }

        parent::add($var, $valueNext);
    }
}
