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

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Backend Login Logging',
    'description' => 'A proof of concept that writes a log entry, every time a user logs into the backend.',
    'category' => 'misc',
    'version' => '1.1.0',
    'module' => '',
    'state' => 'experimental',
    'createDirs' => '',
    'clearcacheonload' => 0,
    'author' => 'Michael Schams (schams.net)',
    'author_email' => 'schams.net',
    'author_company' => 'https://schams.net',
    'constraints' => array(
        'depends' => array(
            'typo3' => '9.0.0-9.5.99',
            'php' => '7.0.0-7.2.99',
        ),
        'conflicts' => array(
        )
    )
);
