<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Users extends Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->call->model('users_model');
    }
	public function read()
    {
        $userdata['user']=$this->users_model->read();
        $this->call->view('azausers/userdisplay', $userdata);
    }
    public function create()
    {
        if($this->form_validation->submitted()){
            $this->form_validation
                ->name('lname')
                     ->required('Last name is required!')
                ->name('fname')
                     ->required('First name is required!')
                ->name('email')
                     ->required('Email is required!')
                ->name('gender')
                     ->required('Gender is required!')
                ->name('address')
                     ->required('Address is required!');
        if($this->form_validation->run()){
            $aza_last_name = $this->io->post('lname');
            $aza_first_name = $this->io->post('fname');
            $aza_email = $this->io->post('email');
            $aza_gender = $this->io->post('gender');
            $aza_address = $this->io->post('address');

            if($this->users_model->create($aza_last_name, $aza_first_name, $aza_email, $aza_gender, $aza_address)){
               set_flash_alert('success', 'User was added successfully!');
               redirect('user/display');
            }
        }
        else{
               set_flash_alert('danger', $this->form_validation->errors());
               redirect('user/add');
        }
        }
        $this->call->view('azausers/usercreate');
    }
    public function update($id){
        if($this->form_validation->submitted()){
            $this->form_validation
                ->name('lname')
                     ->required('Last name is required!')
                ->name('fname')
                     ->required('First name is required!')
                ->name('email')
                     ->required('Email is required!')
                ->name('gender')
                     ->required('Gender is required!')
                ->name('address')
                     ->required('Address is required!');
        if($this->form_validation->run()){
            $aza_last_name = $this->io->post('lname');
            $aza_first_name = $this->io->post('fname');
            $aza_email = $this->io->post('email');
            $aza_gender = $this->io->post('gender');
            $aza_address = $this->io->post('address');

            if($this->users_model->update($aza_last_name, $aza_first_name, $aza_email, $aza_gender, $aza_address, $id)){
               set_flash_alert('success', 'User data was updated successfully!');
               redirect('user/display');
            }
        }
        else{
               set_flash_alert('danger', $this->form_validation->errors());
               redirect('user/display');
        }
        }
       
        $userdata['aza_user'] = $this->users_model->get_one($id);
        $this->call->view('azausers/userupdate', $userdata);
    }
    public function delete($id){
        if($this->users_model->delete($id)){
            set_flash_alert('success', 'User data was deleted successfully!');
            redirect('user/display');
        }else{
            set_flash_alert('danger', 'Something Went Wrong!');
            redirect('user/display');
        }
    }
    
}
?>
