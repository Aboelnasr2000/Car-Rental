@extends('admin.layouts.master')

@section('content')

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="uses/Logo.png" style="height:35px; border-right:1px solid #333333;"
        class="pe-sm-3">

</div>

<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            @php($no_users = $users->count())
                            <div class="state">
                                <h6>Users</h6>
                                <h2>{{$no_users}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-award"></i>
                            </div>
                        </div>

                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                            aria-valuemax="100" style="width: 62%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                @php($no_cars = $cars->count())
                                <h6>Cars</h6>
                                <h2>{{$no_cars}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-thumbs-up"></i>
                            </div>
                        </div>

                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0"
                            aria-valuemax="100" style="width: 78%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                @php($no_offices = $offices->count())
                                <h6>Offices</h6>
                                <h2>{{$no_offices}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-calendar"></i>
                            </div>
                        </div>

                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0"
                            aria-valuemax="100" style="width: 31%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                @php($no_rentals = $rentals->count())
                                <h6>Rentals</h6>
                                <h2>{{$no_rentals}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-message-square"></i>
                            </div>
                        </div>

                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <h3 class="card-title">Cars Available</h3>
                                <div id="visitfromworld" style="width:100%; height:350px"></div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="row mb-15">
                                    <div class="col-9">BMW</div>
                                    <div class="col-3 text-right">30%</div>
                                    <div class="col-12">
                                        <div class="progress progress-sm mt-5">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 48%"
                                                aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-15">
                                    <div class="col-9"> Mercedes</div>
                                    <div class="col-3 text-right">40%</div>
                                    <div class="col-12">
                                        <div class="progress progress-sm mt-5">
                                            <div class="progress-bar bg-aqua" role="progressbar" style="width: 33%"
                                                aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-15">
                                    <div class="col-9"> Renault</div>
                                    <div class="col-3 text-right">20%</div>
                                    <div class="col-12">
                                        <div class="progress progress-sm mt-5">
                                            <div class="progress-bar bg-purple" role="progressbar" style="width: 40%"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">Other</div>
                                    <div class="col-3 text-right">10%</div>
                                    <div class="col-12">
                                        <div class="progress progress-sm mt-5">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection