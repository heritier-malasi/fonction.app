toastr.options.preventDuplicates = true;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(function() {

    //ADD NEW COUNTRY
    $('#add-country-form').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $(form)[0].reset();
                    //  alert(data.msg);
                    $('#counties-table').DataTable().ajax.reload(null, false);
                    toastr.success(data.msg);
                }
            }
        });
    });

    //GET ALL COUNTRIES
    var table = $('#counties-table').DataTable({
        processing: true,
        info: true,
        ajax: "{{ route('get.countries.list') }}",
        "pageLength": 5,
        "aLengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        columns: [
            //  {data:'id', name:'id'},
            {
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            },
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'country_name',
                name: 'country_name'
            },
            {
                data: 'capital_city',
                name: 'capital_city'
            },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            },
        ]
    }).on('draw', function() {
        $('input[name="country_checkbox"]').each(function() {
            this.checked = false;
        });
        $('input[name="main_checkbox"]').prop('checked', false);
        $('button#deleteAllBtn').addClass('d-none');
    });

    $(document).on('click', '#editCountryBtn', function() {
        var country_id = $(this).data('id');
        $('.editCountry').find('form')[0].reset();
        $('.editCountry').find('span.error-text').text('');
        $.post('<?= route("get.country.details") ?>', {
            country_id: country_id
        }, function(data) {
            //  alert(data.details.country_name);
            $('.editCountry').find('input[name="cid"]').val(data.details.id);
            $('.editCountry').find('input[name="country_name"]').val(data.details.country_name);
            $('.editCountry').find('input[name="capital_city"]').val(data.details.capital_city);
            $('.editCountry').modal('show');
        }, 'json');
    });


    //UPDATE COUNTRY DETAILS
    $('#update-country-form').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('#counties-table').DataTable().ajax.reload(null, false);
                    $('.editCountry').modal('hide');
                    $('.editCountry').find('form')[0].reset();
                    toastr.success(data.msg);
                }
            }
        });
    });

    //DELETE COUNTRY RECORD
    $(document).on('click', '#deleteCountryBtn', function() {
        var country_id = $(this).data('id');
        var url = '<?= route("delete.country") ?>';

        swal.fire({
            title: 'Are you sure?',
            html: 'You want to <b>delete</b> this country',
            showCancelButton: true,
            showCloseButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete',
            cancelButtonColor: '#d33',
            confirmButtonColor: '#556ee6',
            width: 300,
            allowOutsideClick: false
        }).then(function(result) {
            if (result.value) {
                $.post(url, {
                    country_id: country_id
                }, function(data) {
                    if (data.code == 1) {
                        $('#counties-table').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                }, 'json');
            }
        });

    });




    $(document).on('click', 'input[name="main_checkbox"]', function() {
        if (this.checked) {
            $('input[name="country_checkbox"]').each(function() {
                this.checked = true;
            });
        } else {
            $('input[name="country_checkbox"]').each(function() {
                this.checked = false;
            });
        }
        toggledeleteAllBtn();
    });

    $(document).on('change', 'input[name="country_checkbox"]', function() {

        if ($('input[name="country_checkbox"]').length == $('input[name="country_checkbox"]:checked').length) {
            $('input[name="main_checkbox"]').prop('checked', true);
        } else {
            $('input[name="main_checkbox"]').prop('checked', false);
        }
        toggledeleteAllBtn();
    });


    function toggledeleteAllBtn() {
        if ($('input[name="country_checkbox"]:checked').length > 0) {
            $('button#deleteAllBtn').text('Delete (' + $('input[name="country_checkbox"]:checked').length + ')').removeClass('d-none');
        } else {
            $('button#deleteAllBtn').addClass('d-none');
        }
    }


    $(document).on('click', 'button#deleteAllBtn', function() {
        var checkedCountries = [];
        $('input[name="country_checkbox"]:checked').each(function() {
            checkedCountries.push($(this).data('id'));
        });

        var url = '{{ route("delete.selected.countries") }}';
        if (checkedCountries.length > 0) {
            swal.fire({
                title: 'Are you sure?',
                html: 'You want to delete <b>(' + checkedCountries.length + ')</b> countries',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#556ee6',
                cancelButtonColor: '#d33',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.value) {
                    $.post(url, {
                        countries_ids: checkedCountries
                    }, function(data) {
                        if (data.code == 1) {
                            $('#counties-table').DataTable().ajax.reload(null, true);
                            toastr.success(data.msg);
                        }
                    }, 'json');
                }
            })
        }
    });




});
