@extends('layouts.supportadmin')
@section('title')
    <title>Lead Add | CRM</title>
@endsection
@section('main')


<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Lead Form</h4>
                    <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                    <form action="{{ route('support.leads.store') }}" method="POST">
                        @csrf
                
                        <div class="form-row">
                            <!-- Name Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="name">Name <span class="requierd-star">*</span></label>
                                <input type="text" id="name" class="form-control" required name="name" placeholder="Enter name">
                            </div>
                
                            <!-- Phone Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="phone">Phone <span class="requierd-star">*</span></label>
                                <input type="text" id="phone" class="form-control" required name="phone" placeholder="Enter phone">
                            </div>
                
                            <!-- Email Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="email">Email <span class="requierd-star">*</span></label>
                                <input type="email" id="email" class="form-control" required name="email" placeholder="Enter email">
                            </div>
                        </div>
                
                        <div class="form-row">
                            <!-- Location Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="location">Location</label>
                                <input type="text" id="location" class="form-control" name="location" placeholder="Enter location">
                            </div>
                
                            <!-- Company Name Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="company_name">Company Name</label>
                                <input type="text" id="company_name" class="form-control" name="company_name" placeholder="Enter company name">
                            </div>
                
                            <!-- Designation Field -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="designation">Designation</label>
                                <input type="text" id="designation" class="form-control" name="designation" placeholder="Enter designation">
                            </div>
                        </div>
                
                        <div class="form-row">
                            <!-- Service Field -->
                            {{-- <div class="form-group col-md-6 mb-3">
                                <label for="service">Service He Wants</label>
                                <select id="service" class="form-control" name="service">
                                    <option value="">Select a service</option>
                                    {{-- @foreach($services as $service) --}}
                                    {{-- <option value="Service 1">Service 1</option>
                                    <option value="Service 2">Service 2</option>
                                    {{-- @endforeach --}}
                                {{-- </select>
                            </div> --}} 

                               <div class="col-md-4 mb-6">
                                        <label for="validationServer013">Service He Wants</label>
                                        <select class="form-control" id="paymentType" required="" name="service">
                                            <option value="">Select a Service</option>
                                            @foreach(\App\Models\Warehouse::all() as $warehouse)
                                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                <!-- Assign For Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="assign_for">Assign For</label>
                    <select id="assign_for" class="form-control" name="assign_for">
                        <option value="">Select a person</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                    </select>
                </div>
                
                            <!-- Assign For Field -->
                            {{-- <div class="form-group col-md-6 mb-3">
                                <label for="assign_for">Assign For</label>
                                <select id="assign_for" class="form-control" name="assign_for">
                                    <option value="">Select a person</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                </select>
                            </div> --}}
                        </div>
                
                        <!-- Comments Field -->
                        <div class="form-group">
                            <label for="comments">Comments</label>
                            <textarea id="comments" class="form-control" name="comments" rows="4" placeholder="Enter comments"></textarea>
                        </div>
                
                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</div>

@endsection
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lead</title>
</head>
<body>
    <h1>Create a New Lead</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('leads.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>
        
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        
        <label>Email:</label>
        <input type="email" name="email"><br>
        
        <label>Location:</label>
        <input type="text" name="location"><br>
        
        <label>Company Name:</label>
        <input type="text" name="company_name"><br>
        
        <label>Designation:</label>
        <input type="text" name="designation"><br>
        
        <label>Service He Wants:</label>
        <select name="service">
            <option value="">Select a service</option>
            @foreach($services as $service)
                <option value="{{ $service }}">{{ $service }}</option>
            @endforeach
        </select><br>
        
        <label>Comments:</label>
        <textarea name="comments"></textarea><br>
        
        <label>Assign For:</label>
        <select name="assign_for">
            <option value="">Select a person</option>
            @foreach($assignFor as $assignee)
                <option value="{{ $assignee }}">{{ $assignee }}</option>
            @endforeach
        </select><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html> --}}
