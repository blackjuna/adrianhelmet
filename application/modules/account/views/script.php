<script type="text/javascript">
var save_method;

// $(function () {
//   // "use strict";
//   search_newproduct();
// });

function save()
{
	save_method = 'add';
 //    $('#formname')[0].reset(); // reset form on modals
 //    $('.form-group').removeClass('has-error'); // clear error class
 //    $('.help-block').empty(); 

    var formData = new FormData( $("#formname")[0] );
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('systems/users/c')?>";
    } else {
        url = "<?php echo site_url('systems/users/u')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        async : false,
        cache : false,
        contentType : false,
        processData : false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                alert('\tAkun Berhasil Dibuat!\n\tSilahkan Login!');
                // $('#modal_form').modal('hide');
                // loadHome();
                
                location.reload();
                window.location.href = "<?php echo base_url();?>"; 
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