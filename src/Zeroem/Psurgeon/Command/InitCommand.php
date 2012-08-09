<?php

namespace Zeroem\Psurgeon\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class InitCommand extends Command
{
    private $sqlite;
    private $init;
    
    public function __construct($sqlite,$init) {
        parent::__construct();

        $this->sqlite = $sqlite;
        $this->init = $init;
    }

    public function configure() {
        $this->setName('init');
        $this->setDescription('Initialize the psurgeon index');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $pdo = new \PDO($this->sqlite);
        $result = $pdo->query($this->init);
    }
}

