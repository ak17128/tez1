<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabController extends CI_Controller {

    public function index() {
        $this->load->view('tabs_view');
    }

    public function loadTabContent($option) {
        // Generate dynamic content based on the option selected
        $data['content'] = "This is content for $option";
        echo $this->load->view('tab_content', $data, true);
    }
}
