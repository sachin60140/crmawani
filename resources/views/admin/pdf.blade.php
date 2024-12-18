<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
        }

        table {
            border: 1px solid #000;
            width: 100%;
        }

        td {
            border: 1px solid #000;
            padding: 10px;
            width: 33.33%;
        }

        .div1 {
            border: 1px solid #000;
            padding: 10px;
        }

        .myImg {
            text-align: center;
        }

        .tddata {
            border: 1px solid #000;
            padding: 10px;
            width: 25%;
        }

        .sign1 {
            float: left;
        }

        .sign2 {
            float: right;
        }
    </style>
</head>

<body>

    @foreach ($getRecords as $data)
        <div class="div1">
            <div>
                <table>
                    <tr>
                        <td class="myImg">
                            {{-- <img src="{{url('assets/img/logo.jpg')}}" width="200px" > --}}
                            <img src="assets/img/logo.jpg" width="100px">

                        </td>
                        <td style="text-align: center;">
                            <div style="margin: auto; width: 50%; padding: 10px;">
                                <p>Job No.</p>
                                <p> {!! DNS1D::getBarcodeHTML($data->job_no, 'C128', 1, 30) !!} </p></br>
                                <strong>{{ $data->job_no }}</strong>
                            </div>


                        </td>
                        <td style="text-align: center">
                            <p><strong>Awani Enterprises</strong></p>
                            <p>UGF-4 & 5, Parasvanath Majestic Arcade</p>
                            <p>Vaibhav Khand, Indirapuram, Ghazaibad UP. 201014</p>
                            <p>Ph: 0120-4400217 / WhatsApp : 9871588801</p>
                        </td>
                    </tr>

                </table>
            </div>

            <div style="margin-top: 10px">
                <table>
                    <tr>
                        <td class="tddata">Job No.</td>
                        <td class="tddata"><strong>{{ $data->job_no }}</strong></td>
                        <td class="tddata">Date</td>

                        <td class="tddata"> {{ date('d-M-Y', strtotime($data->created_at)) }}</td>
                    </tr>
                    <tr>
                        <td class="tddata">Customer Name</td>
                        <td class="tddata"><strong>{{ $data->customer }}</strong></td>
                        <td class="tddata">Mobile No.</td>
                        <td class="tddata"><strong>{{ $data->mobile }}</strong></td>
                    </tr>
                    <tr>
                        <td class="tddata">Address</td>
                        <td class="tddata" colspan="3"><strong>{{ $data->address }}</strong></td>

                    </tr>
                    <tr>
                        <td class="tddata">Device Type</td>
                        <td class="tddata"><strong>{{ $data->device_type }}</strong></td>
                        <td class="tddata">Model No.</td>
                        <td class="tddata"><strong>{{ $data->brand }}</strong></td>
                    </tr>
                    <tr>
                        <td class="tddata">IMEI/Sl No.</td>
                        <td class="tddata"><strong>{{ $data->imei_1 }}</strong></td>
                        <td class="tddata">IMEI/Sl No.(2)</td>
                        <td class="tddata"><strong>{{ $data->imei_2 }}</strong></td>
                    </tr>
                    <tr>
                        <td class="tddata">Defect Reported (as per Customer)</td>
                        <td class="tddata"><strong>{{ $data->defect }}</strong></td>
                        <td class="tddata">Estimate</td>
                        <td class="tddata"><strong>{{ $data->estimate }}/-</strong></td>
                    </tr>
                    <tr>
                        <td class="tddata">Remarks</td>
                        <td class="tddata" colspan="3"><strong>{{ $data->remarks }}</strong></td>
                    </tr>
                </table>
            </div>
            <div>
                <h3>Terms & Conditions</h3>
                <hr>
            </div>
            <div>
                <ol type="1">
                    <li>The repair service encompasses diagnosis, repair, and maintenance of computer peripherals
                        including
                        but not limited to printers, scanners, and external drives.</li>
                    <li>Services will be performed by qualified technicians.</li>
                    <li>Any additional services required beyond the initial diagnosis will be communicated and approved
                        by
                        the customer before proceeding.</li>
                    <li>Service charges will be communicated upfront, inclusive of diagnosis fees.</li>
                    <li>Any additional costs incurred during the repair process will be discussed with the customer
                        before
                        implementation.</li>
                    <li>Payment is due upon completion of the repair service.</li>
                    <li>Estimated repair time will be provided upon diagnosis.</li>
                    <li>While we strive to adhere to estimated timelines, unforeseen circumstances may cause delays. We
                        will
                        communicate any delays promptly.</li>
                    <li>Repairs are covered by a 7 Days warranty from the date of completion.</li>
                    <li>The warranty covers the specific repair performed and does not extend to unrelated issues or
                        subsequent damages.</li>
                    <li>Warranty will be void if the repaired item is tampered with by anyone other than our authorized
                        technicians.</li>
                    <li>Provide accurate information regarding the issue faced by the device.</li>
                    <li>Ensure the device is accessible to technicians during the agreed-upon service hours.</li>
                    <li>Backup important data before submitting the device for repair as data loss may occur during the
                        repair process.</li>
                    <li>We are not liable for any data loss or damage to peripherals that occur during the repair
                        process.
                    </li>
                    <li>Our liability is limited to the cost of the repair service provided.</li>
                    <li>Cancellation of service must be communicated at least 1 Day before the scheduled service time.
                    </li>
                    <li>Refunds will be provided in accordance with our refund policy, which may vary depending on the
                        circumstances.</li>
                    <li>By availing of our repair services, the customer agrees to abide by these terms and conditions.
                    </li>
                    <li>Any modifications to these terms and conditions must be agreed upon in writing by both parties.
                    </li>
                    <li>These terms and conditions shall be governed by and construed in accordance with the laws of
                        Ghaziabad jurisdiction</li>
                    <li>Any disputes arising from these terms and conditions will be subject to the exclusive
                        jurisdiction
                        of the courts in Ghaziabad jurisdiction </li>

                    <li>By availing of our repair services, you acknowledge that you have read, understood, and agree to
                        these terms and conditions.</li>

                </ol>
            </div>
            <div style="margin: 100px 50px 50px 50px;">
                <div class="sign1">
                    <p>Customer Sign</p>
                </div>
                <div class="sign2">

                    <p>Sign</p>
                </div>
            </div>
            <div style="text-align: center">
                <p>This is a Computer Generated Receipt, No Signature Required</p>
            </div>
        </div>
    @endforeach
</body>

</html>
