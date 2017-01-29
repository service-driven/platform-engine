<?php

namespace OpenArchitecture\RestfulMvc\Listener;

use Zend\Db\TableGateway\Feature\EventFeature;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\I18n\Translator\Translator;
use Zend\ModuleManager\Listener\AbstractListener;
use Zend\ModuleManager\Listener\AutoloaderListener;
use Zend\ModuleManager\Listener\ConfigListener;
use Zend\ModuleManager\Listener\ConfigMergerInterface;
use Zend\ModuleManager\Listener\ListenerOptions;
use Zend\ModuleManager\Listener\LocatorRegistrationListener;
use Zend\ModuleManager\Listener\ModuleLoaderListener;
use Zend\ModuleManager\Listener\ModuleResolverListener;
use Zend\ModuleManager\ModuleEvent;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ResponseSender\SendResponseEvent;
use Zend\View\ViewEvent;
use ZendDeveloperTools\ProfilerEvent;

/**
 * Class DefaultListenerAggregate
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Listener
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class DefaultListenerAggregate implements ListenerAggregateInterface
{
    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * @var ConfigMergerInterface
     */
    protected $configListener;

    /**
     * @var ListenerOptions
     */
    protected $options;


    /**
     * __construct
     *
     * @param  ListenerOptions $options
     */
    public function __construct(ListenerOptions $options = null)
    {
        if (null === $options) {
            $this->setOptions(new ListenerOptions);
        } else {
            $this->setOptions($options);
        }
    }

    /**
     * Get options.
     *
     * @return ListenerOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set options.
     *
     * @param ListenerOptions $options the value to be set
     * @return AbstractListener
     */
    public function setOptions(ListenerOptions $options)
    {
        $this->options = $options;

        return $this;
    }


    /**
     * Attach one or more listeners
     *
     * @param  EventManagerInterface $events
     * @return DefaultListenerAggregate
     */
    public function attach(EventManagerInterface $events)
    {
        $options = array();

        $this->listeners[] = $events->attach(new ModuleLoaderListener($options));

        $this->listeners[] = $events->attach(ModuleEvent::EVENT_LOAD_MODULE_RESOLVE, new ModuleResolverListener);
        $this->listeners[] = $events->attach(ModuleEvent::EVENT_LOAD_MODULE, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(ModuleEvent::EVENT_LOAD_MODULES, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(ModuleEvent::EVENT_MERGE_CONFIG, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(ModuleEvent::EVENT_LOAD_MODULES_POST, new AutoloaderListener($options));


        $this->listeners[] = $events->attach(MvcEvent::EVENT_BOOTSTRAP, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH_ERROR, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(MvcEvent::EVENT_FINISH, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER_ERROR, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(MvcEvent::EVENT_ROUTE, new AutoloaderListener($options));

        $this->listeners[] = $events->attach(SendResponseEvent::EVENT_SEND_RESPONSE, new AutoloaderListener($options));

        $this->listeners[] = $events->attach(Translator::EVENT_MISSING_TRANSLATION, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(Translator::EVENT_NO_MESSAGES_LOADED, new AutoloaderListener($options));

        $this->listeners[] = $events->attach(EventFeature::EVENT_PRE_INITIALIZE, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_POST_INITIALIZE, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_PRE_SELECT, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_POST_SELECT, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_PRE_INSERT, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_POST_INSERT, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_PRE_DELETE, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_POST_DELETE, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_PRE_UPDATE, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(EventFeature::EVENT_POST_UPDATE, new AutoloaderListener($options));

        $this->listeners[] = $events->attach(ViewEvent::EVENT_RENDERER, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RENDERER_POST, new AutoloaderListener($options));
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RESPONSE, new AutoloaderListener($options));

        $this->listeners[] = $events->attach(ProfilerEvent::EVENT_COLLECTED, new AutoloaderListener($options));

        return $this;
    }

    /**
     * Detach all previously attached listeners
     *
     * @param  EventManagerInterface $events
     * @return void
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $key => $listener) {
            unset($this->listeners[$key]);
        }
    }


    /**
     * Get the config merger.
     *
     * @return ConfigMergerInterface
     */
    public function getConfigListener()
    {
        if (!$this->configListener instanceof ConfigMergerInterface) {
            $this->setConfigListener(new ConfigListener($this->getOptions()));
        }

        return $this->configListener;
    }

    /**
     * Set the config merger to use.
     *
     * @param  ConfigMergerInterface $configListener
     * @return DefaultListenerAggregate
     */
    public function setConfigListener(ConfigMergerInterface $configListener)
    {
        $this->configListener = $configListener;

        return $this;
    }

}