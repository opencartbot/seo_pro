<?php
			$qu = $this->db->query("DESCRIBE " . DB_PREFIX . "product_to_category `main_category`");
			if ($qu->num_rows == 0) {
				$this->db->query("ALTER TABLE " . DB_PREFIX ."product_to_category ADD `main_category` tinyint(1) COLLATE utf8_general_ci NOT NULL DEFAULT '0' AFTER `category_id`");
			}
			
			$seourl = array(
				'common/home' 			=> '',
				'account/wishlist' 		=> 'wishlist',
				'account/account' 		=> 'account',
				'checkout/cart' 		=> 'cart',
				'checkout/checkout' 	=> 'checkout',
				'account/login'			=> 'login',
				'account/logout'		=> 'logout',
				'account/order'			=> 'order-history',
				'account/order/info'	=> 'order-information',
				'account/newsletter'	=> 'newsletter',
				'product/special'		=> 'specials',
				'affiliate/account'		=> 'affiliates',
				'account/voucher'		=> 'gift-vouchers',
				'account/recurring'		=> 'recurring-payments',
				'product/manufacturer'	=> 'brands',
				'information/contact'	=> 'contact-us',
				'account/return/add'	=> 'request-return',
				'information/sitemap'	=> 'sitemap',
				'account/forgotten'		=> 'forgot-password',
				'account/download'		=> 'downloads',
				'account/return'		=> 'returns',
				'account/transaction'	=> 'transactions',
				'account/register'		=> 'create-account',
				'product/compare'		=> 'compare-products',
				'product/search'		=> 'search',
				'account/edit'			=> 'edit-account',
				'account/password'		=> 'change-password',
				'account/address'		=> 'address-book',
				'account/address/edit'	=> 'edit-address',
				'account/address/add'	=> 'add-address',
				'account/address/delete'=> 'delete-address',
				'account/reward'		=> 'reward-points',
				'affiliate/edit'		=> 'edit-affiliate-account',
				'affiliate/password'	=> 'change-affiliate-password',
				'affiliate/payment'		=> 'affiliate-payment-options',
				'affiliate/tracking'	=> 'affiliate-tracking-code',
				'affiliate/transaction'	=> 'affiliate-transactions',
				'affiliate/logout'		=> 'affiliate-logout',
				'affiliate/forgotten'	=> 'affiliate-forgot-password',
				'affiliate/register'	=> 'create-affiliate-account',
				'affiliate/login'		=> 'affiliate-login'
			);
	
	foreach ($seourl as $query => $keyword) {
	$qu = $this->db->query("SELECT `query` FROM " . DB_PREFIX ."url_alias WHERE `query`='" . $query. "' ");
		if ($qu->num_rows == 0) {
			$this->db->query("INSERT INTO " . DB_PREFIX ."url_alias (query, keyword) VALUES ('" . $query. "', '" . $keyword . "')");
		}
	}
?>