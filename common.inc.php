<? 
session_start();
$a=dirname(__FILE__);
$a=str_replace("common","",$a);
$a=str_replace("\\","/",$a);
define("ROOT",$a);
error_reporting(0);
require_once(ROOT.'common/mysql_class.php');
require_once(ROOT.'common/smarty/smarty.class.php');
include_once(ROOT.'common/page.class.php');
//include_once(ROOT.'common/yan.class.php');
require_once(ROOT.'common/action_class.php');
require_once(ROOT.'common/fun.class.php');
require_once(ROOT.'data/config.php');
require_once(ROOT.'common/sql.conn.php');
require_once(ROOT.'data/tpl.data.php');
$smarty=new smarty;
$fun=new fun;
if (!empty($_GET))
{
$_GET  = addslashes_all($_GET);
}
if (!empty($_POST))
{
$_POST = addslashes_all($_POST);
}
$_COOKIE   = addslashes_all($_COOKIE);
$_REQUEST  = addslashes_all($_REQUEST);
//$tpl=$tplarr[$where];
$smarty->template_dir=ROOT.'template';
$smarty->compile_dir=ROOT.'temp';
/*模板中的路径*/
$_self_path = ($_SERVER['PHP_SELF'] == "") ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF'];
$_path_array = explode("/",$_self_path);
$_path_count = count($_path_array);
$ROOT_PATH = "";
for ($i=0;$i< $_path_count-2;$i++)
{
    $ROOT_PATH = '../'.$ROOT_PATH;
}
$smarty->assign("root",$ROOT_PATH);
$smarty->assign("temroot",$ROOT_PATH."template/");
$title_user=$fun->sess_show();
$smarty->assign('title_user',$title_user);
/*导航和左侧中的分类*/
$goodscat="select * from goodcat";
$goodscat=$db->fetchAll($goodscat);
$wencat="select * from wencat";
$wencat=$db->fetchAll($wencat);
$smarty->assign("goodscat",$goodscat);
$smarty->assign("wencat",$wencat);
?>
