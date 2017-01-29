<?php

namespace Application\Controller;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use RegexIterator;
use SplFileInfo;
use Zend\Console\Request;
use Zend\Mvc\Console\Controller\AbstractConsoleController;

class WarehouseConsoleController extends AbstractConsoleController
{
    /** @var array */
    protected $config;

    protected $path;

    protected $extension;

    /**
     * AnalyzeConsoleController constructor.
     *
     * @param array $config The global config.
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        /** @var Request $request */
//        $request = $this->getRequest();
//        $path = $request->getParam('path');


        $source = '/src';
        $this->extension = 'php';
        $this->path = realpath(__DIR__ . '/../../../Scan');
//        return;


        $recursiveDirectoryIterator = new RecursiveDirectoryIterator($this->path . $source, FilesystemIterator::SKIP_DOTS);
        $recursiveIteratorIterator = new RecursiveIteratorIterator($recursiveDirectoryIterator);
        /** @var SplFileInfo[] $regexIterator */
        $regexIterator = new RegexIterator($recursiveIteratorIterator, '/^.+\.' . $this->extension . '$/i',
            RecursiveRegexIterator::MATCH);

        foreach ($regexIterator as $file) {
            $this->analyze($file);
        }
    }

    public function analyze(SplFileInfo $file)
    {
        $class = $namespace = $buffer = '';
        $i = 0;

        $buffer = file_get_contents($file);
        $tokens = @token_get_all($buffer);

        for (; $i < count($tokens); $i++) {
            if ($tokens[$i][0] === T_NAMESPACE) {
                for ($j = $i + 1; $j < count($tokens); $j++) {
                    if ($tokens[$j][0] === T_STRING) {
                        $namespace .= '\\' . $tokens[$j][1];
                    } else {
                        if ($tokens[$j] === '{' || $tokens[$j] === ';') {
                            break;
                        }
                    }
                }
            }

            if ($tokens[$i][0] === T_CLASS) {
                for ($j = $i + 1; $j < count($tokens); $j++) {
                    if ($tokens[$j] === '{') {
                        $class = $tokens[$i + 2][1];
                    }
                }
            }
        }
        $extension = '.' . $this->extension;

        $errorMessage = error_get_last();
        $errorMessage['target'] = $file->getPathInfo()->getRealPath();
        $errorMessage['namespace'] = $namespace;
        $errorMessage['class'] = $class;
        $errorMessage['path'] = $this->path;

        $testRootPath = str_replace("/src/", "/test/", $file->getPathInfo()->getRealPath());
        $fileBaseName = $file->getBasename($extension);

        $testClassName = $fileBaseName . 'Test';
        $testClassPath = $testRootPath . DIRECTORY_SEPARATOR . $testClassName . $extension;
        $this->getConsole()->writeLine($testClassName);
        $this->getConsole()->writeLine($testClassPath);
    }

}