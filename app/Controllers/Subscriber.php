<?php namespace App\Controllers;

use App\Models\NewsletterModel;
use App\Models\SubscriberModel;

class Subscriber extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() === 'get') {
            return view('Subscriber/home');
        } else {

            if (!$this->validate([
                'email' => 'required|valid_email',
            ])) {
                return redirect()->back()->withInput();
            } else {
                $email = $this->request->getVar('email');

                $n    = new SubscriberModel();
                $user = $n->where('email', $email)->findAll();

                if (count($user) > 0) {
                    return redirect()->to(current_url() . '/user/' . $user[0]->id);
                } else {
                    return view('Subscriber/notfound');
                }
            }
        }

    }

    public function user($id)
    {
        session()->set('subscriber_id', $id);
        $sub  = new SubscriberModel();
        $news = new NewsletterModel();

        if ($this->request->getMethod() == 'get') {
            return view('Subscriber/profile', [
                'user'  => $sub->find($id),
                'news'  => $news->paginate(20),
                'pager' => $news->pager,
            ]);
        } else {
            if ($this->request->getPost('action') !== null) {
                $id = $this->request->getPost('subscriber_id');

                if ($this->request->getPost('action') == 'Subscribe') {
                    if ($sub->update($id, [
                        'is_subscribed' => true,
                    ])) {
                        $msg = 'You have subscribed successfully.';
                    }
                } else {
                    if ($sub->update($id, [
                        'is_subscribed' => false,
                    ])) {
                        $msg = 'You have been unsubscribed.';
                    }
                }
                return redirect()->to(current_url())->with('msg', $msg);
            }
        }
    }

    public function news($id)
    {
        return view('/Subscriber/newsletter', [
            'user' => (new SubscriberModel())->find(session()->get('subscriber_id')),
            'news' => (new NewsletterModel())->find($id),
        ]);
    }
}
