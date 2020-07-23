<?php

class CodigosPostalesModel extends CI_Model {

        public function get_codigos()
        {
                $query = $this->db->get('codigos_españa');
                return $query->result();
        }

        public function get_DistinctCodigos()
        {
                $query = $this->db->query("SELECT DISTINCT(FC_PROVINCIA) FROM CODIGOS_ESPANA");
                return $query->result();
        }

        public function get_DistinctPoblacion()
        {
                $query = $this->db->query("SELECT DISTINCT(FC_POBLACION) FROM CODIGOS_ESPANA");
                return $query->result();
        }


}

?>