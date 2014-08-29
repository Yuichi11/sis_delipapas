<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class empleado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_view', 'mod_empleado'));
        $this->load->library('session');
    }

    public function index() {
        if (!$this->logged()) {
            header('location: ' . base_url('login'));
        } else {

            $empleado["form"] = array('role' => 'form', "id" => "form_emp");
            $empleado["form_editar"] = array('role' => 'form', "id" => "form_emp_edit");
            $empleado["form_a"] = array('role' => 'form', "style" => "display: inline-block;");
            $empleado["nombre"] = array('id' => 'nomb_emp', 'name' => 'nombre', 'class' => "form-control", 'placeholder' => "Nombres", "maxlength" => "45", 'required' => 'true', 'autocomplete' => 'off');
            $empleado["apellido"] = array('id' => 'apel_emp', 'name' => 'apellido', 'class' => "form-control", 'placeholder' => "Apellidos", "maxlength" => "45", 'required' => 'true', 'autocomplete' => 'off');
            $empleado["dni"] = array('id' => 'dni_emp', 'name' => 'dni', 'class' => "form-control", 'placeholder' => "D.N.I.", "maxlength" => "8", 'required' => 'true', "autocomplete" => "off");
            $empleado["telefono"] = array('id' => 'telefono_emp', 'name' => 'telefono', 'class' => "form-control", 'placeholder' => "Teléfono", "maxlength" => "12", 'required' => 'true', "autocomplete" => "off");
            $empleado["direccion"] = array('id' => 'direccion_emp', 'name' => 'direccion', 'class' => "form-control", 'placeholder' => "Dirección", "maxlength" => "100", 'required' => 'true', "autocomplete" => "off");
            $empleado["masculino"] = array('id' => 'masculino_emp', 'name' => 'sexo', "value" => "M", 'required' => "true");
            $empleado["femenino"] = array('id' => 'femenino_emp', 'name' => 'sexo', "value" => "F", 'required' => "true");
            $empleado["soltero"] = array('id' => 'soltero_emp', 'name' => 'civil', "value" => "S", 'required' => "true");
            $empleado["casado"] = array('id' => 'casado_emp', 'name' => 'civil', "value" => "C", 'required' => "true");
            $empleado["divorciado"] = array('id' => 'divorciado_emp', 'name' => 'civil', "value" => "D", 'required' => "tr1ue");
            $empleado["registrar"] = array('name' => 'registrar', 'class' => "btn btn-primary", 'value' => "Registrar");
//            $empleado["editar"] = array('name' => 'editar', 'class' => "btn btn-primary", 'value' => "Editar");

            if ($this->input->post('registrar')) {
                $nomb_emp = $this->input->post('nombre');
                $apel_emp = $this->input->post('apellido');
                $dire_emp = $this->input->post('direccion');
                $dni_emp = $this->input->post('dni');
                $telefono_emp = $this->input->post('telefono');
                $sexo_emp = $this->input->post('sexo');
                $civil_emp = $this->input->post('civil');
                $afp_emp = $this->input->post('afp');

                $data = array(
                    'nomb_emp' => $nomb_emp,
                    'apel_emp' => $apel_emp,
                    'dire_emp' => $dire_emp,
                    'dni_emp' => $dni_emp,
                    'telf_emp' => $telefono_emp,
                    'sexo_emp' => $sexo_emp,
                    'afp_emp' => $afp_emp,
                    'civi_emp' => $civil_emp,
                    'esta_emp' => 'A'
                );
                $this->mod_empleado->insert($data);
                $this->session->set_userdata('mensaje_emp', 'El empleado ' . $nomb_emp . ' ' . $apel_emp . ' ha sido registrado existosamente');
            } else if ($this->input->post('editar')) {
          
                // EDITAR   
                
            } else if ($this->input->post('activar')) {
               
                // ACTIVAR
                
            } else if ($this->input->post('desactivar')) {
                // DESACTIVAR
            }
            $empleado['empleados'] = $this->mod_view->view('empleado');

            $data['container'] = $this->load->view('empleado/empleado_view', $empleado, true);
            $this->load->view('home/body', $data);
        }
    }

    public function logged() {
//        return $this->session->userdata('logged');
        return true;
    }

    public function admin() {
        if ($this->session->userdata('codi_rol') == '1') {
            return true;
        } else {
            return false;
        }
    }

}
