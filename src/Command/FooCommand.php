<?php
namespace App\Command;

use App\Service\BarService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FooCommand extends Command
{

    /** @var string $defaultName */
    protected static $defaultName = 'foo:bar';

    /** @var BarService $bar_service */
    private $bar_service;

    public function __construct(BarService $bar_service) {
        $this->bar_service = $bar_service;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('A foo command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bar = $this->bar_service->bar();

        $output->writeln($bar);
    }
}
