<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCP\User;

use Symfony\Component\EventDispatcher\Event;

class UserPasswordCreateEvent extends Event {
	const CREATE_PASSWORD = 'OCP\User::createPassword';

	/** @var string event name */
	protected $event;
	/** @var array data*/
	protected $data;

	/**
	 * UserPasswordCreateEvent constructor.
	 *
	 * @param string $event
	 * @param array $data
	 */
	public function __construct($event, $data = []) {
		$this->event = $event;
		$this->data = $data;
	}

	/**
	 * @return string
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->data['password'] = $password;
	}

	/**
	 * @return bool|mixed
	 */
	public function getPassword() {
		if (isset($this->data['password'])) {
			return $this->data['password'];
		}
		return false;
	}
}