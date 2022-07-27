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
                <form class="w-full md:w-full " action="{{ route('admin.update',['id'=>$order->id]) }}" method="post">
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
                        <div class="sm:w-full md:w-1/4 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pay_by">
                                  Payment Way:
                                </label>
                                
                                <select  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="pay_by" id="pay_by">
                                    <option value="bKash" @if($order->pay_by=="bKash") selected @endif>bKash</option>
                                    <option value="Nagat" @if($order->pay_by=="Nagat") selected @endif>Nagat</option>
                                    <option value="Rocket" @if($order->pay_by=="Rocket") selected @endif>Rocket</option>
                                    <option value="Bank" @if($order->pay_by=="Bank") selected @endif>Bank</option>
                                    <option value="Cash" @if($order->pay_by=="Cash") selected @endif>Cash</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="sm:w-full md:w-1/4 pl-3" id="bank" @if($order->pay_by=="Cash") style="display:none" @endif>
                            <div class="form-group" >
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="account">
                                  
                                  @if($order->pay_by=="Bank") BANK ACCOUNT NO: @else Last 4 digit (;): @endif
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="account" type="text" placeholder="Account Details" name="acc_info"  value="{{ $order->ac_info }}"> 
                            </div>
                        </div>
                        <div class="sm:w-full md:w-1/4 pl-3">
                            <div class="form-group" >
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pay_amount">
                                 Pay Amount:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('pay_amount') border-red-500 @enderror"  id="pay_amount" name="pay_amount"  value="{{ $order->pay_amount }}" type="number"> 
                                @error('pay_amount') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/4 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                    Payment Status:
                                  </label>
                                  <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="payment_status">
                                    <option value="pending" >Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="not verified">Not Verified</option>
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