@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Dashboard</h1>

    </section>
    <div class="content">
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-spinner"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Active Tasks</span>
                            <span class="info-box-number">{!! $active !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Overdue Tasks</span>
                            <span class="info-box-number">{!! $overDue !!}</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-check-circle "></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Completed Tasks</span>
                            <span class="info-box-number">{!! $completed !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-code-fork"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Projects</span>
                            <span class="info-box-number">{!! $projects !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

