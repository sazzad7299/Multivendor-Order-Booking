@extends('layouts.app')

@section('content')
<div class="flex flex-wrap mt-4">
    <div class="w-full  px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">
                            Update Order: <strong>{{ $order->refer_code }}</strong>
                        </h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a href="{{ route('admin.orderlist') }}"
                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-2 py-2 rounded outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition:all .15s ease">
                            Back
                        </a>
                    </div>
                    
                </div>
            </div>
            <hr class="mb-4 border-b-1 border-blueGray-200" />
            <div class="block w-full overflow-x-auto py-3 px-2">
                <form class="w-full md:w-full " action="{{ url('admin/orders/update/'.$order->id) }}" method="post">
                    @csrf
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-1/3 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="customer_name">
                                    Customer Name:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('cus_name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white border-gray-200 focus:border-gray-500" id="customer_name" type="text" placeholder="Jane" name="cus_name" value="{{ $order->cus_name }}">
                                @error('cus_name') <p class="text-red-500 text-xs italic">Please fill out this field.</p> @enderror
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                    Address:
                                  </label>
                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500   @error('address') border-red-500 @enderror" id="grid-city" type="text" placeholder="Albuquerque" name="address" value="{{ $order->address }}">
                                  @error('address') <p class="text-red-500 text-xs italic">Please fill out this field.</p> @enderror
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                    Contact Num:
                                  </label>
                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('cus_phone') border-red-500 @enderror" id="grid-city" type="text" placeholder="Customer Contact" name="cus_phone" value="{{ $order->cus_phone }}">
                                  @error('cus_phone') <p class="text-red-500 text-xs italic">Please fill out this field.</p> @enderror
                            </div>
                        </div>
    
                    </div>
                    
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-1/3 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="productname">
                                   Product Name:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('product_name') border-red-500 @enderror" id="productname" name="product_name" type="text" placeholder="Mango" value="{{ $order->product_name }}">
                                @error('product_name') <p class="text-red-500 text-xs italic">Please fill out this field.</p> @enderror
                                
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="quantity">
                                    Quantity:
                                  </label>
                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('quantity') border-red-500 @enderror" id="quantity" name="quantity" type="text" value="{{ $order->quantity }}">
                                  @error('quantity') <p class="text-red-500 text-xs italic">Please fill out this field.</p> @enderror
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                                    Price:
                                  </label>
                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('product_price') border-red-500 @enderror" id="price" type="text" placeholder="12323" name="product_price" value="{{ $order->product_price }}">
                                  @error('product_price') <p class="text-red-500 text-xs italic">Please fill out this field.</p> @enderror
                            </div>
                        </div>
    
                    </div>
                    
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-1/2 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="note">
                                   Extra Note:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="note" type="text" placeholder="Extra Notes" name="order_note" value="{{ $order->order_note }}">
                                
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/2 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                    Payment Status:
                                  </label>
                                  <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="payment_status">
                                    <option value="pending" @if($order->payment_status == "pending") selected @endif>Pending</option>
                                    <option value="completed" @if($order->payment_status == "completed") selected @endif>Completed</option>
                                    <option value="not verified" @if($order->payment_status == "not verified") selected @endif>Not Verified</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex lg:flex md:items-center lg:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-1/3 text-center">
                          <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " type="submit">Update Order</button>
                            
                           
                        </div>
                        <div class="md:w-1/3"></div>
                      </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection