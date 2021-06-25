<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\Supplied;
use App\Models\Verification;
use DB;
use PDF;



class Master extends Controller
{
    public function admin_welcome(){
        $p = Product::all();
        $c = Category::all();
        $su = Suppliers::all();
        $s = Supplied::all();

        return view('admin.index',compact('p','c','su','s'));
    }

    public function products(){
        $category = Category::select('category_name')->groupBy('category_name')->get();
        $products = Product::with('categories')->paginate(10);
    	return view('products.products',compact('products','category'));
    }

    public function singleProduct($id){
        return view('products.all-products')->with('single_product',Product::find($id));
    }

    public function admin(){
    	return view('admin.index');
    }

    public function categories(Request $request){
        if (empty($request->all())) {
            $cats = Category::paginate(5);
            return view('admin.categories.index',compact('cats'));
        }else{
            $cats = Category::where('category_name','LIKE','%'.$request->category_name.'%')->paginate(5);
            return view('admin.categories.index',compact('cats'));
        }
    	
    }

    public function category_update($id){
         return view('admin.categories.edit_category')->with('get_category',Category::find($id));
    }

    public function edit_cateogry(Request $r){

        $this->validate($r, [
            'image' => 'mimes:jpeg,jpg,png',
         ]);
         if ($r->image!='') {
            $picName = rand().'-'.time().'.'.$r->image->extension();
            $r->image->move(public_path('uploads'), $picName);
         }else{
            $picName = $r->default;
         }

        Category::where('id', $r->id)->update([
            'category_name' => $r->category_name,
            'image' => $picName,
        ]);

        $r->session()->flash('msg','Updated !');

        return redirect('admin/categories');
     }

    public function addCategory(){
         return view('admin.categories.add_categories');
    }

    public function insertCat(Request $r){

         $this->validate($r, [
            'image' => 'mimes:jpeg,jpg,png',
         ]);

         $picName='';

         if ($r->image!='') {
         	$picName = rand().'-'.time().'.'.$r->image->extension();
            $r->image->move(public_path('uploads'), $picName);
         }

         Category::create([
            'category_name' => $r->category_name,
            'image' => $picName
        ]);


        $r->session()->flash('msg','success !');

        return redirect('admin/categories');

        
    }

    public function cat_delete(Request $r,$id){
        Category::destroy(array('id',$id));

        $r->session()->flash('msg','deleted !');

        return redirect('/admin/categories');
    }


    public function admin_products(Request $request){

        if (empty($request->all())) {
            $prod = Product::with('categories')->paginate(5);
            return view('admin.products.index',compact('prod'));
        }else{
            // $prod = Product::with('categories')->where('product_name','LIKE','%'.$request->product_name.'%')->orWhere('category_name','LIKE','%'.$request->category_name.'%')->paginate(5);
             
            $prod = Product::where('product_name','LIKE','%'.$request->product_name.'%')
                    ->with('categories')->paginate(5); 
            return view('admin.products.index',compact('prod'));
        }
    	
    	
    }

    public function destroy(Product $product,$id){
        Product::destroy(array('id',$id));

        $product->session()->flash('msg','deleted !');

        return redirect('/admin/products');
    }

    public function addProduct(){
    	 $cat = Category::all();
         return view('admin.products.add_product',compact('cat'));
    }

    public function insertProduct(Request $r){
         $this->validate($r, [
            'image' => 'mimes:jpeg,jpg,png',
         ]);

         $picName = rand().'-'.time().'.'.$r->image->extension();
         $r->image->move(public_path('uploads'), $picName);

         Product::create([
            'product_name' => $r->product_name,
            'category_id' => $r->category_id,
            'image' => $picName,
            'product_price' => $r->product_price,
            'product_description' => $r->product_description,
        ]);


        $r->session()->flash('msg','success !');

        return redirect('admin/products');

        
    }

    public function product_update(Product $product,Category $category,$id){
         return view('admin.products.edit_product')->with('get_product',Product::find($id))->with('get_cat',Category::all());
    }

