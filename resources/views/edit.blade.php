@extends('layouts.app')
@section('title', 'Edit Data Keluarga Budi')
@section('description', '')
@section('keywords', '')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Edit Data</h5>
            @include('components.flash-messages')
            <form action="{{ route('family.update', encrypt($family->id)) }}" method="post">
                @csrf
                @method('PUT')
                @include('_form')
                <div class="form-group row">
                    <div class="col-sm-12 text-center">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Update</button>
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
