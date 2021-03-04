$(function () {
    var button = $('#city-submit'),
        input = $('#city-input');

    input.autocomplete({
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
        }
    });

    button.click(function () {
        $(this).prop('disabled', true);

        $.get(
            '/weather',
            {
                location: input.val()
            }
        ).done(function (data) {

        });
    });
});
