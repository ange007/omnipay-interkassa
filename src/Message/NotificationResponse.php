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

use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\NotificationInterface;

/**
 * InterKassa NotificationResponse.
 * 
 * https://www.interkassa.com/documentation-sci/#sci-pay-notify
 */
class NotificationResponse extends AbstractResponse implements NotificationInterface
{
	/**
	 * 
	 */
	private $errorMessage;
	
	/**
	 * {@inheritdoc}
	 */
	public function __construct( RequestInterface $request, $data )
	{
		parent::__construct( $request, $data );

		$signKey = $this->request->getTestMode( ) ? $this->request->getTestKey( ) : $this->request->getSignKey( );
		$signExpected = $this->request->calculateSign( $this->data, $signKey );

		if( $this->getCheckoutId( ) !== $this->request->getCheckoutId( ) )
		{
			$this->errorMessage = 'Wrong checkout ID';
		}
		else if( $this->getSign( ) !== $signExpected )
		{
			$this->errorMessage = 'Failed to validate signature';
		}
	}
	
	/**
	 * Whether the payment is successful.
	 *
	 * @return boolean
	 */
	public function isSuccessful( )
	{
		if( !empty( $this->errorMessage ) )
		{
			return false;
		}
		else
		{
			return $this->getTransactionStatus( ) === 'success';
		}
	}

	/**
	 * @return string
	 */
	public function getSign( )
	{
		return isset( $this->data[ 'ik_sign' ] ) ? $this->data[ 'ik_sign' ] : null;
	}
	
	/**
	 * 
	 */
	public function getMessage( )
	{
		return $this->errorMessage;
	}
}
