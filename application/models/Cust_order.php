<?php  
    class Cust_order extends CI_Model {

        public $table = 'customer_order';

        function get_data(){                              
               return $this->db->query('SELECT * FROM '.$this->table)->result();
        }        

       public function input_data($data)
       {
            $this->db->insert($this->table, $data); 
            $last_id = $this->db->insert_id();          
            return $last_id;
       }

       public function getDataById($id)
       {
            return $this->db->query('SELECT * FROM '.$this->table. ' WHERE id = ' .$id)->row();           
       }

       public function update_data($data, $id)
       {
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
       }

       public function delete($id)
       {
            return $this->db->query('DELETE FROM '.$this->table.' WHERE id = '. $id);           
       }

       public function getOrder($id)
       {
            return $this->db->query('SELECT * FROM '.$this->table. ' WHERE id = ' .$id)->row();                   
       }

       public function jumlah()
       {
         return $this->db->count_all($this->table);
       }

    }
?>