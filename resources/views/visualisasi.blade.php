@extends('layouts.app')
@section('title', 'Visualisasi Tree')
@section('description', '')
@section('keywords', '')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Visualisasi Tree</h5>
            <ul>
                @each('item', App\Models\Family::where('family_id', null)->get(), 'item')
            </ul>
        </div>
    </div>
@endsection

@section('script')
@endsection

@section('custom-scripts')
@endsection
