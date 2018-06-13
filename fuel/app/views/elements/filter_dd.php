<button type="button" class="btn btn-info btn-sm cft_js" data-target="._modal_js">Copy </button>
<br>
<br>
<textarea type="textarea" class="form-control _modal_js" rows="20">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.css" />
    <style type="text/css">.item_list_js{max-height: 130px;overflow-y: scroll;z-index: 1;background-color: #fff;min-width: 100%;}</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
	<script type="text/javascript">
		function dd_filter(input) {
	            var input, filter, ul, li, a, i;            
	            var ec = $(input).data('target');
	            filter = input.value.toUpperCase();
	            ul = $(ec).find('.item_list_js')
	            li = ul.find("li");
	            for (i = 0; i < li.length; i++) {
	                a = li[i].getElementsByTagName("a")[0];
	                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
	                    li[i].style.display = "";
	                } else {
	                    li[i].style.display = "none";

	                }
	            }
	        }
	    function set_selected(e){
	        var pe = $(e).data('target');
	        var id = $(e).data('id');
	        var selected = $(e).data('text');
	        $(pe).find('.isf_js').val(selected);
	        $(pe).find('.item_list_js').hide();
	        $(pe).find('.real_dd_js').val(id);
	    }
	</script>

	<div class="du_selector_js">
        <div class="col-md-12">
          <input type="text" onkeyup="dd_filter(this)" class="form-control isf_js" data-target=".du_selector_js">
          <ol class="item_list_js">
            <?php foreach($listTitles as $key => $u) ?>
                <li onclick="set_selected(this)" data-id="<?=$u;?>" data-text="<?=$key?>" data-target=".du_selector_js"> 
                	<a href="#"><option value="<?=$key;?>"> <?=$key;?></option></a>
                </li>
            <?php endforeach ?>
          </ol>
          
          <select name="user_id" class="form-control real_dd_js" style="display: none;">
            <?php foreach($listTitles as $key => $u) ?>
                <option value="<?=$u;?>">{{$key}}</option>
            <?php endforeach ?>
          </select>
        </div>
    </div>


</textarea>