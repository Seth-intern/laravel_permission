@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-2" style="margin-top: 20px;">
                <div class="alert alert-info">
                    <h2 style="text-align: center">Posts</h2>
                    <br>
                    <div class="alert alert-dark">
                        <h3>User : {{ auth()->user()->name }}</h3>
                        <br>

                        <a href="{{ route('user.logout') }}">Logout</a>
                    </div>
                </div>
                @if(empty($datas))
                    No data
                @else

                    {{--Use role--}}
                    {{--@role('admin')--}}
                        {{--<a href="#">New</a>--}}
                    {{--@endrole--}}

                {{--Use permission--}}
                @if(auth()->user()->can('write post'))
                    <a href="{{ route('article.create') }}">New</a>
                    @endif
                    <ul>
                        @foreach($datas as $data)
                            <li class="">
                                <h5 class="">{{ $data->title }}
                                    @if(auth()->user()->can('edit post'))
                                        <a href="{{ route('article.edit', $data->id) }}">Edit</a></h5>
                                    @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    @endsection