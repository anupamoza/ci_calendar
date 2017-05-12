<?php
echo $calendar;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function ($)
    {
        $('.calendar .day').click(function ()
        {
            day_num = $(this).find('.day_num').html();
            day_data = prompt('Enter Meeting Details : ', $(this).find('.content').html());
            if (day_data != null)
            {
                $.ajax({
                    url: window.location,
                    type: 'POST',
                    data: {
                        day: day_num,
                        data: day_data,
                    },
                    success: function (msg)
                    {
                        location.reload();
                    }
                });
            }
        });
    }
    );
</script>