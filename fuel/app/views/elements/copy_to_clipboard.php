<button type="button" class="btn btn-info btn-sm cft_js" data-target="._modal_js">Copy Me ..</button>
<br>
<br>
<textarea type="textarea" class="form-control _modal_js" rows="20">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <span class="btn btn-sm btn-primary ctc_js" data-target=".note_js">Copy Me ... </span>
    
    <script>
      $(document).on('click','.ctc_js',function(e){
            copyToClipboard($(this));
        })
        $(document).on('click','.cft_js',function(e){
            var target = $(this).data('target');
            c2c($(target));
        })
        $(document).on('click','.cftitle_js',function(){
            copyToClipboard($(this),$(this).data('title'));
        })
        function copyToClipboard(e,txt) {
            if(txt){
                v=txt;
            }else{
                type = e.attr('type');
                if(type=='text'){
                    v = $(e).val();
                }else{
                    v = $(e).html();            
                }
            }
            const el = document.createElement('textarea');
            el.value = v;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            const selected =
                document.getSelection().rangeCount > 0 ?
                document.getSelection().getRangeAt(0) :
                false;
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            if (selected) {
                Notifier.success(v);
                document.getSelection().removeAllRanges();
                document.getSelection().addRange(selected);
            }else{
            }
        };

        function c2c(e,txt) {
            const selected =
                document.getSelection().rangeCount > 0 ?
                document.getSelection().getRangeAt(0) :
                false;
            e.select();
            document.execCommand('copy');
            if (selected) {
                Notifier.success(selected);
                document.getSelection().removeAllRanges();
                document.getSelection().addRange(selected);
            }else{
            }
        };
    </script>

</textarea>