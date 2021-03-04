$(function () {
    $('#city-input').autocomplete({
        minLength: 3,
        source: function (object, response) {
            $.get(
                '/city',
                {
                    city: object.term
                }
            ).done(function (data) {
                response($.map(data, function (item) {
                    return {
                        label: item.name + ',' + item.country,
                        value: item.name + ',' + item.country
                    };
                }));
            });
        },
        select: function (event, ui) {
            console.log(event.target);
            console.log(ui);
        }
    });

    $('#city-submit').click(function () {
        
    });
});
