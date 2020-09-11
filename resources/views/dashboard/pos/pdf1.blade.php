@extends('layouts.dashboard.app')
@section('title' , " عرض الطلبات ")

@section('content')

<div class="upload-images-page">
        <div class="container-fluid">
            <div class="row justify-content-md-center ">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="row">
                        <div class="col col-lg-12 col-sm-12 col-12">
                            <div class="main-title">
                                <h3> السادة :  {{ $user->name }} </h3>
                                <p class="text-center"> 
                               
                                Nour.Net شبكة

                                </p>
                                <p >
                                بناء على رغبة حضرتكم 
                                <br/>
                                يسرنا التقدم بعرض اسعار الاكواب من المصنع العربى للمنتجات الورقية حسب رغبتكم قيما يلى 
                                </p>
                                <br/>
                            </div>
                            <div class="add-form">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label> Package Name </label>
                                            <input type="text" class="form-control" placeholder=" Package Name ">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Price </label>
                                            <input type="number" class="form-control" placeholder=" 6000 " value=" ">
                                            <span class="sp-in"> SAR </span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> From KM counter </label>
                                            <input type="number" class="form-control" placeholder=" 600 " value=" ">
                                            <span class="sp-in"> KM </span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> To KM counter </label>
                                            <input type="number" class="form-control" placeholder=" 1600 " value=" ">
                                            <span class="sp-in"> SAR </span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Renew Every </label>
                                            <input type="number" class="form-control" placeholder=" 2 " value=" ">
                                            <span class="sp-in"> Month </span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Status </label>
                                            <select class="form-control">
                                                <option selected> Active </option>
                                                <option> InActive </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 f--ul vec-no package-ser">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label> Service Name </label>
                                                    <ul class="package-ser-li">
                                                        <li class="list-inline-item col-md-10"> 
                                                            <input type="text" class="form-control" placeholder=" Service Name " value="" id="servName"> 
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="serv-name"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-btn-form">
                                        <button type="submit" class="btn btn-primary mb-2"> طباعة </button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- // col -->
                    </div><!-- row 2 -->
                </div>

            </div><!-- // row -->
            
        </div><!-- // container -->
    </div>
               

@endsection