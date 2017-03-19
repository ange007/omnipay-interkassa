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
 * InterKassa Complete Purchase Request.
 * 
 * https://www.interkassa.com/documentation-sci/#sci-page-return
 */
class CompletePurchaseRequest extends AbstractRequest
{

	/**
	 * Send the request with specified data.
	 *
	 * @param mixed $data The data to send
	 *
	 * @return CompletePurchaseResponse
	 */
	public function sendData( $data )
	{
		return $this->response = new CompletePurchaseResponse( $this, $data );
	}

}
