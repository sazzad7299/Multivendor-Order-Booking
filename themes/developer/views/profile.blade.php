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
            </div>
            <hr class="mb-4 border-b-1 border-blueGray-200" />
            <div class="block sm:w-full md:w-1/3 overflow-x-auto py-3 px-2" >
                <form class="w-full md:w-full " action="{{ route('developer.profile.update') }}" method="post">
                    @csrf
 
            
                    
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-full pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="note">
                                   Current Password:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('current_pass') border-red-500 @enderror" id="note" type="password" placeholder="Current Password" name="current_password">
                                @error('current_password')
                                <p class="mt-4 text-xs italic text-red-500">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-full pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                   New Password:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 @error('password') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="password" placeholder="New Password"  name="password" autocomplete="new-password">
                                @error('password')
                                <p class="mt-4 text-xs italic text-red-500">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="sm:w-full md:flex mb-4">
                        <div class="sm:w-full md:w-full pl-3">
                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_confirmation">
                                  Confirm  Password:
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="new-password">
                                
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