<?php

namespace App\Http\Controllers;

use Exception;
use Facade\FlareClient\Stacktrace\File;
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
        $string = file_get_contents('data.json');
        $productdata = json_decode($string, true);

        $bookdata = [];
        $cddata = [];
        foreach ($productdata as $data) {
            if ($data['producttype'] == 'book') {
                array_push($bookdata, $data);
            } elseif ($data['producttype'] == 'cd') {

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
        $string = file_get_contents('data.json');

        $productdata = json_decode($string, true);

        $newProduct = [];
        $newProduct['id'] = $request->id;
        $newProduct['producttype'] = $request->producttype;
        $newProduct['title'] = $request->title;
        $newProduct['firstname'] = $request->firstname;
        $newProduct['surname'] = $request->surname;
        $newProduct['price'] = $request->price;
        $newProduct['pages'] = $request->pages;

        array_push($productdata, $newProduct);

        $json = json_encode($productdata);
        file_put_contents('data.json', $json);
        return redirect('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $string = file_get_contents('data.json');
        $productdata = json_decode($string, true);
        $data = [];
        foreach ($productdata as $d) {
            if ($d['id'] == $id) {
                array_push($data, $d);
            }
        }
        return view('show', compact('data'));
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

        $string = file_get_contents('data.json');
        $productdata = json_decode($string, true);
        $newdata = [];

        foreach ($productdata as $d) {
            if ($d['id'] == $id) {
                $inputData = $request->only(['id', 'producttype', 'title', 'firstname', 'surname', 'price', 'pages']);
                $d = $inputData;
            }
            array_push($newdata, $d);
        }
        $json = json_encode($newdata);
        file_put_contents('data.json', $json);
        return redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $string = file_get_contents('data.json');
        $productdata = json_decode($string, true);
        $newdata = [];

        foreach ($productdata as $d) {
            if ($d['id'] != $id) {
                array_push($newdata, $d);
            }
        }
        $json = json_encode($newdata);
        file_put_contents('data.json', $json);
        return redirect('index');
    }
}
