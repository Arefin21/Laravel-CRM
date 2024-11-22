@extends('layouts.subadmin')
@section('title')
    <title>Edit Lead | CRM</title>
@endsection
@section('main')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Lead</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('subadmin.leads.update', $lead->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- This is to specify the update request -->
                        
                        <div class="form-row">
                            <!-- Name Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="name">Name <span class="requierd-star">*</span></label>
                                <input type="text" id="name" class="form-control" required name="name" value="{{ old('name', $lead->name) }}" placeholder="Enter name">
                            </div>
                
                            <!-- Phone Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="phone">Phone <span class="requierd-star">*</span></label>
                                <input type="text" id="phone" class="form-control" required name="phone" value="{{ old('phone', $lead->phone) }}" placeholder="Enter phone">
                            </div>
                
                            <!-- Email Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="email">Email <span class="requierd-star">*</span></label>
                                <input type="email" id="email" class="form-control" required name="email" value="{{ old('email', $lead->email) }}" placeholder="Enter email">
                            </div>
                        </div>
                
                        <div class="form-row">
                            <!-- Location Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="location">Location</label>
                                <input type="text" id="location" class="form-control" name="location" value="{{ old('location', $lead->location) }}" placeholder="Enter location">
                            </div>
                
                            <!-- Company Name Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="company_name">Company Name</label>
                                <input type="text" id="company_name" class="form-control" name="company_name" value="{{ old('company_name', $lead->company_name) }}" placeholder="Enter company name">
                            </div>
                
                            <!-- Designation Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="designation">Designation</label>
                                <input type="text" id="designation" class="form-control" name="designation" value="{{ old('designation', $lead->designation) }}" placeholder="Enter designation">
                            </div>
                        </div>
                
                        <div class="form-row">
                            <!-- Service Field -->
                            {{-- <div class="col-md-4 mb-6">
                                <label for="service">Service He Wants</label>
                                <select class="form-control" id="service" required name="service">
                                    <option value="">Select a Service</option>
                                    @foreach(\App\Models\Warehosue::all() as $service)
                                        <option value="{{ $service->id }}" {{ $lead->service_id == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}

                                        <div class="col-md-4 mb-6">
                                            <label for="validationServer013">Warehouse</label>
                                            <select class="form-control" id="paymentType" required="" name="service">
                                                <option value="{{ $lead->service }}">{{ $lead->service ? \App\Models\Warehouse::find($lead->service)->name : 'Select a Warehouse' }}</option>
                                                @foreach(\App\Models\Warehouse::pluck('name', 'id') as $id => $name)
                                                    <option value="{{ $id }}" {{ $lead->warehouse == $id ? 'selected' : '' }}>{{ $name }}</option>
                                                @endforeach
                                            </select>

                                        </div> 

                                        

                
                            <!-- Assign For Field -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="assign_for">Assign For</label>
                                <select id="assign_for" class="form-control" name="assign_for">
                                    <option value="">Select a person</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $lead->assign_for == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <!-- Comments Field -->
                        <div class="form-group">
                            <label for="comments">Comments</label>
                            <textarea id="comments" class="form-control" name="comments" rows="4" placeholder="Enter comments">{{ old('comments', $lead->comments) }}</textarea>
                        </div>
                
                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
