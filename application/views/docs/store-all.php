<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>API details documentation | Nabilah</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Store All API</h1>

	<div id="body">

        <p>API Type : <b>GET</b></p>

        <p>Data Type : <b>JSON</b></p>

        <p>Testing Tool : <b>Google Chrome</b></p>

        <p>API Purpose : </p>
		<code>API ini digunakan untuk melihat semua store</code>

		<p>Localhost testing URL : </p>
		<code>http://localhost/api/store-all</code>

        <p>Test Case : </p>
		<code>
            {
                http://localhost/MMart-api/api/store-all
            }
        </code>

        <p>Success Response : </p>
		<code>
            {
                {
				    "id_store": "1",
				    "id_user": "3",
				    "store_name": "Toko Online",
				    "address": "Krajan Timur No 63",
				    "city": "Malang",
				    "province": "Jawa Timur",
				    "country": "Indoesia",
				    "postal_code": "65154",
				    "phone": "085755219604"
				}{
				    "id_store": "2",
				    "id_user": "4",
				    "store_name": "Belibeli",
				    "address": "Balubur Town Square",
				    "city": "Bandung",
				    "province": "Jawa Barat",
				    "country": "Indonesia",
				    "postal_code": "23514",
				    "phone": "070707"
				}
            }
        </code>

        <p>Failed Response : </p>
		<code>
            {
                
            }
        </code>

        <p><a href="<?php echo base_url(); ?>docs/"><strong><-- back to API list</strong></a></p>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>. Created by <a href="https://gitlab.com/nabilala"><strong>Nabilah</strong></a></p>
</div>

</body>
</html>