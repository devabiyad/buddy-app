@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                    {{ __('Add Category') }}
                    <a type="button" href="{{route('admin.category.index')}}" class="btn btn-sm btn-secondary float-right add">
                        Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            <select class="form-control form-control-sm" name="parent_id">
                                <option value="">Select parent category</option>
                                @foreach ($categories as $category)
                                    <option value={{$category->id}} {{$category->id == old('parent_id') ? 'selected' : ''}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control form-control-sm">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
