@extends('admin.layouts.app')

@section('title', 'View Jobs | Awani Enterprises')


@section('style')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


@endsection

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Jobs</li>
                <li class="breadcrumb-item active">View Job Status</li>
                
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
    
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pending Job Details</h5>
                  {{-- <h5 class="card-title"><a href="{{url("admin/employee/generate-pdf")}}" target="_blank" > click me to pdf </a></h5> --}}
                  
                  <!-- Table with stripped rows -->
                  <table class="table display" id="example" style="font-size: 12px;">
                    <thead >
                      <tr >
                        <th scope="col" >#</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Name</th>
                        <th scope="col">Job No.</th>
                        <th scope="col">Device</th>
                        <th scope="col">Brand</th>
                        <th scope="col">S/N</th>
                        <th scope="col">Defect</th>
                        <th scope="col">Estimate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Print</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecords as $items)
                        <tr>
                            <td>{{ $items->id }}</td>
                            <td>{{ $items->mobile }}</td>
                            <td>{{ $items->customer }}</td>
                            <td>{{ $items->job_no }}</td>
                            <td>{{ $items->device_type }}</td>
                            <td>{{ $items->	brand }}</td>
                            <td>{{ $items->	imei_1 }}</td>
                            <td>{{ $items->defect }}</td>
                            <td>{{ $items->estimate }}</td>
                            <td>
                              <a href="" class=" btn btn-sm btn-{{$items->status ? 'danger' : 'success'}}">
                                {{$items->status ? 'delivered' : 'Pending'}}
                            </a>
                            </td>
                            <td>
                              <a href="{{url('/admin/pdf')}}/{{ $items->id }}" class="btn btn-sm btn-primary">Print </a>
                            </td>
                            
                          </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
    
                </div>
              </div>
    
            </div>
          </div>
        
    @endsection

    @section('script')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    
    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
        ],
        "pageLength": 50,

        "aaSorting": [ [9,'asc'], [0,'desc'] ],
    } );
} );
    </script>
    @endsection
