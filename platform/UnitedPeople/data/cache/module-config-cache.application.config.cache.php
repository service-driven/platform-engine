<?php
return array (
  'service_manager' => 
  array (
    'aliases' => 
    array (
      'Di' => 'DependencyInjector',
      'Zend\\Di\\LocatorInterface' => 'DependencyInjector',
      'Zend\\Session\\SessionManager' => 'Zend\\Session\\ManagerInterface',
      'MvcTranslator' => 'Zend\\Mvc\\I18n\\Translator',
      'console' => 'ConsoleAdapter',
      'Console' => 'ConsoleAdapter',
      'ConsoleDefaultRenderingStrategy' => 'Zend\\Mvc\\Console\\View\\DefaultRenderingStrategy',
      'ConsoleRenderer' => 'Zend\\Mvc\\Console\\View\\Renderer',
      'Zend\\Form\\Annotation\\FormAnnotationBuilder' => 'FormAnnotationBuilder',
      'Zend\\Form\\Annotation\\AnnotationBuilder' => 'FormAnnotationBuilder',
      'Zend\\Form\\FormElementManager' => 'FormElementManager',
      'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterInterface',
      'navigation' => 'Zend\\Navigation\\Navigation',
      'HttpRouter' => 'Zend\\Router\\Http\\TreeRouteStack',
      'router' => 'Zend\\Router\\RouteStackInterface',
      'Router' => 'Zend\\Router\\RouteStackInterface',
      'RoutePluginManager' => 'Zend\\Router\\RoutePluginManager',
    ),
    'factories' => 
    array (
      'DependencyInjector' => 'Zend\\ServiceManager\\Di\\DiFactory',
      'DiAbstractServiceFactory' => 'Zend\\ServiceManager\\Di\\DiAbstractServiceFactoryFactory',
      'DiServiceInitializer' => 'Zend\\ServiceManager\\Di\\DiServiceInitializerFactory',
      'DiStrictAbstractServiceFactory' => 'Zend\\ServiceManager\\Di\\DiStrictAbstractServiceFactoryFactory',
      'Zend\\Session\\Config\\ConfigInterface' => 'Zend\\Session\\Service\\SessionConfigFactory',
      'Zend\\Session\\ManagerInterface' => 'Zend\\Session\\Service\\SessionManagerFactory',
      'Zend\\Session\\Storage\\StorageInterface' => 'Zend\\Session\\Service\\StorageFactory',
      'Zend\\Mvc\\I18n\\Translator' => 'Zend\\Mvc\\I18n\\TranslatorFactory',
      'ConsoleAdapter' => 'Zend\\Mvc\\Console\\Service\\ConsoleAdapterFactory',
      'ConsoleExceptionStrategy' => 'Zend\\Mvc\\Console\\Service\\ConsoleExceptionStrategyFactory',
      'ConsoleRouteNotFoundStrategy' => 'Zend\\Mvc\\Console\\Service\\ConsoleRouteNotFoundStrategyFactory',
      'ConsoleRouter' => 'Zend\\Mvc\\Console\\Router\\ConsoleRouterFactory',
      'ConsoleViewManager' => 'Zend\\Mvc\\Console\\Service\\ConsoleViewManagerFactory',
      'Zend\\Mvc\\Console\\View\\DefaultRenderingStrategy' => 'Zend\\Mvc\\Console\\Service\\DefaultRenderingStrategyFactory',
      'Zend\\Mvc\\Console\\View\\Renderer' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Log\\Logger' => 'Zend\\Log\\LoggerServiceFactory',
      'LogFilterManager' => 'Zend\\Log\\FilterPluginManagerFactory',
      'LogFormatterManager' => 'Zend\\Log\\FormatterPluginManagerFactory',
      'LogProcessorManager' => 'Zend\\Log\\ProcessorPluginManagerFactory',
      'LogWriterManager' => 'Zend\\Log\\WriterPluginManagerFactory',
      'FormAnnotationBuilder' => 'Zend\\Form\\Annotation\\AnnotationBuilderFactory',
      'FormElementManager' => 'Zend\\Form\\FormElementManagerFactory',
      'Zend\\Db\\Adapter\\AdapterInterface' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
      'Zend\\Navigation\\Navigation' => 'Zend\\Navigation\\Service\\DefaultNavigationFactory',
      'Zend\\Router\\Http\\TreeRouteStack' => 'Zend\\Router\\Http\\HttpRouterFactory',
      'Zend\\Router\\RoutePluginManager' => 'Zend\\Router\\RoutePluginManagerFactory',
      'Zend\\Router\\RouteStackInterface' => 'Zend\\Router\\RouterFactory',
      'ValidatorManager' => 'Zend\\Validator\\ValidatorPluginManagerFactory',
      'Vision\\DataService\\GoalDataService' => 'Vision\\DataService\\GoalDataServiceFactory',
      'Vision\\Service\\GoalService' => 'Vision\\Service\\GoalServiceFactory',
      'Networking\\Service\\ExporterService' => 'Networking\\Service\\ExporterServiceFactory',
      'Networking\\Service\\ImporterService' => 'Networking\\Service\\ImporterServiceFactory',
      'Application\\Service\\ApplicationNavigation' => 'Application\\Service\\ApplicationNavigationFactory',
      'Application\\Service\\MetaNavigation' => 'Application\\Service\\MetaNavigationFactory',
      'Application\\Service\\PrimaryNavigation' => 'Application\\Service\\PrimaryNavigationFactory',
      'Application\\Service\\UserNavigation' => 'Application\\Service\\UserNavigationFactory',
    ),
    'abstract_factories' => 
    array (
      0 => 'Zend\\Session\\Service\\ContainerAbstractServiceFactory',
      1 => 'Zend\\Log\\LoggerAbstractServiceFactory',
      2 => 'Zend\\Form\\FormAbstractServiceFactory',
      3 => 'Zend\\Db\\Adapter\\AdapterAbstractServiceFactory',
      4 => 'Zend\\Navigation\\Service\\NavigationAbstractServiceFactory',
    ),
    'delegators' => 
    array (
      'HttpRouter' => 
      array (
        0 => 'Zend\\Mvc\\I18n\\Router\\HttpRouterDelegatorFactory',
      ),
      'Zend\\Router\\Http\\TreeRouteStack' => 
      array (
        0 => 'Zend\\Mvc\\I18n\\Router\\HttpRouterDelegatorFactory',
      ),
      'ControllerManager' => 
      array (
        0 => 'Zend\\Mvc\\Console\\Service\\ControllerManagerDelegatorFactory',
      ),
      'Request' => 
      array (
        0 => 'Zend\\Mvc\\Console\\Service\\ConsoleRequestDelegatorFactory',
      ),
      'Response' => 
      array (
        0 => 'Zend\\Mvc\\Console\\Service\\ConsoleResponseDelegatorFactory',
      ),
      'Zend\\Router\\RouteStackInterface' => 
      array (
        0 => 'Zend\\Mvc\\Console\\Router\\ConsoleRouterDelegatorFactory',
      ),
      'Zend\\Mvc\\SendResponseListener' => 
      array (
        0 => 'Zend\\Mvc\\Console\\Service\\ConsoleResponseSenderDelegatorFactory',
      ),
      'ViewHelperManager' => 
      array (
        0 => 'Zend\\Mvc\\Console\\Service\\ConsoleViewHelperManagerDelegatorFactory',
        1 => 'Zend\\Navigation\\View\\ViewHelperManagerDelegatorFactory',
      ),
      'ViewManager' => 
      array (
        0 => 'Zend\\Mvc\\Console\\Service\\ViewManagerDelegatorFactory',
      ),
    ),
  ),
  'controller_plugins' => 
  array (
    'aliases' => 
    array (
      'prg' => 'Zend\\Mvc\\Plugin\\Prg\\PostRedirectGet',
      'PostRedirectGet' => 'Zend\\Mvc\\Plugin\\Prg\\PostRedirectGet',
      'postRedirectGet' => 'Zend\\Mvc\\Plugin\\Prg\\PostRedirectGet',
      'postredirectget' => 'Zend\\Mvc\\Plugin\\Prg\\PostRedirectGet',
      'Zend\\Mvc\\Controller\\Plugin\\PostRedirectGet' => 'Zend\\Mvc\\Plugin\\Prg\\PostRedirectGet',
      'identity' => 'Zend\\Mvc\\Plugin\\Identity\\Identity',
      'Identity' => 'Zend\\Mvc\\Plugin\\Identity\\Identity',
      'Zend\\Mvc\\Controller\\Plugin\\Identity' => 'Zend\\Mvc\\Plugin\\Identity\\Identity',
      'flashmessenger' => 'Zend\\Mvc\\Plugin\\FlashMessenger\\FlashMessenger',
      'flashMessenger' => 'Zend\\Mvc\\Plugin\\FlashMessenger\\FlashMessenger',
      'FlashMessenger' => 'Zend\\Mvc\\Plugin\\FlashMessenger\\FlashMessenger',
      'Zend\\Mvc\\Controller\\Plugin\\FlashMessenger' => 'Zend\\Mvc\\Plugin\\FlashMessenger\\FlashMessenger',
      'fileprg' => 'Zend\\Mvc\\Plugin\\FilePrg\\FilePostRedirectGet',
      'FilePostRedirectGet' => 'Zend\\Mvc\\Plugin\\FilePrg\\FilePostRedirectGet',
      'filePostRedirectGet' => 'Zend\\Mvc\\Plugin\\FilePrg\\FilePostRedirectGet',
      'filepostredirectget' => 'Zend\\Mvc\\Plugin\\FilePrg\\FilePostRedirectGet',
      'Zend\\Mvc\\Controller\\Plugin\\FilePostRedirectGet' => 'Zend\\Mvc\\Plugin\\FilePrg\\FilePostRedirectGet',
      'CreateConsoleNotFoundModel' => 'Zend\\Mvc\\Console\\Controller\\Plugin\\CreateConsoleNotFoundModel',
      'createConsoleNotFoundModel' => 'Zend\\Mvc\\Console\\Controller\\Plugin\\CreateConsoleNotFoundModel',
      'createconsolenotfoundmodel' => 'Zend\\Mvc\\Console\\Controller\\Plugin\\CreateConsoleNotFoundModel',
      'Zend\\Mvc\\Controller\\Plugin\\CreateConsoleNotFoundModel::class' => 'Zend\\Mvc\\Console\\Controller\\Plugin\\CreateConsoleNotFoundModel',
    ),
    'factories' => 
    array (
      'Zend\\Mvc\\Plugin\\Prg\\PostRedirectGet' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Mvc\\Plugin\\Identity\\Identity' => 'Zend\\Mvc\\Plugin\\Identity\\IdentityFactory',
      'Zend\\Mvc\\Plugin\\FlashMessenger\\FlashMessenger' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Mvc\\Plugin\\FilePrg\\FilePostRedirectGet' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Mvc\\Console\\Controller\\Plugin\\CreateConsoleNotFoundModel' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'console' => 
  array (
    'router' => 
    array (
      'routes' => 
      array (
      ),
    ),
  ),
  'view_helpers' => 
  array (
    'aliases' => 
    array (
      'form' => 'Zend\\Form\\View\\Helper\\Form',
      'Form' => 'Zend\\Form\\View\\Helper\\Form',
      'formbutton' => 'Zend\\Form\\View\\Helper\\FormButton',
      'form_button' => 'Zend\\Form\\View\\Helper\\FormButton',
      'formButton' => 'Zend\\Form\\View\\Helper\\FormButton',
      'FormButton' => 'Zend\\Form\\View\\Helper\\FormButton',
      'formcaptcha' => 'Zend\\Form\\View\\Helper\\FormCaptcha',
      'form_captcha' => 'Zend\\Form\\View\\Helper\\FormCaptcha',
      'formCaptcha' => 'Zend\\Form\\View\\Helper\\FormCaptcha',
      'FormCaptcha' => 'Zend\\Form\\View\\Helper\\FormCaptcha',
      'captchadumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'captcha_dumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'captcha/dumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'CaptchaDumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'captchaDumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'formcaptchadumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'form_captcha_dumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'formCaptchaDumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'FormCaptchaDumb' => 'Zend\\Form\\View\\Helper\\Captcha\\Dumb',
      'captchafiglet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'captcha/figlet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'captcha_figlet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'captchaFiglet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'CaptchaFiglet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'formcaptchafiglet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'form_captcha_figlet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'formCaptchaFiglet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'FormCaptchaFiglet' => 'Zend\\Form\\View\\Helper\\Captcha\\Figlet',
      'captchaimage' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'captcha/image' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'captcha_image' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'captchaImage' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'CaptchaImage' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'formcaptchaimage' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'form_captcha_image' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'formCaptchaImage' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'FormCaptchaImage' => 'Zend\\Form\\View\\Helper\\Captcha\\Image',
      'captcharecaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'captcha/recaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'captcha_recaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'captchaRecaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'CaptchaRecaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'formcaptcharecaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'form_captcha_recaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'formCaptchaRecaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'FormCaptchaRecaptcha' => 'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha',
      'formcheckbox' => 'Zend\\Form\\View\\Helper\\FormCheckbox',
      'form_checkbox' => 'Zend\\Form\\View\\Helper\\FormCheckbox',
      'formCheckbox' => 'Zend\\Form\\View\\Helper\\FormCheckbox',
      'FormCheckbox' => 'Zend\\Form\\View\\Helper\\FormCheckbox',
      'formcollection' => 'Zend\\Form\\View\\Helper\\FormCollection',
      'form_collection' => 'Zend\\Form\\View\\Helper\\FormCollection',
      'formCollection' => 'Zend\\Form\\View\\Helper\\FormCollection',
      'FormCollection' => 'Zend\\Form\\View\\Helper\\FormCollection',
      'formcolor' => 'Zend\\Form\\View\\Helper\\FormColor',
      'form_color' => 'Zend\\Form\\View\\Helper\\FormColor',
      'formColor' => 'Zend\\Form\\View\\Helper\\FormColor',
      'FormColor' => 'Zend\\Form\\View\\Helper\\FormColor',
      'formdate' => 'Zend\\Form\\View\\Helper\\FormDate',
      'form_date' => 'Zend\\Form\\View\\Helper\\FormDate',
      'formDate' => 'Zend\\Form\\View\\Helper\\FormDate',
      'FormDate' => 'Zend\\Form\\View\\Helper\\FormDate',
      'formdatetime' => 'Zend\\Form\\View\\Helper\\FormDateTime',
      'form_date_time' => 'Zend\\Form\\View\\Helper\\FormDateTime',
      'formDateTime' => 'Zend\\Form\\View\\Helper\\FormDateTime',
      'FormDateTime' => 'Zend\\Form\\View\\Helper\\FormDateTime',
      'formdatetimelocal' => 'Zend\\Form\\View\\Helper\\FormDateTimeLocal',
      'form_date_time_local' => 'Zend\\Form\\View\\Helper\\FormDateTimeLocal',
      'formDateTimeLocal' => 'Zend\\Form\\View\\Helper\\FormDateTimeLocal',
      'FormDateTimeLocal' => 'Zend\\Form\\View\\Helper\\FormDateTimeLocal',
      'formdatetimeselect' => 'Zend\\Form\\View\\Helper\\FormDateTimeSelect',
      'form_date_time_select' => 'Zend\\Form\\View\\Helper\\FormDateTimeSelect',
      'formDateTimeSelect' => 'Zend\\Form\\View\\Helper\\FormDateTimeSelect',
      'FormDateTimeSelect' => 'Zend\\Form\\View\\Helper\\FormDateTimeSelect',
      'formdateselect' => 'Zend\\Form\\View\\Helper\\FormDateSelect',
      'form_date_select' => 'Zend\\Form\\View\\Helper\\FormDateSelect',
      'formDateSelect' => 'Zend\\Form\\View\\Helper\\FormDateSelect',
      'FormDateSelect' => 'Zend\\Form\\View\\Helper\\FormDateSelect',
      'form_element' => 'Zend\\Form\\View\\Helper\\FormElement',
      'formelement' => 'Zend\\Form\\View\\Helper\\FormElement',
      'formElement' => 'Zend\\Form\\View\\Helper\\FormElement',
      'FormElement' => 'Zend\\Form\\View\\Helper\\FormElement',
      'form_element_errors' => 'Zend\\Form\\View\\Helper\\FormElementErrors',
      'formelementerrors' => 'Zend\\Form\\View\\Helper\\FormElementErrors',
      'formElementErrors' => 'Zend\\Form\\View\\Helper\\FormElementErrors',
      'FormElementErrors' => 'Zend\\Form\\View\\Helper\\FormElementErrors',
      'form_email' => 'Zend\\Form\\View\\Helper\\FormEmail',
      'formemail' => 'Zend\\Form\\View\\Helper\\FormEmail',
      'formEmail' => 'Zend\\Form\\View\\Helper\\FormEmail',
      'FormEmail' => 'Zend\\Form\\View\\Helper\\FormEmail',
      'form_file' => 'Zend\\Form\\View\\Helper\\FormFile',
      'formfile' => 'Zend\\Form\\View\\Helper\\FormFile',
      'formFile' => 'Zend\\Form\\View\\Helper\\FormFile',
      'FormFile' => 'Zend\\Form\\View\\Helper\\FormFile',
      'formfileapcprogress' => 'Zend\\Form\\View\\Helper\\File\\FormFileApcProgress',
      'form_file_apc_progress' => 'Zend\\Form\\View\\Helper\\File\\FormFileApcProgress',
      'formFileApcProgress' => 'Zend\\Form\\View\\Helper\\File\\FormFileApcProgress',
      'FormFileApcProgress' => 'Zend\\Form\\View\\Helper\\File\\FormFileApcProgress',
      'formfilesessionprogress' => 'Zend\\Form\\View\\Helper\\File\\FormFileSessionProgress',
      'form_file_session_progress' => 'Zend\\Form\\View\\Helper\\File\\FormFileSessionProgress',
      'formFileSessionProgress' => 'Zend\\Form\\View\\Helper\\File\\FormFileSessionProgress',
      'FormFileSessionProgress' => 'Zend\\Form\\View\\Helper\\File\\FormFileSessionProgress',
      'formfileuploadprogress' => 'Zend\\Form\\View\\Helper\\File\\FormFileUploadProgress',
      'form_file_upload_progress' => 'Zend\\Form\\View\\Helper\\File\\FormFileUploadProgress',
      'formFileUploadProgress' => 'Zend\\Form\\View\\Helper\\File\\FormFileUploadProgress',
      'FormFileUploadProgress' => 'Zend\\Form\\View\\Helper\\File\\FormFileUploadProgress',
      'formhidden' => 'Zend\\Form\\View\\Helper\\FormHidden',
      'form_hidden' => 'Zend\\Form\\View\\Helper\\FormHidden',
      'formHidden' => 'Zend\\Form\\View\\Helper\\FormHidden',
      'FormHidden' => 'Zend\\Form\\View\\Helper\\FormHidden',
      'formimage' => 'Zend\\Form\\View\\Helper\\FormImage',
      'form_image' => 'Zend\\Form\\View\\Helper\\FormImage',
      'formImage' => 'Zend\\Form\\View\\Helper\\FormImage',
      'FormImage' => 'Zend\\Form\\View\\Helper\\FormImage',
      'forminput' => 'Zend\\Form\\View\\Helper\\FormInput',
      'form_input' => 'Zend\\Form\\View\\Helper\\FormInput',
      'formInput' => 'Zend\\Form\\View\\Helper\\FormInput',
      'FormInput' => 'Zend\\Form\\View\\Helper\\FormInput',
      'formlabel' => 'Zend\\Form\\View\\Helper\\FormLabel',
      'form_label' => 'Zend\\Form\\View\\Helper\\FormLabel',
      'formLabel' => 'Zend\\Form\\View\\Helper\\FormLabel',
      'FormLabel' => 'Zend\\Form\\View\\Helper\\FormLabel',
      'formmonth' => 'Zend\\Form\\View\\Helper\\FormMonth',
      'form_month' => 'Zend\\Form\\View\\Helper\\FormMonth',
      'formMonth' => 'Zend\\Form\\View\\Helper\\FormMonth',
      'FormMonth' => 'Zend\\Form\\View\\Helper\\FormMonth',
      'formmonthselect' => 'Zend\\Form\\View\\Helper\\FormMonthSelect',
      'form_month_select' => 'Zend\\Form\\View\\Helper\\FormMonthSelect',
      'formMonthSelect' => 'Zend\\Form\\View\\Helper\\FormMonthSelect',
      'FormMonthSelect' => 'Zend\\Form\\View\\Helper\\FormMonthSelect',
      'formmulticheckbox' => 'Zend\\Form\\View\\Helper\\FormMultiCheckbox',
      'form_multi_checkbox' => 'Zend\\Form\\View\\Helper\\FormMultiCheckbox',
      'formMultiCheckbox' => 'Zend\\Form\\View\\Helper\\FormMultiCheckbox',
      'FormMultiCheckbox' => 'Zend\\Form\\View\\Helper\\FormMultiCheckbox',
      'formnumber' => 'Zend\\Form\\View\\Helper\\FormNumber',
      'form_number' => 'Zend\\Form\\View\\Helper\\FormNumber',
      'formNumber' => 'Zend\\Form\\View\\Helper\\FormNumber',
      'FormNumber' => 'Zend\\Form\\View\\Helper\\FormNumber',
      'formpassword' => 'Zend\\Form\\View\\Helper\\FormPassword',
      'form_password' => 'Zend\\Form\\View\\Helper\\FormPassword',
      'formPassword' => 'Zend\\Form\\View\\Helper\\FormPassword',
      'FormPassword' => 'Zend\\Form\\View\\Helper\\FormPassword',
      'formradio' => 'Zend\\Form\\View\\Helper\\FormRadio',
      'form_radio' => 'Zend\\Form\\View\\Helper\\FormRadio',
      'formRadio' => 'Zend\\Form\\View\\Helper\\FormRadio',
      'FormRadio' => 'Zend\\Form\\View\\Helper\\FormRadio',
      'formrange' => 'Zend\\Form\\View\\Helper\\FormRange',
      'form_range' => 'Zend\\Form\\View\\Helper\\FormRange',
      'formRange' => 'Zend\\Form\\View\\Helper\\FormRange',
      'FormRange' => 'Zend\\Form\\View\\Helper\\FormRange',
      'formreset' => 'Zend\\Form\\View\\Helper\\FormReset',
      'form_reset' => 'Zend\\Form\\View\\Helper\\FormReset',
      'formReset' => 'Zend\\Form\\View\\Helper\\FormReset',
      'FormReset' => 'Zend\\Form\\View\\Helper\\FormReset',
      'formrow' => 'Zend\\Form\\View\\Helper\\FormRow',
      'form_row' => 'Zend\\Form\\View\\Helper\\FormRow',
      'formRow' => 'Zend\\Form\\View\\Helper\\FormRow',
      'FormRow' => 'Zend\\Form\\View\\Helper\\FormRow',
      'formsearch' => 'Zend\\Form\\View\\Helper\\FormSearch',
      'form_search' => 'Zend\\Form\\View\\Helper\\FormSearch',
      'formSearch' => 'Zend\\Form\\View\\Helper\\FormSearch',
      'FormSearch' => 'Zend\\Form\\View\\Helper\\FormSearch',
      'formselect' => 'Zend\\Form\\View\\Helper\\FormSelect',
      'form_select' => 'Zend\\Form\\View\\Helper\\FormSelect',
      'formSelect' => 'Zend\\Form\\View\\Helper\\FormSelect',
      'FormSelect' => 'Zend\\Form\\View\\Helper\\FormSelect',
      'formsubmit' => 'Zend\\Form\\View\\Helper\\FormSubmit',
      'form_submit' => 'Zend\\Form\\View\\Helper\\FormSubmit',
      'formSubmit' => 'Zend\\Form\\View\\Helper\\FormSubmit',
      'FormSubmit' => 'Zend\\Form\\View\\Helper\\FormSubmit',
      'formtel' => 'Zend\\Form\\View\\Helper\\FormTel',
      'form_tel' => 'Zend\\Form\\View\\Helper\\FormTel',
      'formTel' => 'Zend\\Form\\View\\Helper\\FormTel',
      'FormTel' => 'Zend\\Form\\View\\Helper\\FormTel',
      'formtext' => 'Zend\\Form\\View\\Helper\\FormText',
      'form_text' => 'Zend\\Form\\View\\Helper\\FormText',
      'formText' => 'Zend\\Form\\View\\Helper\\FormText',
      'FormText' => 'Zend\\Form\\View\\Helper\\FormText',
      'formtextarea' => 'Zend\\Form\\View\\Helper\\FormTextarea',
      'form_text_area' => 'Zend\\Form\\View\\Helper\\FormTextarea',
      'formTextarea' => 'Zend\\Form\\View\\Helper\\FormTextarea',
      'formTextArea' => 'Zend\\Form\\View\\Helper\\FormTextarea',
      'FormTextArea' => 'Zend\\Form\\View\\Helper\\FormTextarea',
      'formtime' => 'Zend\\Form\\View\\Helper\\FormTime',
      'form_time' => 'Zend\\Form\\View\\Helper\\FormTime',
      'formTime' => 'Zend\\Form\\View\\Helper\\FormTime',
      'FormTime' => 'Zend\\Form\\View\\Helper\\FormTime',
      'formurl' => 'Zend\\Form\\View\\Helper\\FormUrl',
      'form_url' => 'Zend\\Form\\View\\Helper\\FormUrl',
      'formUrl' => 'Zend\\Form\\View\\Helper\\FormUrl',
      'FormUrl' => 'Zend\\Form\\View\\Helper\\FormUrl',
      'formweek' => 'Zend\\Form\\View\\Helper\\FormWeek',
      'form_week' => 'Zend\\Form\\View\\Helper\\FormWeek',
      'formWeek' => 'Zend\\Form\\View\\Helper\\FormWeek',
      'FormWeek' => 'Zend\\Form\\View\\Helper\\FormWeek',
      'translate' => 'Zend\\I18n\\View\\Helper\\Translate',
    ),
    'factories' => 
    array (
      'Zend\\Form\\View\\Helper\\Form' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormButton' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormCaptcha' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\Captcha\\Dumb' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\Captcha\\Figlet' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\Captcha\\Image' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\Captcha\\ReCaptcha' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormCheckbox' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormCollection' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormColor' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormDate' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormDateTime' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormDateTimeLocal' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormDateTimeSelect' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormDateSelect' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormElement' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormElementErrors' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormEmail' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormFile' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\File\\FormFileApcProgress' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\File\\FormFileSessionProgress' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\File\\FormFileUploadProgress' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormHidden' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormImage' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormInput' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormLabel' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormMonth' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormMonthSelect' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormMultiCheckbox' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormNumber' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormPassword' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormRadio' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormRange' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormReset' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormRow' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormSearch' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormSelect' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormSubmit' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormTel' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormText' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormTextarea' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormTime' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormUrl' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Form\\View\\Helper\\FormWeek' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\I18n\\View\\Helper\\Translate' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'view_manager' => 
  array (
    'template_path_stack' => 
    array (
      'zenddevelopertools' => '/Volumes/Repositories/private/unitedvision/app/vendor/zendframework/zend-developer-tools/config/../view',
      0 => '/Volumes/Repositories/private/unitedvision/app/module/Application/config/../view',
      1 => '/Volumes/Repositories/private/unitedvision/app/module/Vision/config/../view',
      2 => '/Volumes/Repositories/private/unitedvision/app/module/Networking/config/../view',
      3 => '/Volumes/Repositories/private/unitedvision/app/module/Data/config/../view',
    ),
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => 
    array (
      'layout/layout' => '/Volumes/Repositories/private/unitedvision/app/module/Application/config/../view/layout/layout.phtml',
      'application/index/index' => '/Volumes/Repositories/private/unitedvision/app/module/Application/config/../view/application/index/index.phtml',
      'error/404' => '/Volumes/Repositories/private/unitedvision/app/module/Application/config/../view/error/404.phtml',
      'error/index' => '/Volumes/Repositories/private/unitedvision/app/module/Application/config/../view/error/index.phtml',
    ),
    'strategies' => 
    array (
      0 => 'ViewJsonStrategy',
      1 => 'ViewFeedStrategy',
    ),
  ),
  'route_manager' => 
  array (
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'home' => 
      array (
        'type' => 'Zend\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
      'calendars' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/application/calendars[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\CalendarController',
            'action' => 'index',
          ),
        ),
      ),
      'messages' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/application/messages[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\MessageController',
            'action' => 'index',
          ),
        ),
      ),
      'goals' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/goals[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\GoalController',
            'action' => 'index',
          ),
        ),
      ),
      'strategies' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/strategies[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\StrategyController',
            'action' => 'index',
          ),
        ),
      ),
      'videos' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/videos[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\VideoController',
            'action' => 'index',
          ),
        ),
      ),
      'courses' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/courses[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\CourseController',
            'action' => 'index',
          ),
        ),
      ),
      'events' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/events[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\EventController',
            'action' => 'index',
          ),
        ),
      ),
      'tasks' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/tasks[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\TaskController',
            'action' => 'index',
          ),
        ),
      ),
      'radars' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/radars[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\RadarController',
            'action' => 'index',
          ),
        ),
      ),
      'issues' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/vision/issues[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Vision\\Controller\\IssueController',
            'action' => 'index',
          ),
        ),
      ),
      'networking' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/networking[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
      'people' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/people[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\PersonController',
            'action' => 'index',
          ),
        ),
      ),
      'groups' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/groups[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\GroupController',
            'action' => 'index',
          ),
        ),
      ),
      'companies' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/companies[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\CompanyController',
            'action' => 'index',
          ),
        ),
      ),
      'clusters' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/clusters[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\ClusterController',
            'action' => 'index',
          ),
        ),
      ),
      'portals' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/portals[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\PortalController',
            'action' => 'index',
          ),
        ),
      ),
      'importers' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/importers[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\ImporterController',
            'action' => 'index',
          ),
        ),
      ),
      'exporters' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/networking/exporters[[/:action]/:id]',
          'defaults' => 
          array (
            'controller' => 'Networking\\Controller\\ExporterController',
            'action' => 'index',
          ),
        ),
      ),
      'data' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/data/data[/:action]',
          'defaults' => 
          array (
            'controller' => 'Data\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
      'analyses' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/data/analyses[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Data\\Controller\\AnalysisController',
            'action' => 'index',
          ),
        ),
      ),
      'competitors' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/data/competitors[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Data\\Controller\\CompetitorController',
            'action' => 'index',
          ),
        ),
      ),
      'reports' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/data/reports[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Data\\Controller\\ReportController',
            'action' => 'index',
          ),
        ),
      ),
      'data-types' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/data/data-types[/:action[/:id]]',
          'defaults' => 
          array (
            'controller' => 'Data\\Controller\\DataTypeController',
            'action' => 'index',
          ),
        ),
      ),
    ),
  ),
  'controllers' => 
  array (
    'factories' => 
    array (
      'Application\\Controller\\CalendarController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Application\\Controller\\IndexController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Application\\Controller\\MessageController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Vision\\Controller\\GoalController' => 'Vision\\Controller\\GoalControllerFactory',
      'Vision\\Controller\\StrategyController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Vision\\Controller\\VideoController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Vision\\Controller\\CourseController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Vision\\Controller\\EventController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Vision\\Controller\\TaskController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Vision\\Controller\\RadarController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Vision\\Controller\\IssueController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Networking\\Controller\\CompanyController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Networking\\Controller\\GroupController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Networking\\Controller\\IndexController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Networking\\Controller\\PersonController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Networking\\Controller\\ClusterController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Networking\\Controller\\PortalController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Networking\\Controller\\ImporterController' => 'Networking\\Controller\\ImporterControllerFactory',
      'Networking\\Controller\\ExporterController' => 'Networking\\Controller\\ExporterControllerFactory',
      'Data\\Controller\\AnalysisController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Data\\Controller\\CompetitorController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Data\\Controller\\DataTypeController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Data\\Controller\\IndexController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'importer_manager' => 
  array (
    'factories' => 
    array (
      'Networking\\Importer\\Xing\\XingCompanyImporter' => 'Networking\\Importer\\Xing\\XingCompanyImporterFactory',
    ),
  ),
  'exporter_manager' => 
  array (
    'factories' => 
    array (
    ),
  ),
  'navigation' => 
  array (
    'applications' => 
    array (
      0 => 
      array (
        'label' => 'Kalender',
        'route' => 'calendars',
        'icon' => 'zmdi zmdi-calendar',
        'description' => 'Sorem ipsum dolor sit amet',
        'buttons' => 
        array (
          0 => 
          array (
            'label' => 'Öffnen',
            'icon' => 'btn palette-Grey bg waves-effect',
          ),
        ),
      ),
      1 => 
      array (
        'label' => 'Nachrichten',
        'route' => 'messages',
        'icon' => 'bg zmdi zmdi-email',
        'description' => 'Sorem ipsum dolor sit amet',
        'buttons' => 
        array (
          0 => 
          array (
            'label' => 'Öffnen',
            'icon' => 'btn palette-Grey bg waves-effect',
          ),
        ),
      ),
      2 => 
      array (
        'label' => 'Dateien',
        'route' => 'calendars',
        'icon' => 'bg zmdi zmdi-file-text',
        'description' => 'Sorem ipsum dolor sit amet',
        'buttons' => 
        array (
          0 => 
          array (
            'label' => 'Öffnen',
            'icon' => 'btn palette-Grey bg waves-effect',
          ),
        ),
      ),
      3 => 
      array (
        'label' => 'Analytics',
        'route' => 'analyses',
        'icon' => 'zmdi zmdi-trending-up',
        'description' => 'Sorem ipsum',
        'buttons' => 
        array (
          0 => 
          array (
            'label' => 'Aktualisieren',
            'icon' => 'btn palette-Blue bg waves-effect',
          ),
        ),
      ),
    ),
    'meta' => 
    array (
      0 => 
      array (
        'label' => '<img src="/img/profile-pics/1.jpg" alt="">',
        'route' => 'home',
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Dein Profil',
            'route' => 'home',
            'icon' => 'zmdi zmdi-account',
          ),
          1 => 
          array (
            'label' => 'Privatsphäre',
            'route' => 'home',
            'icon' => 'zmdi zmdi-input-antenna',
          ),
          2 => 
          array (
            'label' => 'Einstellungen',
            'route' => 'home',
            'icon' => 'zmdi zmdi-settings',
          ),
          3 => 
          array (
            'label' => 'Logout',
            'route' => 'home',
            'icon' => 'zmdi zmdi-time-restore',
          ),
        ),
      ),
      1 => 
      array (
        'label' => '<b>650</b>',
        'route' => 'home',
      ),
    ),
    'primary' => 
    array (
      0 => 
      array (
        'label' => 'Visionen',
        'route' => 'goals',
        'icon' => 'zmdi zmdi-cloud-outline zmdi-hc-fw',
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Ziele',
            'route' => 'goals',
          ),
          1 => 
          array (
            'label' => 'Strategien',
            'route' => 'strategies',
          ),
          2 => 
          array (
            'label' => 'Vorgänge',
            'route' => 'issues',
          ),
        ),
      ),
      1 => 
      array (
        'label' => 'Vernetzungen',
        'route' => 'networking',
        'icon' => 'zmdi zmdi-accounts zmdi-hc-fw',
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Cluster',
            'route' => 'clusters',
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Cluster-Landkarte',
                'route' => 'networking',
              ),
              1 => 
              array (
                'label' => '',
                'route' => 'networking',
              ),
              2 => 
              array (
                'label' => '',
                'route' => 'networking',
              ),
              3 => 
              array (
                'label' => '',
                'route' => 'networking',
              ),
              4 => 
              array (
                'label' => '',
                'route' => 'networking',
              ),
              5 => 
              array (
                'label' => '',
                'route' => 'networking',
              ),
              6 => 
              array (
                'label' => '',
                'route' => 'networking',
              ),
            ),
          ),
          1 => 
          array (
            'label' => 'Portale',
            'route' => 'portals',
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Landesportal',
                'route' => 'networking',
              ),
              1 => 
              array (
                'label' => 'Beteilligungsportal',
                'route' => 'networking',
              ),
              2 => 
              array (
                'label' => 'Geoportal BW',
                'route' => 'networking',
              ),
              3 => 
              array (
                'label' => 'Behördenfinder Deutschland (OpenCMS)',
                'route' => 'networking',
              ),
              4 => 
              array (
                'label' => 'Energiewende? Machen wir!',
                'route' => 'networking',
              ),
              5 => 
              array (
                'label' => 'GovData - Datenportal für Deutschland',
                'route' => 'networking',
              ),
              6 => 
              array (
                'label' => 'Shop (OXID)',
                'route' => 'networking',
              ),
              7 => 
              array (
                'label' => 'TYPO3',
                'route' => 'networking',
              ),
            ),
          ),
          2 => 
          array (
            'label' => 'Personen',
            'route' => 'people',
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Query-Explorer',
                'route' => 'people',
              ),
              1 => 
              array (
                'label' => 'Importieren',
                'route' => 'people',
              ),
              2 => 
              array (
                'label' => 'Exportieren',
                'route' => 'people',
              ),
            ),
          ),
        ),
      ),
      2 => 
      array (
        'label' => 'Daten',
        'route' => 'data',
        'icon' => 'zmdi zmdi-storage zmdi-hc-fw',
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Übersicht',
            'route' => 'data',
          ),
          1 => 
          array (
            'label' => 'Konkurrenz',
            'route' => 'competitors',
          ),
          2 => 
          array (
            'label' => 'Berichte',
            'route' => 'reports',
          ),
        ),
      ),
    ),
    'user' => 
    array (
      0 => 
      array (
        'label' => 'User',
        'route' => 'user',
      ),
    ),
  ),
  'rabbitmq' => 
  array (
    'host' => 'localhost',
    'port' => 5672,
    'login' => 'guest',
    'password' => 'guest',
  ),
  'dependencies' => 
  array (
    'factories' => 
    array (
      'doctrine.entity_manager.orm_default' => 'ContainerInteropDoctrine\\EntityManagerFactory',
    ),
  ),
  'doctrine' => 
  array (
    'connection' => 
    array (
      'orm_default' => 
      array (
        'params' => 
        array (
          'url' => 'mysql://username:password@localhost/database',
        ),
      ),
    ),
    'driver' => 
    array (
      'orm_default' => 
      array (
        'class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
        'drivers' => 
        array (
          'App\\Entity' => 'my_entity',
        ),
      ),
      'my_entity' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
        'cache' => 'array',
        'paths' => '/Volumes/Repositories/private/unitedvision/app/config/autoload/../../src/App/Entity',
      ),
    ),
  ),
);