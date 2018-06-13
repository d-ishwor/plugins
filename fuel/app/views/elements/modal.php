<button type="button" class="btn btn-info btn-sm cft_js" data-target="._modal_js">Copy</button>
<br>
<br>
<textarea type="textarea" class="form-control _modal_js" rows="20">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <div id="js-fuel-modal" class="modal new-model in">
    <div class="close fade-in two" data-dismiss="modal"><span class="close-icon">×</span></div>
      <div class="text-left">
        <div class="md-modal md-effect">
          <div class="js-modal-content js-popup-content"> </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        $(document).on('click', '.js-fuel-modal-call', function (e) {
                e.preventDefault();
                var url = $(this).attr("href");
                var data = {};
                if (typeof $(this).data().send != 'undefined') {
                    data = $(this).data().send;
                }
                var myModal = $('#js-fuel-modal').modal('show');
                loadModalContent(url, data, $(this), myModal);
            });
        function loadModalContent(url, data, element, myModal) {
                $.ajax({
                    type: 'get',
                    url: url,
                    data: data,
                    dataType: 'html',
                    beforeSend: function () {
                        myModal.find(".js-modal-content").html('<div class="loading"> </div>');
                    },
                    success: function (data) {
                        var newHtml = myModal.find(".js-modal-content").html(data);
                        if (newHtml.find('.upgrade-pop-up').length > 0) {
                            myModal.find(".js-modal-content").parent().parent().css('width', '60%');
                        } else {
                            myModal.find(".js-modal-content").parent().parent().attr('style', ' ');
                        }
                    },
                    error: function () {
                        myModal.find(".js-modal-content").html('<div class="ain-loader"> Error </div>');
                    }
                })
                return false;
            }

    </script>

</textarea>