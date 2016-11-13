<style>

</style>
<div class="table-responsive">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered" id="level_table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th>Action</th>
            </tr>
            </thead>

        </table>
    </div>
</div>
@section('scripts')

    <script>
        $(function () {
            $('#level_table').DataTable({
                processing: true,
                serverSide: false,
                "paging": true,
                "info": false,
                "ordering": true,
                "autoWidth": true,
                "pageLength": 10,
                oLanguage: {
                    "sSearch": "Search"
                },
                "sDom": "<'row'<'col-lg-9 col-md-8 col-sm-8  col-xs-12'l><'col-lg-3 col-md-4 col-sm-4  col-xs-12 'f>rt'row'<'col-lg-6 col-xs-6'><'col-lg-10 col-md-10 col-sm-10 col-xs-12'<'#toolbar'>><'col-lg-12  pull-right'p>>",
                ajax: '{!! url(route('settings.projects.index'))  !!}',
                columnDefs: [
                    {
                        "targets": [2],
                        "orderable": false
                    },
                ],
                columns: [
                    {data: 'name', name: 'pro.name'},
                    {
                        data: function (row) {
                            return '<label style="background-color:' + row.color + ';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </label>'
                        }, name: 'color',
                        "width": "20%"
                    },
                    {
                        data: function (row) {
                            return '<a title="Edit" class="btn btn-default btn-xs"(' + row.id + ')" href="{{url('/settings/projects')}}/' + row.id + '/edit" style="margin-right:5px;">' + '<i class="glyphicon glyphicon-edit"  style="color:#3c8dbc"></i>' + '</a>'
                                    + '<a title="Delete" class="btn btn-default btn-xs"(' + row.id + ')" onclick="deleteProject(' + row.id + ')" >' + '<i class="glyphicon glyphicon-trash"  style="color:red"></i>' + '</a>'

                        },
                        "width": "50px"

                    }

                ]
            });
        });

        function deleteProject(id) {
            swal({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this Projects?",
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
                        url: "{{url('/settings/projects')}}/" + id + '/delete',
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

    </script>
@endsection
