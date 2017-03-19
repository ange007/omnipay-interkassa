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

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * InterKassa Purchase Response.
 */
class PurchaseResponse extends \Omnipay\Common\Message\AbstractResponse implements RedirectResponseInterface
{
    /**
     * @var string URL to redirect client to payment system. Used when [[isRedirect]]
     */
    protected $_redirect = 'https://sci.interkassa.com/';

    /**
     * Always returns `false`, because InterKassa always needs redirect
     * {@inheritdoc}
     */
    public function isSuccessful( )
    {
        return false;
    }

    /**
     * Always returns `true`, because InterKassa always needs redirect
     * {@inheritdoc}
     */
    public function isRedirect( )
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl( )
    {
        return $this->_redirect;
    }

    /**
     * Always `POST` for InterKassa
     * {@inheritdoc}
     */
    public function getRedirectMethod( )
    {
        return 'POST';
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectData( )
    {
        return $this->data;
    }
}
