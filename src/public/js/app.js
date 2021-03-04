$(function () {
    // $('#city-input').autoComplete();

    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];

    $( "#city-input" ).autocomplete({
        minLength: 3,
        source: function () {
            $.get(
                '/city'
            );
        },
        select: function () {

        }
    });
});
