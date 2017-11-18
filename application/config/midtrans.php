<?php
/**
 * @author Prasetyo Pandu <prasetyowira@gmail.com>
 * Date: 17/11/17
 * Time: 17.32
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Midtrans Configuration CHANGE THIS BEFORE GOING LIVE
|--------------------------------------------------------------------------
|
| Midtrans Merchant ID, Client Key, Server Key, Is Production
| CHANGE THIS BEFORE GOING LIVE AND USE YOUR MIDTRANS LIVE CREDENTIAL
|
|
|
|
*/
$config['midtrans_is_production'] = FALSE;
$config['midtrans_merchant_id'] = 'M106397';
$config['midtrans_client_key'] = 'VT-client-BIowa-0Gca8vlhzA';
$config['midtrans_server_key'] = 'VT-server-cpfraZCXz1LWBsG7d20wrXZY';
$config['midtrans_available_payments'] = array(
	'credit_card',
	'bank_transfer'
);