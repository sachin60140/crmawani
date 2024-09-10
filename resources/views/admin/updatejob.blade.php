@extends('admin.layouts.app')

@section('title', 'Add Job | Awani Enterprises')


@section('style')

@endsection

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Admin</li>
            <li class="breadcrumb-item active">update Job</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div>
        @if ($errors->any())
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pending Job Details</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Job ID: </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['job_no']}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div class="col-md-3 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Job Date: </label>
                                <input class="form-control" type="text" value="{{date('d-M-Y - H:i:s', strtotime($getRecords['0']['created_at']))}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="inputName5" class="form-label">Device Type: </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['device_type']}}" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="col-md-3 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Brand : </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['brand']}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div class="col-md-4 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Serial NO 1 :</label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['imei_1']}}" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="col-md-4 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Serial NO 2 : </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['imei_2']}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div class="col-md-4 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Estimate : </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['estimate']}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div class="col-md-12 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Remarks: </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['remarks']}}" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Customer Name:</label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['customer']}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Mobile : </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['mobile']}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div class="col-md-12 col-sm-12 mb-2">
                                <label for="inputName5" class="form-label">Address : </label>
                                <input class="form-control" type="text" value="{{$getRecords['0']['address']}}, {{$getRecords['0']['city']}}" aria-label="Disabled input example" disabled readonly> 
                            </div>
                            <div>
                                <form  action="{{url('admin/updatestatus/'.$getRecords['0']['id']) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-4">
                                        <div class="col-md-6 col-sm-12 mb-2" >
                                            <label for="state" class="form-label">Status</label>
                                            <select id="job_status" class="form-select" name="job_status">
                                                @foreach ($getstatus as $item)
                                                    <option {{old('status',$getRecords['0']['status'])==$item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2" >
                                            <label for="inputName5" class="form-label">Delivary Remarks<span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="inputName5" value="{{ old('del_remarks') }} {{$getRecords['0']['delivary_remarks']}}"
                                            name="del_remarks" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12 mb-2 text-center">
                                        <button type="Update" class="btn btn-primary">Update Record</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script')
@endsection