@extends('welcome')
{{-- @extends('layouts.app') --}}

@section('invoice')
        <div class="container p-4">

            <div class="row gx-5 my-5">
                <div class="col-md-12">
                    <div class="px-5 pt-4">
                        <div class="input-group mb-3">
                            <form action="{{ route('invoices.search') }}" method="GET">
                                <span class="input-group-text px-5" id="basic-addon1">Filter</span>
                                <input type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="px-5">
                        <table class="table table-success table-striped table-bordered">
                            <thead class="table-l">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Number</th>
                                    <th>Customer</th>
                                    <th>Due Date</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                 
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->date }}</td>
                                        <td>{{ $invoice->number }}</td>
                                        @if ($invoice->customer)
                                            <td>{{ $invoice->customer->first_name }}</td>
                                            @else
                                            <td></td>
                                        @endif
                                        {{-- <td>{{ $invoice->customer->first_name }}</td> --}}
                                        <td>{{ $invoice->due_date }}</td>
                                        <td>{{ $invoice->total }}</td>
                                    </tr>
                                @endforeach
                        
                            </tbody>
                        </table>
                        @if (request()->input('search'))
                        <a href="{{ route('invoices.search') }}">
                            <input value="< Back" class="bg-info form-control btn" id="exampleFormControlInput1" placeholder="name@example.com">
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection