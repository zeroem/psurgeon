<?php

namespace Zeroem\Psurgeon\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class InitCommand extends Command
{
    private $init;
    private $sqlite;

    public function __construct($init) {
        parent::__construct();
        $this->sqlite = 'sqlite:' . realpath('.') . '/.psurgeon.sqlite';
        $this->init = $init;
    }

    public function configure() {
        $this->setName('init');
        $this->setDescription('Initialize the psurgeon index');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $dialog = $this->getHelperSet()->get('dialog');

        $pdo = new \PDO($this->sqlite);
        $result = $pdo->query($this->init);

        if ($input->isInteractive()) {
            $ignoreFile = realpath('.gitignore');

            if (false === $ignoreFile) {
                $ignoreFile = realpath('.') . '/.gitignore';
            }

            if (!$this->hasPsurgeonIndexIgnore($ignoreFile)) {
                $question = 'Would you like the <info>psurgeon index</info> database added to your <info>.gitignore</info> [<comment>yes</comment>]?';

                if ($dialog->askConfirmation($output, $question, true)) {
                    $this->addPsurgeonIndexIgnore($ignoreFile);
                }
            }
        }
    }

    /**
     * Checks the local .gitignore file for the Psurgeon index database.
     *
     * Copied from the Composer Init Command
     *
     * @param string $ignoreFile
     * @param string $db
     *
     * @return Boolean
     */
    private function hasPsurgeonIndexIgnore($ignoreFile, $db = '.psurgeon.sqlite')
    {
        if (!file_exists($ignoreFile)) {
            return false;
        }

        $pattern = sprintf(
            '~^/?%s(/|/\*)?$~',
            preg_quote($db, '~')
        );

        $lines = file($ignoreFile, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            if (preg_match($pattern, $line)) {
                return true;
            }
        }

        return false;
    }

    private function addPsurgeonIndexIgnore($ignoreFile, $db = '.psurgeon.sqlite')
    {
        $contents = "";
        if (file_exists($ignoreFile)) {
            $contents = file_get_contents($ignoreFile);

            if ("\n" !== substr($contents, 0, -1)) {
                $contents .= "\n";
            }
        }

        file_put_contents($ignoreFile, $contents . $db. "\n");
    }
}

