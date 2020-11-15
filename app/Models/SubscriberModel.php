<?php namespace App\Models;

use CodeIgniter\Model;

class SubscriberModel extends Model
{
    protected $table      = 'subscribers';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'is_subscribed', 'is_active'];

    protected $useSoftDeletes = true;
    protected $useTimestamps  = true;

    public function all()
    {
        return $this->findAll();
    }

    public function new($data)
    {
        return $this->insert($data, true);
    }

}