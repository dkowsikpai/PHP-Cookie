$(document).ready(()=>{
    // On init populate with selected items
    populate_div();

    // On click events / on clicking checkbox populate items
    $('.items').on('click', ()=>{
        populate_div();
    });
});

// Fuction to populate divs
function populate_div() {
    var selected = "<ul class=''>";
    // Getting items that are having checked attribute
    $('#items_list input[type=checkbox]').each(function() {
        if ($(this).is(":checked")) {
            let item_name = $(this).attr('value');
            selected += `<li>${item_name}</li>`;
        }
    });
    selected += '</ul>'
    // display in my cart
    $('#my_cart').empty().append(selected);
}


// Setting cookie on button click
function set_cookie(){
    // get the item values/names
    let selected = [];
    $('#items_list input[type=checkbox]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).attr('value'));
        }
    });

    console.log(selected);

    // send information to PHP server
    $.ajax({
        url: '/cart/cookie.php', // file in server
        type: 'POST', // post method
        data: {
            items: selected // send items
        },
        error: (e)=>{
            console.error(e);
        },
        success: (response)=>{
            console.log(response);
        }
    });

}


