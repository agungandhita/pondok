@extends('auth.layouts.main')

@section('container')
<div class="bg-gray-100 flex h-screen items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-md p-8">

            <img class="mx-auto h-28 w-auto" src="{{ asset('img/logo2.png') }}" alt="" />

            <h2 class="mt-2 text-center text-3xl font-bold tracking-tight text-gray-900">
                Silahkan masuk
            </h2>


            <form class="mt-8 space-y-6" action="/masuk" method="POST">
                @csrf
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input name="email" type="email-address" autocomplete="email-address" required
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-white text-black" />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="password" required
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-white text-black" />
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md border border-transparent bg-sky-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
