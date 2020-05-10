<?php  
    class Cust_order_detail extends CI_Model {

        public $table = 'customer_order_detail';

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

       public function update_data($data, $id)
       {
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
       }

       public function delete($id)
       {
            return $this->db->query('DELETE FROM '.$this->table.' WHERE id = '. $id);           
       }

       public function getDetailOrder($id)
       {
          return $this->db->query('SELECT customer_order_detail.*, komposisi.komposisi_name as komposisi_name, komposisi.satuan as satuan FROM '.$this->table.' JOIN komposisi ON customer_order_detail.id_komposisi = komposisi.id WHERE customer_order_detail.id_customer_order = '. $id)->result();
       }       
    }
?>