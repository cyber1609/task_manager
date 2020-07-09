require('./bootstrap');
global.$ = global.jQuery = require('jquery');
import 'bootstrap';
import 'jquery-ui';
import 'jquery-ui/ui/widgets/sortable.js';

$(document).ready(function() {
    let csrf_token = $('#token').html();
    function updateToDatabase(priorityString){

        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': csrf_token}});

        $.ajax({
            url:'/update-order',
            method:'POST',
            data:{priority:priorityString},
            success:function(){
                alert('Successfully updated')
            }
        })
    }

    let target = $('#sortable');
    target.sortable({
        handle: '.handle',
        placeholder: 'highlight',
        axis: "y",
        update: function (e, ui){
            let sortData = target.sortable('toArray',{ attribute: 'data-id'})
            updateToDatabase(sortData.join(','))
        }
    })

})
