<?php

namespace EventDriven\PhpStormComposerPlugin\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\InstallerEvent;
use Composer\Installer\PackageEvent;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\CommandEvent;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PreFileDownloadEvent;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;


/**
 * Class PhpStormPlugin
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   EventDriven\PhpStormComposerPlugin\Composer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PhpStormPlugin implements Capable, EventSubscriberInterface, PluginInterface
{

    protected $cached = false;
    protected $disabled = false;

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     * * The method name to call (priority defaults to 0)
     * * An array composed of the method name to call and the priority
     * * An array of arrays composed of the method names to call and respective
     *   priorities, or 0 if unset
     *
     * For instance:
     *
     * * array('eventName' => 'methodName')
     * * array('eventName' => array('methodName', $priority))
     * * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            PluginEvents::INIT => 'onInit',
            PluginEvents::PRE_FILE_DOWNLOAD => 'beforeFileDownload',
            PluginEvents::COMMAND => 'onCommand',

            ScriptEvents::PRE_INSTALL_CMD => 'beforeInstall',
            ScriptEvents::POST_INSTALL_CMD => 'afterInstall',

            ScriptEvents::PRE_UPDATE_CMD => 'beforeUpdate',
            ScriptEvents::POST_UPDATE_CMD => 'afterUpdate',

            ScriptEvents::PRE_STATUS_CMD => 'beforeStatus',
            ScriptEvents::POST_STATUS_CMD => 'afterStatus',

            ScriptEvents::PRE_AUTOLOAD_DUMP => 'beforeAutoloadDump',
            ScriptEvents::POST_AUTOLOAD_DUMP => 'afterAutoloadDump',

            ScriptEvents::POST_ROOT_PACKAGE_INSTALL => 'afterRootPackageInstall',
            ScriptEvents::POST_CREATE_PROJECT_CMD => 'afterCreateProject',

            ScriptEvents::PRE_ARCHIVE_CMD => 'beforeArchive',
            ScriptEvents::POST_ARCHIVE_CMD => 'afterArchive',
        );
    }

    /**
     * Apply plugin modifications to Composer
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        if (__CLASS__ !== PhpStormPlugin::class) {
            return $this->disable();
        }

        if (array_key_exists('argv', $GLOBALS)) {
            foreach ($GLOBALS['argv'] as $arg) {
                switch ($arg) {
                    case 'create-project':
                    case 'update':
                    case 'outdated':
                    case 'require':
                        $this->prefetchComposerRepositories();
                        break 2;
                    case 'install':
                        if (file_exists('composer.json') && !file_exists('composer.lock')) {
                            $this->prefetchComposerRepositories();
                        }
                        break 2;
                }
            }
        }


        $installer = new PhpStormInstaller($io, $composer);

        $composer->getInstallationManager()->addInstaller($installer);
    }

    public function disable()
    {
        $this->disabled = true;
    }

    private function prefetchComposerRepositories()
    {
        if ($this->disabled) {
            return;
        }
        if ($this->cached) {
            return;
        }
        $repos = $this->package->getRepositories();
        foreach ($repos as $label => $repo) {
            if (isset($repo['type']) && $repo['type'] === 'composer') {
                if (isset($repo['force-lazy-providers']) && $repo['force-lazy-providers']) {
                    continue;
                }
                if ('http?://' === substr($repo['url'], 0, 8) && isset($repo['allow_ssl_downgrade']) && $repo['allow_ssl_downgrade']) {
                    $repo = array(
                        'type' => $repo['type'],
                        'url' => str_replace('https?://', 'https://', $repo['url']),
                    );
                }
                $r = new ParallelizedComposerRepository($repo, $this->io, $this->config);
                $r->prefetch();
            }
        }
        $this->cached = true;
    }

    public function beforeInstall(CommandEvent $event)
    {
        if ($this->disabled) {
            return;
        }


    }

    public function afterInstall(CommandEvent $event)
    {

    }

    public function beforeUpdate(CommandEvent $event)
    {

    }

    public function afterUpdate(CommandEvent $event)
    {

    }

    public function beforeStatus(CommandEvent $event)
    {

    }

    public function afterStatus(CommandEvent $event)
    {

    }

    public function beforeAutoloadDump(Event $event)
    {

    }

    public function afterAutoloadDump(Event $event)
    {

    }

    public function beforeArchive(CommandEvent $event)
    {

    }

    public function afterArchive(CommandEvent $event)
    {

    }

    public function afterRootPackageInstall(PackageEvent $event)
    {

    }

    public function afterCreateProject(PackageEvent $event)
    {

    }

    public function onInit($event)
    {

    }

    public function beforeFileDownload(PreFileDownloadEvent $event)
    {

    }

    public function onCommand(CommandEvent $event)
    {

    }

    /**
     * Method by which a Plugin announces its API implementations, through an array
     * with a special structure.
     *
     * The key must be a string, representing a fully qualified class/interface name
     * which Composer Plugin API exposes.
     * The value must be a string as well, representing the fully qualified class name
     * of the implementing class.
     *
     * @tutorial
     *
     * return array(
     *     'Composer\Plugin\Capability\CommandProvider' => 'My\CommandProvider',
     *     'Composer\Plugin\Capability\Validator'       => 'My\Validator',
     * );
     *
     * @return string[]
     */
    public function getCapabilities()
    {
        return array(
            CommandProvider::class => CommandProvider::class,
        );
    }

    /**
     * pre-fetch parallel by curl_multi
     */
    public function onPostDependenciesSolving(InstallerEvent $ev)
    {
        if ($this->disabled) {
            return;
        }
        $preFetcher = new Prefetcher;
        $preFetcher->fetchAllFromOperations(
            $this->io,
            $this->config,
            $ev->getOperations()
        );
    }

    public function isDisabled()
    {
        return $this->disabled;
    }
}