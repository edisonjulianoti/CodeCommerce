<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Http\Requests\ProductImageRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function index()
    {
        $products = $this->products->paginate(2);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Requests\ProductsRequest $request)
    {
        $input = $request->all();
        $products = $this->products->fill($input);
        $products->save();

        return redirect()->route('products');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $products = $this->products->find($id);

        return view('admin.products.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $this->products->find($id)->update($request->all());

        return redirect()->route('products');
    }

    public function destroy($id)
    {
        $this->products->find($id)->delete();

        return redirect()->route('products');
    }

    public function images($id)
    {
        $product = $this->products->find($id);

        return view('admin.products.image', ['product' => $product]);
    }

    public function createImage($id)
    {
        $product = $this->products->find($id);

        return view('admin.products.create_image', ['product' => $product]);
    }

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products.images', ['id' => $id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if (file_exists(public_path('uploads/' . $image->id . '.' . $image->extension))){
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;

        $image->delete();


        return redirect()->route('products.images', ['id' => $product->id]);
    }
}
