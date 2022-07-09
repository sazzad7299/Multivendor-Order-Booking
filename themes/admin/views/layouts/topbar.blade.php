<nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
            href="./index.html">Dashboard</a>
        <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">
            <div class="relative flex w-full flex-wrap items-stretch">
                <span
                    class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"><i
                        class="fas fa-search"></i></span>
                <input type="text" placeholder="Search here..."
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10" />
            </div>
        </form>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                    <span
                        class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                            alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                            src="{{ asset('themes/developer/img/profile.jpg') }}" /></span>
                </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;" id="user-dropdown">
                <ul class="md:flex-col md:min-w-full flex flex-col list-none pl-5">
                    
                    <li class="items-center">
                        <a class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                            href="#/profile"><i class="fas fa-user-circle text-blueGray-400 mr-2 text-sm"></i>
                            Profile</a>
                    </li>
                    <li class="items-center">
                        <a class="text-blueGray-300 text-xs uppercase py-3 font-bold block" href="#pablo"><i
                                class="fas fa-tools text-blueGray-300 mr-2 text-sm"></i>
                            Settings</a>
                    </li>
                    <hr class="my-4 md:min-w-full" />
                    <li class="items-center">
                        <a class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                            href="{{ route('admin.logout') }}" class="no-underline hover:underline"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                            Logout</a>

                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                         {{ csrf_field() }}
                     </form></a><a>
                    </li>
                </ul>
                
            </div>
        </ul>
    </div>
</nav>
<div class="relative bg-pink-600 md:pt-20 ">
</div>