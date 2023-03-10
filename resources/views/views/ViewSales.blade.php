@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Items Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer CNIC</th>
                                    <th>Subtotal Price</th>
                                    <th>Discount</th>
                                    <th>Total Price</th>
                                    <th>Print Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    {{-- {{ dd($item) }} --}}
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->Order->Customers['name'] }}</td>
                                        <td>{{ $item->Order->Customers['cnic'] }}</td>
                                        <td>{{ $item['subtotal_price'] }}-Rs</td>
                                        <td>{{ $item['discount'] }}%</td>
                                        <td>{{ $item['total_price'] }}-Rs</td>
                                        <td><a href="/print_order/{{ $item['id'] }}">
                                                <button type="button" class="btn btn-success">Print</button>
                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
