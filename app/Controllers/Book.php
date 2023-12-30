<?php

namespace App\Controllers;

use App\Models\BookModel;

use App\Controllers\BaseController;

class Book extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data['session'] = $session;
        // print_r ($data);

        $modal = new BookModel();
        $data['books'] = $modal->getBook();
        return view('/books/list', $data);

    }
    public function create()
    {
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $input = $this->validate([
                'name' => 'required|min_length[2]',
                'author' => 'required|min_length[2]',
                'sbin' => 'required|min_length[2]',
            ]);
            if ($input == true) {
                // echo "hi";die();
                $model = new BookModel();
                $model->save([
                    'title' => $this->request->getPost('name'),
                    'author' => $this->request->getPost('author'),
                    'isbnNo' => $this->request->getPost('sbin'),
                    'status' => 1

                ]);
                $session->setFlashdata('success', 'data inserted');
                return redirect()->to('/index');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('/books/create', $data);
    }

    public function editBooks($id)
    {
        $session = \Config\Services::session();
        helper('form');
        $model = new BookModel();
        $book = $model->updateBooks($id);
        // print_r($book);
        if (empty($book)) {
            $session->setFlashdata('error', 'record not found');
            return redirect()->to('/index');
        }

        $data = [];
        $data['book'] = $book;
        if ($this->request->getMethod() == 'post') {
            $input = $this->validate([
                'name' => 'required|min_length[2]',
                'author' => 'required|min_length[2]',
                'sbin' => 'required|min_length[2]',
            ]);
            if ($input == true) {
                // echo "hi";die();
                $model = new BookModel();
                $model->update($id, [
                    'title' => $this->request->getPost('name'),
                    'author' => $this->request->getPost('author'),
                    'isbnNo' => $this->request->getPost('sbin'),
                    'status' => 1

                ]);
                $session->setFlashdata('success', 'update success');
                return redirect()->to('/index');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('/books/edit', $data);
    }

    public function deleteBooks($id)
    {
        // echo $id;
        $session = \Config\Services::session();
        $model = new BookModel();
        $book = $model->updateBooks($id);
        if (empty($book)) {
            $session->setFlashdata('error', 'record not found');
            return redirect()->to('/index');
        }
        $model = new BookModel();
        $model->delete($id);
        $session->setFlashdata('success', 'successfully delete');
        return redirect()->to('/index');
    }
}