<?php

namespace Zeroem\Psurgeon\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class IndexCommand extends Command
{
  public function configure() {
    $this->setName('index');
    $this->setDescription('Index the project content for faster operations');
    $this->setDefinition(
      array(
        new InputArgument('target',InputArgument::OPTIONAL,'directory or file to index', getcwd()),
        new InputOption('rebuild',null, InputOption::VALUE_NONE,'rebuild the index for the target')
      )
    );
  }

  public function execute(InputInterface $input, OutputInterface $output) {
    
  }
}
