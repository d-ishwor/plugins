<button type="button" class="btn btn-info btn-sm cft_js" data-target="._modal_js">Copy Me ..</button>
<br>
<br>
<textarea type="textarea" class="form-control _modal_js" rows="20">
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Browse, compress and crop image before upload">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, photo, editor, front-end, web development">
    <meta name="author" content="Ishwor Prasad Rijal">
    <title>Image Cropper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.css" />
    <style type="text/css">
      .loading{border:16px solid #f3f3f3;border-top:16px solid #3498db;border-radius:50%;width:50px;height:50px;animation:spin 2s linear infinite}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}
      .thumbnail{max-height: 200px;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.0/cropper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jic/2.0.2/JIC.min.js"></script>
  </head>
  <body>
    <div class="container thumbnail">
          <input type="file" class="btn btn-sm btn-default icu_js" data-preview=".r_img_js" data-aspectRatio="16 / 9" data-zoom="false">
          <div class="r_img_js text-center"><img src="http://via.placeholder.com/350x150" style="max-width:100%"/></div> 
          <div class="clearfix"></div>       
      <hr/>
    </div>
  </body>
</html>
<script type="text/javascript">
  
var icrop = {
    preview  : '.r_img_js',
    btn_pos  : '',
    btn_crop : '',
    params   : '',
    cropper  : '',
    init: function(e){
        icrop.preview = $(e).data('preview');
        icrop.btn_pos = $(e).parent('div');
        var btn_crop = document.createElement('span');
            btn_crop.setAttribute('onclick',"crop()");
            btn_crop.setAttribute('class',"btn btn-sm btn-default");
            btn_crop.textContent ='CROP';
            icrop.btn_crop = btn_crop;
        $(icrop.btn_pos).append(icrop.btn_crop);
        $(icrop.preview).html('<div class="loading"></div>');
        icrop.get_data_attributes($(e));
    },
    finalize: function(){
      cropper.destroy();
      icrop.btn_crop.remove();
    },
    get_data_attributes : function(node){
      var d = {}, 
      re_dataAttr = /^data\-(.+)$/;
      $.each(node.get(0).attributes, function(index, attr) {
          if (re_dataAttr.test(attr.nodeName)) {
              var key = attr.nodeName.match(re_dataAttr)[1];
              d[key] = attr.nodeValue;
          }
      });
      icrop.params = d;
    }
}

$(document).on('change', '.icu_js', function (e) {
    icrop.init($(this));
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var file_name = input.files[0].name;
        var reader = new FileReader();
        reader.onloadend = function () {
            var name = input.files[0].name;
            var size = input.files[0].size;
            proceed_new_file(URL.createObjectURL(input.files[0]),name,size); /* passing blob*/
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function proceed_new_file(path,name,size){
    var extension = name.substr(name.lastIndexOf('.') + 1);
    var orig = document.createElement('img');
        orig.setAttribute('src',path);
    var miliseconds = size/10000;
    var compressed_data = '';
    setTimeout(function () {
        var s = Math.round(size/1000000);
        var quality = determine_quality_output(Math.round(s));
        console.log(size/1000000 +'MB size requires approximately '+miliseconds+' Milliseconds to get image quality of '+quality+'%');
        compressed_data = jic.compress(orig, quality, extension).src;
        update_destination_image(compressed_data,extension);
    }, miliseconds+5);
}

function determine_quality_output(size){
    var quality =  (size>20)         ?    5       :   50;
    quality =  (size>15 && size<=20) ?    15      :   quality;
    quality =  (size>10 && size<=15) ?    30      :   quality;
    quality =  (size>5 && size<=10)  ?    50      :   quality;
    quality =  (size>1 && size<=5)   ?    80      :   quality;
    quality =  (size<=1)             ?    100     :   quality;
    return quality;
}

function update_destination_image(imageData,extension){
    var orig = document.createElement('img');
        orig.setAttribute('id','image');
        orig.setAttribute('src',imageData);
    $(icrop.preview).html(orig);
    set_image_cropper(orig);
}

function set_image_cropper(image){
    params = icrop.params;
    var cropInit = new Cropper(image, {
      cropBoxResizable: false,
      zoomable:false,
      fillColor: '#fff',
      imageSmoothingEnabled: false,
      imageSmoothingQuality: 'high',
      params,
      crop: function(event) {
       console.log(cropInit);
      },
      built: function () {
        cropInit.setCropBoxData(cropBoxData).setCanvasData(canvasData);
      },
    });
    cropper = cropInit;
}


function crop(){
    $(this).hide();
    var croppedCanvas;
    croppedCanvas = cropper.getCroppedCanvas();
    var Image = croppedCanvas.toBlob(function (blob) {
        var objectURL = URL.createObjectURL(blob);
        $(icrop.preview).html('<img src="'+objectURL+'"/>');
    });
    icrop.finalize();
}

</script>

</textarea>