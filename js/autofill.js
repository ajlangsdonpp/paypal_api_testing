$(document).ready(function () {
    $('.autofill').click(function () {
        $('#amount').val('199');
        $('#cardnum').val('4111111111111111');
        $('#cardexpmonth').val('04');
        $('#cardexpyear').val('2019');
        $('#cvv').val('648');
        $('#cctype').val('Visa');
        $('#cardfirstname').val('Johnny');
        $('#cardlastname').val('Appleseed');
        $('#billaddress').val('123 Gibson Rd');
        $('#billcity').val('Scottsdale');
        $('#billstate').val('AZ');
        $('#billzip').val('85259');
    });
});