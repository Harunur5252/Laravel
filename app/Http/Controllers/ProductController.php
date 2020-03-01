<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use DB;
use Alert;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::where('publication_status',1)->get();
        return view('SimpleEcomerce.AddProduct.add_product',[
            'categories'=>$categories
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function productValidate($request)
{
     $this->validate($request,[
           'proudct_name' =>'required|alpha|min:3|max:10',
            'category_id'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'product_description'=>'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'product_image'=>'required|mimes:jpeg,bmp,png,gif'

        ]);
}
protected function ImageUpload($request)
{
    $productImage=$request->file('product_image');
    $imageName=$productImage->getClientOriginalName();
    $derectory='productImage/';
    $imageUrl=$derectory.$imageName;
    $productImage->move($derectory,$imageName);
    return $imageUrl;
}
protected function productSave($request,$imageUrl)
{

    $product=new Product();
    $product->userproduct_id=$request->userproduct_id;
    $product->proudct_name=$request->proudct_name;
    $product->category_id=$request->category_id;
    $product->product_price=$request->product_price;
    $product->product_quantity=$request->product_quantity;
    $product->product_description=$request->product_description;
    $product->product_image=$imageUrl;
    $product->publication_status=$request->publication_status;
    $product->save();
    if($product)
    {
        toast('product saved Successfully','success');

    }

}
    public function store(Request $request)
    {
       $this->productValidate($request);
       $imageUrl=$this->ImageUpload($request);
       $this->productSave($request,$imageUrl);
        return redirect('/product/add');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

       $product=DB::table('products')
           ->join('categories','products.category_id','categories.id')
           ->select('products.*','categories.category_name')
           ->get();
       return view('SimpleEcomerce.VIewProduct.view_product',[
           'product'=>$product,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productPublished($id)
    {
        $product=Product::find($id);
        $product->publication_status=0;
        $product->save();
        if($product)
        {
            toast('product published Successfully','success');
            return redirect('/product/manage');
        }
        else{
            toast('something is wrong/sorry','error');
            return redirect('/product/manage');
        }

    }
    public function productUnpublished($id)
    {
        $product=Product::find($id);
        $product->publication_status=1;
        $product->save();
        if($product)
        {
            toast('product unpublished Successfully','success');
            return redirect('/product/manage');
        }
        else{
            toast('something is wrong/sorry','error');
            return redirect('/product/manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)

    {
        //$product=Product::find($id);
        $product=DB::table('products')->where('id',$id)->first();
//        $categories=DB::table('categories')->get();
//            ->join('categories','products.category_id','=','categories.id')
//            ->select('products.*','categories.category_name')
        $categories=Category::all();

        return view('SimpleEcomerce.EditProduct.edit-product',[
            'product'=>$product,
            'categories'=>$categories,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request)
    {
        $product=Product::find($request->id);

        $productImage=$request->file('product_image');
        $imageName=$productImage->getClientOriginalName();
        $derectory='productImage/';
        $imageUrl=$derectory.$imageName;
        $productImage->move($derectory,$imageName);

        $product->proudct_name=$request->proudct_name;
        $product->category_id=$request->category_id;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;
        $product->product_description=$request->product_description;
        $product->product_image=$imageUrl;
        $product->publication_status=$request->publication_status;
        $product->save();
        if($product)
        {

            toast('product updated Successfully!','success');
            return redirect('/product/manage');
        }
        else{

            toast('someting went wrong!','error');
            return redirect('/product/manage');
        }

    }
    public function deleteProduct($id)
    {
        $category=Product::find($id);
        $category->delete();
        if($category)
        {
            Alert::success('Success Title', 'Deleted Successfully');
//            toast('Deleted Successfully!','success');

            return Redirect()->back();
        }

    }
}
