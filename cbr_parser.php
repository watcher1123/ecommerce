<?php
/***************************************************************************************************
* cbr.ru  XML currency parser                                                                      *
*                                                                                                  *
* Project: 	Replica                                                                                *
* Version: 	1.0                                                                                    *
* Date:    	2011-05-03                                                                             *
* Author:  	outsourcing-engineering.com                                                            *
* CopyRight 2011 outsourcing-engineering.com                                                       *
****************************************************************************************************/
	/* Define currency code */
	$code = 'USD'; /* EUR, GBP, etc... */
	$link = "http://www.cbr.ru/scripts/XML_daily.asp"; //xml link
	$nominal = 1; //nominal
	$rate = 0.00; //default rate

    /* PHP 4 >= 4.0.2
	$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$xml = curl_exec($ch);
	curl_close($ch);
	*/
	/* PHP 4 >= 4.3.0 */
	$xml = file_get_contents($link);

	/* parse XML */
	$matches = array();
	$xml = str_replace(array("\r\n","\n","\r"), '', $xml);
	if(preg_match('#<Valute ID=".*">.*<CharCode>'.$code.'</CharCode>.*<Nominal>(.*)</Nominal>.*<Value>(.*)</Value>.*</Valute>#isU',$xml, $matches))
	{
		if (count($matches) > 0){
			$nominal = @$matches[1];			$rate    = @$matches[2];
		}	}


	/* Print rate */
	echo "Nominal: ".$nominal;
    echo " Rate: ".$rate;
?>