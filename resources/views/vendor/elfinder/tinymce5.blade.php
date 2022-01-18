<!DOCTYPE html>
<html>
<head>

    @include('vendor.elfinder.common_scripts')
    @include('vendor.elfinder.common_styles')

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript">
        var FileBrowserDialogue = {
            init: function() {
                // Here goes your code for setting your custom things onLoad.
            },
            mySubmit: function (file) {
                window.parent.postMessage({
                    mceAction: 'fileSelected',
                    data: {
                        file: file
                    }
                }, '*');
            }
        };

        $().ready(function() {
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
                getFileCallback: function(file) { // editor callback
                    FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE
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
