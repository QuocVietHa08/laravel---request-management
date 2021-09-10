<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://itemapi.stg/api/items');
        $items = json_decode($response->getBody()->getContents());
        return view('index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $urlStore = 'http://itemapi.stg/api/items?text='.$request->text.'&body='.$request->body;
        $this->validate($request,[
            'text'=>'required',
            'body'=> 'required',
        ]);
        $client = new Client();
        $response = $client->post($urlStore);

         $contents = json_decode($response->getBody()->getContents());

       $successful = $contents->success;
       if($successful)
       {
       return redirect('/')->with('success','Insert item successful');
       }
       else {
            return redirect()->to('/')->with('fail','Insert item unsuccessful');
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
        // return 123;
        $urlRequest = 'http://itemapi.stg/api/items/' . $id;
        $client = new Client();
        $response = $client->get($urlRequest);
        $item =  json_decode($response->getBody()->getContents());

        return view('detail')->with('item',$item);
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
        // $validator = Validator::make($request->all(), [
        //     'text' => 'required',
        //     'body' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return ['response'=> $validator->messages(), 'success'=> false];
        // }
        $urlPut = 'items/' .$id.'?text='.$request->text.'&body='.$request->body;
        $client = new Client(['base_uri' => 'http://itemapi.stg/api/items']);
        $response = $client->request('PUT', $urlPut);
        $contents = json_decode($response->getBody()->getContents());

       $successful = $contents->success;
       if($successful)
       {
       return redirect('/')->with('success','Update item successful');
       }
       else {
            return redirect()->to('/')->with('fail','Update item unsuccessful');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $client = new Client(); 
       // $response = $client()->post('http://itemapi.stg/api/items/'.$id.'?_method=Delete');

       // $contents = json_decode($response->getBody()->getContents());

       // $successful = $contents->success;
       // if($successful)
       // {
       // return redirect('/')->with('success','Delete item successful');
       // }
       // else {
       //      return redirect()->to('/')->with('fail','Delete item unsuccessful');
       // }
        $urlDelete = 'items/'.$id;
        $client = new Client(['base_uri' => 'http://itemapi.stg/api/items']);
        $response = $client->request('DELETE', $urlDelete);
        $contents = json_decode($response->getBody()->getContents());
       $successful = $contents->success;
       if($successful)
       {
       return redirect('/')->with('success','Delete item successful');
       }
       else {
            return redirect()->to('/')->with('fail','Delete item unsuccessful');
       }
    }
}
