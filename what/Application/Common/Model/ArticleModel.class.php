<?php
namespace Common\Model;
use Think\Model;
//继承框架的Model
class ArticleModel extends Model{
	
	//定义一个数据库私有变量
	private $_db='';
	//重写一个构造方法
	public function __construct(){
		//调用父类的构造方法,这样写既能使用父类构造方法也能够使用重写的构造方法
		parent::__construct();
		//调用一个成员变量,M();方法是thinkphp中的方法，它的作用是实例化一个数据库表
		$this->_db = M('Article');//把一个表转化为实例化对象
	}
	
	//写一个成员变量,设置表单验证规则.调用框架的自动验证规则
	protected $_validate = array(
	//array('验证字段'，'验证规则'，'错误信息',【验证条件，附近规则，验证时间】)
		array('title','require','标题不能为空'),
		array('small_title','require','副标题不能为空'),
//		array('image_path','require','封面图不能为空'),
//		array('thumb_path','require','缩略图不能为空'),
		array('keywords','require','关键字不能为空'),
		array('description','require','描述不能为空'),
//		array('create_time','require','创建时间不能为空'),
//		array('update_time','require','更新时间不能为空'),
//		array('count','require','操作名不能为空'),
	);
	
	 // 是否批处理验证
    protected $patchValidate    =   true;
	
//写入ArticleController中执行文章添加的方法，并使用调用添加文章按钮的add()
	//新增文章数据
	public function insert($articleData){
		//如果调用时传入的值不对，并且不是数组时输出错误信息
		if(! $articleData || ! is_array($articleData)){
			throw_exception('提交的文章信息不合法');
		}else{
			//如果添加成功，并返回添加的主键。返回给调用者
			return $this->add($articleData);
		}
	} 
	
	
} 

?>