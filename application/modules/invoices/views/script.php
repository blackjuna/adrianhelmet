<script type="text/javascript">
var save_method;

$(function () {
  // "use strict";
  search_newproduct();
});

function search_newproduct()
{
	
}

function clear_feedback()
{
    $('#form_conf')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
}

function save()
{
	var name=$("#inputUsername").val();
	var email=$("#input_email").val();
	var address=$("#address").val();
	var phone=$("#phone").val();
	var pesan=$("#pesan").val();

	var postData ={
    'name':name,
    'email':email,
    'address':address,
    'phone':phone,
    'pesan':pesan
  };

	$('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    url = "<?php echo site_url('invoices/cruds/c')?>";

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: postData,
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
            	alert('\tTransaksi sukses!\n\tTerima kasih Telah berbelanja di Toko Adrian Helmet\n\tAdmin kami akan menghubungi anda untuk konfirmasi pesanan.');
                // $('#modal_form').modal('hide');
                // loadHome();
                
                location.reload();
                window.location.href = "<?php echo base_url();?>";  
				// window.location.reload((window.location.origin);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });

}
</script>