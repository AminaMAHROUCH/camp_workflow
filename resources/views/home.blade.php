@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row" style="text-align: center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    عدد الأطفال
                </div>
                <div class="card-body">
                   <span data-counter="counterup">{{$Participants}}</span>
                </div>
            </div>
        </div>
          <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    عدد الورشات
                </div>
                <div class="card-body">
                <span data-counter="counterup">{{$Workshops}}</span>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection



