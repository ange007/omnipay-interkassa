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

/**
 * InterKassa Complete Purchase Response.
 * 
 * https://www.interkassa.com/documentation-sci/#sci-page-return
 */
class CompletePurchaseResponse extends AbstractResponse
{
	/**
	 * 
	 */
	private $errorMessage;
	
	/**
	 * Whether the payment is successful.
	 *
	 * @return boolean
	 */
	public function isSuccessful( )
	{
		return false;
	}
	
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isPending( )
    {
        return true;
    }
	
	/**
	 * {@inheritdoc}
	 */
	public function __construct( RequestInterface $request, $data )
	{
		parent::__construct( $request, $data );

		if( $this->getCheckoutId( ) !== $this->request->getCheckoutId( ) )
		{
			$this->errorMessage = 'Wrong checkout ID';
		}
	}
	
}
