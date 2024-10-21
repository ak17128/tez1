<?php

class Pages extends CI_Controller {

    public function load_page() {
        $page = $this->input->post('page'); // Get the page name from AJAX
        if ( ! file_exists(APPPATH.'views/tiny/'.$page.'.php')) {
            // Page not found
            show_404();
        }

        // Dynamically load the requested page
        $this->load->view('tiny/'.$page);
    }
}

 ?>
