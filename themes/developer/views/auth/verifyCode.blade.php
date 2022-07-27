@extends('layouts.loginregister')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class=" break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="px-6 py-5 font-semibold text-gray-700 bg-gray-200 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Verify Code') }}
                </header>

                @if(Session::has('success'))
                  <div class="flex items-center bg-blue-400 text-black text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{!! session('success') !!}</p>
                  </div>
                @endif
                @if(Session::has('error'))
                  <div class="flex items-center bg-red-400 text-black text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{!! session('error') !!}</p>
                  </div>
                @endif
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('developer.verifiedcode') }}">
                    @csrf

                        <input id="phone" type="hidden" value="{{ request()->phone }}" name="phone">
                    <div class="flex flex-wrap">
                        <label for="code" class="block mb-2 text-sm font-bold text-gray-700">
                            {{ __('Code') }}:
                        </label>

                        <input id="code" type="text"
                            class="form-input w-full @error('code') border-red-500 @enderror" name="code"
                            required>

                        @error('code')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full p-3 text-base font-bold leading-normal text-gray-100 no-underline whitespace-no-wrap bg-blue-500 rounded-lg select-none hover:bg-blue-700 sm:py-4">
                            {{ __('Verify') }}
                        </button>
                    </div>
                </form>
                @if (Route::has('developer.resendcode'))
                <p class="w-full my-6 text-xs text-center text-gray-700 sm:text-sm sm:my-8 ">
                    <form action="{{ route('developer.resendcode') }}" method="post" class="text-center py-2">
                        @csrf
                    <input type="hidden" name="phone" value="{{ request()->phone }}">
                        Didn't Get any Code? <button class="text-green-700" > Resend Code</button>
                    </form>
                </p>
                @endif
            </section>
        </div>
    </div>
</main>
@endsection