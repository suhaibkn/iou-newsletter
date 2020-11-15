<?php namespace App\Models;

use CodeIgniter\Model;

class NewsletterModel extends Model
{
    protected $table      = 'newsletters';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'content', 'author', 'created_by'];

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