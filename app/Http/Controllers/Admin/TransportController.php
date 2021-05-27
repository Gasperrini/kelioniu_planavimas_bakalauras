<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\TransportContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Http;
use App\Models\Transport;

class TransportController extends BaseController
{
    protected $productRepository;

    public function __construct(
        TransportContract $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $transports = $this->productRepository->listTransports();

        $this->setPageTitle('Transports', 'Transport List');
        return view('admin.transports.index', compact('transports'));
    }

    public function create()
    {
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Transports', 'Create Transport');
        return view('admin.transports.create');/*, compact('categories', 'brands'));*/
    }

    public function fetch()
    {
        $response = Http::withHeaders([
            'secret-key' => '$2b$10$APDq0mxwrHh2KlXwpCEaJ.4xHXMqLNU7nwfDwKtZ9AxcxZziSS/tW'
        ])->get('https://api.jsonbin.io/b/608d06128a409667ca0202e6/5');

        $transport = json_decode($response->body());
            foreach($transport as $trans){
                $transport = new Transport;
                $transport->name = $trans->name;
                $transport->address = $trans->address;
                $transport->email = $trans->email;
                $transport->save();
            }
        
            if (!$transport) {
                return $this->responseRedirectBack('Error occurred while importing landmark.', 'error', true, true);
            }
            
            return $this->responseRedirect('admin.transports.index', 'Duomenys importuoti sėkmingai' ,'success',false, false);
    }

    public function store(Request $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->createTransport($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        
        return $this->responseRedirect('admin.transports.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $transport = $this->productRepository->findTransportById($id);
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Transports', 'Edit Transport');
        return view('admin.transports.edit', compact('transport'));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateTransport($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.transports.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = $this->productRepository->deleteTransport($id);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.transports.index', 'Category deleted successfully' ,'success',false, false);
    }
}
