<?php  
    class User extends CI_Model {

        public $table = 'user';

        function get_user(){                              
               return $this->db->query('select user.*, role.role_akses as role_akses from user join role ON user.id_role = role.id');
        }    

        function get_role(){
        	return $this->db->query('select * from role');
        }   

		function input_data($data,$table){
			$this->db->insert($table,$data);
		}

        function update_data($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
        }

        function delete($id){                              
               return $this->db->query('DELETE FROM '.$this->table.' WHERE id = '. $id);
        }         

        public function getDataById($id)
        {
            return $this->db->query('select user.*, role.role_akses as role_akses, role.id as id_role from user join role ON user.id_role = role.id WHERE user.id = '. $id)->row();            
        }
    }
?>