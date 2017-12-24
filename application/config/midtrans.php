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
$config['midtrans_is_production'] = TRUE;
$config['midtrans_merchant_id'] = 'M112696';
$config['midtrans_client_key'] = 'Mid-client-cWIz2xOpmhU7tWnR';
$config['midtrans_server_key'] = 'Mid-server-hR22e24OZ4Fjx6GSsGPBiSmI';
//Available Payment Method
$config['midtrans_available_payments'] = array(
	'credit_card',
	'bank_transfer'
);
//Expire Transaction In Day Unit
$config['midtrans_expire'] = 3;