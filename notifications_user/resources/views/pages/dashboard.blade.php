@extends('layouts.main')
@include('layouts.navbars.navbar')

@section('content')
  <section class="container mt-4">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6">
                <a href="{{route('report')}}" class="btn btn-primary btn-sm">Laporan</a>
            </div>
        </div>
      </div>
  </section>
@endsection
