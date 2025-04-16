@extends('branch.layouts.app', ['title' => 'Branch Dashboard'])
@section('content')
<form method="POST" action="{{ route('branches.logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
@endsection