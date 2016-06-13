<?php
namespace Others;

/**
 * 
 **/
class AllUser implements \Iterator  // Iterator由ＰＨＰ标准库提供
{

	protected  $ids;
	protected  $data = [];
	protected  $index;
	public function __construct()
	{
		$db = Factory::getDatabase();
		$result = $db->query("select * from user");
		$this->id = $result->fetch_all(MYSQL_ASSOC);
	}
	function current()
	{
		$id = $this->ids[ $this->index ]['id'];
		return Factory::getUser($id);
	}

	public function next()
	{
		$this->index++;
	}

	public function valid()
	{
		return $this->index < count($this->ids);
	}

	function rewind()
	{
		$this->index = 0;
	}

	function key()
	{
		return $this->index;
	}
}
?>
