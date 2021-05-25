<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\AccommodationContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Http;
use App\Models\Accommodation;

class AccommodationController extends BaseController
{
    protected $productRepository;

    public function __construct(
        AccommodationContract $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $accommodations = $this->productRepository->listAccommodations();

        $this->setPageTitle('Accommodations', 'Accommodation List');
        return view('admin.accommodations.index', compact('accommodations'));
    }

    public function create()
    {
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Accommodations', 'Create Accommodation');
        return view('admin.accommodations.create');/*, compact('categories', 'brands'));*/
    }

    public function fetch()
    {
        $response = Http::withHeaders([
            'secret-key' => '$2b$10$APDq0mxwrHh2KlXwpCEaJ.4xHXMqLNU7nwfDwKtZ9AxcxZziSS/tW'
        ])->get('https://api.jsonbin.io/b/60901930d64cd16802a85dbc/4');

        $accommodation = json_decode($response->body());
            foreach($accommodation as $acc){
                $accommodation = new accommodation;
                $accommodation->name = $acc->name;
                $accommodation->address = $acc->address;
                $accommodation->save();
            }
        
            if (!$accommodation) {
                return $this->responseRedirectBack('Error occurred while importing landmark.', 'error', true, true);
            }
            
            return $this->responseRedirect('admin.accommodations.index', 'Duomenys importuoti sėkmingai' ,'success',false, false);
    }

    public function store(Request $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->createAccommodation($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        
        return $this->responseRedirect('admin.accommodations.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $accommodation = $this->productRepository->findAccommodationById($id);
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Accommodations', 'Edit Accommodation');
        return view('admin.accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateAccommodation($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.accommodations.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = $this->productRepository->deleteAccommodation($id);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.accommodations.index', 'Category deleted successfully' ,'success',false, false);
    }
}
