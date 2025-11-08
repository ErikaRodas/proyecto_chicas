<?php namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model
{
    protected $table      = 'ESTUDIANTE';
    protected $primaryKey = 'id_estudiante';
    protected $allowedFields = ['id_padre', 'nombre', 'apellido', 'num_identificacion'];
    
    
    public function getPadres()
    {
        $builder = $this->db->table('USUARIOS');
        $builder->select('usuario_id, CONCAT(nombre, " ", apellido) AS nombre_completo');
        $builder->where('tipo_usuario_id', 3); 
        return $builder->get()->getResultArray();
    }
}