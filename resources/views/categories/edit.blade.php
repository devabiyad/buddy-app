@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                    {{ __('Edit Category') }}
                    <a type="button" href="{{route('admin.category.index')}}" class="btn btn-sm btn-secondary float-right add">
                        Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.category.update', $category->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select class="form-control form-control-sm" name="parent_id">
                            <option value="">Select parent category</option>
                            @foreach ($categories as $optionCategory)
                                <option value={{$optionCategory->id}} {{ $category->parent_id == $optionCategory->id ? 'selected' : '' }}>{{$optionCategory->title}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('parent_id'))
                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control form-control-sm" value="{{old('title', $category->title)}}">
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
