<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\sales_taxes;
use App\Models\purchase_taxes;
use App\Models\product_categories;
use App\Models\products_new_items;
use App\Models\User;
use App\Models\Tag;
use App\Models\invoicing_policies;
use App\Models\optional_product;
use App\Models\price_list_pop;
use App\Models\sales_price;
use App\Models\Country;
use App\Models\pricelist_all;
use Illuminate\Http\Request;
use App\Models\Activity;

class SalesController extends Controller
{
    public function index()
    {
        return view('Sale.orderindex');
    } 

    public function create()
    {
        return view('Sale.ordernew');
    }


// Product Page.......................

    public function product_index(Request $request) 
    {
        // Check if it's an AJAX request to fetch a specific product
        if ($request->ajax()) {
            $productId = $request->input('id'); // Get product ID from the request
            $product = products_new_items::find($productId); // Fetch product by ID
    
            // Check if product exists
            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }
    
            // Return the product details as JSON for AJAX call
            return response()->json([
                'name' => $product->name,
                'sales_price' => $product->sales_price,
                'image' => $product->image,
                'reference' => $product->reference,
                'cost_price' => $product->cost_price,
                'track_inventory' => $product->track_inventory, // Add this field
            ]);
        }
    
        // If not an AJAX request, return all products for display
        $products = products_new_items::all();
        return view('Sale.productindex', compact('products'));
    }
    
    public function product_create(Request $request)
    {
        $taxes = sales_taxes::select('id','tax_name', 'tax_rate')->get();
        $purchase_tax = purchase_taxes::select('id','tax_name', 'tax_rate')->get();
        $categorie = product_categories::select('id', 'categories_name')->get();
        $data = products_new_items::find('id','name');
        $invoice = invoicing_policies::select('id','invoice_name')->get();
        $users = User::orderBy('id', 'DESC')->get();
        $tags = Tag::where('tage_type', 4)->get();
        $Optional = products_new_items ::select('name')->get();
        if ($data && isset($data->product_name)) {
            $count = products_new_items::where('name', $data->product_name)->count();
        } else {
            $count = 0;
        }
        if ($data) {
            $activitiesCount = Activity::where('product_id', $data->id)->where('status', '0')->count();
        } else {
            $activitiesCount = 0;
        }
        if ($data) {
            $activities = Activity::orderBy('id', 'DESC')->where('status', '0')->where('product_id', $data->id)->get();
        } else {
            $activities = 0;
        }
        if ($data) {
            $activitiesDone = Activity::orderBy('id', 'DESC')->where('status', '1')->where('product_id', $data->id)->get();
        } else {
            $activitiesDone = 0;
        }
        
        return view('Sale.productnew', compact('taxes', 'purchase_tax','categorie','data', 'users', 'invoice','tags', 'Optional'));
    }

    public function product_store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            // Generate a unique filename
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Store the file in the 'product_image' directory in storage
            $path = $file->storeAs('product_image', $fileName, 'public');
        } else {
            // If no image is uploaded, use the placeholder image path
            $path = '/public/images/placeholder.png';
        }

        // Prepare the data to update or create the product
        $data = [
            'name' => $request->name_0,
            'product_type' => $request->product_type,
            'track_inventory' => $request->track_inventory_0,
            'create on order' => $request->create_on_order_0,
            'invoicing_policy' => $request->invoicing_policy_0,
            'plan_servies' => $request->plan_servies_0,
            'sales_price' => $request->sales_price_0,
            'cost_price' => $request->cost_price_0,
            'reference' => $request->reference_0,
            'barcode' => $request->barcode_0,
            'hsn_sac_code' => $request->hsn_sac_code_0,
            'internal_note' => $request->internal_note_0,
            'optional_product' => $request->optional_product_0,
            'sales_des' => $request->sales_des_0,
            'manufacture' => $request->manufacture_0,
            'weight' => $request->weight_0,
            'volume' => $request->volume_0,
            'customer_lead_time' => $request->customer_lead_time_0,
            'res_des' => $request->res_des_0,
            'del_des' => $request->del_des_0,
            'income_ac' => $request->income_ac_0,
            'expense_ac' => $request->expense_ac_0,
            'tags_id' => $request->tag_ids_1,
            'category_id' => $request->category_id,
            'purchase_taxes' => $request->purchase_taxes,
            'sales_tax_id' => $request->sales_tax_id,
            'invoicing_policy_service_id' => $request->invoicing_policy_service,
            'image' => $path, // Use either uploaded image or placeholder
        ];

        // Update or create the product
        $product = products_new_items::updateOrCreate(
            ['id' => $request->product_id],
            $data
        );

        $message = $product->wasRecentlyCreated ? 'Product created successfully' : 'Product updated successfully';
        
        return response()->json(['message' => $message]);
    }

    public function product_index_list()
    {
        // Define the columns to show in the modal (or fetch dynamically)
        $columns = [
            'id',
            'name',
            'image',
            'product_type',
            'track_inventory',
            'create on order',
            'invoicing_policy',
            'plan_servies',
            'sales_price',
            'cost_price',
            'reference',
            'barcode',
            'hsn_sac_code',
            'internal_note',
            'optional_product',
            'sales_des',
            'manufacture',
            'weight',
            'volume',
            'customer_lead_time',
            'res_des',
            'del_des',
            'income_ac',
            'expense_ac',
            'invoicing_policy_service_id',
            'sales_tax_id',
            'purchase_taxes',
            'category_id',
            'tags_id',
        ];

        // Fetch all products from the database
        $products = products_new_items::all();

        // Pass columns and products to the view
        return view('Sale.productlist', compact('products', 'columns'));

    }
  
