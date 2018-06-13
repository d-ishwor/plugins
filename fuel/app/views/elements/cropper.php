<button type="button" class="btn btn-info btn-sm cft_js" data-target="._modal_js">Copy Me ..</button>
<br>
<br>
<textarea type="textarea" class="form-control _modal_js" rows="20">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.css" />
	<div class="actions">
	    <a class="btn file-btn"> <span>Upload</span> <input type="file" id="upload" value="Choose a file" accept="image/*" /> </a>
	    <button class="upload-result">Result</button>
	</div>
	<div class="upload-msg" style="text-align: center;"> Upload a file to start cropping </div>
	<div class="upload-demo-wrap"> <div id="upload-demo"></div> </div>
	<section> <a id="demos" name="demos"></a> </section> <hr/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
	<script>
	    var Demo = (function() {
	        function output(node) {
	            var existing = $('#result .croppie-result');
	            if (existing.length > 0) {
	                existing[0].parentNode.replaceChild(node, existing[0]);
	            }
	            else {
	                $('#result')[0].appendChild(node);
	            }
	        }
	        function demoUpload() {
	            var $uploadCrop;
	            function readFile(input) {
	                if (input.files && input.files[0]) {
	                    var reader = new FileReader();              
	                    reader.onload = function (e) {
	                        $('.upload-demo').addClass('ready');
	                        $uploadCrop.croppie('bind', {
	                            url: e.target.result
	                        }).then(function(){
	                            console.log('jQuery bind complete');
	                        });                 
	                    }               
	                    reader.readAsDataURL(input.files[0]);
	                }
	                else {
	                    swal("Sorry - you're browser doesn't support the FileReader API");
	                }
	            }
	            $uploadCrop = $('#upload-demo').croppie({
	                viewport: {
	                    width: 600,
	                    height: 300,
	                },
	                boundary: {
	                    width: 650,
	                    height: 330,
	                },
	                enableExif: true,
	                enableResize: false,
	                enableOrientation: true,
	                mouseWheelZoom: 'ctrl'
	            });
	            $('#upload').on('change', function () { readFile(this); });
	            $('.upload-result').on('click', function (ev) {
	                $uploadCrop.croppie('result', {
	                    type: 'canvas',
	                    size: 'viewport'
	                }).then(function (resp) {
	                    var a = document.createElement('a');
	                    a.href = resp;
	                    a.download = "output.png";
	                    document.body.appendChild(a);
	                    a.click();
	                    document.body.removeChild(a);

	                });
	            });
	        }
	        function bindNavigation () {
	            var $html = $('html');
	            $('nav a').on('click', function (ev) {
	                var lnk = $(ev.currentTarget),
	                    href = lnk.attr('href'),
	                    targetTop = $('a[name=' + href.substring(1) + ']').offset().top;
	                $html.animate({ scrollTop: targetTop });
	                ev.preventDefault();
	            });
	        }
	        function init() {
	            bindNavigation();
	            demoUpload();
	        }
	        return {
	            init: init
	        };
	    })();
	    Demo.init();
	</script>

</textarea>