<?php 


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', '..');


defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'images');


require_once(SITE_ROOT.DS."system".DS."utils.php");
require_once(INCLUDES_PATH.DS."config.php");
//require_once(INCLUDES_PATH.DS."ajax_code.php");
require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."db_object.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(INCLUDES_PATH.DS."photo.php");
require_once(INCLUDES_PATH.DS."products.php");
require_once(INCLUDES_PATH.DS."comment.php");
require_once(INCLUDES_PATH.DS."siteparameter.php");
require_once(INCLUDES_PATH.DS."order.php");
require_once(INCLUDES_PATH.DS."contactmessage.php");
require_once(INCLUDES_PATH.DS."categories.php");
require_once(INCLUDES_PATH.DS."session.php");
require_once(INCLUDES_PATH.DS."paginate.php");
require_once(INCLUDES_PATH.DS."ajax_code.php");




 ?>