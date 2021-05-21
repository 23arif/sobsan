@extends('layouts.dizayn')
@section('content')
<!-- Title -->
    <title>Lucky | {{__('esas.qeydiyyat')}}</title>
    <section id="register" class="signup">
        <div class="row">
            @if(isset($message))
                            <div class="col-12">
                                <div class="alert text-center" style="background-color: #fc8410;color: #fff">{{ $message }}</div>
                            </div>
                        @endif
            
            
            

            
        </div>
    </section>
@endsection
