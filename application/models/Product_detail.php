<?php  
    class Product_detail extends CI_Model {

        public $table = 'product_detail';

        function get_data(){                              
               return $this->db->query('SELECT * FROM '.$this->table)->result();
        }        

       public function input_data($data)
       {
            $this->db->insert($this->table, $data);           
       }

       public function getDataById($id)
       {
            return $this->db->query('SELECT * FROM '.$this->table. ' WHERE id = ' .$id)->row();           
       }

       public function getDataByIdAll($id)
       {
            return $this->db->query('SELECT * FROM '.$this->table. ' WHERE id = ' .$id)->result();           
       }   

       public function getDataByIdAllDetail($id)
       {
            return $this->db->query('SELECT * FROM '.$this->table. ' WHERE id_product = ' .$id)->result();           
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

    }
?>