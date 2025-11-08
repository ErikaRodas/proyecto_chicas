<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudianteModel; 

class EstudiantesController extends BaseController
{
    protected $estudianteModel;

    public function __construct()
    {
        
        $this->estudianteModel = new EstudianteModel();
        
        $this->validation = \Config\Services::validation(); 
    }

    
    public function crear()
    {
        $data['padres'] = $this->estudianteModel->getPadres();
        $data['title'] = 'Registrar Nuevo Estudiante';
        $data['action'] = base_url('estudiantes/guardar');
        
        
        return view('estudiantes/estudiantes_form', $data); 
    }
    
    public function guardar()
    {
        
        $rules = [
            'nombre'             => 'required|min_length[3]',
            'apellido'           => 'required|min_length[3]',
            'num_identificacion' => 'required|is_unique[ESTUDIANTE.num_identificacion]', 
            'id_padre'           => 'required|integer' 
        ];
        
        if (!$this->validate($rules)) {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        
        $data = [
            'nombre'             => $this->request->getPost('nombre'),
            'apellido'           => $this->request->getPost('apellido'),
            'num_identificacion' => $this->request->getPost('num_identificacion'),
            'id_padre'           => $this->request->getPost('id_padre') 
        ];
        $this->estudianteModel->insert($data);

       
        return redirect()->to(base_url('estudiantes'))->with('success', '¡Estudiante registrado exitosamente!');
    }
    
    // Método temporal para que la redirección funcione:
    public function index()
    {
        // Esto solo es temporal, la función completa de index/listado es el siguiente paso.
        return '<h1>CRUD de Estudiantes - Listo para el Listado!</h1><a href="'.base_url('estudiantes/crear').'">Volver al formulario</a>';
    }
}