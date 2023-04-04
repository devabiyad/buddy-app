@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    <div class="col-md-6">
                        <h6>Category List</h6>
                        <ul id="tree1">
                            @foreach($categories as $category)
                                <li>
                                    {{ $category->title }}
                                    @if(count($category->childs))
                                        @include('admin.child_categories',['childs' => $category->childs])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
