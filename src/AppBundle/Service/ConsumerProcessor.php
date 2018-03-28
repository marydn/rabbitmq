<?php

namespace AppBundle\Service;

/**
 * Created by PhpStorm.
 * User: mary
 * Date: 28/03/18
 * Time: 13:10
 */

use Interop\Queue\PsrMessage;
use Interop\Queue\PsrContext;
use Interop\Queue\PsrProcessor;
use Enqueue\Client\TopicSubscriberInterface;

/**
 * Class ConsumerProcessor
 */
class ConsumerProcessor implements PsrProcessor, TopicSubscriberInterface
{
    /**
     * @param PsrMessage $message
     * @param PsrContext $session
     *
     * @return object|string
     */
    public function process(PsrMessage $message, PsrContext $session)
    {
        echo $message->getBody();

        return self::ACK;
        // return self::REJECT; // when the message is broken
        // return self::REQUEUE; // the message is fine but you want to postpone processing
    }

    /**
     * @return array
     */
    public static function getSubscribedTopics()
    {
        return array('aFooTopic');
    }
}