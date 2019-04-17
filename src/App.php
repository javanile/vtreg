<?php

namespace Javanile\VtigerCli;

use Silly\Application as SillyApplication;
use Symfony\Component\Console\Output\OutputInterface;

class App extends SillyApplication
{
    /**
     *
     */
    protected $config;

    /**
     * VtigerCli constructor.
     *
     * @param string $cwd
     */
    public function __construct($cwd)
    {
        parent::__construct('vtiger-cli', '0.0.1');

        $this->config = new Config($cwd);
        //$this->database = new Database();
    }

    /**
     * @param OutputInterface $output
     */
    public function info(OutputInterface $output)
    {
        $this->config->loadConfig($output);
        $output->writeln($this->getName().' ('.$this->getVersion().')');
        $output->writeln('  config file: '.$this->config->getConfigFile());
        $output->writeln('  vtiger directory: '.$this->config->getVtigerDir());
        $output->writeln('  working directory: '.$this->config->getWorkingDir());
    }
}
