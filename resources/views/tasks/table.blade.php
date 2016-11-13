<div class="table-responsive">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered" id="level_table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Project</th>
                <th>Assign To</th>
                <th>Due Date</th>
                <th>Urgent Level</th>
                <th>Important Level</th>
                <th>Action</th>
            </tr>
            </thead>

        </table>
    </div>
</div>
@section('scripts')

    <script>

        $(window).resize(function () {
            var width = document.documentElement.clientWidth;
            if (width <= 750) {
                $('#task-title').addClass('col-xs-12 pull-left').removeClass('pull-left');
                $('#filterData').addClass('col-xs-12 pull-right').removeClass('pull-right');
            }
            else {
                $('#task-title').addClass('pull-left').removeClass('col-xs-12');
                $('#filterData').addClass('pull-right').removeClass('col-xs-12');
            }
        });

        $(function () {
            var table = $('#level_table').DataTable({
                processing: false,
                serverSide: false,
                "paging": true,
                "info": true,
                "ordering": true,
                "autoWidth": false,
                "pageLength": 10,
                oLanguage: {
                    "sSearch": "Search"
                },
                fnDrawCallback: function () {
                    if (table) {
                        rowCount = table.data().length;
                        $('#task-title').html("Tasks(" + rowCount + ")");
                    }
                },
                order: [],
                "sDom": "<'row'<'col-lg-9 col-md-8 col-sm-8  col-xs-12'l><'col-lg-3 col-md-4 col-sm-4  col-xs-12 'f>rt'row'<'col-lg-6 col-xs-6'><'col-lg-10 col-md-10 col-sm-10 col-xs-12'<'#toolbar'>><'col-lg-12  pull-right'p>>",
                ajax: '{{route('tasks.index')}}?project_id=' + $('#project :selected').val() + '&status=' + $('#status :selected').val() + '&assign_to=' + $('#assignTo :selected').val(),
                columnDefs: [
                    {
                        "orderable": false,
                        "targets": [0, 7],
                    }
                ],
                columns: [
                    {
                        data: function (row) {
                            if (row.status) {
                                return '<label for="' + row.id + '">' + '<input type="checkbox" id="' + row.id + '" name="check" class="taskStatus" checked value="' + row.id + '">' + '<i></i>' + '</label>'
                            } else {
                                return '<label for="' + row.id + '">' + '<input type="checkbox" id="' + row.id + '" name="check" class="taskStatus" value="' + row.id + '">' + '<i></i>' + '</label>'
                            }
                        }
                    },
                    {
                        data: function (row) {
                            var title = '';
                            if (row.status) {
                                title = '<a href="{{url('/tasks')}}/' + row.id + '/edit"><strike>' + row.title + '</strike></a>';
                            }
                            else {
                                title = '<a href="{{url('/tasks')}}/' + row.id + '/edit">' + row.title + '</a>';
                            }
                            return title;
                        },
                        name: 'ts.title'
                    },
                    {
                        data: function (row) {
                            return row.project.name;
                        }
                        ,
                        name: 'task.project'
                    }
                    ,
                    {
                        data: 'assign_to.name', name: 'task.assign_to'
                    }
                    ,
                    {
                        data: 'due_date', name: 'task.due_date'
                    }
                    ,
                    {
                        data: function (row) {
                            return getRatingString(row.urgent_level, 'urgent_level' + row.id);
                        }
                    }
                    ,
                    {
                        data: function (row) {
                            return getRatingString(row.important_level, 'important' + row.id);
                        },
                        name: 'task.important_level'

                    }
                    ,
                    {
                        data: function (row) {
                            return '<a title="Edit" class="btn btn-default btn-xs"(' + row.id + ')" href="{{url('/tasks')}}/' + row.id + '/edit" style="margin-right:5px;">' + '<i class="glyphicon glyphicon-edit"  style="color:#3c8dbc"></i>' + '</a>'
                                    + '<a title="Delete" class="btn btn-default btn-xs"(' + row.id + ')" onclick="deleteTask(' + row.id + ')" >' + '<i class="glyphicon glyphicon-trash"  style="color:red"></i>' + '</a>'

                        }
                        ,
                        "width": "50px"
                    }
                ],
                "fnInitComplete": function (oSettings) {
                    $('#project').html($('#project-container').html());
                    $('#status').html($('#status-container').html());
                    $('#assignTo').html($('#assignTo-container').html());
                    $('#project,#status,#assignTo').change(function () {
                        table.ajax.url('{{route('tasks.index')}}?project_id=' + $('#project :selected').val() + '&status=' + $('#status :selected').val() + '&assign_to=' + $('#assignTo :selected').val()).load();
                    });
                    $(document).on('change', '.taskStatus', function () {
                        var parent = $(this);
                        $.ajax({
                            url: '{{url('tasks/task-complete')}}/' + $(this).val(),
                            method: 'PUT'
                        }).done(function (data) {
                            if (data.success) {
                                if ($('#status :selected').val()) {
                                    parent.closest("tr").remove();
                                }
                            }
                        });

                    });
                }
            });
        })
        ;

        function deleteTask(id) {
            swal({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this Task?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5cb85c',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                setTimeout(function () {
                    $.ajax({
                        url: "{{url('tasks')}}/" + id + '',
                        type: 'delete',
                        dataType: 'json',
                        success: function (response) {
                            swal(
                                    'Done!',
                                    response.message,
                                    'success'
                            );
                            $('#level_table').DataTable().ajax.reload(null, false);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal(
                                    'Failed!',
                                    xhr.responseJSON.message,
                                    'error'
                            );
                        }
                    });
                }, 2000);
            })
        }

        function getRatingString(rate, uniqueId) {
            if (rate == 5) {
                return ' <fieldset style="margin-top: -12px" id="urgent_' + uniqueId + '" class="rating">' +
                        '<input type="radio" id="star5" name="urgent_level_' + uniqueId + '" value="5" checked />' +
                        ' <label for="star5" style="padding-top: 0px!important;font-size: 27px;width: 10px !important;"></label>' +
                        ' <label for="star4" style="padding-top: 5px!important;font-size: 24px;width: 8px !important;"></label>' +
                        ' <label for="star3" style="padding-top: 8px!important;font-size: 22px;width: 8px !important;"></label>' +
                        ' <label for="star2" style="padding-top: 10px!important;font-size: 18px;width: 6px !important;"></label>' +
                        ' <label for="star1" style="padding-top: 17px!important;font-size: 14px;width: 6px !important;"></label>' +
                        '</fieldset>';
            } else if (rate == 4) {
                return ' <fieldset style="margin-top: -12px" id="urgent_' + uniqueId + '" class="rating">' +
                        ' <label for="star5" style="padding-top: 0px!important;font-size: 27px;width: 10px !important;"></label>' +
                        '<input class="stars" type="radio" id="star4" name="urgent_level_' + uniqueId + '" value="4" checked  />' +
                        ' <label for="star4" style="padding-top: 5px!important;font-size: 24px;width: 8px !important;"></label>' +
                        ' <label for="star3" style="padding-top: 8px!important;font-size: 22px;width: 8px !important;"></label>' +
                        ' <label for="star2" style="padding-top: 10px!important;font-size: 18px;width: 6px !important;"></label>' +
                        ' <label for="star1" style="padding-top: 17px!important;font-size: 14px;width: 6px !important;"></label>' +
                        '</fieldset>';
            }
            else if (rate == 3) {
                return ' <fieldset style="margin-top: -12px" id="urgent_' + uniqueId + '" class="rating">' +
                        ' <label for="star5" style="padding-top: 0px!important;font-size: 27px;width: 10px !important;"></label>' +
                        ' <label for="star4" style="padding-top: 5px!important;font-size: 24px;width: 8px !important;"></label>' +
                        '<input class="stars" type="radio" id="star3" name="urgent_level_' + uniqueId + '" value="3" checked />' +
                        ' <label for="star3" style="padding-top: 8px!important;font-size: 22px;width: 8px !important;"></label>' +
                        ' <label for="star2" style="padding-top: 10px!important;font-size: 18px;width: 6px !important;"></label>' +
                        ' <label for="star1" style="padding-top: 17px!important;font-size: 14px;width: 6px !important;"></label>' +
                        '</fieldset>';
            }
            else if (rate == 2) {
                return ' <fieldset style="margin-top: -12px" id="urgent_' + uniqueId + '" class="rating">' +
                        ' <label for="star5" style="padding-top: 0px!important;font-size: 27px;width: 10px !important;"></label>' +
                        ' <label for="star4" style="padding-top: 5px!important;font-size: 24px;width: 8px !important;"></label>' +
                        ' <label for="star3" style="padding-top: 8px!important;font-size: 22px;width: 8px !important;"></label>' +
                        '<input class="stars" type="radio" id="star2" name="urgent_level_' + uniqueId + '" value="2" checked />' +
                        ' <label for="star2" style="padding-top: 10px!important;font-size: 18px;width: 6px !important;"></label>' +
                        ' <label for="star1" style="padding-top: 17px!important;font-size: 14px;width: 6px !important;"></label>' +
                        '</fieldset>';
            }
            else if (rate == 1) {
                return ' <fieldset style="margin-top: -12px" id="urgent_' + uniqueId + '" class="rating">' +
                        ' <label for="star5" style="padding-top: 0px!important;font-size: 27px;width: 10px !important;"></label>' +
                        ' <label for="star4" style="padding-top: 5px!important;font-size: 24px;width: 8px !important;"></label>' +
                        ' <label for="star3" style="padding-top: 8px!important;font-size: 22px;width: 8px !important;"></label>' +
                        ' <label for="star2" style="padding-top: 10px!important;font-size: 18px;width: 6px !important;"></label>' +
                        '<input class="stars" type="radio" id="star1" name="urgent_level_' + uniqueId + '" value="1" checked />' +
                        ' <label for="star1" style="padding-top: 17px!important;font-size: 14px;width: 6px !important;"></label>' +
                        '</fieldset>';
            }
            else {
                return '';
            }
        }

    </script>
@endsection
