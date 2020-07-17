<?php


/*
*
*
	Contact
*
*
*/
   
   class Contact {
      /* Member variables */
      var $id;  
	  var $name;
	  var $subject;
	  var $message;
      var $email;
	  var $con;
	  
	  
	function Contact()
	{
		$this->con=mysqli_connect("localhost","root","","web_7");
		
		mysqli_set_charset($this->con,'utf8');
	}	

	function f($val)
	{
		return mysqli_real_escape_string($this->con,$val);
	}

	function closeConnection()
	{		
		mysqli_close($this->con);
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
 	function getNewstitle($catid)
	  {
		  $where = "";
		  		  
		  $query = "SELECT title from contact_us where id='$catid' && status='1' ";

		  //echo $query;
		  
			$list = $this->query_list($query);				
			if(count($list) == 0)
			{
				return false;
				exit();
			}
			else
			{
				return $list[0][0];
				exit();
			}	
	  }
	function getRecordById()
	{
		$query = "SELECT * FROM contact_us where status=1 and id='".$this->id."'";
		
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
		  		  
		  $query = "SELECT * from contact_us where status='1' && active_status='1' order by addeddate desc";

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
	  
	  function getData()
	  {
		  $where = "";
		  		  
		  $query = "SELECT * from contact_us ";

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
	  
	  
	  function countData()
	  {
		  
		  $query = "SELECT count(id) count FROM contact_us where status=1 ";

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
		  $sql="INSERT INTO contact_us(name, email,subject, message) VALUES ('".$this->f($this->name)."','".$this->f($this->email)."','$this->subject','$this->message')";
		
		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	  }
	  
	  function updateRecord()
	  {
		  $sql="update contact_us set title='".$this->f($this->title)."',description='".$this->f($this->description)."',image='$this->image',addeddate='$this->addeddate' where id='$this->id'";

		$result = mysqli_query($this->con,$sql);
		if($result)
			return true;
	}
	  
	  function deleteRecord()
	  {
		  $result = mysqli_query($this->con,"update contact_us set status=0, addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }
	  
	  function change_active_status()
	  {
		  $result = mysqli_query($this->con,"update contact_us set active_status='$this->active_status', addeddate='$this->addeddate' where id='".$this->id."'");
		  if($result)
			return true;
	  }	  
   }
   
?>   