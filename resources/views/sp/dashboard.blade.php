@extends('sp.layouts.app')

@section('htmlheader_title')
Dashboard
@endsection

@section('page_id')dashboard @endsection
@section('page_classes')dashboard-page @endsection

@section('content')
<div class="row clearfix">
    <div class="col-md-4 col-sm-5">
        <!-- [Icon block] -->
        <div class="icon-block">
            <ul>
              <li class="hvr-grow">
                <a href="/shadebank" class=" hvr-grow">
                  <img src="{{ asset('assets/img/app-icons/icon-bank.png') }}" alt="Shade Bank">
                  <span class="app-name">Shade Bank</span>
                </a>
              </li>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/community-app.png') }}" alt="Name app">
                  <span class="app-name">Community</span>
                </a>
              </li>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app1.png') }}" alt="Name app">
                  <span class="app-name">Feedback assistant</span>
                </a>
              </li>
            </ul>
            <ul>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app2.png') }}" alt="Name app">
                  <span class="app-name">Procreate</span>
                </a>
              </li>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app1.png') }}" alt="Name app">
                  <span class="app-name">Sketch Book Pro</span>
                </a>
              </li>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app3.png') }}" alt="Name app">
                  <span class="app-name">Concepts</span>
                </a>
              </li>
            </ul>
            <ul>
              <li class="hvr-grow">
                <a href="#" class=" hvr-grow">
                  <img src="{{ asset('assets/img/app-icons/app3.png') }}" alt="Name app">
                  <span class="app-name">Paper Lite</span>
                </a>
              </li>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app4.png') }}" alt="Name app">
                  <span class="app-name">Paint Storm</span>
                </a>
              </li>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app5.png') }}" alt="Name app">
                  <span class="app-name">Scribble Stories</span>
                </a>
              </li>
            </ul>
            <ul>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app6.png') }}" alt="Name app">
                  <span class="app-name">Scribble AR</span>
                </a>
              </li>
              <li class="hvr-grow">
                <a href="#">
                  <img src="{{ asset('assets/img/app-icons/app3.png') }}" alt="Name app">
                  <span class="app-name">Scribble VR</span>
                </a>
              </li>
            </ul>
        </div>
        <!-- [/Icon block] -->
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/plugins/hover.css/css/hover-min.css') }}" rel="stylesheet" type="text/css" />
@endpush
