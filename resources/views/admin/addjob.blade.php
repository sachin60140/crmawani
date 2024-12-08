@extends('admin.layouts.app')

@section('title', 'Add Job | Awani Enterprises')


@section('style')

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

@endsection

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Admin</li>
                <li class="breadcrumb-item active">Add Job</li>
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Job Details Details</h5>

                <!-- Multi Columns Form -->
                <form class="row g-3" action="{{ url('admin/insert-job') }}" method="POST">
                    @csrf
                    <div class="col-md-6 col-sm-12">
                        <label for="inputState" class="form-label">Device Type</label>
                        <select id="class" class="form-select" name="device_type" autofocus>
                            <option selected value="">Choose Device...</option>
                            @foreach ($getRecord as $item)
                                <option {{ old('device_type') == $item->id ? 'selected' : '' }} value="{{ $item->type }}">
                                    {{ $item->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Brand/Model Name <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputName5" value="{{ old('model_name') }}"
                            name="model_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">S/N: / IMEI Number <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputName5" value="{{ old('imei_1') }}"
                            name="imei_1" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">S/N: / IMEI Number 2 <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputName5" value="{{ old('imei_2') }}"
                            name="imei_2">
                    </div>
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Defect Reported <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputName5" value="{{ old('defect') }}"
                            name="defect" required>
                    </div>
                    <div class="col-md-6">
                        <label for="fee" class="form-label">Estimate Amount <span style="color: red;">*</span></label>
                        <input type="fee" class="form-control" id="fee" value="{{ old('amount') }}"
                            name="amount" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">Remarks <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="inputName5" value="{{ old('remarks') }}"
                            name="remarks" required>
                    </div>

                    <div class="col-md-6">
                        <label for="fee" class="form-label">Customer Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="cab_fee" value="{{ old('name') }}"
                            name="name">
                    </div>

                    <div class="col-md-6">
                        <label for="mobile_number" class="form-label">Mobile Number <span
                                style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="inputName5" value="{{ old('mobile_number') }}"
                            name="mobile_number" maxlength="10" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Apartment, studio, or floor" value="{{ old('address') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="{{ old('city') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <select id="state" class="form-select" name="state">
                            <option value="UP" selected>Uttar Pradesh</option>
                            <option value="DELHI">Delhi</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">Pin Code</label>
                        <input type="text" class="form-control" name="pincode" value="{{ old('pincode') }}"
                            required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>
    @endsection

    @section('script')
    @endsection
