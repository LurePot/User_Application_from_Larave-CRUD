<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" type="image/x-icon" href="{{ url('img/favicon.ico') }}">
        <title>Dashboard - AAG</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ url('css/astyles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                {{-- nav --}}
                @include('inc.nav')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Applicant Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Application Status</li>
                        </ol>
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website {{ date('Y') }}</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="{{ url('js/ascripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ url('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ url('assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ url('js/datatables-simple-demo.js') }}"></script>
        <script>
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 2000);
            // =========

            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });


            $(document).ready(function() {
                $('#dataTable').DataTable();
            });

            $(document).ready(function() {
                function createselect(ob) {
                    $("#district_id").html("");
                    let html = "";
                    for (const key in ob) {
                        if (Object.hasOwnProperty.call(ob, key)) {
                            // const element = ob[key];
                            html += `<option value="${key}">${ob[key]}</option>`;
                        }
                    }
                    $("#district_id").html(html);
                }
                $("#division_id").change(function() {
                    let URL = "{{ url('get-districts') }}";
                    $.ajax({
                        type: "GET",
                        url: URL + "/" + $(this).val(),
                        data: "data",
                        dataType: "json",
                        success: function(response) {
                            createselect(response);
                        }
                    });
                });

                function createupazila(ob) {
                    $("#upozila_id").html("");
                    let html = "";
                    for (const key in ob) {
                        if (Object.hasOwnProperty.call(ob, key)) {
                            // const element = ob[key];
                            html += `<option value="${key}">${ob[key]}</option>`;
                        }
                    }
                    $("#upozila_id").html(html);
                }
                $("#district_id").change(function() {
                    let URL = "{{ url('get-upozilas') }}";
                    $.ajax({
                        type: "GET",
                        url: URL + "/" + $(this).val(),
                        data: "data",
                        dataType: "json",
                        success: function(response) {
                            createupazila(response);
                        }
                    });
                });
            });

            // add more button
            $(document).ready(function() {
                var i = 1;
                $("#addMoreButton").click(function() {
                    i++;
                    $("#addMore").append(`
                    <div class="form-group row mb-3" id="row${i}">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            {!! Form::select(
                                'exam[]',
                                [
                                    'SSC' => 'SSC',
                                    'HSC' => 'HSC',
                                    'BA' => 'Honours',
                                    'MA' => 'Masters',
                                ],
                                null,
                                ['required', 'class' => 'form-control exam', 'placeholder' => 'Select'],
                            ) !!}
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            {!! Form::select(
                                'board[]',
                                [
                                    'DU' => 'Dhaka University',
                                    'RU' => 'Rajshahi University',
                                    'KU' => 'Khulna University',
                                    'CU' => 'Chittagong University',
                                    'DHAK' => 'Dhaka Board',
                                    'KHU' => 'Khulna Board',
                                    'BAR' => 'Barisal Board',
                                    'MAD' => 'Madrasah Board',
                                ],
                                null,
                                ['required', 'class' => 'form-control university', 'placeholder' => 'Select'],
                            ) !!}   
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            {!! Form::select(
                                'year[]',
                                [
                                    '2022' => '2022',
                                    '2021' => '2021',
                                    '2020' => '2020',
                                    '2019' => '2019',
                                    '2018' => '2018',
                                    '2017' => '2017',
                                    '2016' => '2016',
                                    '2015' => '2015',
                                ],
                                null,
                                ['required', 'class' => 'form-control board', 'placeholder' => 'Select'],
                            ) !!}   
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            {!! Form::text('cgpa[]', null, ['required', 'class' => 'form-control', 'placeholder' => 'CGPA']) !!}
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-sm btn-danger remove" id="${i}">- Remove</button>
                        </div>
                    </div>
                `);
                });
                $(document).on('click', '.remove', function() {
                    var button_id = $(this).attr("id");
                    $("#row" + button_id + "").remove();
                });
            });
            // yes button click
            $(document).ready(function() {
                $("#training").hide();
                $(".training2").show();
                $("#yes").click(function() {
                    $("#training").show();
                });
                $("#no").click(function() {
                    $("#training").hide();
                    
                });
            });
            // add more training
            $(document).ready(function() {
                var i = 1;
                $("#addMoreTraining").click(function() {
                    i++;
                    $("#addTraining").append(`
                    <div class="form-group row mb-3" id="row${i}">
                        <div class="col-sm-5 mb-3 mb-sm-0">
                        {!! Form::text('tname[]', null, ['class' => 'form-control', 'placeholder' => 'Training Name', 'id' => 'tdetail']) !!}
                    </div>
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        {!! Form::text('tdetail[]', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Training Details', 'id' => 'tdetail'
                        ]) !!}
                    </div>
                        <div class="col-sm-2">
                            <button class="btn btn-sm btn-danger remove" id="${i}">- Remove</button>
                        </div>
                    </div>
                `);
                });
                $(document).on('click', '.remove', function() {
                    var button_id = $(this).attr("id");
                    $("#row" + button_id + "").remove();
                });
            });

            // education qualification table value insert into database
            // $(document).ready(function() {
            //     $("#btn-add").click(function() {

            //         $.ajax({
            //             url: "{{ url('applicant') }}",
            //             type: "POST",
            //             data: {
            //                 name: $("#name").val(),
            //                 email: $("#email").val(),
            //                 division: $("#division_id").val(),
            //                 district: $("#district_id").val(),
            //                 upozila: $("#upozila_id").val(),
            //                 address: $("#address").val(),
            //                 language: $("#language").val(),
            //                 photo : $("#photo").val(),
            //                 cv : $("#cv").val(),

            //             },
            //             success: function(response) {
            //                 console.log(response);
            //                 location.reload();
            //             },
            //             error: function(response) {
            //                 console.log(response);
            //             }
            //         });
            //     });
            // });

            // save data

            // $(document).on('click', '#btn-add', function(e) {
            //     if ($('#name').val() == '' || $('#email').val() == '') {
            //         alert('Required field is empty!');
            //     } else {
            //         var data = $("#pinfo").serialize();
            //         $.ajax({
            //             data: data,
            //             type: "post",
            //             url: "{{ url('applicant') }}",
            //             success: function(dataResult) {
            //                 var dataResult = JSON.parse(dataResult);
            //                 if (dataResult.statusCode == 200) {
            //                     // $('#addEmployeeModal').modal('hide');
            //                     alert('Data added successfully !');
            //                     location.reload();
            //                 } else if (dataResult.statusCode == 201) {
            //                     alert(dataResult);
            //                 }
            //             }
            //         });
            //     }
            // });
        </script>

        @yield('script')

    </body>

    </html>

</x-app-layout>
