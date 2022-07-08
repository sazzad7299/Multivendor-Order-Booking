@extends('layouts.app')

@section('content')
<div class="flex flex-wrap mt-4">
    <div class="w-full  px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">
                            Change Password
                        </h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a href="{{ route('developer.home') }}"
                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-2 py-2 rounded outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition:all .15s ease">
                            Back
                        </a>
                    </div>
                    
                </div>
                @if(Session::has('success'))
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{!! session('success') !!}</p>
                    </div>
                    @endif
            </div>
            <hr class="mb-4 border-b-1 border-blueGray-200" />
            <div class="block sm:w-full md:w-1/3 overflow-x-auto py-3 px-2" >
                <form class="w-full md:w-full " action="{{ route('developer.store') }}" method="post">
                    @csrf
 
            
                    
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-full pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="note">
                                   Current Password:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="note" type="password" placeholder="Current Password" name="cus_name">
                                
                            </div>
                        </div>
                    </div>
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-full pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                   New Password:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="password" placeholder="New Password"  name="email">
                                
                            </div>
                        </div>
                    </div>
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-full pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cpw">
                                  Confirm  Password:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="cpw" type="password" placeholder="Confirm Password" name="order_note">
                                
                            </div>
                        </div>
                    </div>
                    <div class="md:flex lg:flex md:items-center lg:items-center">
                        
                        <div class="md:w-full text-center">
                          <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " type="submit">Update Password</button>
                            
                           
                        </div>
                        
                      </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection