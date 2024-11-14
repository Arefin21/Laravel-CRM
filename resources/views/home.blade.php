@extends('Member.Member_master')
@section('title')
    <title>Subscriber Registration Form | Nurjahan Bazar</title>
@endsection




@if(auth()->user()->is_admin == 1)
    <script>window.location = "{{ route('admin.home') }}";</script>
@elseif(auth()->user()->is_admin == 2)
    <script>window.location = "{{ route('subadmin.home') }}";</script>
@endif




