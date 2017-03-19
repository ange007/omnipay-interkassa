<?php

/**
 * InterKassa driver for the Omnipay PHP payment processing library
 *
 * @link      https://github.com/ange007/omnipay-interkassa
 * @package   omnipay-interkassa
 * @license   MIT
 * @copyright Copyright (c) 2017, ange007 ( original author: HiQDev - http://hiqdev.com/ )
 */

namespace Omnipay\InterKassa\Message;

/**
 * InterKassa Notification Request.
 * 
 * https://www.interkassa.com/documentation-sci/#sci-pay-notify
 */
class NotificationRequest extends AbstractRequest
{
	/**
	 * Send the request with specified data.
	 *
	 * @param mixed $data The data to send
	 *
	 * @return NotificationResponse
	 */
	public function sendData( $data )
	{
		return $this->response = new NotificationResponse( $this, $data );
	}

}
