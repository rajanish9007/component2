<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productdata = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];
        // $bookdata = $productdata::where('producttype', 'book')->get();
        $bookdata = [];
        $cddata = [];
        foreach ($productdata as $data) {
            if ($data->producttype == 'book') {
                array_push($bookdata, $data);
            } elseif ($data->producttype == 'cd') {
                array_push($cddata, $data);
            }
        }
        return view('index', compact('bookdata', 'cddata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // my data storage location is project_root/storage/app/data.json file.
            $contactInfo = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];

            $inputData = $request->only(['producttype', 'title', 'firstname', 'surname', 'price', 'pages']);

            // $inputData['datetime_submitted'] = date('Y-m-d H:i:s');

            array_push($contactInfo, $inputData);

            Storage::disk('local')->put('data.json', json_encode($contactInfo));

            return redirect('index');
        } catch (Exception $e) {

            return ['error' => true, 'message' => $e->getMessage()];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
