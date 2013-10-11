<?php
/*
 * General record functions:
 * Written by: Nikolay Ianev
 * 
 * function create_record($tablename = '', $data = array())
 * function update_record($tablename = '', $data = array())
 * function delete_record($tablename = '', $id = 0)
 * 
 * function get_record($tablename, $id)
 * function get_by_fieldname($tablename, $field_name, $field_value, $like = false)
 * function check_by_fieldname($tablename, $field_name, $field_value, $like = false)
 * 
 */

function create_record($tablename = '', $data = array()){
	if(!is_array($data) || empty($data)) 
		return FALSE;
	if(isset($data['id']))
		unset($data['id']);
	$sql = "insert into $tablename set ";
		foreach($data as $uk =>$uv ){
//			if($uk == 'id')	continue;
			$sql .= "$uk = \"$uv\",";
		}
		$sql = substr($sql,0,-1);
//		echo $sql;
		
	mysql_query($sql);
	if(mysql_errno()){
		echo mysql_error();
	}
	return mysql_insert_id();
}

function update_record($tablename = '', $data = array()){

	$sql = "update $tablename set ";
		foreach($data as $dk =>$dv ){
			if($dk == 'id')	continue;
			$sql .= "$dk = \"$dv\",";
		}
		$sql = substr($sql,0,-1);
		$sql .= " where id = ".(int)$data['id'];
		echo $sql;
	mysql_query($sql);
	if(mysql_errno()){
		echo mysql_error();
	}
	return mysql_affected_rows();
}

function delete_record($tablename = '', $id = 0){
	$sql = "delete from $tablename where id = ".(int)$id;
	echo $sql;
	mysql_query($sql);
	if(mysql_errno()){
		echo mysql_error();
	}
	return mysql_affected_rows();
}

function get_record($tablename, $id){
	$sql = "select * from `$tablename` where id = ".(int)$id;
	echo $sql;
	$result = mysql_fetch_assoc($sql);
	if(mysql_errno()){
		echo mysql_error();
	}
	return $result;
}

function get_by_fieldname($tablename, $field_name, $field_value, $like = false){
	$return = array();
	$field_value = mysql_real_escape_string($field_value);
	$sql = "select * from $tablename where $field_name "
		.($like ? " like \"%$field_value%\"" : " = \"$field_value\"");
//	echo $sql;
	$res = mysql_query($sql);
	if(mysql_num_rows($res)){
		$return = mysql_fetch_assoc($res);
	}
//	var_dump($return);
	if(mysql_errno()){
		echo mysql_error();
	}
	return $return;
}

function check_by_fieldname($tablename, $field_name, $field_value, $like = false){
	$row = array();
	$row = get_by_fieldname($tablename, $field_name, $field_value, $like);
//	print_r($row);
//	echo count($row);
	return (count($row) ? true: false);
}
