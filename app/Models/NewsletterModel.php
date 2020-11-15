<?php namespace App\Models;

use CodeIgniter\Model;
use Faker\Generator;

class NewsletterModel extends Model
{
    protected $table      = 'newsletters';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'content', 'author', 'created_by'];

    protected $returnType     = 'object';
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


    public function fake(Generator &$faker)
    {
        return [
            'title'      => $faker->sentence(10),
            'content'    => $faker->text(300),
            'author'     => $faker->name,
            'created_by' => 'faker',
        ];
    }

}