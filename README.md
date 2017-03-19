Omnipay: InterKassa
===================

**InterKassa driver for the Omnipay PHP payment processing library**

[![Latest Stable Version](https://poser.pugx.org/ange007/omnipay-interkassa/v/stable)](https://packagist.org/packages/ange007/omnipay-interkassa)
[![Total Downloads](https://poser.pugx.org/ange007/omnipay-interkassa/downloads)](https://packagist.org/packages/ange007/omnipay-interkassa)
[![Build Status](https://scrutinizer-ci.com/g/ange007/omnipay-interkassa/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ange007/omnipay-interkassa/build-status/master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/ange007/omnipay-interkassa.svg)](https://scrutinizer-ci.com/g/ange007/omnipay-interkassa/)
[![Dependency Status](https://www.versioneye.com/user/projects/58ce762ddcaf9e0041b5ba4b/badge.svg)](https://www.versioneye.com/user/projects/58ce762ddcaf9e0041b5ba4b)

[Omnipay](https://github.com/omnipay/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+.

This package implements [InterKassa](http://interkassa.com/) support for Omnipay.

## Installation

The preferred way to install this library is through [composer](http://getcomposer.org/download/).

Either run

```sh
php composer.phar require "ange007/omnipay-interkassa"
```

or add

```json
"ange007/omnipay-interkassa": "*"
```

to the require section of your composer.json.

## Basic Usage

The following gateway is provided by this package:

* [InterKassa Shop Cart Interface](http://interkassa.com/)

For general usage instructions, please see the main [Omnipay](https://github.com/omnipay/omnipay) repository.

## Example

```php
public function payResponse( $serviceID, $status, $data )
{
	// Load Gateway
	$gateway = Omnipay::gateway( $serviceID );

	// Read data
	if( $status === 'notify' && $gateway->supportsAcceptNotification( ) ) { $request = $gateway->acceptNotification( $data ); }
	else if( $gateway->supportsCompleteAuthorize( ) ) { $request = $gateway->completeAuthorize( $data ); }
	else if( $gateway->supportsCompletePurchase( ) ) { $request = $gateway->completePurchase( $data ); }

	// Send request
	try { $response = $request->send( ); }
	catch( Exception $ex ) { }

	// Need wait server notification
	if( $response->isPending( ) )
	{
		//...
	}
	// Paid successful
	else if( $response->isSuccessful( ) )
	{
		$payID = $response->getTransactionId( );
		//...
	}
	// Pay cancelled from user
	else if( $request->isCancelled( ) ) 
	{
		//...
	}
	// Error or other
	else 
	{ 
		$message = $response->getMessage( );
		//...
	}
}
```

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/ange007/omnipay-interkassa/issues),
or better yet, fork the library and submit a pull request.

## License

This project is released under the terms of the MIT [license](LICENSE).
Read more [here](http://choosealicense.com/licenses/mit).

Copyright © 2017, ange007 *(original author: HiQDev - [hiqdev/omnipay-interkassa](https://github.com/hiqdev/omnipay-interkassa))*.
