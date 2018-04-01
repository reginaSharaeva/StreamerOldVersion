<?php

namespace App\Console\Commands\Makers\Service;

use App\Console\Commands\Makers\Util\PatternMaker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServiceMaker extends Command
{

    public function configure()
    {
        $this
        // the name of the command (the part after "bin/console")
        ->setName('make:service')
        // configure an argument
        ->addArgument('modelName', InputArgument::REQUIRED, 'The name of the servicemodel.')
        // the short description shown while running "php bin/console list"
        ->setDescription('create service pattern for model');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $modelName = $input->getArgument('modelName');
        $patternMakert = new PatternMaker("/var/www/html/videoCam/app/");
        $result = $patternMakert->MakePatternByName("Service", $modelName);
        if ($result["type"] == "error") {
            $output->writeln('<error>{$result["message"]}</error>');
        } else {
            $output->writeln('<info>{$result["message"]}</info>');
        }
    }

}