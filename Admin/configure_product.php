<?php


/*
*
*
	product
*
*
*/
   
   class Products {
      /* Member variables */
      var $id;
	  var $name;
	  var $images;
	  var $catid;
	  var $des;
	  var $price;
	  var $status;
      var $con;
      var $sizename;
      var $heightname;
      var $depthname;

	  
	function Products()
	{

		$this->con=mysqli_connect("localhost","root","","web_7");
		
		mysqli_set_charset($this->con,'utf8');
	}	

	function closeConnection()
	{		
		mysqli_close($this->con);
	}		
	function f($val)
	{
		return mysqli_real_escape_string($this->con,$val);
	}
	  
	function query_list($qry)
	{		
		$result = mysqli_query($this->con,$qry);
		
		$returnArray = array();
			
		if(mysqli_num_rows($result)>0)
		{
			$returnArray = array();
			$i=0;
			while ($row = mysqli_fetch_array($result))
			{				
				if ($row)
				{
					$returnArray[$i++] = $row;
				}
			}
		}
		return $returnArray;			
	}

	function getRecordById()
	{
		$query = "SELECT * FROM product where status=1 and id='".$this->id."'";
		
		$list = $this->query_list($query);				
		if(count($list) == 0)
		{
			return false;
			exit();
		}
		else
		{
			return $list;
			exit();
		}
	}
	function getCategoryData()
	  {
	   //	$sql = "Select product . *,category.name categoryname from category, product where category.id=product.categoryid && product.status=1";
	  //	$sql="Select users.*,category.name category name from category, users where category.id=users.categoryid";
	  
	  	$result = mysqli_query($this->con,$sql);
	  	if ($result)
	  		return true;
	  }
	  function getData()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from product   order by id";

		  //echo $query;
		  
			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list;
				exit();
			}	
	  }
	  function getData1()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from product where status=1 order by id";

		  //echo $query;
		  
			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list;
				exit();
			}	
	  }
	     function getProducts($catid)
	  {
		$query = "SELECT * FROM product where status=1 and active_status ='1' and categoryid='".$catid."'";

		  // exit($query);
		
			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list;
				exit();
			}	
	  }
	  function getProducts1($id)
	  {
		$query = "SELECT * FROM product where status=1 and id='".$id."'";

		  // exit($query);
		  
			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list;
				exit();
			}	
	  }
	 
	  function countData()
	  {
		  
		  $query = "SELECT count(id) count FROM product where status=1 and active_status ='1'";

			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list;
				exit();
			}	
	  }
	  function addRecord()
	  {
		  $sql="INSERT INTO product (catid,name,des,price,images,sizename,depthname,heightname)
		VALUES
		(
		'$this->catid',
		'".$this->f($this->name)."',
		'$this->des',		
		'$this->price',		
		'$this->images',			
		'$this->sizename',		
		'$this->depthname',		
		'$this->heightname'		
		)";
		//exit($sql);
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }

	  function updateRecord()
	  {
          $sql="update product set catid ='$this->catid',name ='".$this->f($this->name)."',des ='$this->des'
          ,des ='$this->des'
          ,price ='$this->price'
          ,images ='$this->images'
          ,sizename ='$this->sizename'
          ,heightname ='$this->heightname'
          ,depthname ='$this->depthname'
          where id = '$this->id' ";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update product set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update product set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
  	  function price_change_active_status()
	  {
		  $result = mysqli_query($this->con,"update product set active_price='$this->active_price',addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  // function price_change_active_status()
	  // {
		 //  $result = mysqli_query($this->con,"update product set active_price=0, addeddate='$this->addeddate' where id='".$this->id."'");
		 //  if($result)
			// return true;
	  // }
   }
   
   
?>   