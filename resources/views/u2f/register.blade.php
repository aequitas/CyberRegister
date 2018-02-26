@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:30px">
    <div class="col-lg-12">
        <div class="login-panel card">
            <div class="card-header">
                <h1 class="card-title">{{ trans('u2f::messages.register.title') }}</h1>
            </div>
            <div class="card-body" style="padding: 5px">
                <div class="alert alert-danger" role="alert" id="error" style="display: none"></div>
                <div class="alert alert-success" role="alert" id="success" style="display: none">{{ trans('u2f::messages.success') }}</div>
                <div align="center">
                    <img src="https://ssl.gstatic.com/accounts/strongauth/Challenge_2SV-Gnubby_graphic.png"
                         alt="">
                </div>
                <h3>

                    {{ trans('u2f::messages.insertKey') }}

                </h3>
                <p>{{ trans('u2f::messages.buttonAdvise') }}
                    <br>{{ trans('u2f::messages.noButtonAdvise') }}</p>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('u2f.register') }}" id="from">
    @csrf
    <input type="hidden" name="register" id="register" value="" />
</form>
@endsection

@section('script')
<script type="text/javascript">
    var sigs = {!! json_encode($currentKeys) !!};
    var req = {!! json_encode($registerData) !!};

    var errors = {
        1: "{{ trans('u2f::errors.other_error') }}",
        2: "{{ trans('u2f::errors.bad_request') }}",
        3: "{{ trans('u2f::errors.configuration_unsupported') }}",
        4: "{{ trans('u2f::errors.device_ineligible') }}",
        5: "{{ trans('u2f::errors.timeout') }}"
    };

    u2fClient.register(req, sigs, errors);
</script>
@endsection

