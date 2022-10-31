<textarea id="summernote-editor_{{ $lang['code'] }}" name="content[{{ $lang['code'] }}]">{!! $name ?? '' !!}</textarea>
<script>

    $(document).ready(function () {
        var lfm = function (options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        $("#summernote-editor_{{ $lang['code'] }}").summernote({
            disableDragAndDrop: true,
            height: 300,
            emptyPara: '',
            fontsize: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '30', '36', '48', '64'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'image', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
            },
            buttons: {
                image: function (context) {
                    var ui = $.summernote.ui;
                    var button = ui.button(
                        {
                            contents: '<i class="bi bi-image-fill"></i>',
                            tooltip: 'Insert image with filemanager',
                            click: function () {
                                lfm({type: 'image', prefix: '/filemanager'}, function (lfmItems, path) {
                                    lfmItems.forEach(function (lfmItem) {
                                        context.invoke('insertImage', lfmItem.url);
                                    });
                                });
                            }
                        }
                    );
                    return button.render();
                }
            }
        });

        $("button#btnToggleStyle").on("click", function (e) {
            e.preventDefault();
            var styleEle = $("style#fixed");
            if (styleEle.length == 0)
                $("<style id=\"fixed\">.note-editor .dropdown-toggle::after { all: unset; } .note-editor .note-dropdown-menu { box-sizing: content-box; } .note-editor .note-modal-footer { box-sizing: content-box; }</style>")
                    .prependTo("body");
            else
                styleEle.remove();
        });

    });
</script>
