<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('sp.layouts.partials.htmlheader')
@show
<body class="sidebar-collapse @hasSection('page_id')@yield('page_id')@endif @hasSection('page_classes')@yield('page_classes')@endif">
    <div class="wrapper">

        @include('sp.layouts.partials.mainheader')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Content Header -->
                <!-- Main content -->
                <section class="content {{ $no_padding or '' }}">
                    <!-- Your Page Content Here -->
                    @if(!isset($sub_message))
                    @include('sp.commons.success_error')
                    @endif

                    @yield('content')
                </section><!-- /.content -->

            </div><!-- /.container -->
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    @include('sp.layouts.partials.footer')

    @section('scripts')
    @include('sp.layouts.partials.scripts')
    @show

</body>
</html>
