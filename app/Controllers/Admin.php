<?php namespace App\Controllers;

use App\Models\NewsletterModel;
use App\Models\SubscriberModel;
use CodeIgniter\Test\Fabricator;

class Admin extends BaseController
{
    public function index()
    {
        return view('Admin/dashboard');
    }

    public function newsletters($id = null)
    {
        $model = new NewsletterModel();

        if ($this->request->getMethod() == 'get') {
            if ($id == null) {
                return view('Admin/newsletters', [
                    'newsletters' => $model->paginate(20),
                    'pager'       => $model->pager,
                ]);
            } else {
                return view('Admin/newsletter', [
                    'newsletter' => $model->find($id),
                ]);
            }
        } elseif (($this->request->getMethod() == 'post') && $id != null) {
            $vars = $this->request;

            if ($vars->getVar('action') == 'update') {
                if (!$this->validate([
                    'title'   => 'required|min_length[3]',
                    'content' => 'required|min_length[3]',
                ])) {
                    return redirect()->to(current_url())->withInput();
                } else {
                    if ($model->update($id, [
                        'title'   => $vars->getVar('title'),
                        'content' => $vars->getVar('content'),
                    ])) {
                        $msg = 'Newsletter updated.';
                    } else {
                        $msg = 'Newsletter couldn\'t be updated. Try again.';
                    }
                    return redirect()->to(current_url())->with('msg', $msg);
                }
            } elseif ($vars->getVar('action') == 'delete') {
                if ($model->delete($id) != false) {
                    return redirect()->back()->with('msg', 'The newsletter has been deleted successfully');
                }
            }
        } else {
            return 'There has been some error.';
        }
    }

    public function subscribers($id = null)
    {
        $model = new SubscriberModel();

        if ($this->request->getMethod() == 'get') {
            if ($id == null) {
                return view('Admin/subscribers', [
                    'subscribers' => $model->paginate(20),
                    'pager'       => $model->pager,
                ]);
            } else {
                return view('Admin/subscriber', [
                    'subscriber' => $model->find($id),
                ]);
            }
        } elseif (($this->request->getMethod() == 'post') && $id != null) {
            $vars = $this->request;

            if ($vars->getVar('action') == 'update') {
                if (!$this->validate([
                    'name'  => 'required|min_length[3]',
                    'email' => 'required|valid_email',
                ])) {
                    return redirect()->to(current_url())->withInput();
                } else {
                    if ($model->update($id, [
                        'name'          => $vars->getVar('name'),
                        'email'         => $vars->getVar('email'),
                        'is_subscribed' => $vars->getVar('subscribed') ? 1 : 0,
                    ])) {
                        $msg = 'Subscriber details updated.';
                    } else {
                        $msg = 'Subscriber details couldn\'t be updated. Try again.';
                    }
                    return redirect()->to(current_url())->with('msg', $msg);
                }
            } elseif ($vars->getVar('action') == 'delete') {
                if ($model->delete($id) != false) {
                    return redirect()->back()->with('msg', 'The subscriber has been deleted successfully');
                }
            }
        } else {
            return 'There has been some error.';
        }
    }


    public function fake()
    {
        $fk = new Fabricator(SubscriberModel::class);
        $fk->create(25);

    }

}
