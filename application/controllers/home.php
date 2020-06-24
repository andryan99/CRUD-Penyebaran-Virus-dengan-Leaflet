
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('input_model');
        
    }
    

    public function index()
    {
        $data = array(
            'title' =>'Pemetaan Penyebaran Virus',
            'pemetaan'=>$this->input_model->tampil_data(),
            'isi'=>'home'    
        );  
        
        $this->load->view('layout/wrapper', $data, FALSE);
         
    }

    public function input()
    {

        $this->form_validation->set_rules('nama_wilayah', 'Nama Wilayah', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('nama_virus', 'nama_virus', 'required');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' =>'Input Data Penyebaran Virus',
                'isi'=>'input'    
            );  
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
           $data = array(
               'nama_wilayah' =>$this->input->post('nama_wilayah'),
               'kabupaten' =>$this->input->post('kabupaten'),
               'provinsi' =>$this->input->post('provinsi'),
               'kecamatan' =>$this->input->post('kecamatan'),
               'nama_virus' =>$this->input->post('nama_virus'),
               'jml_korban' =>$this->input->post('jml_korban'),
               'jml_meninggal' =>$this->input->post('jml_meninggal'),
               'jml_sembuh' =>$this->input->post('jml_sembuh'),
               'latitude' =>$this->input->post('latitude'),
               'longitude' =>$this->input->post('longitude'),
               'radius' =>$this->input->post('radius'),
               'warna' =>$this->input->post('warna'),

            
                 );
                 $this->input_model->input($data);
                 
                 $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                 
                 redirect('home/data_penyebaran');
                 
                 
        }
  
    }
    public function data_penyebaran()
    {
        $data = array(
            'title'      =>'Data Penyebaran Virus',
            'penyebaran' => $this->input_model->tampil_data(),
            'isi'        =>'data_penyebaran'    
        );  
        
        $this->load->view('layout/wrapper', $data, FALSE);
         
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_wilayah', 'Nama Wilayah', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('nama_virus', 'nama_virus', 'required');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' =>'Edit Data Penyebaran Virus',
                'data'=>$this->input_model->detail($id),
                'isi'=>'edit_data'    
            );  
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
           $data = array(
               'id'=>$id,
               'nama_wilayah' =>$this->input->post('nama_wilayah'),
               'kabupaten' =>$this->input->post('kabupaten'),
               'provinsi' =>$this->input->post('provinsi'),
               'kecamatan' =>$this->input->post('kecamatan'),
               'nama_virus' =>$this->input->post('nama_virus'),
               'jml_korban' =>$this->input->post('jml_korban'),
               'jml_meninggal' =>$this->input->post('jml_meninggal'),
               'jml_sembuh' =>$this->input->post('jml_sembuh'),
               'latitude' =>$this->input->post('latitude'),
               'longitude' =>$this->input->post('longitude'),
               'radius' =>$this->input->post('radius'),
               'warna' =>$this->input->post('warna'),

            
                 );
                 $this->input_model->edit($data);
                 
                 $this->session->set_flashdata('pesan', 'Data Berhasil DiEdit');
                 
                 redirect('home/data_penyebaran');
                 
                 
        }
  
         
    }
    public function delete($id)
    {
       $data = array('id' => $id );
       $this->input_model->delete($data);
                 
       $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus');
       
       redirect('home/data_penyebaran');
       
    }

}

/* End of file Controllername.php */
