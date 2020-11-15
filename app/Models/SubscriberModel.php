<?php namespace App\Models;

use CodeIgniter\Model;
use Faker\Generator;

class SubscriberModel extends Model
{
    protected $table      = 'subscribers';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'is_subscribed', 'is_active'];

    protected $returnType = 'object';

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

    public function isRegistered($email)
    {
        return ($this->where('email', $email)->countAllResults() > 0);
    }


    public function fake(Generator &$faker)
    {
        return [
            'name'          => $faker->name,
            'email'         => $faker->safeEmail,
            'is_subscribed' => $faker->randomElement([1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0])
        ];
    }

}