<?php
define('BASEDIR', __DIR__);
include BASEDIR.'/Others/Loader.php';
spl_autoload_register('\\Others\\Loader::autoload');

//\Others\Object::test();
//\App\Controller\Home\Index::test();


//$array = new SplFixedArray(10);
//echo $array[10];
//$obj = new Others\Object();

/*
$obj->title = "hello";
echo $obj->title;
 */

//$obj->test('hello', 123);
//echo $obj('test1');  //将一个对象当成一个函数去使用

$dbObj = new Others\Database();
$dbFactory = Others\Factory::createDatabase();
//$db = Others\Database::getInstance();
//$db = \Others\Register::get('db1');

// 适配器模式连接数据库mysql, mysqli, pdo
//$db = new Others\Database\MySQL();
//$db = new Others\Database\MySQLi();

/*
$db = new Others\Database\PDO();
$db->connect('127.0.0.1', 'root', 'root', 'test');
$db->query("SHOW databases");
$db->close();
 */

// 策略模式使用
class Page
{
	protected $strategy;
	function index()
	{

		//$user = new \Others\User(1);
		$user = Others\Factory::getUser(1); // 使用工厂方法
		$user->name = 'rango';

		$this->test();


		echo "AD";
		$this->strategy->showAd();
		echo "<hr/ >";

		echo "Category";
		$this->strategy->showCategory();
		echo "<hr/ >";
	}

	function setStrategy(\Others\UserStrategy $strategy)
	{
		$this->strategy = $strategy;
	}

	public function test()
	{
		//$user = new Others\User(1);
		$user = Others\Factory::getUser(1); // 使用工厂方法 , 两次，浪费
		$user->mobile = '18888888888';
	}
}

$page = new Page;
if (isset($_GET['female'])) {
	$strategy = new \Others\FemaleUserStrategy();
} else {
	$strategy = new \Others\MaleUserStrategy();
}

$page->setStrategy($strategy);
$page->index();

// 对象数据映射模式
$user = new Others\User(1); // 看不到sql的操作，就完成了数据操作

/*
$user->mobile = '15290870261';
$user->name = 'test';
$user->regtime = time();
//$user->regtime = date('Y-m-d' H:i:s);
var_dump($data);
 */

/**
 * 
 **/
class Event
{
	
	function trigger()
	{
		echo "Event happen!";

		// update
		echo "逻辑操作1<br />\n";
		echo "逻辑操作2<br />\n";
		echo "逻辑操作3<br />\n";

		$this->notify();
	}
}

// 观察者模式
class Observer1 implements \Others\Observer
{
	function update($event_info=null)
	{
		echo "逻辑１<br />\n";
	}
}

class Observer2 implements \Others\Observer
{
	function update($event_info=null)
	{
		echo "逻辑2<br />\n";
	}
}
$event = new Event;
$event->addObserver(new Observer1);
$event->addObserver(new Observer2);
$event->trigger();


// 传统方式
//$canvas1 = new Others\Canvas();
//$canvas1->init();

//$canvas2 = new Others\Canvas();
//$canvas2->init(); //　两次，浪费

// 原型模式 so cute
$prototype = new Others\Canvas();
$prototype->init();
//$prototype->setColor();


$canvas1 = clone $prototype;
$canvas1->rect(3,6,4,12);
$canvas1->draw();

$canvas2 = clone $prototype;
$canvas2->rect(1,3,2, 6);
$canvas2->draw();

// 传统编程模式
class Canvas3 extends Others\Canvas
{
	function draw()
	{
		echo "<div style='color:red;'>";
		parent::draw();
		echo "</div>";
	}
}

$canvas3 = new Canvas3();
$canvas3->init();
$canvas3 = rect(3,6,4,12);
$canvas3->draw();

// 装饰器模式
$canvas1->addDecorator(new \Others\ColorDrawDecorator('green'));
$canvas1->addDecorator(new \Others\SizeDrawDecorator('10px'));
$canvas1-rect(3,6,4,12);
$canvas1->draw();

// 迭代器模式
$users = new \Others\Alluser();
foreach ($users as $user) {
	var_dump($user);
	$user->serial_no = rand(10000, 90000);
}

// 代理模式
/*
$db = \Others\Factory::getDatabase('slave');
$info = $db->query('SELECT name form user where id=1 limit 1');

$db1 = \Others\Factory::getDatabase('master');
$db->query("update user set name='liming' where id=1");
 */

$proxy = new \Others\Proxy();
$proxy->getUserName($id);
$proxy->setUserName($id, $proxy);

// 自动加载配置
$config = new \Others\Config(__DIR__.'/configs');
var_dump($config['controllers']);

// 从配置中生成数据库连接

