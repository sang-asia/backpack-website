<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        @include('vendor.elfinder.common_scripts')
        @include('vendor.elfinder.common_styles')

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Helper function to get parameters from the query string.
            function getUrlParam(paramName) {
                var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
                var match = window.location.search.match(reParam) ;

                return (match && match.length > 1) ? match[1] : '' ;
            }

            $().ready(function() {
                var funcNum = getUrlParam('CKEditorFuncNum');
                var elFinder = $('#elfinder');

                var elf = elFinder.elfinder({
                    // set your elFinder options here
                    @if($locale)
                        lang: '{{ $locale }}', // locale
                    @endif
                    customData: {
                        _token: '{{ csrf_token() }}'
                    },
                    url: '{{ route("elfinder.connector") }}',  // connector URL
                    soundPath: '{{ asset($dir.'/sounds') }}',
                    height: '100%',
                    heightBase: elFinder.parent(),
                    getFileCallback : function(file) {
                        window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                        window.close();
                    }
                }).elfinder('instance');

                $(window).resize(function () {
                    const elFinder = $('#elfinder').getElFinder();
                    elFinder.resize('100%', 1);
                    elFinder.resize('100%', '100%');
                });
            });
        </script>
    </head>
    <body>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

    </body>
</html>
