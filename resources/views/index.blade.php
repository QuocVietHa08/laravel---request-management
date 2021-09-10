@extends('layouts.app')

@section('content')
@if(count($items)>0)
@foreach($items as $item)
    <a href="request/detail/{{$item->id}}" class="cursor-pointer">
        <div class="flex bg-gray-200 border relative mb-5 p-5 rounded">
                <div>
                 <div class="mr-2">{{ $item->text}}</div>
                 <div>{{ $item->body}}</div>
             </div>
             <div class="absolute right-10 ">
              <div>{{ $item->created_at}} </div>
              <form method="post" action="/{{ $item->id }}">
                  @csrf
                  @method('Delete')
                  <button class="bg-red-300 p-2 rounded" type="submit">Delete</button>
              </form>
             </div>
        </div>
    </a>
@endforeach
@else
<div> There is no items here</div>
@endif
@endsection
