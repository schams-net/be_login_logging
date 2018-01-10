<?php

/*
 * This file is part of the TYPO3 CMS Extension "Backend Login Logging"
 * Extension author: Michael Schams - https://schams.net
 *
 * For copyright and license information, please read the LICENSE.txt
 * file distributed with this source code.
 *
 * @package     TYPO3
 * @subpackage  be_login_logging
 * @author      Michael Schams <schams.net>
 * @link        https://schams.net
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Initiate SignalSlotDispatcher
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    'TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher'
);

// Connect the signal "backendUserLoginSuccess" with a slot
$signalSlotDispatcher->connect(
    'TYPO3\\CMS\\Core\\Authentication\\BackendUserAuthentication',
    'backendUserLoginSuccess',
    'SchamsNet\\BeLoginLogging\\Service\\SignalService',
    'writeLog'
);

// Configure the Logging API
$GLOBALS['TYPO3_CONF_VARS']['LOG']['SchamsNet']['BeLoginLogging']['Service']['writerConfiguration'] = [
    \TYPO3\CMS\Core\Log\LogLevel::INFO => array(
        'TYPO3\\CMS\\Core\\Log\\Writer\\FileWriter' => array(
            'logFile' => 'typo3temp/var/logs/be_login_logging.log'
        )
    )
];
