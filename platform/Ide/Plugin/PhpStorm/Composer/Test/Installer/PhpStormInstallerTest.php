<?php

namespace EventDriven\PhpStormComposerPluginTest\Composer\Installer;

use Composer\Composer;
use Composer\Config;
use Composer\IO\IOInterface;
use Composer\Package\Package;
use Composer\Package\PackageInterface;
use Composer\Package\RootPackage;
use Composer\Package\Version\VersionParser;
use Composer\Repository\InstalledArrayRepository;
use Composer\Repository\RepositoryManager;
use Composer\Repository\WritableRepositoryInterface;
use EventDriven\PhpStormComposerPlugin\Composer\Installer\PhpStormInstaller;
use PHPUnit\Framework\TestCase;

/**
 * Class PhpStormInstallerTest
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   EventDriven\PhpStormComposerPluginTest\Composer\Installer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * @coversDefaultClass EventDriven\PhpStormComposerPlugin\Composer\Installer\PhpStormInstaller
 */
class PhpStormInstallerTest extends TestCase
{
    /** @var Composer */
    protected $composer;

    /** @var PackageInterface */
    protected $io;

    /** @var Package */
    protected $package;

    /** @var PhpStormInstaller */
    protected $installer;

    /** @var WritableRepositoryInterface */
    protected $repository;

    /** @var RepositoryManager */
    protected $repositoryManager;

    /** @var Config */
    protected $config;

    /** @var VersionParser */
    protected $versionParser;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->composer = new Composer();
        $this->config = new Config();
        $this->package = new RootPackage('Project', '1.0', '1.0');
        $this->repository = new InstalledArrayRepository();
        $this->io = $this->createMock(IOInterface::class);
        $this->versionParser = new VersionParser();

        $this->installer = new PhpStormInstaller($this->package, $this->composer, $this->io);
        $this->repositoryManager = new RepositoryManager($this->io, $this->config);

        $this->composer->setRepositoryManager($this->repositoryManager);
        $this->repositoryManager->setLocalRepository($this->repository);
    }

    /**
     * @dataProvider packageNameInflectionProvider
     *
     * @param string $type Type.
     * @param string $name Name.
     * @param string $expected Expected.
     */
    public function testInflectPackageVars($type, $name, $expected)
    {
        $this->assertEquals(
            array(
                'name' => $expected,
                'type' => $type,
            ),
            $this->installer->inflectPackageVars(
                array(
                    'name' => $name,
                    'type' => $type,
                )
            )
        );
    }

    /**
     * @return array
     */
    public function packageNameInflectionProvider()
    {
        return array(
            array(
                'phpstorm-component',
                'encoding-component',
                'EncodingComponent',
            ),
            array(
                'phpstorm-component',
                'php-unit-component',
                'PhpUnitComponent',
            ),
            array(
                'phpstorm-component',
                'project-module-manager-component',
                'ProjectModuleManagerComponent',
            ),
            array(
                'phpstorm-component',
                'workspace-component',
                'WorkspaceComponent',
            ),
        );
    }

    protected function setPhpStormVersion($version)
    {
        $version = $this->versionParser->parseConstraints($version);

        $this->repository->addPackage(new Package('event-driven/phpstorm-composer-plugin', $version, $version));
    }
}