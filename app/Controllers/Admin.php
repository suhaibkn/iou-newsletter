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
            } elseif ($model->find($id) == null) {
                return redirect()->to(base_url() . '/admin/newsletters');
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
            } elseif ($model->find($id) == null) {
                return redirect()->to(base_url() . '/admin/subscribers');
            } else {
                return view('Admin/subscriber', [
                    'subscriber' => $model->find($id),
                ]);
            }
        } elseif (($this->request->getMethod() == 'post') && $id != null) {
            $vars = $this->request;

            if ($vars->getVar('action') == 'update') {
                $sub = new SubscriberModel();
                $eml = $vars->getVar('email');
                if (($sub->find($id)->email != $eml) && $sub->isRegistered($eml)) {
                    session()->setFlashdata('duplicate', '1');
                    $fail = true;
                }
                if (!$this->validate([
                    'name'  => 'required|min_length[3]',
                    'email' => 'required|valid_email',
                ])) {
                    return redirect()->to(current_url())->withInput();
                } else {
                    if (!isset($fail) && $model->update($id, [
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

    public function addnewsletter()
    {
        if ($this->request->getMethod() == 'get') {
            return view('Admin/new_newsletter');
        } else {
            if (!$this->validate([
                'title'   => 'required|min_length[3]',
                'author'  => 'required|min_length[3]',
                'content' => 'required|min_length[10]',
            ])) {
                return redirect()->to(current_url())->withInput();
            } else {
                if ((new NewsletterModel())->new([
                    'title'      => $this->request->getVar('title'),
                    'author'     => $this->request->getVar('author'),
                    'content'    => $this->request->getVar('content'),
                    'created_by' => 'admin',
                ])) {
                    $msg = 'Newsletter added.';
                } else {
                    $msg = 'Newsletter couldn\'t be added. Try again.';
                }
                return redirect()->to(current_url())->with('msg', $msg);
            }
        }
    }

    public function addsubscriber()
    {
        if ($this->request->getMethod() == 'get') {
            return view('Admin/new_subscriber');
        } else {
            if ((new SubscriberModel())->isRegistered($this->request->getVar('email'))) {
                session()->setFlashdata('duplicate', '1');
                $fail = true;
            }
            if (!$this->validate([
                'name'  => 'required|min_length[3]',
                'email' => 'required|valid_email',
            ])) {
                return redirect()->to(current_url())->withInput();
            } else {
                if (!isset($fail) && (new SubscriberModel())->new([
                        'name'          => $this->request->getVar('name'),
                        'email'         => $this->request->getVar('email'),
                        'is_subscribed' => true,
                    ])) {
                    $msg = 'Subscriber added.';
                } else {
                    $msg = 'Subscriber couldn\'t be added. Try again.';
                }
                return redirect()->to(current_url())->with('msg', $msg);
            }
        }
    }


    public function fake($db = 'all', $count = 25)
    {
        $msg = 'There was some error populating the tables. Please try again later.';

        if ($db == 'all') {
            $nws = (new Fabricator(NewsletterModel::class))->create($count);
            $sbs = (new Fabricator(SubscriberModel::class))->create($count);

            if ($nws && $sbs) {
                $msg = 'All database tables have been populated.';
            }
        } elseif ($db == 'nws') {
            if ((new Fabricator(NewsletterModel::class))->create($count)) {
                $msg = 'Table <kbd>newsletters</kbd> has been populated.';
            }

        } elseif ($db == 'sbs') {
            if ((new Fabricator(SubscriberModel::class))->create($count)) {
                $msg = 'Table <kbd>subscribers</kbd> has been populated.';
            }
        }

        return redirect()->back()->with('msg', $msg);

    }

    public function resetdb($db = 'all')
    {
        $msg = 'There was some error. Please try again later.';
        if ($db == 'all') {
            $nws = \Config\Database::connect()->table('newsletters')->emptyTable();
            $sbs = \Config\Database::connect()->table('subscribers')->emptyTable();

            if ($nws && $sbs) {
                $msg = 'All database tables have been reset.';
            }
        } elseif ($db == 'nws') {
            if (\Config\Database::connect()->table('newsletters')->emptyTable()) {
                $msg = 'Table <kbd>newsletters</kbd> has been reset.';
            }

        } elseif ($db == 'sbs') {
            if (\Config\Database::connect()->table('subscribers')->emptyTable()) {
                $msg = 'Table <kbd>subscribers</kbd> has been reset.';
            }
        }

        return redirect()->back()->with('msg', $msg);
    }

}
