<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barcode extends CI_Controller
{
  public function index() {
    $this->load->view('barcode_view');
    // $this->template->load('template', 'barcode_view2');
  }

  public function barcode_reader() {
    if (isset($_POST['submit'])) {
      $barcode  = $_POST['barcode'];

      $this->template->load('template', 'barcode_view', $barcode);
    }
  }


}
 ?>
