<?php

namespace Console\PlatformEngine\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class DebugCommand
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Console\PlatformEngine\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class DebugCommand extends Command
{
    protected $finder;

    protected function configure()
    {
        $this->setName('debug')->setDescription('Show data about this project.')->setHelp("....");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');
        $helper = $this->getHelper('question');

        $io = new SymfonyStyle($input, $output);


        $types = [
//            'client'    => [
//                'label' => 'Client',
//            ],
//            'framework' => [
//                'label' => 'Framework',
//            ],
            'platform'  => [
                'label' => 'Platform',
            ],
//            'plugin'    => [
//                'label' => 'Plugin',
//            ],
        ];

        $headers = ['Name', 'Features'];
        $rows = [];

        foreach ($types as $id => $type) {
            $finder = new Finder();
            $finder->directories()->depth(0)->in(getcwd() . DIRECTORY_SEPARATOR . $id);

            foreach ($finder as $directory) {
                $rows[] = [
                    $type['label'] . ' ' . DIRECTORY_SEPARATOR . ' ' . $directory->getRelativePathname(),
                    $this->collect($directory),
                ];
            }
        }

        $io->table($headers, $rows);

    }

    protected function collect(SplFileInfo $directory)
    {
        $features = [
            "composer.json"            => "Composer",
            "package.json"             => "Npm",
            ".git"                     => "Git",
            ".gitignore"               => "Git",
            "gulpfile.js"              => "Gulp",
            "README.md"                => "Markdown",
            "config/module.config.php" => "ZF2",
            "src/Module.php"           => "ZF2",
        ];

        $data = [];

        foreach ($features as $featureFilePath => $featureId) {
            $path = $directory->getRealPath() . DIRECTORY_SEPARATOR . $featureFilePath;

            if (is_file($path) || is_dir($path)) {
                $data[$featureId] = $featureId;
            }
        }

        return implode(", ", $data);
    }

    protected function executeMore()
    {
        $a = 1;
//        $io->confirm('Restart the web server?', true);
//        $io->choice('Select the queue to analyze', ['queue1', 'queue2', 'queue3'], 'queue1');


//        $io->title('Lorem Ipsum Dolor Sit Amet');

//        $progress = new ProgressBar($output, 100);
//        $progress->setFormat(' %current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%');
//        $progress->start();
//
//        $i = 0;
//        while ($i++ < 100) {
//            usleep(10000);
//            $progress->advance(1);
//        }
//
//        $progress->finish();
//
//        $output->writeln("");
//
//
//        $formattedLine = $formatter->formatSection('SomeSection', 'Here is some message related to that section');
//        $output->writeln($formattedLine);
//
//        $message = "This is a very long message, which should be truncated";
//        $truncatedMessage = $formatter->truncate($message, 7);
//        $output->writeln($truncatedMessage);
//
//        $errorMessages = ['Error!', 'Something went wrong'];
//        $formattedBlock = $formatter->formatBlock($errorMessages, 'error');
//        $output->writeln($formattedBlock);

//        $question = new ConfirmationQuestion('Continue with this action? ', false);
//        $helper->ask($input, $output, $question);
//        $question = new ChoiceQuestion('Please select your favorite color', ['red', 'blue', 'yellow'], 0);
//        $helper->ask($input, $output, $question);

        return $a;
    }
}
