<?php
namespace Common\Model;
use Think\Model;

class IndexModel extends Model{
	public function index(){
		
		$this->display();
	}
	public function add(){
		$this->display();
	};
}
?>