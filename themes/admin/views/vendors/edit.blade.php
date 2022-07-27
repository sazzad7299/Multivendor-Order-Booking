@extends('layouts.app')

@section('content')
<div class="flex flex-wrap mt-4">
    <div class="w-full  px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">
                            Update Vendor: <strong>{{ $vendor->name }}</strong>
                        </h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a href="{{ route('admin.vendors') }}"
                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-2 py-2 rounded outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition:all .15s ease">
                            Back
                        </a>
                    </div>
                    
                </div>
            </div>
            <hr class="mb-4 border-b-1 border-blueGray-200" />
            <div class="block w-full overflow-x-auto py-3 px-2">
                <form class="w-full md:w-full " action="{{ route('admin.editvendor',['id'=>$vendor->id]) }}" method="post">
                    @csrf
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-1/3 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="customer_name">
                                    Vendor Name:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white border-gray-200 focus:border-gray-500" id="customer_name" type="text" placeholder="Jane" name="name" value="{{old('name',$vendor->name)}}">
                                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                    Expair at:
                                  </label>
                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="date" placeholder="Albuquerque" name="expair_at"  value="{{old('expair_at',$vendor->expair_at)}}">
                                  
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                    Contact Num:
                                  </label>
                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('phone') border-red-500 @enderror"  type="text"  placeholder="Customer Contact" name="phone" value="{{old('phone',$vendor->phone)}}">
                                  @error('phone') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
    
                    </div>
                    
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-1/3 pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                   Email:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('email') border-red-500 @enderror" id="email" name="email" type="email" placeholder="Email" value="{{old('email',$vendor->email)}}">
                                @error('email') <p class="text-red-500 text-xs italic">{{ $message}}</p> @enderror
                                
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                                   Change Password:
                                  </label>
                                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('password') border-red-500 @enderror" id="password" name="password" type="password" >
                                  @error('password') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class=" sm:w-full md:w-1/3 pl-3 ">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                     Status:
                                  </label>
                                  <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="status">
                                    <option value="0" @if($vendor->status == 0) selected @endif >Inactive</option>
                                    <option value="1" @if($vendor->status == 1) selected @endif>Active</option>
                                    <option value="3" @if($vendor->status == 3) selected @endif>Band</option>
                                  </select>
                            </div>
                        </div>
    
                    </div>
                    <div class="md:flex lg:flex md:items-center lg:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-1/3 text-center">
                          <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " type="submit">Update Vendor</button>
                            
                           
                        </div>
                        <div class="md:w-1/3"></div>
                      </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection