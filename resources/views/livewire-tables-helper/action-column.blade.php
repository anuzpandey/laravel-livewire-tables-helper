@if($permissions)
    <div class="d-inline-flex gap-2">

        @if($prependButtons)
            @foreach($prependButtons as $button)
                @authorize($button['permission'])
                <a
                    href="{{ $button['route'] }}"
                    type="button"
                    class="btn btn-icon {{ $button['class'] ?: 'btn-warning' }} btn-sm"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-original-title="{{ $button['label'] }}"
                    aria-label="{{ $button['label'] }}"
                >
                    <i class="las {{ $button['icon'] }} align-middle fs-4"></i>
                </a>
                @endauthorize
            @endforeach
        @endif


        @authorize($viewPermission)
        @if($showRoute)
            <a
                href="{{ $showRoute }}"
                type="button"
                class="btn btn-icon btn-light-primary btn-sm"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-original-title="View"
                aria-label="View"
                target="{{ $showTarget }}"
            >
                <i class="ki-outline ki-laptop align-middle fs-4"></i>
            </a>
        @endif
        @endauthorize

        @authorize($updatePermission)
        @if($editRoute)
            <a
                href="{{ $editRoute }}"
                type="button"
                class="btn btn-icon btn-light-primary btn-sm"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-original-title="Edit"
                aria-label="Edit"
            >
                <i class="ki-outline ki-pencil align-middle fs-4"></i>
            </a>
        @endif
        @endauthorize

        @authorize($deletePermission)
        @if($deleteRoute)
            <a
                href="{{ $deleteRoute }}"
                id="delete-btn"
                data-id="{{ $row->id }}"
                type="button"
                class="btn btn-icon btn-light-primary btn-sm"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-original-title="Delete"
                aria-label="Delete"
            >
                <i class="ki-outline ki-trash fs-4"></i>
            </a>
        @endif
        @endauthorize
    </div>
@else
    <div class="d-inline-flex gap-2">
        @if($showRoute)
            <a
                href="{{ $showRoute }}"
                type="button"
                class="btn btn-icon btn-warning btn-sm"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-original-title="View"
                aria-label="View"
            >
                <i class="las la-eye align-middle fs-4"></i>
            </a>
        @endif

        @if($editRoute)
            <a
                href="{{ $editRoute }}"
                type="button"
                class="btn btn-icon btn-success btn-sm"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-original-title="Edit"
                aria-label="Edit"
            >
                <i class="las la-pen align-middle fs-4"></i>
            </a>
        @endif

        @if($deleteRoute)
            <a
                href="{{ $deleteRoute }}"
                id="delete-btn"
                data-id="{{ $row->id }}"
                type="button"
                class="btn btn-icon btn-danger btn-sm"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-original-title="Delete"
                aria-label="Delete"
            >
                <i class="las la-trash fs-4"></i>
            </a>
        @endif
    </div>
@endif


@push('scripts')
    @script
    <script type="text/javascript">
        $(document).ready(() => {
            let tableName = $('#{{ $column->getComponent()->getTableAttributes()['id'] }}');
            tableName.on('click', '#delete-btn', function (event) {
                event.preventDefault();
                event.stopPropagation();
                let delete_url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#34C38F",
                    cancelButtonColor: "#F46A6A",
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: delete_url,
                            type: 'POST',
                            data: {'_token': '{{ @csrf_token() }}', _method: "DELETE"},
                            success: function (result) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your record has been deleted.',
                                    'success'
                                ).then(() => {
                                    $wire.dispatch('refreshDatatable')
                                })
                            },
                            error: function (result) {
                                console.log(result.success)
                                Swal.fire(
                                    'Error!',
                                    'Some Problem Occurred. Please Try again later.',
                                    'error'
                                ).then(() => {
                                    $wire.dispatch('refreshDatatable')
                                })
                            }
                        })
                    } else {
                        Swal.fire("Cancelled", "Deletion Cancelled", "error");
                    }
                })
            });
        });
    </script>
    @endscript
@endpush
