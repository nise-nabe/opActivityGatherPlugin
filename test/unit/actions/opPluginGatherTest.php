<?

require_once dirname(__FILE__).'/../../bootstrap/unit.php';


sfContext::
$t = new lime_test(1);

$browser = new sfBrowser();
$browser->
	post("http://www13328u.sakura.ne.jp/gather/createe")->
	with('request')->
	  isParameter('activities', array(1, 2))->
	end()->
	with('request')->
	end();;

?>
