$(function () {
    var button = $('#city-submit'),
        input = $('#city-input'),
        response = $('#weather-response'),
        error = $('#weather-error');

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
        },
        select: function () {
            button.prop('disabled', false);
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
            console.log(data);
            if (data.error !== undefined) {
                error.find('.card-body').text(data.error);
            } else {
                response.find('.card-body').html(
                    `<p>Feels like: <span class="badge badge-pill badge-primary">${data.main.feels_like}</span></p>
                    <p>Humidity: <span class="badge badge-pill badge-primary">${data.main.humidity}</span></p>
                    <p>Pressure: <span class="badge badge-pill badge-primary">${data.main.pressure}</span></p>
                    <p>Temperature: <span class="badge badge-pill badge-primary">${data.main.temp}</span></p>`
                );
            }

            error.toggleClass('d-none', data.error === undefined);
            response.toggleClass('d-none', data.error !== undefined);
        });
    });
});
