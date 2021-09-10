@extends('layouts.app')

@section('content')
    <div class="w-full max-w-xs">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action='/update/{{$item->id }}'>
    @csrf
    @method('put')
    <input name="id" value="{{$item->id}}" type="hidden"/>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
        Text
      </label>
      <input value="{{ $item->text}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="text" name="text" type="text" placeholder="Enter text">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Body
      </label>
      <input value="{{ $item->body}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="body" name="body" type="text" placeholder="Enter body">
    </div>
    <div class="flex items-center justify-between">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Upload
      </button>
    </div>
  </form>
 </div> 
   
@endsection
