<?php

namespace PlatformEngine\Engine\Console\Command;

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
        $io = new SymfonyStyle($input, $output);

        $headers = ['Name', 'Features'];
        $rows = [];

        $finder = new Finder();
        $finder->directories()->depth(0)->in(getcwd() . DIRECTORY_SEPARATOR . 'platform');

        foreach ($finder as $directory) {

            $rows[] = [
                $directory->getRelativePathname(),
                $this->collectCategories($directory),
            ];
        }

        $io->table($headers, $rows);

    }

    protected function collectCategories(SplFileInfo $directory)
    {
        $categoryFinder = new Finder();
        $categoryFinder->directories()->depth(0)->in($directory->getRealPath());

        $data = [];
        foreach ($categoryFinder as $category) {
            $data[] = $category->getRelativePathname() . $this->collectService($category);
        }

        return implode(", ", $data);
    }

    protected function collectService(SplFileInfo $category)
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
            $path = $category->getRealPath() . DIRECTORY_SEPARATOR . $featureFilePath;

            if (is_file($path) || is_dir($path)) {
                $data[$featureId] = $featureId;
            }
        }

        if (count($data)) {
            return sprintf(' (%s)', implode(", ", $data));
        }

        return '';

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
