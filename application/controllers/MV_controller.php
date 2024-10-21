<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MV_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MV_models');
        $this->load->library('upload');
    }
    public function index() {
      $countries = $this->MV_models->get_countries();
       $data = array();
        $data['countries'] = $countries;
        $this->load->view('MP_view', $data);
    }
    public function deleteData() {
    $id = $this->input->post('id');
    $deleted = $this->MV_models->deleteData($id);
    if ($deleted) {
        echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete record.']);
    }
}
    public function home() {
      $countries = $this->MV_models->get_countries();
       $data = array();
        $data['countries'] = $countries;
        $this->load->view('tiny/home', $data);
    }
    public function contact() {
        $this->load->view('tiny/contact');
    }
    public function about() {

        $this->load->view('tiny/about');
    }
    public function settngsClone(){
      $this->load->view('settings/settings_view');
     }
    public function settings(){
      $countries = $this->MV_models->get_countries();
       $data = array();
       $data['countries'] = $countries;
       if ($this->input->post('country_id')) {
           $country_id = $this->input->post('country_id');
           $data['districts'] = $this->MV_models->getDis($country_id);
       }
       // $this->load->view('settings/settings_view', $data);
       $this->load->view('tiny/settings', $data);
    }
    public function addCountry() {
        $country_name = $this->input->post('country_name');
      $data = array('name' => $country_name);
      $this->load->model('MV_models');
      $inserted = $this->MV_models->addCountry($data);
      if ($inserted) {
          echo json_encode(array('status' => 'success', 'message' => 'Country added successfully.'));
      } else {
          echo json_encode(array('status' => 'error', 'message' => 'Failed to add country.'));
      }
  }

  public function addDist(){
    $country_id = $this->input->post('country_id');
    $name = $this->input->post('name');
    $data = array(
       'country_id' => $country_id,
       'name' => $name,
    );
    $districts = $this->MV_models->addDist($data);
    if($districts){
      echo json_encode(array('status' => 'success','message' => 'District inserted successfully'));
    }else{
      echo json_encode(array('status' => 'error','message'=>'District fail to insert'));
    }
  }
  public function addCity(){
      $country_id = $this->input->post('country_id');
      $district_id = $this->input->post('district');
      $city_name = $this->input->post('city_name');
      if(empty($country_id) || empty($district_id) || empty($city_name)) {
          echo json_encode(array('status' => 'error', 'message' => 'All fields are required'));
          return;
      }
      $data = array(
          'district_id' => $district_id,
          'name' => $city_name
      );
      $city_inserted = $this->MV_models->addCity($data);
      if($city_inserted) {
          echo json_encode(array('status' => 'success', 'message' => 'City added successfully'));
      } else {
          echo json_encode(array('status' => 'error', 'message' => 'Failed to add city'));
      }
  }
    public function getDis() {
      $country_id = $this->input->post('country_id');
      $districts = $this->MV_models->getDis($country_id);
      $data = array();
      $data['districts'] = $districts;
      $district_view = $this->load->view('tiny/districts', $data, true);
      $resDis['districts'] = $district_view;
      echo json_encode($resDis);
  }
 public function get_city(){
   $district_id = $this->input->post('district_id');
   $cities = $this->MV_models->get_city($district_id);
   $data = array();
   $data['cities'] = $cities;
   $cities_view = $this->load->view('tiny/cities',$data, true);
   $res_cities['cities'] = $cities_view;
   echo json_encode($res_cities);
 }
 public function get_time() {
         $timezone = $this->input->post('timezone');
         if ($timezone) {
             try {
                 $date = new DateTime("now", new DateTimeZone($timezone));
                 echo $date->format('Y-m-d H:i:s');
             } catch (Exception $e) {
                 echo 'Invalid timezone';
             }
         } else {
             echo 'No timezone selected';
         }
     }
    public function submitForm() {
        if ($this->input->post()) {
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['upload_path'] = './upload';
            $config['max_size'] = 2048;
            $files = $_FILES['files'];
            $filedb_name = [];
            if (!empty($files['name'][0])) {
                foreach ($files['name'] as $key => $name) {
                    $_FILES['file']['name'] = $name;
                    $_FILES['file']['type'] = $files['type'][$key];
                    $_FILES['file']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['file']['error'] = $files['error'][$key];
                    $_FILES['file']['size'] = $files['size'][$key];
                    $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $newFileName = 'AK_IMG_' . time() . uniqid() . '.' . $fileExtension;
                    $config['file_name'] = $newFileName;
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file')) {
                        $fileData = $this->upload->data();
                        $filedb_name[] = $fileData['file_name'];
                    } else {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('formdata');
                        return;
                    }
                }
            }
            $formData = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'password' => $this->input->post('password'),
                'phone' => $this->input->post('phone'),
                'date' => $this->input->post('date'),
                'url' => $this->input->post('url'),
                'country' => $this->input->post('country_text'),
                'district' => $this->input->post('district_text'),
                'city' => $this->input->post('city_text'),
                'payment_method' => $this->input->post('payment_method'),
                'files' => serialize($filedb_name)
              );
              $insertedId = $this->MV_models->insertData($formData);
              if ($insertedId) {
                echo json_encode(array('status' => 'success','message' => 'Data inserted succefully !!'));
              // $this->session->set_flashdata('message', 'Data inserted successfully! ID: ' . $insertedId);
              } else {
                echo json_encode(array('status' => 'error','message' => 'fail to insert !!'));
              // $this->session->set_flashdata('message', 'Failed to insert data.');
           }
        }
    }
    public function get_data() {
      $data = $this->MV_models->get_data();
      $output = array();
      foreach ($data as $row) {
        $i= 1;
        $i++;
         $files_array = unserialize($row->files);
         $img_html = '';
         if (!empty($files_array)) {
             $first_img_path = base_url('upload/' . $files_array[0]);
             $img_html .= "<div onclick='show_image(".json_encode($files_array).")' style='position: relative; display: inline-block;'>";
             $img_html .= '<img src="' . $first_img_path . '" alt="Image" class="img-thumbnail "  data-img=""  style="width: 50px; height: 50px;">';
             if (count($files_array) > 1) {
                 $img_html .= '<div style="position: absolute; top: 0; right: 0; background-color: rgba(0, 0, 0, 0.2); color: white; font-size: 12px; padding: 16px 16px; border-radius: 5px;">';
                 $img_html .= '+' . $i;
                 $img_html .= '</div>';
             }
             $img_html .= '</div>';
         }
          $output[] = array(
              'id' => $row->id,
              'name' => $row->firstname . ' ' . $row->lastname,
              'email' => $row->email,
              'gender' => $row->gender,
              'contact' => $row->phone,
              'img' => $img_html,
              'website' => $row->url,
              'address' => $row->country . ', ' . $row->district . ', ' . $row->city, // Add commas for better readability
              'paidby' => $row->payment_method

          );
      }
      echo json_encode(['data' => $output]);
  }

public function cashPage() {
    $this->load->view('tiny/cash_payment_view');
}
public function onlinePage() {
    $this->load->view('tiny/online_payment_view');
}

}
