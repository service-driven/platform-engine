<?php
//adapt from https://samsonasik.wordpress.com/2014/01/21/zend-framework-2-handle-e-php-error/
//adapt from http://stackoverflow.com/questions/277224/how-do-i-catch-a-php-fatal-error
define('E_FATAL', E_ERROR | E_USER_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_RECOVERABLE_ERROR);

//define('DISPLAY_ERRORS', false);
define('ERROR_REPORTING', E_ALL | E_STRICT);

register_shutdown_function('shutdown');
set_error_handler('handler');

/**
 * PHP finishing with check for fatal errors
 *
 * @return void
 */
function shutdown()
{
    $error = error_get_last();
    if ($error && ($error['type'] & E_FATAL)) {
        handler($error['type'], $error['message'], $error['file'], $error['line']);
    }
}

/**
 * Logs error
 *
 * @param integer $errorNr The predefined error function constants (see link).
 * @param string $errorMessage The error message.
 * @param string $errorFile The path and name of the file.
 * @param integer $errorLine The Line where the error accrue.
 *
 * @return void
 *
 * @link http://php.net/manual/en/errorfunc.constants.php
 */
function handler($errorNr, $errorMessage, $errorFile, $errorLine)
{
    switch ($errorNr) {

        case E_ERROR: // 1 //
            $typeString = 'E_ERROR';
            break;
        case E_WARNING: // 2 //
            $typeString = 'E_WARNING';
            break;
        case E_PARSE: // 4 //
            $typeString = 'E_PARSE';
            break;
        case E_NOTICE: // 8 //
            $typeString = 'E_NOTICE';
            break;
        case E_CORE_ERROR: // 16 //
            $typeString = 'E_CORE_ERROR';
            break;
        case E_CORE_WARNING: // 32 //
            $typeString = 'E_CORE_WARNING';
            break;
        case E_COMPILE_ERROR: // 64 //
            $typeString = 'E_COMPILE_ERROR';
            break;
        case E_COMPILE_WARNING: // 128 //
            $typeString = 'E_COMPILE_WARNING';
            break;
        case E_USER_ERROR: // 256 //
            $typeString = 'E_USER_ERROR';
            break;
        case E_USER_WARNING: // 512 //
            $typeString = 'E_USER_WARNING';
            break;
        case E_USER_NOTICE: // 1024 //
            $typeString = 'E_USER_NOTICE';
            break;
        case E_STRICT: // 2048 //
            $typeString = 'E_STRICT';
            break;
        case E_RECOVERABLE_ERROR: // 4096 //
            $typeString = 'E_RECOVERABLE_ERROR';
            break;
        case E_DEPRECATED: // 8192 //
            $typeString = 'E_DEPRECATED';
            break;
        case E_USER_DEPRECATED: // 16384 //
            $typeString = 'E_USER_DEPRECATED';
            break;
        default:
            $typeString = 'UNKNOWN';
    }

    $message = " PHP Error in file : " . $errorFile . " at line : " . $errorLine . "
    with type error : " . $typeString . " : " . $errorMessage . " in " . $_SERVER['REQUEST_URI'];

    if (!($errorNr & ERROR_REPORTING)) {

        return;
    }

    $format = str_pad('=', 120, '=') . PHP_EOL;
    $format .= '%timestamp% %priorityName% (%priority%): %message%' . PHP_EOL;
    $formatter = new \Zend\Log\Formatter\Simple($format);

    $writerStream = new Zend\Log\Writer\Stream(__DIR__ . '/../data/log/' . date('Ymd') . '_php.log');
    $writerStream->setFormatter($formatter);

    $logger = new Zend\Log\Logger;
    $logger->addWriter($writerStream);

    if ($errorNr == E_WARNING) {
        $logger->warn($message);
    } elseif ($errorNr == E_NOTICE) {
        $logger->notice($message);
    } else {
        $logger->err($message);
    }

    echo '<span style="color:red; font-size: 10px; text-align:center; position: fixed; top: 0; left: 0; z-index: 999; width: 100%; height: 10px;">' . $message . '</span><br/>';

}
