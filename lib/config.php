<?php
class Config {
	public $secret = "DFSJLFSDLJG";
	public $sitename = "openwine.co.il"; /* name of the site */
	public $address = "http://openwine.co.il/"; /* adress of the site */
	public $address_admin = "http://openwine.co.il/admin/";
	public $db_host = "localhost"; /* adress of the database */
	public $db_user = "root"; /* login of user */
	public $db_password = "160670"; /* password of user */
	public $db_name = "sopenwine-local"; /*name of the database */
	public $db_prefix = "sopenwine_"; /*prefix for security*/
	public $sym_query = "{?}"; /*security of variables */

	public $admname = "Nikita Zabelin";
	public $admemail = "ntl27182@gmail.com";
	public $adm_login = "Admin";
	public $adm_password = "6deaff5c019acfc2800e7f83a1a7456f";

	public $count_on_page = 8;
	public $count_others = 6;

	public $pagination_count = 10;

	public $dir_text = "lib/text/";
	public $dir_tmpl = "tmpl/";
	public $dir_tmpl_admin = "admin/tmpl/";
	public $dir_img_products = "images/products/";

	public $max_name = 255;
	public $max_title = 255;
	public $max_text = 65535;

	public $max_size_img = 102400;

}
?>
