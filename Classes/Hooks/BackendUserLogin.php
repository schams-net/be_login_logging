<?php
namespace SchamsNet\BeLoginLogging\Hooks;

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
 * Hook on backend user login
 */
class BackendUserLogin
{
    /**
     * Backend user
     *
     * @access private
     * @var array
     */
    private $user = [];

    /**
     * Dispatcher
     *
     * @access public
     * @param array
     */
    public function dispatch($backendUser)
    {
        /** @var $logger \TYPO3\CMS\Core\Log\Logger */
        $this->logger = GeneralUtility::makeInstance('TYPO3\CMS\Core\Log\LogManager')->getLogger(__CLASS__);

        if (isset($backendUser['user']['username'])) {
            $this->user = $backendUser['user'];
            $this->writeLog();
        }
    }

    /**
     * Write log entry
     *
     * @access public
     */
    public function writeLog()
    {
        $this->logger->info(
            implode(', ', [
                'Site: ' . $GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'],
                'Username: ' . $this->user['username'],
                'Email: ' . (!empty($this->user['email']) ? $this->user['email'] : 'N/A'),
                'isAdmin: ' . ($this->isAdmin($this->user) == true ? 'yes' : 'no')
            ])
        );
    }

    /**
     * Returns TRUE if $this->user is admin.
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
