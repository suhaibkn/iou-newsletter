<?php namespace App\Controllers;

use App\Models\NewsletterModel;
use App\Models\SubscriberModel;
use CodeIgniter\Test\Fabricator;

class Admin extends BaseController
{
    public function index()
    {

        return redirect()->to(base_url() . '/admin/newsletters');
    }

    public function newsletters()
    {
        $model = new NewsletterModel();

        return view('Admin/newsletters', [
            'newsletters' => $model->paginate(20),
            'pager'       => $model->pager,
        ]);
    }

    public function subscribers()
    {
        $model = new SubscriberModel();

        return view('Admin/subscribers', [
            'subscribers' => $model->paginate(20),
            'pager'       => $model->pager,
        ]);
    }


    public function fake()
    {
        $fk = new Fabricator(SubscriberModel::class);
        $fk->create(25);

    }

}
