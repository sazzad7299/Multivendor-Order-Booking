@php use Carbon\Carbon; @endphp
@extends('layouts.app')
@section('content')

<div class="flex flex-wrap mt-4">
    <div class="w-full  px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">
                            All Vendors
                        </h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a href="{{ route('admin.addVendor') }}"
                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-2 py-2 rounded outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition:all .15s ease">
                            Add New
                        </a>
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto py-3 px-2">
                <!-- Projects table -->
                <table id="example" class="stripe hover " style="width:100%;">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-8 text-xs text-gray-500">
                               User ID
                            </th>
                            <th class="p-8 text-xs text-gray-500">
                                Name
                            </th>
                            <th class="p-8 text-xs text-gray-500">
                                Phone
                            </th>
                            
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Status
                            </th>
                            
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach($vendors as  $key => $vendor)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                
                                    {{ $vendor->id  }}
                                    
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        <a href="javascript:void(0)" class="viewOrder" rel="{{ $vendor->id }}">{{ $vendor->name }}<i class="fas fa-eye opacity-75 mr-2 text-sm  p-2 text-black"></i></a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">{{ $vendor->phone }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center">
                                    @if($vendor->status == 0)
                                    <span class="text-red-500" > Inactive</span>
                                    @elseif($vendor->status == 1)
                                    <span class="text-blue-500" > Active</span>
                                    @elseif($vendor->status == 3)
                                    <span class="text-red-700" > Band</span>
                                    @endif
                                </td>
                                {{-- <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    {{ $order->product_price }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">{{ $order->payment_status }}</div>
                                </td> --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">
                                            <a href="{{ route('admin.editvendor',['id'=>$vendor->id])}}" class="opacity-100 mr-2 text-sm bg-blue-400 p-2 text-white shadow"><i
                                                class="fas fa-edit"></i></a>  
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
  <!-- Vendor View Main modal -->
  <div id="viewOrderDetails" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="crypto-modal" id="clsbtn">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="py-4 px-6 rounded-t border-b dark:border-gray-600" id="ModelHead">
                
            </div>
            <!-- Modal body -->
            <div class="p-6">
                <ul class="my-4 space-y-3" id="contentOrders">
                    
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection