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
use Illuminate\Http\Request;

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

    public function product_index()
    {
        return view('Sale.productindex');
    
    }

    public function product_create(Request $request)
    {
        $taxes = sales_taxes::select('id','tax_name')->get();
        $purchase_tax = purchase_taxes::select('id','tax_name')->get();
        $categorie = product_categories::select('id', 'categories_name')->get();
        $data = products_new_items::find('id','product_name');
        $invoice = invoicing_policies::select('id','invoice_name')->get();
        $users = User::orderBy('id', 'DESC')->get();
        $tags = Tag::where('tage_type', 4)->get();
        if ($data && isset($data->product_name)) {
            $count = products_new_items::where('product_name', $data->product_name)->count();
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
        
        return view('Sale.productnew', compact('taxes', 'purchase_tax','categorie','data', 'users', 'invoice','tags'));
    }

     public function product_store(Request $request)
    {

        //  dd($request->all());
         $existingproduct = products_new_items::find($request->product_id);

         // Determine if sales_person has changed
         $productPersonChanged = $existingproduct && $existingproduct->product_id !== $request->product_id;

         // Update or create the lead
         $product = products_new_items::updateOrCreate(
             ['id' => $request->product_id],
            [
                'product_name' => $request->name_0,
                'product_image' => $request->product_image_0,
                'product_type' => $request->product_type_0,
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
                'res_des' =>$request->res_des_0,
                'del_des' => $request->del_des_0,
                'income_ac' => $request->income_ac_0,
                'expense_ac' => $request->expense_ac_0,
                'tag_id' => $request->has('tag_ids_1') && $request->tag_ids_1 !== null ? implode(',', $request->tag_ids_1) : null,

            ]
        );

        // Log changes
        $action = $request->id ? 'updated' : 'created';
        $message = $action === 'updated' ? 'Product updated successfully' : 'Product created successfully';

        // Fetch the original data if it's an update
        if ($request->id) {
            $originalData = products_new_items::find($request->lead_id)->getOriginal();
            $changes = [];

            // Define the fields you want to check for changes
            $fields = ['product_name' ,'product_image' ,'product_type' ,'track_inventory' ,'create on order' , 'invoicing_policy' ,'plan_servies','sales_price' ,
                        'cost_price' ,'reference' ,'barcode' ,'hsn_sac_code' ,'internal_note' ,'optional_product' ,'sales_des' ,'manufacture' ,
                        'weight' ,'volume' ,'customer_lead_time' ,'res_des' ,'del_des' ,'income_ac' ,'expense_ac' ,];

            // Iterate over fields to check for changes
            foreach ($fields as $field) {
                if (isset($originalData[$field]) && $originalData[$field] != $lead->$field) {
                    $changes[$field] = [
                        'old' => $originalData[$field] ?? 'None',
                        'new' => $lead->$field ?? 'None'
                    ];
                }
            }

            // Create message only if there are changes
            if (!empty($changes)) {
                $message .= '. Changes: ' . json_encode($changes, JSON_PRETTY_PRINT);
            }
        }

        //Log::info($message, ['product_id' => $product->id, 'data' => $product->toArray()]);

        return response()->json(['message' => $message]);
    }

    public function Pricelists_index()
    {
        return view('Sale.pricelistsindex');
    }

    public function Pricelists_create()
    {
        return view('Sale.Pricelistsnew');
    }
}
