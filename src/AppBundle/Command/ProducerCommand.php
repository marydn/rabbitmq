<?php

namespace AppBundle\Command;

use Enqueue\Client\ProducerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ProducerCommand
 *
 * @package AppBundle\Command
 */
class ProducerCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:producer')
            ->setDescription('Another producer');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ProducerInterface $producer **/
        $producer = $this->getContainer()->get(ProducerInterface::class);

        // send event to many consumers
        $producer->sendEvent('aFooTopic', 'Something has happened');

        // send command to ONE consumer
        $producer->sendCommand('aProcessorName', 'Something has happened');
    }
}