    public function edit_product(Request $r){

    	$this->validate($r, [
            'image' => 'mimes:jpeg,jpg,png',
         ]);
         if ($r->image!='') {
         	$picName = rand().'-'.time().'.'.$r->image->extension();
            $r->image->move(public_path('uploads'), $picName);
         }else{
         	$picName = $r->default;
         }

        Product::where('id', $r->id)->update([
            'product_name' => $r->product_name,
            'category_id' => $r->category_id,
            'image' => $picName,
            'product_price' => $r->product_price,
            'product_description' => $r->product_description,
        ]);

        $r->session()->flash('msg','Updated !');

        return redirect('admin/products');
     }

     public function testrelation(){
     	$get_products = Product::with('categories')->paginate(5);
     	return view('relationship',compact('get_products'));
     }

     public function Mail(){
        return view('emails.send_mail');
     }

     public function sendMail(Request $r){
       
        $details = array(
            'title'      =>  $r->title,
            'body'   =>   $r->body,
            'from'      => $r->from
        );

        // \Mail::to('ks.azim@yahoo.com')->send(new \App\Mail\MyTestMail($details));

        \Mail::send('emails.myTestMail',$details, function($message) {
         $message->to('ks.azim@yahoo.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','shishir');
          });
          // echo "HTML Email Sent. Check your inbox.";

        return redirect('send-mail')->with('msg','email sent successfully !');

        dd("Email is Sent.");
     }

     

     public function supplies(Request $request){
        if (empty($request->all())) {
            $supplies = Supplied::with('suppliers')->paginate(5);
            return view('admin.import.supplies.index',compact('supplies'));
        }else{
            $supplies = Supplied::with('suppliers')->where('supplier_id','LIKE','%'.$request->supplier_name.'%')->paginate(5);
            return view('admin.import.supplies.index',compact('supplies'));
        }
     }

     public function addSupply(){
        $get_supplier = Suppliers::all();
        return view('admin.import.supplies.add_supply',compact('get_supplier'));
     }

     public function insertSupply(Request $r){
           
         Supplied::create([
            'supplier_id' => $r->supplier_name,
            'item_details' => $r->item_name,
            'rate' => $r->rate,
            'quantity' => $r->quantity,
            'total_cost' => $r->gross,
            'paying' => $r->paying,
            'due' => $r->due,
        ]);


        $r->session()->flash('msg','success !');

        return redirect('admin/import/supplies');      
    }

    public function update_supply($id){
    	 $supplier_id = Supplied::where('id',$id)->first();
    	 $s_id=$supplier_id->supplier_id;
    	 $supplier_name = Suppliers::where('id',$s_id)->first();
         return view('admin.import.supplies.edit_supplies',compact('supplier_name'))->with('get_supplies',Supplied::find($id));
    }

    public function editSupply(Request $r,$id){

    	Supplied::where('id', $r->id)->update([
            'supplier_id' => $r->supplier_id,
            'item_details' => $r->item_details,
            'rate' => $r->rate,
            'quantity' => $r->quantity,
            'total_cost' => $r->total_cost,
            'paying' => $r->paying,
            'due' => $r->due,
            'status' => $r->status,
        ]);

        $r->session()->flash('msg','Updated !');

        return redirect('admin/import/supplies');
    }


    //  public function insertProduct(Request $r){
    //      $this->validate($r, [
    //         'image' => 'mimes:jpeg,jpg,png',
    //      ]);

    //      $picName = rand().'-'.time().'.'.$r->image->extension();
    //      $r->image->move(public_path('uploads'), $picName);

    //      Product::create([
    //         'product_name' => $r->product_name,
    //         'category_id' => $r->category_id,
    //         'image' => $picName,
    //         'product_price' => $r->product_price,
    //         'product_description' => $r->product_description,
    //     ]);


    //     $r->session()->flash('msg','success !');

    //     return redirect('admin/products');

    // }

    public function delete_supply(Request $r,$id){
        Supplied::destroy(array('id',$id));

        $r->session()->flash('msg','deleted !');

        return redirect('/admin/import/supplies');
    }

     public function make_payment(){
        return view('admin.import.make_payment');
     }

     public function addSupplier(){
        return view('admin.import.suppliers.add_supplier');
     }

