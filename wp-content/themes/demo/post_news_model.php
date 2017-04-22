<?php 
/**
* class news hot
*/
class NewsHot
{
	protected $ID;
	protected $POST_TITLE;
	
	protected function setID($id)
	{
		$this->ID = $id;
	}

	protected function getID()
	{
		return $this->ID;
	}

	protected function setPOST_TITLE($post_title)
	{
		$this->POST_TITLE = $post_title;
	}

	protected function getPOST_TITLE()
	{
		return $this->POST_TITLE;
	}
}
?>