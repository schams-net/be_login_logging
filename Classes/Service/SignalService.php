<?php
namespace SchamsNet\BeLoginLogging\Service;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Signal Service
 */
class SignalService
{
    /**
     * Extension key
     *
     * @access private
     * @var string
     */
    private $extensionKey = 'be_login_logging';

    /**
     * Backend user
     *
     * @access private
     * @var array
     */
    private $user = [];

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        /** @var $logger \TYPO3\CMS\Core\Log\Logger */
        $this->logger = GeneralUtility::makeInstance('TYPO3\CMS\Core\Log\LogManager')->getLogger(__CLASS__);
    }

    /**
     * Write log entry
     *
     * @access public
     */
    public function writeLog($backendUser)
    {
        if (is_array($backendUser)) {
            $this->user = $backendUser;
        }

        $this->logger->info(
            implode(', ', [
                'Site: ' . $GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'],
                'Username: ' . $this->user['username'],
                'Email: ' . (!empty($this->user['email']) ? $this->user['email'] : 'N/A'),
                'isAdmin: ' . ($this->isAdmin() == true ? 'yes' : 'no')
            ])
        );
    }

    /**
     * Returns TRUE if user is admin
     * Basically this function evaluates if the ->user[admin] field has bit 0 set. If so, user is admin.
     *
     * @access private
     * @return bool
     */
    private function isAdmin()
    {
        return is_array($this->user) && ($this->user['admin'] & 1) == 1;
    }
}
