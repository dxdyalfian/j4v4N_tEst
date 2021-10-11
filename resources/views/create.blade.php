@extends('layouts.app')
@section('title', 'Add Data Keluarga Budi')
@section('description', '')
@section('keywords', '')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Add New Data</h5>
            @include('components.flash-messages')
            <form action="{{ route('family.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="fname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fname" placeholder="Name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 text-center">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection

@section('custom-scripts')
@endsection
