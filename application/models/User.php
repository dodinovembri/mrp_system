<?php  
    class User extends CI_Model {

        function get_user(){                              
               return $this->db->query('select user.*, role.role_akses as role_akses from user join role ON user.id_role = role.id');
        }    

        function get_role(){
        	return $this->db->query('select * from role');
        }   

		function input_data($data,$table){
			$this->db->insert($table,$data);
		}
    }
?>