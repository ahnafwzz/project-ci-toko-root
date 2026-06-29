<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditModel extends Model
{
    protected $table            = 'audit_logs';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'username', 'category', 'action', 'target_id', 'description', 'severity', 'ip_address', 'user_agent'];
    
    // Fitur otomatis untuk mencatat waktu (jika suatu saat butuh insert lewat model)
    protected $useTimestamps    = false; 
}