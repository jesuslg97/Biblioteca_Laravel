<?php
use App\ErrorSession;
?>
@if(Session::has(ErrorSession::SUCCESS_COD))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close"  data-dismiss="alert" arial-label="Close">
                        <span aria-hidden="true"></span></button>
                        <strong>{{__('alerts.successful_message')}}</strong>
                        {{Session::get(ErrorSession::SUCCESS_COD)}}
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has(ErrorSession::INFO_COD))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close"  data-dismiss="alert" arial-label="Close">
                        <span aria-hidden="true"></span></button>
                        <strong>{{__('alerts.info_message')}}</strong>
                        {{Session::get(ErrorSession::INFO_COD)}}
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has(ErrorSession::WARNING_COD))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close"  data-dismiss="alert" arial-label="Close">
                        <span aria-hidden="true"></span></button>
                        <strong>{{__('alerts.warning_message')}}</strong>
                        {{Session::get(ErrorSession::WARNING_COD)}}
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has(ErrorSession::DANGER_COD))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close"  data-dismiss="alert" arial-label="Close">
                        <span aria-hidden="true"></span></button>
                        <strong>{{__('alerts.danger_message')}}</strong>
                        {{Session::get(ErrorSession::DANGER_COD)}}
                </div>
            </div>
        </div>
    </div>
@endif



