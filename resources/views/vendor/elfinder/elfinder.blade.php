@extends('backpack::layouts.top_left')


@section('after_scripts')
        @include('vendor.elfinder.common_scripts')
        @include('vendor.elfinder.common_styles')

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Documentation for client options:
            // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
            $().ready(function() {
                let elFinder = $('#elfinder');

                let elFinderContainer = elFinder.parent();
                elFinderContainer.css({ 'flex': 1 });

                let elFinderMain = elFinderContainer.parent();
                elFinderMain.addClass('d-flex flex-column');

                elFinder.elfinder({
                    // set your elFinder options here
                    @if($locale)
                        lang: '{{ $locale }}', // locale
                    @endif
                    customData: {
                        _token: '{{ csrf_token() }}'
                    },
                    url : '{{ route("elfinder.connector") }}',  // connector URL
                    soundPath: '{{ asset($dir.'/sounds') }}',
                    height: '100%',
                    heightBase: elFinder.parent(),
                });
            });

            $(window).resize(function () {
                const elFinder = $('#elfinder').getElFinder();
                elFinder.resize('100%', 1);
                elFinder.resize('100%', '100%');
            });
        </script>
@endsection

@php
  $breadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    trans('backpack::crud.file_manager') => false,
  ];
@endphp

@section('header')
    <section class="container-fluid">
      <h2>{{ trans('backpack::crud.file_manager') }}</h2>
    </section>
@endsection

@section('content')

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

@endsection
