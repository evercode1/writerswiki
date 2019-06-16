

$(document).ready(function() {



    $(document).on('change', '#category_id', function() {
        var category_id = $(this).val();
        if (category_id != '') {

            var options_list ='';

            $.getJSON('/api/subcategories-for-dropdown/' + category_id, function (data) {

                $.each(data, function(key, value){

                    options_list += '<option value="' + value.id + '">' + value.name + '</option>';

                });

                var all_options = `<label>Subcategory</label>

                                           <select name="subcategory_id" id="subcategory_id" class="browser-default">

                                          <option value="">Please Choose One</option>`

                    +  options_list +

                    `</select>`;

                console.log(all_options);

                $('#list').html(function() {

                    return all_options;
                });
            });




        }


    });




});



