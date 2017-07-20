=== PayGol ===
Contributors: Felipe Saavedra
Donate link: https://www.paypal.com/cl/cgi-bin/webscr?cmd=_flow&SESSION=B7vSAspeluQjsFWOpEemJdKfjDCYr0_YuNBE41U2BATJSZRFFOgVAfientu&dispatch=5885d80a13c0db1f22d2300ef60a67593b79a4d03747447e1e8d0f800ad65e80
Tags: paygol, smsgol, micropayment, sms, mobile payment, payment, mobile billing, premium sms
Requires at least: 2.0
Tested up to: 2.6
Stable tag: 0.7

This plugin allows you to accept donations and payments in your blog using SMS and Phone Call. You simply specify the amount you want to charge, then readers must pay that amount to be able to read the post. 

== Description ==

This plugin allows you to accept donations and payments in your blog using SMS and Phone Call. You simply specify the amount you want to charge, then readers must pay that amount to be able to read the post. 

You only have to add the shortcode [paygol][/paygol] before and after the hidden content, this content will only be visible when the user has paid.
For example [paygol]This is the hidden content[/paygol]

You can define a different price per each content you want to publish.

Go to Settings->PayGol for more information.

**Steps**
1.- If you still don't have an account at PayGol please register for free at http://www.paygol.com
2.- You must create a service of type Integrated
3.- Type the information of the service in the Wordpress plugin administration panel Settings->PayGol
  - Type the service ID of your service at PayGol
  - Copy the next button: http://www.paygol.com/micropayment/img/buttons/150/pay_en_2.png
  - Enter the type of currency
  - Enter a default price to charge, this will the price to charge in case you haven't defined the price in the parameter pg_price of the service at PayGol.
4.- To start charging per content just write the content and put between [paygol][/paygol] the content you want to hide. This content will only be visible once the reader has paid for it.

== Installation ==

1. Download the plugin
2. Unzip it
3. Upload it to wp-content/plugin/
4. Log in to the plugin page and then activate it
5. Go to Settings->PayGol

== screenshots ==

1. screenshot-1.png
2. screenshot-2.png

