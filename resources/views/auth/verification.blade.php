@extends('layouts.site')

@section('content')

    <div class="container no-index">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="main">
                    <div class="page-header">
                        <h1 class="page-title">
                           please Enter the code we sent to your mobile
                        </h1>
                    </div>
                    <section id="content" class="page-content">
                        <section class="login-form">
                            <form method="POST" action="{{route('verify-user')}}">
                                @csrf
                                <section>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            Verification Code :
                                        </label>
                                        <div class="col-md-6">

                                            <input class="form-control" name="code" value=""
                                                   type="text" required="">
                                            @error('code')
                                            <span  class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>

                                </section>
                                <footer class="form-footer clearfix">
                                    <div class="row no-gutters">
                                        <div class="col-md-10 offset-md-2">
                                            <input type="hidden" name="submitLogin" value="1">
                                            <button class="btn btn-primary" data-link-action="sign-in" type="submit"
                                                    class="form-control-submit">
                                               Confirm
                                            </button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>

                    </section>
                    <footer class="page-footer">
                        <!-- Footer content -->
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <br>
@stop
