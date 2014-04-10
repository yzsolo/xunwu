<?php if(!defined('BASEPATH')) exit ("no direct script access allowed model");
class Console_imf extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

  /*捡到的物品 start*/

  //search关键字并返回结果
  public function search_result($data){
    $search_input = $data['search_input'];
    //从find里搜索特定物品
    $sql = "select * from things_find where f_name like '%$search_input%'";
    $query = $this->db->query($sql);
    $res['find_num'] = $query->num_rows();
    $res['find'] = $query->result_array();
    $sql2 = "select * from things_find where f_name like '%$search_input%' order by f_id desc limit 14";
    $query2 = $this->db->query($sql2);
    $res['find_limit'] = $query2->result_array();

    //从lost里搜索特定物品
    $sql1 = "select * from things_lost where l_name like '%$search_input%'";
    $query1 = $this->db->query($sql1);
    $res['lost_num'] = $query1->num_rows();
    $res['lost'] = $query1->result_array();
    $sql3 = "select * from things_lost where l_name like '%$search_input%' order by l_id desc limit 14";
    $query3 = $this->db->query($sql3);
    $res['lost_limit'] = $query3->result_array();

    return $res;
  }
  public function search_paging_result($dat,$db,$search_input){
    if ($db==='f') {
      $sql = "select * from things_find where f_name like '%$search_input%' order by f_id desc limit $dat,14";
      $query = $this->db->query($sql);
      $res['find_limit'] = $query->result_array();
      $sql1 = "select * from things_find where f_name like '%$search_input%'";
      $query1 = $this->db->query($sql1);
      $res['find_num'] = $query1->num_rows();
    }
    else if ($db==='l') {
      $sql = "select * from things_lost where l_name like '%$search_input%' order by l_id desc limit $dat,14";
      $query = $this->db->query($sql);
      $res['lost_limit'] = $query->result_array();
      $sql1 = "select * from things_lost where l_name like '%$search_input%'";
      $query1 = $this->db->query($sql1);
      $res['lost_num'] = $query1->num_rows();
    }
    return $res;
  }

  //将捡到的物品信息写入
  public function insert_things_f($data){
    // $data[time] = date("Y-m-d");
    $sql = "insert into things_find (f_kind,f_locale,f_time,f_finder,f_describ,f_name,f_telnum,f_email,f_qq) values('$data[kind]','$data[locale]','$data[time]','$data[finder]','$data[descri]','$data[name]','$data[telnum]','$data[email]','$data[qq]')";
    $query = $this->db->simple_query($sql); 
  }

//给捡到页面返回14条信息
  public function imf_to_pagef(){
    $sql = "select * from things_find order by f_id desc limit 14";
    $query = $this->db->query($sql);
    $res['news'] = $query->result_array();
    $res['total_rows'] = $this->db->count_all('things_find');
    //var_dump($res);
    return $res;
  }

  //给首页捡到tab返回7条信息
  public function imf_to_ind_f(){
    $sql = "select * from things_find order by f_id desc limit 7";
    $query = $this->db->query($sql);
    $res = $query->result_array();
    return $res;
  }

  //find.php分页 start
  public function get_new_pagef($data){
    $sql = "select * from things_find order by f_id desc limit $data,14";
    $query = $this->db->query($sql);
    $res['news'] = $query->result_array();
    $res['total_rows'] = $this->db->count_all('things_find');
    return $res;
  }
  
  /*从找到的物品里返回指定id的物品信息*/
  public function get_id_fmsg($id){
   $sql = "select * from things_find where f_id = '$id'";
   $query = $this->db->query($sql);
   $res = $query->result_array();
   return $res;
  }

/*从发现的物品里返回指定类型的物品信息*/
public function get_kind_fmsg($kind,$pnum){
   
   $sql = "select * from things_find where f_kind = '$kind' order by f_id desc limit $pnum,14";
   $query = $this->db->query($sql);
   $res['news'] = $query->result_array();
    return $res;
}

/*发现物品中知指定类型的数目*/
public function get_kindnum_fmsg($kind){
   $sql_one = "select count(*) as num from things_find where f_kind = '$kind'";
   $query_one = $this->db->query($sql_one);
   $res['total_rows'] = $query_one->result_array();
   return $res;
}
// public function get_new_pagef_part($data){
//    $p_num = ($data-1)*14;
//    $sql = "select * from things"
// }
  /*捡到的物品 end*/






  /*丢失的物品 start*/

//向数据库插入捡到的物品信息
  public function insert_things_l($data){
    $sql = "insert into things_lost (l_kind,l_locale,l_time,l_owner,l_describ,l_name,l_telnum,l_email,l_qq) values('$data[kind]','$data[locale]','$data[time]','$data[owner]','$data[descri]','$data[name]','$data[telnum]','$data[email]','$data[qq]')";
    $query = $this->db->simple_query($sql);
  }

  //给丢失页面返回14条信息
  public function imf_to_pagel(){
    $sql = "select * from things_lost order by l_id desc limit 14";
    $query = $this->db->query($sql);
    $res['news'] = $query->result_array();
    $res['total_rows'] = $this->db->count_all('things_lost');
    return $res;
  }

  //给首页丢失tab返回7条信息
  public function imf_to_ind_l(){
    $sql = "select * from things_lost order by l_id desc limit 7";
    $query = $this->db->query($sql);
    $res = $query->result_array();
    return $res;
  }

/*从丢失的物品里返回指定id的物品信息*/
public function get_id_lmsg($id){
   $sql = "select * from things_lost where l_id = '$id'";
   $query = $this->db->query($sql);
   $res = $query->result_array();
   return $res;
  }

/*从丢失的物品里返回指定类型的物品信息*/
public function get_kind_lmsg($kind,$pnum){
   $sql = "select * from things_lost where l_kind = '$kind' order by l_id desc limit $pnum,14";
   $query = $this->db->query($sql);
   $res['news'] = $query->result_array(); 
   return $res;
}

//lost.php分页 start
  public function get_new_pagel($data){
    $sql = "select * from things_lost order by l_id desc limit $data,14";
    $query = $this->db->query($sql);
    $res['news'] = $query->result_array();
    $res['total_rows'] = $this->db->count_all('things_lost');
    return $res;
  }
  /*丢失物品中知指定类型的数目*/
public function get_kindnum_lmsg($kind){
   $sql_one = "select count(*) as num from things_lost where l_kind = '$kind'";
   $query_one = $this->db->query($sql_one);
   $res['total_rows'] = $query_one->result_array();
   return $res;
}
}