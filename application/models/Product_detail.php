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
            return $this->db->query('SELECT product_detail.*, komposisi.komposisi_name as komposisi_name FROM  product_detail JOIN komposisi ON product_detail.id_komposisi = komposisi.id WHERE product_detail.id_product = ' .$id)->result();           
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

       public function pd_join_komposisi($id)
       {
         return $this->db->query('SELECT product_detail.*, komposisi.komposisi_name AS komposisi_name FROM product_detail JOIN komposisi ON product_detail.id_komposisi = komposisi.id')->row();
       }

    }
?>