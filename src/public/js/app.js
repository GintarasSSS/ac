"use strict";

class Wheather {
    constructor() {
        this.button = $('#city-submit');
        this.input = $('#city-input');
        this.response = $('#weather-response');
        this.error = $('#weather-error');
    }

    init() {
        this.autocomplete();
        this.send();
    };

    autocomplete() {
        this.input.autocomplete({
            minLength: 3,
            source: (object, response) => {
                $.get(
                    '/city',
                    {
                        city: object.term
                    }
                ).done((data) => {
                    response($.map(data, (item) => {
                        return {
                            label: item.name + ',' + item.country,
                            value: item.name + ',' + item.country
                        };
                    }));
                });
            }
        });
    };

    send() {
        this.button.click(() => {
            $(this).prop('disabled', true);

            $.get(
                '/weather',
                {
                    location: this.input.val()
                }
            ).done((data) => {
                if (data.error !== undefined) {
                    this.error.find('.card-body').text(data.error);
                } else {
                    this.response.find('.card-body').html(
                        `<p>Feels like: <span class="badge badge-pill badge-primary">${data.main.feels_like}</span></p>
                        <p>Humidity: <span class="badge badge-pill badge-primary">${data.main.humidity}</span></p>
                        <p>Pressure: <span class="badge badge-pill badge-primary">${data.main.pressure}</span></p>
                        <p>Temperature: <span class="badge badge-pill badge-primary">${data.main.temp}</span></p>`
                    );
                }

                this.error.toggleClass('d-none', data.error === undefined);
                this.response.toggleClass('d-none', data.error !== undefined);
                $(this).prop('disabled', false);
            });
        });
    };
}

$(function () {
    (new Wheather()).init();
});
