$(document).ready(function(){
    let index = 1;

    $('#add_subtask').click(function () {
        let html = `
        <div class="row subtask-row">
            <div class="form-group">
                <label>Subtask Title:</label>
                <input type="text" name="subtasks[${index}][title]" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label>Time:</label>
                <input type="text" class="subtask-time" name="subtasks[${index}][time]" placeholder="Enter Time in min" required>
            </div>
            <button type="button" class="remove_subtask btn danger">Remove</button>
        </div>
        `;

        $('#subtasks-container').append(html);
        index++;
    });



    $(document).on('click', '.remove_subtask', function(){
        $(this).closest('.subtask-row').remove();
    });

});




$(document).ready(function() {
    function updateTotalTime() {
        let total = 0;
        $('.subtask-time').each(function() {
            let val = parseFloat($(this).val());
            if (!isNaN(val)) {
                total += val;
            }
        });

        $('#total-time').val(total);
    }

    $('#subtasks-container').on('input', '.subtask-time', function() {
        updateTotalTime();
    });

    $('#add_subtask').click(function() {
        setTimeout(updateTotalTime, 50);
    });
    updateTotalTime();
});