// Price List Page.......................

        public function Pricelists_index()
        {
            // Fetch pricelist data
            $pricelists = pricelist_all::orderBy('id', 'asc')->get();
            
            // Return the view with pricelists data
            return view('Sale.pricelistsindex', compact('pricelists'));
        }

        public function Pricelists_create($id = null)
        {
            $products = products_new_items::select('id', 'name')->get();
            $categories = product_categories::select('id', 'categories_name')->get();
            $sale_price = sales_price::select('id', 'sale_price_name')->get();
            $country = Country::select('id', 'name')->get();
            $data = pricelist_all::find($id);
            if($data){
                $priceLists = $data->getPriceList();
            }
            else{
                $priceLists = [];
            }

            return view('Sale.Pricelistsnew', compact('products', 'categories', 'sale_price', 'country', 'data','priceLists'));
        }

        public function pricelist_store_main(Request $request)
        {
            // Prepare the data array with the pricelist name and country
            $data = [
                'pricelist_name' => $request->pricelist_name,
                'country' => $request->country,
            ];

            // Check if pricelist_id is provided
            if ($request->pricelist_id) {
                // Retrieve the existing pricelist
                $product = pricelist_all::findOrFail($request->pricelist_id);
                
                // Get the existing model IDs and ensure it's an array
                $existingIds = is_array($product->pricelistes_id) ? $product->pricelistes_id : explode(',', $product->pricelistes_id);
                
                // Get new IDs and ensure it's an array
                $newIds = is_array($request->modelIds) ? $request->modelIds : explode(',', $request->modelIds);

                // Merge and filter unique IDs
                $mergedIds = array_unique(array_merge($existingIds, $newIds));
                $data['pricelistes_id'] = implode(',', $mergedIds); // Store as a comma-separated string

                // Update the product
                $product->update($data);
                $message = "Pricelist updated successfully!";
            } else {
                // If no pricelist_id, create a new pricelist with the provided model IDs
                $data['pricelistes_id'] = is_array($request->modelIds) ? implode(',', $request->modelIds) : $request->modelIds;
                $product = pricelist_all::create($data);
                $message = "Pricelist created successfully!";
            }

            return response()->json(['message' => $message, 'product' => $product]);
        }

        public function pricelist_store(Request $request)
        {
             
            $data = [
                'apply_to' => $request->apply_to,
                'product_Name' => $request->product_Name,
                'category' => $request->category_name,
                'price_type' => $request->price_type,
                'discount' => $request->discount,
                'sale_price_name'=> $request->sale_price_name,
                'based_price' => $request->based_price,
                'discount_sales' => $request->discount_sales,
                'markup' => $request->markup,
                'other_pricelist' => $request->other_pricelist,
                'round_of_to' => $request->round_of_to,
                'extra_fee' => $request->extra_fee,
                'fixed_price' => $request->fixed_price,
                'min_oty' => $request->min_qty,
                'strat_date' => $request->strat_date,
                'end_date' => $request->end_date,
            ];

            // Store the data and return the ID
             $product = price_list_pop::create($data);

            return response()->json(['id' => $product->id]);
        }  

        public function pricelist_destroy($id)
        {
            $pricelist = price_list_pop::find($id);
            if ($pricelist) {
                $pricelist->delete();
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false], 404);
        }

        public function pricelist_edit(Request $request, $id)
        {
            // Find the specific product entry by its ID
            $product = price_list_pop::findOrFail($id);

            // Data to be updated based on request input
            $data = [
                'apply_to' => $request->apply_to,
                'product_Name' => $request->product_Name,
                'category' => $request->category,
                'price_type' => $request->price_type,
                'discount' => $request->discount,
                'sale_price_name' => $request->sale_price_name,
                'based_price' => $request->based_price,
                'discount_sales' => $request->discount_sales,
                'markup' => $request->markup,
                'other_pricelist' => $request->other_pricelist,
                'round_of_to' => $request->round_of_to,
                'extra_fee' => $request->extra_fee,
                'fixed_price' => $request->fixed_price,
                'min_oty' => $request->min_oty,
                'strat_date' => $request->strat_date,
                'end_date' => $request->end_date,
            ];

            // Update the product entry with the new data
            $product->update($data);

            // Return a JSON response with the product ID on success
            return response()->json(['id' => $product->id]);
        }
        
}
