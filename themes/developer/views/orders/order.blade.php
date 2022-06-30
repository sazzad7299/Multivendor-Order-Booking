@extends('layouts.app')

@section('content')

<div class="flex flex-wrap mt-4">
    <div class="w-full  px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">
                            All Orders
                        </h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a href="{{ route('developer.add') }}"
                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-2 py-2 rounded outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition:all .15s ease">
                            Add New
                        </a>
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto py-3 px-2">
                @if(Session::has('flash_login_massage_error'))  
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Sorry!</strong>
                    <span class="block sm:inline">{!! session('flash_login_massage_error') !!}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
                @endif
                <!-- Projects table -->
                <table id="example" class="stripe hover " style="width:100%;">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-8 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="p-8 text-xs text-gray-500">
                                Refer ID
                            </th>
                            <th class="p-8 text-xs text-gray-500">
                                Cus.Name
                            </th>
                            
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Product
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Price
                            </th>

                            <th class="px-6 py-2 text-xs text-gray-500">
                                Payment Status
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach($orders as  $key => $order)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-center text-gray-500">
                                {{ $key }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="text-sm text-gray-900">
                                    {{ $order->refer_code }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="text-sm text-gray-500">{{ $order->cus_name }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-center text-gray-500">
                                {{ $order->product_name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-center text-gray-500">
                                {{ $order->product_price }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="text-sm text-gray-500">{{ $order->payment_status }}</div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="text-sm text-gray-500"><i
                                        class="fas fa-eye opacity-75 mr-2 text-sm bg-blue-400 p-2 text-black"></i>
                                        <a href="{{ route('developer.edit',['id'=>$order->id])}}" class="opacity-100 mr-2 text-sm bg-blue-400 p-2 text-white"><i
                                            class="fas fa-edit"></i></a>  
                                            <a href="{{ url('edit/'.$order->id) }}"><i
                                                class="fas fa-trash opacity-100 mr-2 text-sm text-white bg-red-400 p-2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection