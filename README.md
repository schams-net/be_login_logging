# Backend Login Logging

This [TYPO3](https://typo3.org) extension is a proof of concept of [feature request #83529](https://forge.typo3.org/issues/83529).


## Description

With [patchset 1](https://review.typo3.org/#/c/55319/) applied to the TYPO3 core (TYPO3 version 9.0.0), this extension writes an entry to a log file every time a user logs into the backend of TYPO3.

The location of the log file is: `typo3temp/var/logs/be_login_logging.log`.


## System Requirements

* TYPO3 version 9.x
* PHP version 7.2
* [Patchset 1](https://review.typo3.org/#/c/55319/) applied


## License

(c) 2018 Michael Schams (schams.net), all rights reserved

This software free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, either version 2 of the License, or any later version. For the full copyright and license information, please see the documentation that was distributed with this source code.

The GNU General Public License can be found at:
http://www.gnu.org/copyleft/gpl.html


## Author

Michael Schams <schams.net>