     public function suppliers(Request $request){

        if (empty($request->all())) {
            $sup = Suppliers::paginate(5);
            return view('admin.import.suppliers.index',compact('sup'));
        }else{
            $sup = Suppliers::where('supplier_name','LIKE','%'.$request->supplier_name.'%')->paginate(5);
            return view('admin.import.suppliers.index',compact('sup'));
        }
     }

     public function insertSupplier(Request $r){
           
         Suppliers::create([
            'supplier_name' => $r->supplier_name,
            'phone' => $r->phone,
            'email' => $r->email,
            'mailing_address' => $r->mailing_address,
            'permanent_address' => $r->permanent_address,
        ]);


        $r->session()->flash('msg','success !');

        return redirect('admin/import/suppliers');      
    }

    public function supplier_delete(Request $r,$id){
        Suppliers::destroy(array('id',$id));

        $r->session()->flash('msg','deleted !');

        return redirect('/admin/import/suppliers');
    }

    public function supplier_update($id){
         return view('admin.import.suppliers.edit_supplier')->with('get_supplier',Suppliers::find($id));
    }

    public function edit_supplier(Request $r,$id){

         
        Suppliers::where('id', $r->id)->update([
            'supplier_name' => $r->supplier_name,
            'phone' => $r->phone,
            'email' => $r->email,
            'mailing_address' => $r->mailing_address,
            'permanent_address' => $r->permanent_address,
        ]);

        $r->session()->flash('msg','Updated !');

        return redirect('admin/import/suppliers');
     }

     public function createPDF() {
      // retreive all records from db
      $data = Supplied::all();

      // share data to view
      view()->share('admin/import/supplies/index',$data);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    function action(Request $request){
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '' && $query != 'All')
      {
       $data = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.product_name', 'like', '%'.$query.'%')
            ->orwhere('categories.category_name', $query)
            ->paginate(50,array('products.*', 'categories.category_name'));
      }
      else
      {
       $data = DB::table('products')
         ->orderBy('id', 'desc')
         ->paginate(50);
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
                <div class="product_card">
                    <div class="card_product_name">
                        <p style="color: #009688;padding:1%;padding-left:5%;"><b>'.$row->product_name.'</b></p>
                    </div>  
                    <div class="card_product_image">
                        <img style="width:200px;height:200px" src="uploads/'.$row->image.'" alt="no image found">
                    </div> 
                    <div class="foot" style="padding: 1%;margin-top:10%">
                        <div class="card_price">
                            <h3 style="color: #009688;"><small>Price </small>'.$row->product_price.'<small>BDT</small></h3>
                        </div>
                        <div class="card_product_details">
                            <a href="all-products/'.$row->id.'">Get Details</a><a href="all-products/{{$product->id}}">Add to Cart</a>
                        </div>  
                    </div> 
                </div> 

                    ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Product Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      echo json_encode($data);
     }
    }

    public function tests(){
        $cat = Category::all();
        return view('test',compact('cat'));
    }

     
    public function pagination(Request $request){
      $data = DB::table('products')->paginate(3);
      return view('pagi',compact('data'));
    }

    public function paginationr(Request $request){

     if($request->ajax()){
        $query = $request->get('query');
      
        $data = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.product_name', 'like', '%'.$query.'%')
            ->paginate(3,array('products.*', 'categories.category_name'));
        return view('pagination_data',compact('data'))->render();
     }
    }


    public function testAjax(Request $request){
       $data = Product::paginate(2);
       return view('testAjax',compact('data'));  
    }

    public function testAjaxAction(Request $request){
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = Product::Where('product_name','LIKE','%'.$query.'%')->paginate(2);
            return view('testAjaxAction',compact('data'))->render();
        }
    }

    public function verification(Request $request){
        return view('verification');
    }

    public function verificationAdminView(Request $request){
        $getAll = Verification::paginate(10);
        return view('admin.verification.index',compact('getAll'));
    }

    public function verify(Request $request){

        $img = $request->image;
        $folderPath = "uploads/";
      
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
      
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
      
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        Verification::create([
            'image' => $fileName,
            'user_id' =>$request->user_id,
             
        ]);
        return redirect('verification');
    }
}
