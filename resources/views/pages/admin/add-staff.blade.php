@extends('layouts.template.admin.appadmin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">


                <!-- right column -->
                <div class="col-md-12">

                    <!-- general form elements disabled -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Custom Elements</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Quick Example</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form role="form">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Custom Select</label>
                                                        <select class="custom-select">
                                                            <option>option 1</option>
                                                            <option>option 2</option>
                                                            <option>option 3</option>
                                                            <option>option 4</option>
                                                            <option>option 5</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">File input</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="">Upload</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Quick Example</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form role="form">
                                                <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this custom switch element</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3">Toggle this custom switch element with custom colors danger/success</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2">Disabled custom switch element</label>
                                            </div>
                                        </div>
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                                <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                                                <label for="customCheckbox2" class="custom-control-label">Custom Checkbox checked</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled>
                                                <label for="customCheckbox3" class="custom-control-label">Custom Checkbox disabled</label>
                                            </div>
                                        </div>
                                        <!-- radio -->
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                                <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                                                <label for="customRadio2" class="custom-control-label">Custom Radio checked</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio3" disabled>
                                                <label for="customRadio3" class="custom-control-label">Custom Radio disabled</label>
                                            </div>
                                        </div>

                                        </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>


                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
