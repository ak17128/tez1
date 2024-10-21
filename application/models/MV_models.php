<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MV_models extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insertData($data){
     return $this->db->insert('mu_data', $data);
    }
    public function addCountry($country_name){
      return $this->db->insert('countries', $country_name);
    }
    public function addDist($data){
      return $this->db->insert('districts', $data);
    }
    public function addCity($data){
      return $this->db->insert('cities' ,$data);
    }

    public function get_data() {
        $query = $this->db->get('mu_data');
        return $query->result();
    }
    public function get_countries(){
      $countries = $this->db->get('countries');
      return $countries->result_array();
    }
    public function getDis($country_id) {
      $this->db->where('country_id', $country_id);
      $query = $this->db->get('districts');
      return $query->result();
  }
  public function get_city($district_id){
    $this->db->where('district_id', $district_id);
    $query = $this->db->get('cities');
    return $query->result();
  }
  public function deleteData($id) {
      $this->db->where('id', $id);
      return $this->db->delete('mu_data');
  }
  public function delcon($id){
    $this->db->where('id',$id);
    return $this->db->delete('countries');
  }





}
