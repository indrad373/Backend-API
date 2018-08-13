<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>List API for online store system | Aulia Arif Wardana</title>

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
	<h1>The API list for simple online store system</h1>

	<div id="body">

		<p>User Register API</p>
		<code><a href="<?php echo base_url(); ?>docs/userRegister/">/api/user-register</a></code>

		<p>User Login API</p>
		<code><a href="<?php echo base_url(); ?>docs/userLogin/">/api/user-login</a></code>

		<p>Detail User API</p>
		<code><a href="<?php echo base_url(); ?>docs/userDetails/">/api/user-details</a></code>

		<p>User Update Profile API</p>
		<code><a href="<?php echo base_url(); ?>docs/userUpdateProfile/">/api/user-update-profile</a></code>

		<p>User Update Password API</p>
		<code><a href="<?php echo base_url(); ?>docs/userUpdatePassword/">/api/user-update-password</a></code>

		<p>User Delete API</p>
		<code><a href="<?php echo base_url(); ?>docs/userDelete/">/api/user-delete</a></code>

		<p>Item Insert API</p>
		<code><a href="<?php echo base_url(); ?>docs/itemInsert/">/api/item-insert</a></code>

		<p>Item Update API</p>
		<code><a href="<?php echo base_url(); ?>docs/itemUpdate/">/api/item-update</a></code>

		<p>Item Delete API</p>
		<code><a href="<?php echo base_url(); ?>docs/itemDelete/">/api/item-delete</a></code>

		<p>Item Details API</p>
		<code><a href="<?php echo base_url(); ?>docs/itemDetails/">/api/item-details</a></code>

		<p>Item View Popular API</p>
		<code><a href="<?php echo base_url(); ?>docs/itemViewPopular/">/api/item-view-popular</a></code>

		<p>Item View Promo API</p>
		<code><a href="<?php echo base_url(); ?>docs/itemViewPromo/">/api/item-view-promo</a></code>

		<p>Store Insert API</p>
		<code><a href="<?php echo base_url(); ?>docs/storeInsert/">/api/store-insert</a></code>

		<p>Store Update API</p>
		<code><a href="<?php echo base_url(); ?>docs/storeUpdate/">/api/store-update</a></code>

		<p>Store Delete API</p>
		<code><a href="<?php echo base_url(); ?>docs/storeDelete/">/api/store-delete</a></code>

		<p>Store Details API</p>
		<code><a href="<?php echo base_url(); ?>docs/storeDetails/">/api/store-details</a></code>

		<p>Store All Item API</p>
		<code><a href="<?php echo base_url(); ?>docs/storeAllItem/">/api/store-all-item</a></code>

		<p>Store All API</p>
		<code><a href="<?php echo base_url(); ?>docs/storeAll/">/api/store-all</a></code>

        <p><a href="<?php echo base_url(); ?>"><strong><-- back to welcome page</strong></a></p>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>. Created by <a href="http://aulwardana.github.io"><strong>Aulia Arif Wardana</strong></a></p>
</div>

</body>
</html>