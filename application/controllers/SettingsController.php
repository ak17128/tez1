<?php
defined('BASEPATH') OR exit('no direct script access allowed !!');

class SettingsController extends CI_controller {
   public function __construct(){
     parent::__construct();
     $this->load->model('MV_models');
     //one can laod which must be loaded first;
   }
   public function generalSettins(){
     $this->load->view('settings/generalSetting');
   }
   public function addCountry(){
     $countries = $this->MV_models->get_countries();
      $data = array();
       $data['countries'] = $countries;
       // print_r($countries);die;
     $this->load->view('settings/location/country',$data);
   }
   public function addDistrict(){
     $this->load->view('settings/location/district');
   }
   public function addCity(){
     $this->load->view('settings/location/city');
   }
   public function homeSettins(){
     $this->load->view('settings/homeSetting');
   }
   public function contactSettins(){
     $this->load->view('settings/contactSetting');
   }
   public function aboutSettins(){
     $this->load->view('settings/aboutSetting');
   }
   public function delcon(){
       $id = $this->input->post('id');
       if (!$id) {
           echo json_encode(['status' => 'error', 'message' => 'Invalid request: ID is missing']);
           return;
       }
       $deleted = $this->MV_models->delcon($id);
       if ($deleted) {
           echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully']);
       } else {
           echo json_encode(['status' => 'error', 'message' => 'Sorry, an error occurred. Please try again later']);
       }
   }

}

 ?>
