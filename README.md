# Backend Login Logging

This [TYPO3](https://typo3.org) extension is a proof of concept of [feature #83529](https://forge.typo3.org/issues/83529).


## Description

With [patchset 2](https://review.typo3.org/#/c/55319/) applied to the TYPO3 core (TYPO3 version 9.0.0), **a signal is emitted** every time a user logs in to the backend of TYPO3. This extension uses the [Signals/Slots concept](https://en.wikipedia.org/wiki/Signals_and_slots) to connect the signal to a slot and executes a method. The method writes an entry to a log file.

With [patchset 3](https://review.typo3.org/#/c/55319/) applied to the TYPO3 core (TYPO3 version 9.0.0), **registered hooks** are executed every time a user logs in to the backend of TYPO3. This extension registers such a hook, which writes an entry to a log file.

It is important to understand that writing a log file is just a proof of concept. Since TYPO3 version 9.0 all events in the authentication classes are passed to the logging API, which means backend logins can be logged without the need of an extension. Please keep in mind that the purpose of this extension is just to demonstrate/test the signal or hook implemented as [feature #83529](https://forge.typo3.org/issues/83529).

The location of the log file written by this extension is `typo3temp/var/logs/be_login_logging.log` (do not use this extension on a publicly accessible server).


## System Requirements

* TYPO3 version 9.x
* PHP version 7.2
* TYPO3 core patches applied, see [feature #83529](https://forge.typo3.org/issues/83529)


## License

(c) 2018 Michael Schams (schams.net), all rights reserved

This software free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, either version 2 of the License, or any later version. For the full copyright and license information, please see the documentation that was distributed with this source code.

See [GNU General Public License](http://www.gnu.org/copyleft/gpl.html) for further details.


## Author

Michael Schams <schams.net>
